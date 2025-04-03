<?php if($currentTab == 'all-listings' && $listing != null): ?>

<?php
/*
require_once plugin_dir_path(__FILE__) . 'update-listing-details.php';
require_once plugin_dir_path(__FILE__) . 'fetch-listing-details.php';
*/


// Get current active tab
$activeTab = $_SESSION['activeTab'];

?>

<div class="listing-tabs">
    <form method="post" id="tab-form">
        <input type="hidden" name="selected_tab" id="selected_tab" value="<?php echo $activeTab; ?>">
        
        <button type="submit" class="tab-button <?php echo ($activeTab == 0) ? 'active' : ''; ?>" 
                onclick="document.getElementById('selected_tab').value='0';">Location</button>
        
        <button type="submit" class="tab-button <?php echo ($activeTab == 1) ? 'active' : ''; ?>" 
                onclick="document.getElementById('selected_tab').value='1';">Property</button>
        
        <button type="submit" class="tab-button <?php echo ($activeTab == 2) ? 'active' : ''; ?>" 
                onclick="document.getElementById('selected_tab').value='2';">Parking / Utilities</button>
        
        <button type="submit" class="tab-button <?php echo ($activeTab == 3) ? 'active' : ''; ?>" 
                onclick="document.getElementById('selected_tab').value='3';">Amenities / HOA</button>
        
        <button type="submit" class="tab-button <?php echo ($activeTab == 4) ? 'active' : ''; ?>" 
                onclick="document.getElementById('selected_tab').value='4';">Listing / Agent</button>
        
        <button type="submit" class="tab-button <?php echo ($activeTab == 5) ? 'active' : ''; ?>" 
                onclick="document.getElementById('selected_tab').value='5';">Open House / Tours</button>
        
        <button type="submit" class="tab-button <?php echo ($activeTab == 6) ? 'active' : ''; ?>" 
                onclick="document.getElementById('selected_tab').value='6';">New Construction</button>
        
        <button type="submit" class="tab-button <?php echo ($activeTab == 7) ? 'active' : ''; ?>" 
                onclick="document.getElementById('selected_tab').value='7';">Media</button>
        
        <button type="submit" class="tab-button <?php echo ($activeTab == 8) ? 'active' : ''; ?>" 
                onclick="document.getElementById('selected_tab').value='8';">Docs</button>
    </form>
</div>

<div class="listing-tab-contents">
    <?php
        // Include only the active tab content
        switch ($activeTab) {
            case 0:
                require_once plugin_dir_path(__FILE__) . 'forms/location.php';
                break;
            case 1:
                require_once plugin_dir_path(__FILE__) . 'forms/property.php';
                break;
            case 2:
                require_once plugin_dir_path(__FILE__) . 'forms/parking-utilities.php';
                break;
            case 3:
                require_once plugin_dir_path(__FILE__) . 'forms/amenities-hoa.php';
                break;
            case 4:
                require_once plugin_dir_path(__FILE__) . 'forms/listing-agent.php';
                break;
            case 5:
                require_once plugin_dir_path(__FILE__) . 'forms/open-house-tours.php';
                break;
            case 6:
                require_once plugin_dir_path(__FILE__) . 'forms/new-construction.php';
                break;
            case 7:
                require_once plugin_dir_path(__FILE__) . 'forms/media.php';
                break;
            case 8:
                require_once plugin_dir_path(__FILE__) . 'forms/docs.php';
                break;
            default:
                require_once plugin_dir_path(__FILE__) . 'forms/location.php';
                break;
        }
    ?>
</div>

<?php endif; ?>


<style>
    form#tab-form {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
    }
</style>