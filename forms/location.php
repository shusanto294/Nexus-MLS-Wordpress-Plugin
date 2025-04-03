<?php

// Process the form submission
if(isset($_POST['ListingKey'])):

    $formData = $_POST;

    // Remove ListingKey if it exists
    if (isset($formData['ListingKey'])) {
        unset($formData['ListingKey']);
    }


    // Convert the Concessions field to Yes or No
    if(isset($formData['Concessions'])) {
        $formData['Concessions'] = 'Yes';
    } else {
        $formData['Concessions'] = 'No'; // Default to No if not set
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


<h2>Location</h2>


<div>
    <label for="StreetNumber">Street/House Number</label>
    <input type="text" id="StreetNumber" name="StreetNumber" value="<?php echo $listingData['StreetNumber']; ?>">
</div>

<div>
    <label for="StreetName">Street Name</label>
    <input type="text" id="StreetName" name="StreetName" value="<?php echo $listingData['StreetName']; ?>">
</div>

<div>
    <label for="UnitNumber">Unit Number</label>
    <input type="text" id="UnitNumber" name="UnitNumber" value="<?php echo $listingData['UnitNumber']; ?>">
</div>

<div>
    <label for="City">City</label>
    <input type="text" id="City" name="City" value="<?php echo $listingData['City']; ?>">
</div>

<div>
    <label for="CountyOrParish">County</label>
    <input type="text" id="CountyOrParish" name="CountyOrParish" value="<?php echo $listingData['CountyOrParish']; ?>">
</div>

<div>
    <label for="StateOrProvince">State</label>
    <select name="StateOrProvince" id="StateOrProvince">
        <option value="AB" <?php echo $listingData['StateOrProvince'] == 'AB' ? 'selected' : ''; ?>>AB</option>
        <option value="AK" <?php echo $listingData['StateOrProvince'] == 'AK' ? 'selected' : ''; ?>>AK</option>
        <option value="AL" <?php echo $listingData['StateOrProvince'] == 'AL' ? 'selected' : ''; ?>>AL</option>
        <option value="AR" <?php echo $listingData['StateOrProvince'] == 'AR' ? 'selected' : ''; ?>>AR</option>
        <option value="AZ" <?php echo $listingData['StateOrProvince'] == 'AZ' ? 'selected' : ''; ?>>AZ</option>
        <option value="BC" <?php echo $listingData['StateOrProvince'] == 'BC' ? 'selected' : ''; ?>>BC</option>
        <option value="CA" <?php echo $listingData['StateOrProvince'] == 'CA' ? 'selected' : ''; ?>>CA</option>
        <option value="CO" <?php echo $listingData['StateOrProvince'] == 'CO' ? 'selected' : ''; ?>>CO</option>
        <option value="CT" <?php echo $listingData['StateOrProvince'] == 'CT' ? 'selected' : ''; ?>>CT</option>
        <option value="DC" <?php echo $listingData['StateOrProvince'] == 'DC' ? 'selected' : ''; ?>>DC</option>
        <option value="DE" <?php echo $listingData['StateOrProvince'] == 'DE' ? 'selected' : ''; ?>>DE</option>
        <option value="FL" <?php echo $listingData['StateOrProvince'] == 'FL' ? 'selected' : ''; ?>>FL</option>
        <option value="GA" <?php echo $listingData['StateOrProvince'] == 'GA' ? 'selected' : ''; ?>>GA</option>
        <option value="HI" <?php echo $listingData['StateOrProvince'] == 'HI' ? 'selected' : ''; ?>>HI</option>
        <option value="IA" <?php echo $listingData['StateOrProvince'] == 'IA' ? 'selected' : ''; ?>>IA</option>
        <option value="ID" <?php echo $listingData['StateOrProvince'] == 'ID' ? 'selected' : ''; ?>>ID</option>
        <option value="IL" <?php echo $listingData['StateOrProvince'] == 'IL' ? 'selected' : ''; ?>>IL</option>
        <option value="IN" <?php echo $listingData['StateOrProvince'] == 'IN' ? 'selected' : ''; ?>>IN</option>
        <option value="KS" <?php echo $listingData['StateOrProvince'] == 'KS' ? 'selected' : ''; ?>>KS</option>
        <option value="KY" <?php echo $listingData['StateOrProvince'] == 'KY' ? 'selected' : ''; ?>>KY</option>
        <option value="LA" <?php echo $listingData['StateOrProvince'] == 'LA' ? 'selected' : ''; ?>>LA</option>
        <option value="MA" <?php echo $listingData['StateOrProvince'] == 'MA' ? 'selected' : ''; ?>>MA</option>
        <option value="MB" <?php echo $listingData['StateOrProvince'] == 'MB' ? 'selected' : ''; ?>>MB</option>
        <option value="MD" <?php echo $listingData['StateOrProvince'] == 'MD' ? 'selected' : ''; ?>>MD</option>
        <option value="ME" <?php echo $listingData['StateOrProvince'] == 'ME' ? 'selected' : ''; ?>>ME</option>
        <option value="MI" <?php echo $listingData['StateOrProvince'] == 'MI' ? 'selected' : ''; ?>>MI</option>
        <option value="MN" <?php echo $listingData['StateOrProvince'] == 'MN' ? 'selected' : ''; ?>>MN</option>
        <option value="MO" <?php echo $listingData['StateOrProvince'] == 'MO' ? 'selected' : ''; ?>>MO</option>
        <option value="MS" <?php echo $listingData['StateOrProvince'] == 'MS' ? 'selected' : ''; ?>>MS</option>
        <option value="MT" <?php echo $listingData['StateOrProvince'] == 'MT' ? 'selected' : ''; ?>>MT</option>
        <option value="NB" <?php echo $listingData['StateOrProvince'] == 'NB' ? 'selected' : ''; ?>>NB</option>
        <option value="NC" <?php echo $listingData['StateOrProvince'] == 'NC' ? 'selected' : ''; ?>>NC</option>
        <option value="ND" <?php echo $listingData['StateOrProvince'] == 'ND' ? 'selected' : ''; ?>>ND</option>
        <option value="NE" <?php echo $listingData['StateOrProvince'] == 'NE' ? 'selected' : ''; ?>>NE</option>
        <option value="NF" <?php echo $listingData['StateOrProvince'] == 'NF' ? 'selected' : ''; ?>>NF</option>
        <option value="NH" <?php echo $listingData['StateOrProvince'] == 'NH' ? 'selected' : ''; ?>>NH</option>
        <option value="NJ" <?php echo $listingData['StateOrProvince'] == 'NJ' ? 'selected' : ''; ?>>NJ</option>
        <option value="NM" <?php echo $listingData['StateOrProvince'] == 'NM' ? 'selected' : ''; ?>>NM</option>
        <option value="NS" <?php echo $listingData['StateOrProvince'] == 'NS' ? 'selected' : ''; ?>>NS</option>
        <option value="NT" <?php echo $listingData['StateOrProvince'] == 'NT' ? 'selected' : ''; ?>>NT</option>
        <option value="NU" <?php echo $listingData['StateOrProvince'] == 'NU' ? 'selected' : ''; ?>>NU</option>
        <option value="NV" <?php echo $listingData['StateOrProvince'] == 'NV' ? 'selected' : ''; ?>>NV</option>
        <option value="NY" <?php echo $listingData['StateOrProvince'] == 'NY' ? 'selected' : ''; ?>>NY</option>
        <option value="OH" <?php echo $listingData['StateOrProvince'] == 'OH' ? 'selected' : ''; ?>>OH</option>
        <option value="OK" <?php echo $listingData['StateOrProvince'] == 'OK' ? 'selected' : ''; ?>>OK</option>
        <option value="ON" <?php echo $listingData['StateOrProvince'] == 'ON' ? 'selected' : ''; ?>>ON</option>
        <option value="OR" <?php echo $listingData['StateOrProvince'] == 'OR' ? 'selected' : ''; ?>>OR</option>
        <option value="PA" <?php echo $listingData['StateOrProvince'] == 'PA' ? 'selected' : ''; ?>>PA</option>
        <option value="PE" <?php echo $listingData['StateOrProvince'] == 'PE' ? 'selected' : ''; ?>>PE</option>
        <option value="QC" <?php echo $listingData['StateOrProvince'] == 'QC' ? 'selected' : ''; ?>>QC</option>
        <option value="RI" <?php echo $listingData['StateOrProvince'] == 'RI' ? 'selected' : ''; ?>>RI</option>
        <option value="SC" <?php echo $listingData['StateOrProvince'] == 'SC' ? 'selected' : ''; ?>>SC</option>
        <option value="SD" <?php echo $listingData['StateOrProvince'] == 'SD' ? 'selected' : ''; ?>>SD</option>
        <option value="SK" <?php echo $listingData['StateOrProvince'] == 'SK' ? 'selected' : ''; ?>>SK</option>
        <option value="TN" <?php echo $listingData['StateOrProvince'] == 'TN' ? 'selected' : ''; ?>>TN</option>
        <option value="TX" <?php echo $listingData['StateOrProvince'] == 'TX' ? 'selected' : ''; ?>>TX</option>
        <option value="UT" <?php echo $listingData['StateOrProvince'] == 'UT' ? 'selected' : ''; ?>>UT</option>
        <option value="VA" <?php echo $listingData['StateOrProvince'] == 'VA' ? 'selected' : ''; ?>>VA</option>
        <option value="VI" <?php echo $listingData['StateOrProvince'] == 'VI' ? 'selected' : ''; ?>>VI</option>
        <option value="VT" <?php echo $listingData['StateOrProvince'] == 'VT' ? 'selected' : ''; ?>>VT</option>
        <option value="WA" <?php echo $listingData['StateOrProvince'] == 'WA' ? 'selected' : ''; ?>>WA</option>
        <option value="WI" <?php echo $listingData['StateOrProvince'] == 'WI' ? 'selected' : ''; ?>>WI</option>
        <option value="WV" <?php echo $listingData['StateOrProvince'] == 'WV' ? 'selected' : ''; ?>>WV</option>
        <option value="WY" <?php echo $listingData['StateOrProvince'] == 'WY' ? 'selected' : ''; ?>>WY</option>
        <option value="YT" <?php echo $listingData['StateOrProvince'] == 'YT' ? 'selected' : ''; ?>>YT</option>
    </select>

</div>

<div>
    <label for="PostalCode">Postal Code</label>
    <input type="text" id="PostalCode" name="PostalCode" value="<?php echo $listingData['PostalCode']; ?>">
</div>

<div>
    <label for="SubdivisionName">Subdivision Name</label>
    <input type="text" id="SubdivisionName" name="SubdivisionName" value="<?php echo $listingData['SubdivisionName']; ?>">
</div>

<div>
    <label for="ParcelNumber">Parcel Number / Tax ID</label>
    <input type="text" id="ParcelNumber" name="ParcelNumber" value="<?php echo $listingData['ParcelNumber']; ?>">
</div>

<div>
    <label for="Latitude">Latitude</label>
    <input type="text" id="Latitude" name="Latitude" value="<?php echo $listingData['Latitude']; ?>">
</div>

<div>
    <label for="Latitude">Longitude</label>
    <input type="text" id="Longitude" name="Longitude" value="<?php echo $listingData['Longitude']; ?>">
</div>

<button type="submit">Save Information</button>
</form>