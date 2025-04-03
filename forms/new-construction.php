<?php

// Process the form submission
if(isset($_POST['ListingKey'])):

    $formData = $_POST;

    // Remove ListingKey if it exists
    if (isset($formData['ListingKey'])) {
        unset($formData['ListingKey']);
    }

    // Define an array of all the boolean fields that need conversion
    $booleanFields = [
        'NewConstructionYN'
    ];

    // Loop through each field and set its value to true or false
    foreach ($booleanFields as $field) {
        $formData[$field] = isset($formData[$field]) ? true : false;
    }

    // Convery SpecReadyDate to this format 2025-04-19T13:28:12.000Z
    if (isset($formData['SpecReadyDate'])) {
        $date = DateTime::createFromFormat('Y-m-d', $formData['SpecReadyDate']);
        if ($date) {
            $formData['SpecReadyDate'] = $date->format(DateTime::ATOM); // Convert to ISO 8601 format
        } else {
            unset($formData['SpecReadyDate']); // Remove if date is invalid
        }
    }
    

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://api.nexusmls.io/Property('$listing')",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "PATCH",
        CURLOPT_POSTFIELDS => json_encode($formData), // Send form data as JSON
        CURLOPT_HTTPHEADER => [
            "Authorization: Bearer $mlsApiKey",
            "Content-Type: application/json",
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
    echo "cURL Error #:" . $err;
    } else {
    echo $response;
    }



endif;

require_once plugin_dir_path(__FILE__) . '../fetch-listing-details.php';


?>

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