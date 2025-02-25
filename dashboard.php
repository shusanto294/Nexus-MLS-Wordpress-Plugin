<?php if($currentTab == 'dashboard'): ?>
    <?php
        $current_user = wp_get_current_user();
        echo '<h2>Welcome ' . esc_html($current_user->display_name) . '</h2>';
        echo '<p>Please use the same email address to Login to Wordpress that you used on Nexus LMS to manage your existing listings.</p>';
    ?>
<?php endif; ?>