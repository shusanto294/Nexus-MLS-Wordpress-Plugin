<?php
/*
Plugin Name: Nexus MLS Real Estate Integration
Description: Integrates Nexus MLS API with WordPress
Version: 1.0.0
Author: Cloud Nine Web (Shusanto)
Author URI: https://cloudnineweb.co/
*/

if (!defined('ABSPATH')) {
    exit;
}


require_once plugin_dir_path(__FILE__) . 'shortcode.php';

class MLSIntegration {

    public function __construct() {

        $this->apiKey = get_option('mls_api_key', '');
        add_action('admin_menu', array($this, 'add_admin_menu'));
        add_action('admin_init', array($this, 'register_settings'));
        add_shortcode('nexus_mls_dashboard', 'render_dashboard_shortcode');
    }



    public function register_settings() {
        register_setting('mls_settings', 'mls_api_key');
    }

    public function add_admin_menu() {
        add_menu_page(
            'Nexus MLS',
            'Nexus MLS', 
            'manage_options',
            'nexus-mls-settings',
            array($this, 'settings_page'),
            'dashicons-admin-home',
            30
        );
    }

    //Dashboard

    public function settings_page() {
        if (!current_user_can('manage_options')) {
            return;
        }

        if (isset($_POST['submit_mls_settings'])) {
            if (isset($_POST['mls_api_key'])) {
                update_option('mls_api_key', sanitize_text_field($_POST['mls_api_key']));
                echo '<div class="notice notice-success is-dismissible"><p>Settings saved successfully!</p></div>';
            }
        }

        $api_key = get_option('mls_api_key', '');

        ?>
        <div class="wrap">
            <h1>Nexus MLS</h1>
            
            <form method="post" action="">
                <table class="form-table">
                    <tr>
                        <th scope="row">
                            <label for="mls_api_key">API Key</label>
                        </th>
                        <td>
                            <input type="text" 
                                   id="mls_api_key" 
                                   name="mls_api_key" 
                                   value="<?php echo esc_attr($api_key); ?>" 
                                   class="regular-text"
                                   autocomplete="off">
                            <p class="description">Enter your Nexus MLS API key here</p>
                        </td>
                    </tr>
                </table>
                
                <?php wp_nonce_field('mls_settings_nonce', 'mls_settings_nonce'); ?>
                <input type="submit" 
                       name="submit_mls_settings" 
                       class="button button-primary" 
                       value="Save Settings">
            </form>
        </div>
        <?php
    }

    //Add new listing
    public function nexus_mls_add_new_listing(){
        if(isset($_GET['tab']) && $_GET['tab'] == 'add-new-listing'){
            $current_user = wp_get_current_user();
            $user_email = $current_user->user_email;
            $full_name = $current_user->display_name;

            $formData = [
                'ListAgentEmail' => $user_email,
            ];


            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL => "https://api.nexusmls.io/Property",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode($formData),
                CURLOPT_HTTPHEADER => [
                    "Authorization: Bearer $this->apiKey",
                    "Content-Type: application/json",
                ],
            ]);

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                $jsonResponse = json_decode($response, true);
                // echo '<pre>';
                // var_Dump($jsonResponse);
                // echo '</pre>';

                if($jsonResponse['ListingKey']){
                    //Redirect user to homepageurl/agent-dashboard/?tab=all-listings&listing=$jsonResponse['ListingKey'] using wp redirect
                    $listingKey = $jsonResponse['ListingKey'];
                    $redirectUrl = home_url('/agent-dashboard/?tab=all-listings&listing=' . $listingKey);

                    wp_redirect($redirectUrl);
                    exit;

                }
            }
        }

    }

}

$nexusMLS = new MLSIntegration();

function restrict_nexus_mls_dashboard_page() {
    // Check if the current page contains the [nexus_mls_dashboard] shortcode
    if ( is_page() && has_shortcode( get_post()->post_content, 'nexus_mls_dashboard' ) ) {
        // Check if the user is not logged in
        if ( ! is_user_logged_in() ) {
            // Redirect to the login page
            auth_redirect();
        }
    }
}
add_action( 'template_redirect', 'restrict_nexus_mls_dashboard_page' );

//Media upload

add_action('wp_ajax_upload_media', 'handle_media_upload');
function handle_media_upload() {
    // Verify nonce
    if (!check_ajax_referer('media-upload', 'nonce', false)) {
        wp_send_json_error(['message' => 'Invalid security token']);
        return;
    }

    // Check permissions
    if (!current_user_can('upload_files')) {
        wp_send_json_error(['message' => 'Permission denied']);
        return;
    }

    // Check if file was uploaded
    if (!isset($_FILES['file'])) {
        wp_send_json_error(['message' => 'No file uploaded']);
        return;
    }

    require_once(ABSPATH . 'wp-admin/includes/image.php');
    require_once(ABSPATH . 'wp-admin/includes/file.php');
    require_once(ABSPATH . 'wp-admin/includes/media.php');

    $attachment_id = media_handle_upload('file', 0);

    if (is_wp_error($attachment_id)) {
        wp_send_json_error([
            'message' => $attachment_id->get_error_message()
        ]);
        return;
    }

    $url = wp_get_attachment_url($attachment_id);
    wp_send_json_success([
        'url' => $url,
        'id' => $attachment_id,
        'filename' => basename($url)
    ]);
}


add_action('init', array($nexusMLS, 'nexus_mls_add_new_listing'));