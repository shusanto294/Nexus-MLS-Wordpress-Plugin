<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $currentTab == 'add-new-listing') {
    $formData = [
        //Property Details
        'PropertyType' => isset($_POST['PropertyType']) && !empty($_POST['PropertyType']) ? $_POST['PropertyType'] : null,
        'StandardStatus' => isset($_POST['StandardStatus']) && !empty($_POST['StandardStatus']) ? $_POST['StandardStatus'] : null,
        'ListPrice' => isset($_POST['ListPrice']) && !empty($_POST['ListPrice']) ? $_POST['ListPrice'] : null,
        'YearBuilt' => isset($_POST['YearBuilt']) && !empty($_POST['YearBuilt']) ? $_POST['YearBuilt'] : null,
        'LivingArea' => isset($_POST['YearBuilt']) && !empty($_POST['YearBuilt']) ? $_POST['LivingArea'] : null,
        'LotSizeSquareFeet' => isset($_POST['LotSizeSquareFeet']) && !empty($_POST['LotSizeSquareFeet']) ? $_POST['LotSizeSquareFeet'] : null,
        'LotSizeAcres' => isset($_POST['LotSizeAcres']) && !empty($_POST['LotSizeAcres']) ? $_POST['LotSizeAcres'] : null,
        'BedroomsTotal' => isset($_POST['BedroomsTotal']) && !empty($_POST['BedroomsTotal']) ? $_POST['BedroomsTotal'] : null,
        'BathroomsTotalInteger' => isset($_POST['BathroomsTotalInteger']) && !empty($_POST['BathroomsTotalInteger']) ? $_POST['BathroomsTotalInteger'] : null,
        'Stories' =>  isset($_POST['Stories']) && !empty($_POST['Stories']) ? $_POST['Stories'] : null,
        'BasementYN' => isset($_POST['BasementYN']) ? filter_var($_POST['BasementYN'], FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) : null,
        'GarageSpaces' => isset($_POST['GarageSpaces']) && !empty($_POST['GarageSpaces']) ? $_POST['GarageSpaces'] : null,
        'AssociationFee' => isset($_POST['AssociationFee']) && !empty($_POST['AssociationFee']) ? $_POST['AssociationFee'] : null,

        //Interior Features
        'Flooring' => isset($_POST['Flooring']) && !empty($_POST['Flooring']) ? $_POST['Flooring'] : array(),
        'Heating' => isset($_POST['Heating']) && !empty($_POST['Heating']) ? $_POST['Heating'] : array(),
        'Cooling' => isset($_POST['Cooling']) && !empty($_POST['Cooling']) ? $_POST['Cooling'] : array(),
        'Appliances' => isset($_POST['Appliances']) && !empty($_POST['Appliances']) ? $_POST['Appliances'] : array(),
        'FireplaceYN' => isset($_POST['FireplaceYN']) && $_POST['FireplaceYN'] == 'true' ? true : false,
        'InteriorFeatures' => isset($_POST['InteriorFeatures']) && !empty($_POST['InteriorFeatures']) ? $_POST['InteriorFeatures'] : array(),

        //Exterior Features
        'ConstructionMaterials' => isset($_POST['ConstructionMaterials']) && !empty($_POST['ConstructionMaterials']) ? $_POST['ConstructionMaterials'] : array(),
        'Roof' => isset($_POST['Roof']) && !empty($_POST['Roof']) ? $_POST['Roof'] : array(),
        'ExteriorFeatures' => isset($_POST['ExteriorFeatures']) && !empty($_POST['ExteriorFeatures']) ? $_POST['ExteriorFeatures'] : array(),
        'PoolPrivateYN' => isset($_POST['PoolPrivateYN']) && $_POST['PoolPrivateYN'] == "true" ? true : false,

        //Location Information
        'StreetNumber' => isset($_POST['StreetNumber']) && !empty($_POST['StreetNumber']) ? $_POST['StreetNumber'] : null,
        'StreetDirPrefix' => isset($_POST['StreetDirPrefix']) && !empty($_POST['StreetDirPrefix']) ? $_POST['StreetDirPrefix'] : null,
        'StreetName' => isset($_POST['StreetName']) && !empty($_POST['StreetName']) ? $_POST['StreetName'] : null,
        'StreetSuffix' => isset($_POST['StreetSuffix']) && !empty($_POST['StreetSuffix']) ? $_POST['StreetSuffix'] : null,
        'City' => isset($_POST['City']) && !empty($_POST['City']) ? $_POST['City'] : null,
        'StateOrProvince' => isset($_POST['StateOrProvince']) && !empty($_POST['StateOrProvince']) ? $_POST['StateOrProvince'] : null,
        'PostalCode' => isset($_POST['PostalCode']) && !empty($_POST['PostalCode']) ? $_POST['PostalCode'] : null,
        'SubdivisionName' => isset($_POST['SubdivisionName']) && !empty($_POST['SubdivisionName']) ? $_POST['SubdivisionName'] : null,
        'HighSchoolDistrict' => isset($_POST['HighSchoolDistrict']) && !empty($_POST['HighSchoolDistrict']) ? $_POST['HighSchoolDistrict'] : null,
        'ElementarySchool' => isset($_POST['ElementarySchool']) && !empty($_POST['ElementarySchool']) ? $_POST['ElementarySchool'] : null,
        'MiddleOrJuniorSchool' => isset($_POST['MiddleOrJuniorSchool']) && !empty($_POST['MiddleOrJuniorSchool']) ? $_POST['MiddleOrJuniorSchool'] : null,
        'HighSchool' => isset($_POST['HighSchool']) && !empty($_POST['HighSchool']) ? $_POST['HighSchool'] : null,

        //Listing Information
        'ListingContractDate' => !empty($_POST['ListingContractDate']) ? date('c', strtotime($_POST['ListingContractDate'])) : null,
        'ListAgentFullName' => isset($_POST['ListAgentFullName']) && !empty($_POST['ListAgentFullName']) ? $_POST['ListAgentFullName'] : null,
        'ListAgentEmail' => isset($_POST['ListAgentEmail']) && !empty($_POST['ListAgentEmail']) ? $_POST['ListAgentEmail'] : null,
        'ListAgentOfficePhone' => isset($_POST['ListAgentOfficePhone']) && !empty($_POST['ListAgentOfficePhone']) ? $_POST['ListAgentOfficePhone'] : null,
        'ListAgentMobilePhone' => isset($_POST['ListAgentMobilePhone']) && !empty($_POST['ListAgentMobilePhone']) ? $_POST['ListAgentMobilePhone'] : null,
        'OpenHouseModificationTimestamp' => !empty($_POST['OpenHouseModificationTimestamp']) ? date('c', strtotime($_POST['OpenHouseModificationTimestamp'])) : null,
        'VirtualTourURLBranded' => isset($_POST['VirtualTourURLBranded']) && !empty($_POST['VirtualTourURLBranded']) ? $_POST['VirtualTourURLBranded'] : null,
        'VirtualTourURLUnbranded' => isset($_POST['VirtualTourURLUnbranded']) && !empty($_POST['VirtualTourURLUnbranded']) ? $_POST['VirtualTourURLUnbranded'] : null,

        //Additional Information
        'PublicRemarks' => isset($_POST['PublicRemarks']) && !empty($_POST['PublicRemarks']) ? $_POST['PublicRemarks'] : null,
        'Media' => null
    ];

    if(isset($_POST['Media']) && is_array($_POST['Media'])) {
        foreach($_POST['Media'] as $url) {
            $formData['Media'][] = array(
                'ImageOf' => 'Attic',
                'MediaURL' => $url
            );
        }
    }

    // echo '<pre>';
    // var_dump($formData);
    // echo '</pre>';


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
        $jsonResponse = json_decode($response, true);
        // var_Dump($jsonResponse);
        if($jsonResponse['@odata.editLink']){
            echo '<p style="color: green;">Listing created successfully</p>';
        }
    }

}

