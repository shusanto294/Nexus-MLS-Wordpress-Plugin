<?php if($currentTab == 'all-listings' && $listing != null): ?>

<?php

require_once plugin_dir_path(__FILE__) . 'update-listing-details.php';
require_once plugin_dir_path(__FILE__) . 'fetch-listing-details.php';

?>

<div class="listing-tabs">
    <button class="active">Location</button>
    <button>Property</button>
    <button>Parking / Utilities</button>
    <button>Amenities / HOA</button>
    <button>Listing / Agent</button>
    <button>Open House / Tours</button>
    <button>New Construction</button>
    <button>Media</button>
    <button>Docs</button>
</div>

<div class="listing-tab-contents">
    <?php
        require_once plugin_dir_path(__FILE__) . 'forms/location.php';
        require_once plugin_dir_path(__FILE__) . 'forms/property.php';
    ?>
</div>


<script>
    jQuery(document).ready(function($) {
        $('.listing-tabs button').click(function() {
            var index = $(this).index();
            $('.listing-tabs button').removeClass('active');
            $(this).addClass('active');
            $('.listing-tab-contents > form').hide();
            $('.listing-tab-contents > form').eq(index).show();
        });

        // Show the first tab by default
        $('.listing-tab-contents > div').hide();
        $('.listing-tab-contents > div').first().show();
    });
</script>

<?php endif; ?>