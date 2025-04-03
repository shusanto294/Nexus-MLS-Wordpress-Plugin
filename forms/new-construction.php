<form method="POST" class="nexus-mls-form listing-tab-content">
<input type="hidden" name="ListingKey" value="<?php echo $listing; ?>">

<h2>New Construction Info</h2>

<div>
    <label for="NewConstructionYN" style="font-size: 18px; font-weight: 700;">
        <input type="checkbox" id="NewConstructionYN" name="NewConstructionYN" value="true" <?php echo $listingData['NewConstructionYN'] ? 'checked' : ''; ?>>
        New Construction Home
    </label>
</div>

<div>
    <label for="SpecNumber">Property Id (Lot/Spec #)</label>
    <input type="text" id="SpecNumber" name="SpecNumber" value="<?php echo $listingData['SpecNumber']; ?>">
</div>

<div>
    <select name="SpecStatus">
        <option value="">Select Spec Status</option>
        <option value="Under Construction" <?php echo $listingData['SpecStatus'] == 'Under Construction' ? 'selected' : ''; ?>>Under Construction</option>
        <option value="Move In Ready" <?php echo $listingData['SpecStatus'] == 'Move In Ready' ? 'selected' : ''; ?>>Move In Ready</option>
        <option value="Reserved" <?php echo $listingData['SpecStatus'] == 'Reserved' ? 'selected' : ''; ?>>Reserved</option>
        <option value="Sold" <?php echo $listingData['SpecStatus'] == 'Sold' ? 'selected' : ''; ?>>Sold</option>
    </select>
</div>

<div>
    <label for="SubdivisionNumber">Subdivision Number</label>
    <input type="text" id="SubdivisionNumber" name="SubdivisionNumber" value="<?php echo $listingData['SubdivisionNumber']; ?>">
</div>

<div>
    <label for="SpecReadyDate">Spec Ready Date</label>
    <input type="date" id="SpecReadyDate" name="SpecReadyDate" value="<?php 
    // Check if the date exists in the expected format
    if (isset($listingData['SpecReadyDate']) && !empty($listingData['SpecReadyDate'])) {
        // Parse the ISO date format
        $date = new DateTime($listingData['SpecReadyDate']);
        // Format it as YYYY-MM-DD for the HTML date input
        echo $date->format('Y-m-d');
    }
?>">

</div>





<button type="submit">Save Information</button>
</form>