<?php


function render_dashboard_shortcode() {
    ob_start();

    $mlsApiKey = get_option('mls_api_key', '');

    $currentTab = 'dashboard';
    if (isset($_GET['tab'])) {
        $currentTab = sanitize_text_field($_GET['tab']);
    }

    $listing = null;
    if (isset($_GET['listing'])) {
        $listing = sanitize_text_field($_GET['listing']);
    }
    

    ?>
    <style>

        .listing-tabs {
            display: flex;
            flex-wrap: wrap;
            column-gap: 15px;
            row-gap: 15px;
            margin-bottom: 30px;
        }

        .listing-tabs button {
            background: #ddd;
            padding: 12px 25px;
        }

        .listing-tabs button.active {
            background: #000;
            color: #fff;
        }

        .column-3 {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            column-gap: 20px;
        }

        .column-4 {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            column-gap: 20px;
        }

        .column-5{
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
            column-gap: 20px;
        }

        .inline-checkboxes {
            display: flex;
            flex-wrap: wrap;
            column-gap: 10px;
        }

        .inline-checkboxes label {
            color: #000;
        }

        .nexus-mls-dashboard-content .all-listing-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .nexus-mls-dashboard-content .all-listing-header a {
            background: #000;
            color: #fff;
            padding: 15px 20px;
            text-decoration: none;
            line-height: 1;
        }

        .nexus-mls-dashboard {
            display: grid;
            grid-template-columns: 1fr 3fr;
            gap: 50px;
            font-size: 16px;
        }
        .nexus-mls-dashboard-menu ul{
            list-style: none;
            padding: 0px;
            display: flex;
            flex-direction: column;
            row-gap: 10px;
        }

        .nexus-mls-dashboard-menu ul li a{
            text-decoration: none !Important;
            color: black;
            display: block;
            padding: 10px;
        }

        .nexus-mls-dashboard-menu ul li a.active {
            background: #eee;
            
        }

        form.nexus-mls-form input, form.nexus-mls-form select{
            margin-bottom: 15px !important;
        }

        form.nexus-mls-form input{
            border: 1px solid #ddd;
            border-radius: none;
        }

        form.nexus-mls-form button{
            background: black;
            color: white;
            padding: 10px 25px;

        }
        table.nexus-mls-table {
            text-align: left;
            border-collapse: collapse;
            width: 100%;
        }
        table.nexus-mls-table th, table.nexus-mls-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .nexus-mls-dashboard-content h2 {
            font-size: 25px;
            margin-bottom: 10px !important;
            margin-top: 10px;
            background: #ddd;
            padding: 10px;
        }

        .nexus-mls-dashboard-content h5 {
            margin-bottom: 10px !important;
            margin-top: 20px;
            font-size: 18px;
        }

        .nexus-mls-dashboard-content a {
            color: black;
            text-decoration: underline;
        }

        form.nexus-mls-form label {
            color: black;
        }

        form.nexus-mls-form .inline-checkboxes, form.nexus-mls-form .inline-radiofields {
            display: flex;
            flex-wrap: wrap;
            column-gap: 10px;
            line-height: 1;
        }

        form.nexus-mls-form .inline-radiofields{
            margin-top: 10px;
            margin-bottom: 10px;
        }

        form.nexus-mls-form .inline-checkboxes label {
            display: flex;
            column-gap: 5px;
            line-height: 1;
            margin-bottom: 0px !Important;
        }

        .upload-field {
            margin: 10px 0px;
        }

        button.pagination-button {
            margin-left: auto;
            display: flex;
        }

        @media(max-width: 767px){
            .nexus-mls-dashboard {
                grid-template-columns: 1fr;
                gap: 20px;
                padding-bottom: 50px;
            }

            .column-3, .column-4, .column-5 {
                grid-template-columns: 1fr;
            }
        }
    </style>


    <div class="nexus-mls-dashboard">
        <div class="nexus-mls-dashboard-menu">
            <nav>
                <ul>
                    <li><a href="?tab=dashboard" class="<?php echo $currentTab == 'dashboard' ? 'active' : ''; ?>">Dashboard</a></li>
                    <li><a href="?tab=all-listings" class="<?php echo $currentTab == 'all-listings' ? 'active' : ''; ?>">My Listings</a></li>
                    <!-- <li><a href="?tab=add-new-listing" class="<?php echo $currentTab == 'add-new-listing' ? 'active' : ''; ?>">Add New Listing</a></li> -->
                </ul>
            </nav>
        </div>

        <div class="nexus-mls-dashboard-content">
            <?php
                require_once plugin_dir_path(__FILE__) . 'dashboard.php';
                require_once plugin_dir_path(__FILE__) . 'all-listings.php';
                require_once plugin_dir_path(__FILE__) . 'listing-single.php';
            ?>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
