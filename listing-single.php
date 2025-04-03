<?php if($currentTab == 'all-listings' && $listing != null): ?>

<?php
require_once plugin_dir_path(__FILE__) . 'update-listing-details.php';
require_once plugin_dir_path(__FILE__) . 'fetch-listing-details.php';
?>

<div class="listing-tabs">
    <button class="tab-button" data-tab="0">Location</button>
    <button class="tab-button" data-tab="1">Property</button>
    <button class="tab-button" data-tab="2">Parking / Utilities</button>
    <button class="tab-button" data-tab="3">Amenities / HOA</button>
    <button class="tab-button" data-tab="4">Listing / Agent</button>
    <button class="tab-button" data-tab="5">Open House / Tours</button>
    <button class="tab-button" data-tab="6">New Construction</button>
    <button class="tab-button" data-tab="7">Media</button>
    <button class="tab-button" data-tab="8">Docs</button>
</div>

<div class="listing-tab-contents">
    <?php
        require_once plugin_dir_path(__FILE__) . 'forms/location.php';
        require_once plugin_dir_path(__FILE__) . 'forms/property.php';
        require_once plugin_dir_path(__FILE__) . 'forms/parking-utilities.php';
        require_once plugin_dir_path(__FILE__) . 'forms/amenities-hoa.php';
        require_once plugin_dir_path(__FILE__) . 'forms/listing-agent.php';
        require_once plugin_dir_path(__FILE__) . 'forms/open-house-tours.php';
        require_once plugin_dir_path(__FILE__) . 'forms/new-construction.php';
        require_once plugin_dir_path(__FILE__) . 'forms/media.php';
        require_once plugin_dir_path(__FILE__) . 'forms/docs.php';
    ?>
</div>

<script>
    jQuery(document).ready(function($) {
        // Generate a unique page identifier for this listing page
        var listingId = '<?php echo isset($listing->id) ? $listing->id : "default"; ?>';
        var pageKey = 'activeListingTab_' + listingId;
        var lastVisitedKey = 'lastVisitedPage';
        var currentPage = window.location.pathname;
        
        // Function to set active tab
        function setActiveTab(index) {
            // Store the current tab index in localStorage
            localStorage.setItem(pageKey, index);
            
            // Update UI
            $('.listing-tabs button').removeClass('active');
            $('.listing-tabs button[data-tab="' + index + '"]').addClass('active');
            
            $('.listing-tab-contents > form').hide();
            $('.listing-tab-contents > form').eq(index).show();
        }
        
        // Handle tab clicks
        $('.listing-tabs button').click(function() {
            var index = $(this).data('tab');
            setActiveTab(index);
        });
        
        // Add form submission handler that keeps the current tab
        $('.listing-tab-contents form').submit(function() {
            var currentTab = parseInt(localStorage.getItem(pageKey) || 0);
            // Keep the same tab active after form submission
            localStorage.setItem(pageKey, currentTab);
        });
        
        // Check if we're coming from a different page
        var lastVisitedPage = localStorage.getItem(lastVisitedKey);
        if (lastVisitedPage !== currentPage) {
            // Reset to first tab when coming from a different page
            localStorage.setItem(pageKey, 0);
        }
        
        // Store current page as last visited
        localStorage.setItem(lastVisitedKey, currentPage);
        
        // On page load, check for stored tab or default to first tab
        var storedTab = localStorage.getItem(pageKey);
        if (storedTab !== null) {
            setActiveTab(parseInt(storedTab));
        } else {
            // Default to first tab
            setActiveTab(0);
        }
    });
</script>

<?php endif; ?>