$current_user = wp_get_current_user();
$user_email = $current_user->user_email;
$full_name = $current_user->display_name;
?>

<?php if($currentTab == 'add-new-listing'): ?>
    <form method="POST" class="nexus-mls-form">
        <?php wp_nonce_field('media-upload', 'media_upload_nonce'); ?>


        <!-- Property Details -->
        <h2>Property Details</h2>
        
        <div>
            <label for="PropertyType">Property Type</label>
            <select name="PropertyType" id="PropertyType">
                <option value="Business Opportunity">Business Opportunity</option>
                <option value="Commercial Lease">Commercial Lease</option>
                <option value="Commercial Sale">Commercial Sale</option>
                <option value="Farm">Farm</option>
                <option value="Land">Land</option>
                <option value="Manufactured In Park">Manufactured In Park</option>
                <option value="Residential">Residential</option>
                <option value="Residential Income">Residential Income</option>
                <option value="Residential Lease">Residential Lease</option>
            </select>

        </div>

        <div>
            <label for="StandardStatus">Listing Status</label>
            <select name="StandardStatus" id="StandardStatus">
                <option value="Active">Active</option>
                <option value="Active Under Contract">Active Under Contract</option>
                <option value="Canceled">Canceled</option>
                <option value="Closed">Closed</option>
                <option value="Coming Soon">Coming Soon</option>
                <option value="Expired">Expired</option>
                <option value="Hold">Hold</option>
                <option value="Incomplete">Incomplete</option>
                <option value="Pending">Pending</option>
                <option value="Withdrawn">Withdrawn</option>
                <!-- <option value="Delete">Delete</option> -->
            </select>

        </div>

        <div>
            <label for="ListPrice">Price</label>
            <input type="number" name="ListPrice">
        </div>

        <!-- <label for="ListingId">MLS Number</label>
        <input type="text" name="ListingId" value="Not found"> -->

        <div>
            <label for="YearBuilt">Year Built</label>
            <input type="text" name="YearBuilt">
        </div>

        <div>
            <label for="LivingArea">Square Footage</label>
            <input type="text" name="LivingArea">
        </div>

        <div>
            <label for="LotSizeAcres">Lot Size Acres</label>
            <input type="text" name="LotSizeAcres">
        </div>

        <div>
            <label for="LotSizeSquareFeet">Lot Size SquareFeet</label>
            <input type="text" name="LotSizeSquareFeet">
        </div>


        <div>
            <label for="LotSizeArea">Lot Size Area</label>
            <input type="text" name="LotSizeArea">
        </div>


        <div>
            <label for="BedroomsTotal">Bedrooms</label>
            <input type="text" name="BedroomsTotal">
        </div>

        <div>
            <label for="BathroomsTotalInteger">Bathrooms</label>
            <input type="text" name="BathroomsTotalInteger">
        </div>

        <div>
            <label for="Stories">Number of Floors</label>
            <input type="text" name="Stories">
        </div>

        <div>
            <label for="BasementYN">Basement</label>
            <div class="inline-radiofields">
                <label>
                    <input type="radio" id="BasementYes" name="BasementYN" value="true">
                    <span>Yes</span>
                </label>
                <label>
                    <input type="radio" id="BasementNo" name="BasementYN" value="false">
                    <span>No</span>
                </label>
            </div>
        </div>


        <div>
            <label for="GarageSpaces">Parking Spaces</label>
            <input type="text" name="GarageSpaces">
        </div>

        <div>
            <label for="AssociationFee">HOA Fees</label>
            <input type="text" name="AssociationFee">
        </div>

        <!-- Interior Features -->
        <h2>Interior Features</h2>

        <div>
            <h5>Flooring Types</h5>
            <div class="inline-checkboxes">
                <label>
                    <input type="checkbox" name="Flooring[]" value="Adobe">
                    <span>Adobe</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Bamboo">
                    <span>Bamboo</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Brick">
                    <span>Brick</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Carpet">
                    <span>Carpet</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Ceramic Tile">
                    <span>Ceramic Tile</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Clay">
                    <span>Clay</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Combination">
                    <span>Combination</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Concrete">
                    <span>Concrete</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Cork">
                    <span>Cork</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="CRI Green Label Plus Certified Carpet">
                    <span>CRI Green Label Plus Certified Carpet</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Dirt">
                    <span>Dirt</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="FloorScore(r) Certified Flooring">
                    <span>FloorScore(r) Certified Flooring</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="FSC or SFI Certified Source Hardwood">
                    <span>FSC or SFI Certified Source Hardwood</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Granite">
                    <span>Granite</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Hardwood">
                    <span>Hardwood</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Laminate">
                    <span>Laminate</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Linoleum">
                    <span>Linoleum</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Marble">
                    <span>Marble</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="None">
                    <span>None</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Other">
                    <span>Other</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Painted/Stained">
                    <span>Painted/Stained</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Parquet">
                    <span>Parquet</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Pavers">
                    <span>Pavers</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Reclaimed Wood">
                    <span>Reclaimed Wood</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="See Remarks">
                    <span>See Remarks</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Simulated Wood">
                    <span>Simulated Wood</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Slate">
                    <span>Slate</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Softwood">
                    <span>Softwood</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Stamped">
                    <span>Stamped</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Stone">
                    <span>Stone</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Sustainable">
                    <span>Sustainable</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Terrazzo">
                    <span>Terrazzo</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Tile">
                    <span>Tile</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Varies">
                    <span>Varies</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Vinyl">
                    <span>Vinyl</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Wood">
                    <span>Wood</span>
                </label>
            </div>

        </div>

   
        <div>
            <h5>Heating Systems</h5>
            <div class="inline-checkboxes">
                <label>
                    <input type="checkbox" name="Heating[]" value="Active Solar">
                    <span>Active Solar</span>
                </label>
                <label>
                    <input type="checkbox" name="Heating[]" value="Baseboard">
                    <span>Baseboard</span>
                </label>
                <label>
                    <input type="checkbox" name="Heating[]" value="Ceiling">
                    <span>Ceiling</span>
                </label>
                <label>
                    <input type="checkbox" name="Heating[]" value="Central">
                    <span>Central</span>
                </label>
                <label>
                    <input type="checkbox" name="Heating[]" value="Coal">
                    <span>Coal</span>
                </label>
                <label>
                    <input type="checkbox" name="Heating[]" value="Coal Stove">
                    <span>Coal Stove</span>
                </label>
                <label>
                    <input type="checkbox" name="Heating[]" value="Ductless">
                    <span>Ductless</span>
                </label>
                <label>
                    <input type="checkbox" name="Heating[]" value="Electric">
                    <span>Electric</span>
                </label>
                <label>
                    <input type="checkbox" name="Heating[]" value="ENERGY STAR/ACCA RSI Qualified Installation">
                    <span>ENERGY STAR/ACCA RSI Qualified Installation</span>
                </label>
                <label>
                    <input type="checkbox" name="Heating[]" value="ENERGY STAR Qualified Equipment">
                    <span>ENERGY STAR Qualified Equipment</span>
                </label>
                <label>
                    <input type="checkbox" name="Heating[]" value="Exhaust Fan">
                    <span>Exhaust Fan</span>
                </label>
                <label>
                    <input type="checkbox" name="Heating[]" value="Fireplace Insert">
                    <span>Fireplace Insert</span>
                </label>
                <label>
                    <input type="checkbox" name="Heating[]" value="Fireplace(s)">
                    <span>Fireplace(s)</span>
                </label>
                <label>
                    <input type="checkbox" name="Heating[]" value="Floor Furnace">
                    <span>Floor Furnace</span>
                </label>
                <label>
                    <input type="checkbox" name="Heating[]" value="Forced Air">
                    <span>Forced Air</span>
                </label>
                <label>
                    <input type="checkbox" name="Heating[]" value="Geothermal">
                    <span>Geothermal</span>
                </label>
                <label>
                    <input type="checkbox" name="Heating[]" value="Gravity">
                    <span>Gravity</span>
                </label>
                <label>
                    <input type="checkbox" name="Heating[]" value="Heat Pump">
                    <span>Heat Pump</span>
                </label>
                <label>
                    <input type="checkbox" name="Heating[]" value="Hot Water">
                    <span>Hot Water</span>
                </label>
                <label>
                    <input type="checkbox" name="Heating[]" value="Humidity Control">
                    <span>Humidity Control</span>
                </label>
                <label>
                    <input type="checkbox" name="Heating[]" value="Kerosene">
                    <span>Kerosene</span>
                </label>
                <label>
                    <input type="checkbox" name="Heating[]" value="Natural Gas">
                    <span>Natural Gas</span>
                </label>
                <label>
                    <input type="checkbox" name="Heating[]" value="None">
                    <span>None</span>
                </label>
                <label>
                    <input type="checkbox" name="Heating[]" value="Oil">
                    <span>Oil</span>
                </label>
                <label>
                    <input type="checkbox" name="Heating[]" value="Other">
                    <span>Other</span>
                </label>
                <label>
                    <input type="checkbox" name="Heating[]" value="Passive Solar">
                    <span>Passive Solar</span>
                </label>
                <label>
                    <input type="checkbox" name="Heating[]" value="Pellet Stove">
                    <span>Pellet Stove</span>
                </label>
                <label>
                    <input type="checkbox" name="Heating[]" value="Propane">
                    <span>Propane</span>
                </label>
                <label>
                    <input type="checkbox" name="Heating[]" value="Propane Stove">
                    <span>Propane Stove</span>
                </label>
                <label>
                    <input type="checkbox" name="Heating[]" value="Radiant">
                    <span>Radiant</span>
                </label>
                <label>
                    <input type="checkbox" name="Heating[]" value="Radiant Ceiling">
                    <span>Radiant Ceiling</span>
                </label>
                <label>
                    <input type="checkbox" name="Heating[]" value="Radiant Floor">
                    <span>Radiant Floor</span>
                </label>
                <label>
                    <input type="checkbox" name="Heating[]" value="See Remarks">
                    <span>See Remarks</span>
                </label>
                <label>
                    <input type="checkbox" name="Heating[]" value="Separate Meters">
                    <span>Separate Meters</span>
                </label>
                <label>
                    <input type="checkbox" name="Heating[]" value="Solar">
                    <span>Solar</span>
                </label>
                <label>
                    <input type="checkbox" name="Heating[]" value="Space Heater">
                    <span>Space Heater</span>
                </label>
                <label>
                    <input type="checkbox" name="Heating[]" value="Steam">
                    <span>Steam</span>
                </label>
                <label>
                    <input type="checkbox" name="Heating[]" value="Varies by Unit">
                    <span>Varies by Unit</span>
                </label>
                <label>
                    <input type="checkbox" name="Heating[]" value="Wall Furnace">
                    <span>Wall Furnace</span>
                </label>
                <label>
                    <input type="checkbox" name="Heating[]" value="Wood">
                    <span>Wood</span>
                </label>
                <label>
                    <input type="checkbox" name="Heating[]" value="Wood Stove">
                    <span>Wood Stove</span>
                </label>
                <label>
                    <input type="checkbox" name="Heating[]" value="Zoned">
                    <span>Zoned</span>
                </label>
            </div>

        </div>

      

        <div>
            <h5>Cooling Systems</h5>
            <div class="inline-checkboxes">
                <label>
                    <input type="checkbox" name="Cooling[]" value="Attic Fan">
                    <span>Attic Fan</span>
                </label>
                <label>
                    <input type="checkbox" name="Cooling[]" value="Ceiling Fan(s)">
                    <span>Ceiling Fan(s)</span>
                </label>
                <label>
                    <input type="checkbox" name="Cooling[]" value="Central Air">
                    <span>Central Air</span>
                </label>
                <label>
                    <input type="checkbox" name="Cooling[]" value="Dual">
                    <span>Dual</span>
                </label>
                <label>
                    <input type="checkbox" name="Cooling[]" value="Ductless">
                    <span>Ductless</span>
                </label>
                <label>
                    <input type="checkbox" name="Cooling[]" value="Electric">
                    <span>Electric</span>
                </label>
                <label>
                    <input type="checkbox" name="Cooling[]" value="ENERGY STAR Qualified Equipment">
                    <span>ENERGY STAR Qualified Equipment</span>
                </label>
                <label>
                    <input type="checkbox" name="Cooling[]" value="Evaporative Cooling">
                    <span>Evaporative Cooling</span>
                </label>
                <label>
                    <input type="checkbox" name="Cooling[]" value="Exhaust Fan">
                    <span>Exhaust Fan</span>
                </label>
                <label>
                    <input type="checkbox" name="Cooling[]" value="Gas">
                    <span>Gas</span>
                </label>
                <label>
                    <input type="checkbox" name="Cooling[]" value="Geothermal">
                    <span>Geothermal</span>
                </label>
                <label>
                    <input type="checkbox" name="Cooling[]" value="Heat Pump">
                    <span>Heat Pump</span>
                </label>
                <label>
                    <input type="checkbox" name="Cooling[]" value="Humidity Control">
                    <span>Humidity Control</span>
                </label>
                <label>
                    <input type="checkbox" name="Cooling[]" value="Multi Units">
                    <span>Multi Units</span>
                </label>
                <label>
                    <input type="checkbox" name="Cooling[]" value="None">
                    <span>None</span>
                </label>
                <label>
                    <input type="checkbox" name="Cooling[]" value="Other">
                    <span>Other</span>
                </label>
                <label>
                    <input type="checkbox" name="Cooling[]" value="Roof Turbine(s)">
                    <span>Roof Turbine(s)</span>
                </label>
                <label>
                    <input type="checkbox" name="Cooling[]" value="Separate Meters">
                    <span>Separate Meters</span>
                </label>
                <label>
                    <input type="checkbox" name="Cooling[]" value="Varies by Unit">
                    <span>Varies by Unit</span>
                </label>
                <label>
                    <input type="checkbox" name="Cooling[]" value="Wall Unit(s)">
                    <span>Wall Unit(s)</span>
                </label>
                <label>
                    <input type="checkbox" name="Cooling[]" value="Wall/Window Unit(s)">
                    <span>Wall/Window Unit(s)</span>
                </label>
                <label>
                    <input type="checkbox" name="Cooling[]" value="Whole House Fan">
                    <span>Whole House Fan</span>
                </label>
                <label>
                    <input type="checkbox" name="Cooling[]" value="Window Unit(s)">
                    <span>Window Unit(s)</span>
                </label>
                <label>
                    <input type="checkbox" name="Cooling[]" value="Zoned">
                    <span>Zoned</span>
                </label>
            </div>

        </div>



        <div>
            <h5>Appliances</h5>
            <div class="inline-checkboxes">
                <label>
                    <input type="checkbox" name="Appliances[]" value="Bar Fridge">
                    <span>Bar Fridge</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Built-In Electric Oven">
                    <span>Built-In Electric Oven</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Built-In Electric Range">
                    <span>Built-In Electric Range</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Built-In Freezer">
                    <span>Built-In Freezer</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Built-In Gas Oven">
                    <span>Built-In Gas Oven</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Built-In Gas Range">
                    <span>Built-In Gas Range</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Built-In Range">
                    <span>Built-In Range</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Built-In Refrigerator">
                    <span>Built-In Refrigerator</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Convection Oven">
                    <span>Convection Oven</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Cooktop">
                    <span>Cooktop</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Dishwasher">
                    <span>Dishwasher</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Disposal">
                    <span>Disposal</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Double Oven">
                    <span>Double Oven</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Down Draft">
                    <span>Down Draft</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Dryer">
                    <span>Dryer</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Electric Cooktop">
                    <span>Electric Cooktop</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Electric Oven">
                    <span>Electric Oven</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Electric Range">
                    <span>Electric Range</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Electric Water Heater">
                    <span>Electric Water Heater</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="ENERGY STAR Qualified Appliances">
                    <span>ENERGY STAR Qualified Appliances</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="ENERGY STAR Qualified Dishwasher">
                    <span>ENERGY STAR Qualified Dishwasher</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="ENERGY STAR Qualified Dryer">
                    <span>ENERGY STAR Qualified Dryer</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="ENERGY STAR Qualified Freezer">
                    <span>ENERGY STAR Qualified Freezer</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="ENERGY STAR Qualified Refrigerator">
                    <span>ENERGY STAR Qualified Refrigerator</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="ENERGY STAR Qualified Washer">
                    <span>ENERGY STAR Qualified Washer</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="ENERGY STAR Qualified Water Heater">
                    <span>ENERGY STAR Qualified Water Heater</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Exhaust Fan">
                    <span>Exhaust Fan</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Free-Standing Electric Oven">
                    <span>Free-Standing Electric Oven</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Free-Standing Electric Range">
                    <span>Free-Standing Electric Range</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Free-Standing Freezer">
                    <span>Free-Standing Freezer</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Free-Standing Gas Oven">
                    <span>Free-Standing Gas Oven</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Free-Standing Gas Range">
                    <span>Free-Standing Gas Range</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Free-Standing Range">
                    <span>Free-Standing Range</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Free-Standing Refrigerator">
                    <span>Free-Standing Refrigerator</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Freezer">
                    <span>Freezer</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Gas Cooktop">
                    <span>Gas Cooktop</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Gas Oven">
                    <span>Gas Oven</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Gas Range">
                    <span>Gas Range</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Gas Water Heater">
                    <span>Gas Water Heater</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Humidifier">
                    <span>Humidifier</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Ice Maker">
                    <span>Ice Maker</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Indoor Grill">
                    <span>Indoor Grill</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Induction Cooktop">
                    <span>Induction Cooktop</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Instant Hot Water">
                    <span>Instant Hot Water</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Microwave">
                    <span>Microwave</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="None">
                    <span>None</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Other">
                    <span>Other</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Oven">
                    <span>Oven</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Plumbed For Ice Maker">
                    <span>Plumbed For Ice Maker</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Portable Dishwasher">
                    <span>Portable Dishwasher</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Propane Cooktop">
                    <span>Propane Cooktop</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Range">
                    <span>Range</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Range Hood">
                    <span>Range Hood</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Refrigerator">
                    <span>Refrigerator</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Self Cleaning Oven">
                    <span>Self Cleaning Oven</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Solar Hot Water">
                    <span>Solar Hot Water</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Stainless Steel Appliance(s)">
                    <span>Stainless Steel Appliance(s)</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Tankless Water Heater">
                    <span>Tankless Water Heater</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Trash Compactor">
                    <span>Trash Compactor</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Vented Exhaust Fan">
                    <span>Vented Exhaust Fan</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Warming Drawer">
                    <span>Warming Drawer</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Washer">
                    <span>Washer</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Washer/Dryer">
                    <span>Washer/Dryer</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Washer/Dryer Stacked">
                    <span>Washer/Dryer Stacked</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Water Heater">
                    <span>Water Heater</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Water Purifier">
                    <span>Water Purifier</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Water Purifier Owned">
                    <span>Water Purifier Owned</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Water Purifier Rented">
                    <span>Water Purifier Rented</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Water Softener">
                    <span>Water Softener</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Water Softener Owned">
                    <span>Water Softener Owned</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Water Softener Rented">
                    <span>Water Softener Rented</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Wine Cooler">
                    <span>Wine Cooler</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Wine Refrigerator">
                    <span>Wine Refrigerator</span>
                </label>
            </div>

        </div>


        <div>
            <h5>Fireplace</h5>
            <div class="inline-radiofields">
                <label>
                    <input type="radio" id="fireplace-true" name="FireplaceYN" value="true">
                    <span>Yes</span>
                </label>
                <label>
                    <input type="radio" id="fireplace-false" name="FireplaceYN" value="false">
                    <span>No</span>
                </label>
            </div>
        </div>


        <div>
            <h5>Interior Amenities</h5>
            <div class="inline-checkboxes">
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Bookcases">
                    <span>Bookcases</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Built-in Features">
                    <span>Built-in Features</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Ceiling Fan(s)">
                    <span>Ceiling Fan(s)</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Coffered Ceiling(s)">
                    <span>Coffered Ceiling(s)</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Dry Bar">
                    <span>Dry Bar</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Pantry">
                    <span>Pantry</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="See Remarks">
                    <span>See Remarks</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Solar Tube(s)">
                    <span>Solar Tube(s)</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Sound System">
                    <span>Sound System</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Stone Counters">
                    <span>Stone Counters</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Wired for Data">
                    <span>Wired for Data</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Wired for Sound">
                    <span>Wired for Sound</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Beamed Ceilings">
                    <span>Beamed Ceilings</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Breakfast Bar">
                    <span>Breakfast Bar</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Central Vacuum">
                    <span>Central Vacuum</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Chandelier">
                    <span>Chandelier</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Double Vanity">
                    <span>Double Vanity</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Eat-in Kitchen">
                    <span>Eat-in Kitchen</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Entrance Foyer">
                    <span>Entrance Foyer</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Granite Counters">
                    <span>Granite Counters</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="High Speed Internet">
                    <span>High Speed Internet</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Laminate Counters">
                    <span>Laminate Counters</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Natural Woodwork">
                    <span>Natural Woodwork</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Smart Home">
                    <span>Smart Home</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Soaking Tub">
                    <span>Soaking Tub</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Vaulted Ceiling(s)">
                    <span>Vaulted Ceiling(s)</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="WaterSense Fixture(s)">
                    <span>WaterSense Fixture(s)</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Bidet">
                    <span>Bidet</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Cedar Closet(s)">
                    <span>Cedar Closet(s)</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Elevator">
                    <span>Elevator</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="In-Law Floorplan">
                    <span>In-Law Floorplan</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Low Flow Plumbing Fixtures">
                    <span>Low Flow Plumbing Fixtures</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Master Downstairs">
                    <span>Master Downstairs</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Storage">
                    <span>Storage</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Tile Counters">
                    <span>Tile Counters</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Track Lighting">
                    <span>Track Lighting</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Tray Ceiling(s)">
                    <span>Tray Ceiling(s)</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Wet Bar">
                    <span>Wet Bar</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Bar">
                    <span>Bar</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Cathedral Ceiling(s)">
                    <span>Cathedral Ceiling(s)</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Crown Molding">
                    <span>Crown Molding</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Dumbwaiter">
                    <span>Dumbwaiter</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="High Ceilings">
                    <span>High Ceilings</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="His and Hers Closets">
                    <span>His and Hers Closets</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Kitchen Island">
                    <span>Kitchen Island</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Open Floorplan">
                    <span>Open Floorplan</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Other">
                    <span>Other</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Recessed Lighting">
                    <span>Recessed Lighting</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Sauna">
                    <span>Sauna</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Smart Thermostat">
                    <span>Smart Thermostat</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Walk-In Closet(s)">
                    <span>Walk-In Closet(s)</span>
                </label>
            </div>
        </div>


        <!-- Exterior Features -->
        <h2>Exterior Features</h2>

        <div>
            <h5>Exterior Material</h5>
            <div class="inline-checkboxes">
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Adobe">
                    <span>Adobe</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Asbestos">
                    <span>Asbestos</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Blown-In Insulation">
                    <span>Blown-In Insulation</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Brick Veneer">
                    <span>Brick Veneer</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Frame">
                    <span>Frame</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Glass">
                    <span>Glass</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="ICFs (Insulated Concrete Forms)">
                    <span>ICFs (Insulated Concrete Forms)</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Lap Siding">
                    <span>Lap Siding</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Log">
                    <span>Log</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Rammed Earth">
                    <span>Rammed Earth</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Redwood Siding">
                    <span>Redwood Siding</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Spray Foam Insulation">
                    <span>Spray Foam Insulation</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Vertical Siding">
                    <span>Vertical Siding</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Wood Siding">
                    <span>Wood Siding</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Asphalt">
                    <span>Asphalt</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Attic/Crawl Hatchway(s) Insulated">
                    <span>Attic/Crawl Hatchway(s) Insulated</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Block">
                    <span>Block</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Fiber Cement">
                    <span>Fiber Cement</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Fiberglass Siding">
                    <span>Fiberglass Siding</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="ICAT Recessed Lighting">
                    <span>ICAT Recessed Lighting</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Recycled/Bio-Based Insulation">
                    <span>Recycled/Bio-Based Insulation</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="See Remarks">
                    <span>See Remarks</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Steel Siding">
                    <span>Steel Siding</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Stucco">
                    <span>Stucco</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Synthetic Stucco">
                    <span>Synthetic Stucco</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Unknown">
                    <span>Unknown</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Aluminum Siding">
                    <span>Aluminum Siding</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Brick">
                    <span>Brick</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Clapboard">
                    <span>Clapboard</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Concrete">
                    <span>Concrete</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Ducts Professionally Air-Sealed">
                    <span>Ducts Professionally Air-Sealed</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Foam Insulation">
                    <span>Foam Insulation</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="HardiPlank Type">
                    <span>HardiPlank Type</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Log Siding">
                    <span>Log Siding</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Natural Building">
                    <span>Natural Building</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Slump Block">
                    <span>Slump Block</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Stone">
                    <span>Stone</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Stone Veneer">
                    <span>Stone Veneer</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Vinyl Siding">
                    <span>Vinyl Siding</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Batts Insulation">
                    <span>Batts Insulation</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Board & Batten Siding">
                    <span>Board & Batten Siding</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Cedar">
                    <span>Cedar</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Cement Siding">
                    <span>Cement Siding</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Exterior Duct-Work is Insulated">
                    <span>Exterior Duct-Work is Insulated</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Low VOC Insulation">
                    <span>Low VOC Insulation</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Masonite">
                    <span>Masonite</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Metal Siding">
                    <span>Metal Siding</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Other">
                    <span>Other</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Plaster">
                    <span>Plaster</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Radiant Barrier">
                    <span>Radiant Barrier</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Shake Siding">
                    <span>Shake Siding</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Shingle Siding">
                    <span>Shingle Siding</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Straw">
                    <span>Straw</span>
                </label>

            </div>
        </div>



        <div>
            <h5>Roof Type</h5>
            <div class="inline-checkboxes">
                <label>
                    <input type="checkbox" name="Roof[]" value="Composition">
                    <span>Composition</span>
                </label>
                <label>
                    <input type="checkbox" name="Roof[]" value="Metal">
                    <span>Metal</span>
                </label>
                <label>
                    <input type="checkbox" name="Roof[]" value="Shake">
                    <span>Shake</span>
                </label>
                <label>
                    <input type="checkbox" name="Roof[]" value="Tile">
                    <span>Tile</span>
                </label>
                <label>
                    <input type="checkbox" name="Roof[]" value="Rubber">
                    <span>Rubber</span>
                </label>
                <label>
                    <input type="checkbox" name="Roof[]" value="Rolled Comp">
                    <span>Rolled Comp</span>
                </label>
            </div>
        </div>



        <div>
            <h5>Exterior Features</h5>
            <div class="inline-checkboxes">
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Balcony">
                    <span>Balcony</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Kennel">
                    <span>Kennel</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Lighting">
                    <span>Lighting</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Outdoor Shower">
                    <span>Outdoor Shower</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Private Entrance">
                    <span>Private Entrance</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Uncovered Courtyard">
                    <span>Uncovered Courtyard</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Dock">
                    <span>Dock</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Misting System">
                    <span>Misting System</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Outdoor Kitchen">
                    <span>Outdoor Kitchen</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Playground">
                    <span>Playground</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Private Yard">
                    <span>Private Yard</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Rain Gutters">
                    <span>Rain Gutters</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="RV Hookup">
                    <span>RV Hookup</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Awning(s)">
                    <span>Awning(s)</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Barbecue">
                    <span>Barbecue</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Basketball Court">
                    <span>Basketball Court</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Boat Slip">
                    <span>Boat Slip</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Built-in Barbecue">
                    <span>Built-in Barbecue</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Courtyard">
                    <span>Courtyard</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Covered Courtyard">
                    <span>Covered Courtyard</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Dog Run">
                    <span>Dog Run</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Electric Grill">
                    <span>Electric Grill</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Other">
                    <span>Other</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Permeable Paving">
                    <span>Permeable Paving</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Storage">
                    <span>Storage</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Tennis Court(s)">
                    <span>Tennis Court(s)</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Fire Pit">
                    <span>Fire Pit</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Garden">
                    <span>Garden</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Gas Grill">
                    <span>Gas Grill</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Gray Water System">
                    <span>Gray Water System</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="None">
                    <span>None</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Outdoor Grill">
                    <span>Outdoor Grill</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Rain Barrel/Cistern(s)">
                    <span>Rain Barrel/Cistern(s)</span>
                </label>

            </div>
        </div>



        <div>
            <h5>Pool</h5>
            <div class="inline-radiofields">
                <label>
                    <input type="radio" id="pool-true" name="PoolPrivateYN" value="true">
                    <span>True</span>
                </label>
                <label for="pool-false">
                    <input type="radio" id="pool-false" name="PoolPrivateYN" value="false">    
                    <span>False</span>
                </label>
            </div>
        </div>



        <!-- Location Information -->
        <h2>Location Information</h2>

        <div>
            <label for="StreetNumber">Street Number</label>
            <input type="text" name="StreetNumber">
        </div>

        <div>
            <label for="StreetDirPrefix">Street Dir Prefix</label>
            <select name="StreetDirPrefix" id="StreetDirPrefix">
                <option value="N">N</option>
                <option value="NE">NE</option>
                <option value="NW">NW</option>
                <option value="E">E</option>
                <option value="S">S</option>
                <option value="SE">SE</option>
                <option value="SW">SW</option>
                <option value="W">W</option>
            </select>

        </div>

        <div>
            <label for="StreetName">Street Name</label>
            <input type="text" name="StreetName">
        </div>

        <div>
            <label for="StreetSuffix">Street Suffix</label>
            <input type="text" name="StreetSuffix">
        </div>


        <div>
            <label for="City">City</label>
            <input type="text" name="City">
        </div>

        <div>
            <label for="StateOrProvince">State</label>
            <select name="StateOrProvince" id="StateOrProvince">
                <option value="AB">AB</option>
                <option value="AK">AK</option>
                <option value="AL">AL</option>
                <option value="AR">AR</option>
                <option value="AZ">AZ</option>
                <option value="BC">BC</option>
                <option value="CA">CA</option>
                <option value="CO">CO</option>
                <option value="CT">CT</option>
                <option value="DC">DC</option>
                <option value="DE">DE</option>
                <option value="FL">FL</option>
                <option value="GA">GA</option>
                <option value="HI">HI</option>
                <option value="IA">IA</option>
                <option value="ID">ID</option>
                <option value="IL">IL</option>
                <option value="IN">IN</option>
                <option value="KS">KS</option>
                <option value="KY">KY</option>
                <option value="LA">LA</option>
                <option value="MA">MA</option>
                <option value="MB">MB</option>
                <option value="MD">MD</option>
                <option value="ME">ME</option>
                <option value="MI">MI</option>
                <option value="MN">MN</option>
                <option value="MO">MO</option>
                <option value="MS">MS</option>
                <option value="MT">MT</option>
                <option value="NB">NB</option>
                <option value="NC">NC</option>
                <option value="ND">ND</option>
                <option value="NE">NE</option>
                <option value="NF">NF</option>
                <option value="NH">NH</option>
                <option value="NJ">NJ</option>
                <option value="NM">NM</option>
                <option value="NS">NS</option>
                <option value="NT">NT</option>
                <option value="NU">NU</option>
                <option value="NV">NV</option>
                <option value="NY">NY</option>
                <option value="OH">OH</option>
                <option value="OK">OK</option>
                <option value="ON">ON</option>
                <option value="OR">OR</option>
                <option value="PA">PA</option>
                <option value="PE">PE</option>
                <option value="QC">QC</option>
                <option value="RI">RI</option>
                <option value="SC">SC</option>
                <option value="SD">SD</option>
                <option value="SK">SK</option>
                <option value="TN">TN</option>
                <option value="TX">TX</option>
                <option value="UT">UT</option>
                <option value="VA">VA</option>
                <option value="VI">VI</option>
                <option value="VT">VT</option>
                <option value="WA">WA</option>
                <option value="WI">WI</option>
                <option value="WV">WV</option>
                <option value="WY">WY</option>
                <option value="YT">YT</option>
                </select>
        </div>

        <div>
            <label for="PostalCode">ZIP Code</label>
            <input type="text" name="PostalCode">
        </div>

        <div>
            <label for="SubdivisionName">Neighborhood</label>
            <input type="text" name="SubdivisionName">
        </div>

        <div>
            <label for="HighSchoolDistrict">School District</label>
            <input type="text" name="HighSchoolDistrict">
        </div>

        <div>
            <label for="ElementarySchool">Elementary School</label>
            <input type="text" name="ElementarySchool">
        </div>

        <div>
            <label for="MiddleOrJuniorSchool">Middle School</label>
            <input type="text" name="MiddleOrJuniorSchool">
        </div>

        <div>
            <label for="HighSchool">High School</label>
            <input type="text" name="HighSchool">
        </div>

        <!-- Listing Information -->
        <h2>Listing Information</h2>

        <div>
            <label for="ListingContractDate">Listing Date</label>
            <input type="date" name="ListingContractDate" value="<?php echo date('Y-m-d'); ?>">
        </div>

        <div>
            <label for="ListAgentFullName">List Agent FullName</label>
            <input type="text" name="ListAgentFullName" value="<?php echo $full_name; ?>">
        </div>



        <div>
            <label for="ListAgentEmail">List Agent Email</label>
            <input type="text" name="ListAgentEmail" value="<?php echo $user_email; ?>">
        </div>
        
        <div>
            <label for="ListAgentOfficePhone">List Agent Phone</label>
            <input type="text" name="ListAgentOfficePhone">
        </div>

        <div>
            <label for="ListAgentMobilePhone">List Agent Mobile Phone</label>
            <input type="text" name="ListAgentMobilePhone">
        </div>

        <div>
            <label for="OpenHouseModificationTimestamp">Open House</label>
            <input type="date" name="OpenHouseModificationTimestamp" value="<?php echo date('Y-m-d'); ?>">
        </div>

        <div>
            <label for="VirtualTourURLBranded">Virtual Tour URL Branded</label>
            <input type="text" name="VirtualTourURLBranded">
        </div>

        <div>
            <label for="VirtualTourURLUnbranded">Virtual Tour URL Unbranded</label>
            <input type="text" name="VirtualTourURLUnbranded">
        </div>


        <!-- Additional Information -->

        <h2>Additional Information</h2>

        <div>
            <label for="PublicRemarks">Property Description</label>
            <textarea name="PublicRemarks"></textarea>
        </div>

        <div class="upload-field">
            <label for="Media">Media</label>
            <input type="file" name="MediaFiles" id="mediaFiles" multiple accept="image/*">
            <div id="uploadPreview"></div>
        </div>

        <button type="submit">Submit</button>
    </form>

    <script>
    var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
    document.getElementById('mediaFiles').addEventListener('change', async function(e) {
        const files = e.target.files;
        const uploadPreview = document.getElementById('uploadPreview');
        const mediaUrls = window.mediaData || [];
        
        uploadPreview.innerHTML = 'Uploading...';
        
        for(let file of files) {
            if(!file.type.startsWith('image/') || file.size > 5 * 1024 * 1024) {
                continue;
            }
            
            const formData = new FormData();
            formData.append('file', file);
            formData.append('action', 'upload_media');
            formData.append('nonce', '<?php echo wp_create_nonce("media-upload"); ?>');
            
            try {
                const response = await fetch(ajaxurl, {
                    method: 'POST',
                    body: formData,
                    credentials: 'same-origin'
                });
                
                const data = await response.json();
                
                if(data.success && data.data?.url) {
                    mediaUrls.push(data.data.url);
                    
                    uploadPreview.innerHTML = mediaUrls.map((url, index) => `
                        <div class="preview-item">
                            <input type="checkbox" 
                                   name="Media[]" 
                                   value="${url}" 
                                   id="media_${index}"
                                   checked>
                            <label for="media_${index}">
                                <img src="${url}" width="100" alt="Preview">
                            </label>
                            <button type="button" class="remove-image" data-url="${url}">Remove</button>
                        </div>
                    `).join('');
                    
                    window.mediaData = mediaUrls;
                }
            } catch(error) {
                console.error('Upload failed:', error);
            }
        }
    });

    document.getElementById('uploadPreview').addEventListener('click', function(e) {
        if(e.target.classList.contains('remove-image')) {
            const url = e.target.dataset.url;
            window.mediaData = window.mediaData.filter(item => item !== url);
            e.target.closest('.preview-item').remove();
        }
    });
    </script>

    <style>
    .preview-item {
        display: flex;
        align-items: center;
        margin: 10px 0;
        padding: 10px;
        border: 1px solid #ddd;
    }

    .preview-item input[type="checkbox"] {
        display: none;
    }

    .preview-item img {
        margin: 0 10px;
    }

    .preview-item .remove-image {
        margin-left: auto;
        padding: 5px 10px;
        background: #ff4444;
        color: white;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    .upload-field {
        margin: 20px 0;
    }

    .upload-field label {
        display: block;
        margin-bottom: 10px;
    }

    #mediaFiles {
        margin-bottom: 15px;
    }
    </style>

<?php endif; ?>
