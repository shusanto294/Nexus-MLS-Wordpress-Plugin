
<?php if($currentTab == 'all-listings' && $listing != null): ?>

    <?php

        $curl = curl_init();

        //Delete media
        if(isset($_GET['deleteMedia'])):
            // echo 'Deleting media';

            $media = $_GET['deleteMedia'];
            
            curl_setopt_array($curl, [
                CURLOPT_URL => "https://api.nexusmls.io/Media('$media')",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "DELETE",
                CURLOPT_HTTPHEADER => [
                "Authorization: Bearer $mlsApiKey"
                ],
            ]);
            
            $response = curl_exec($curl);
            $err = curl_error($curl);
            
            curl_close($curl);
            
            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                // echo $response;
            }
        endif;


        //Uplaod Media
        if(isset($_POST['Media']) && is_array($_POST['Media'])) {
            // echo 'Uplaoding media';

            foreach($_POST['Media'] as $url) {

                curl_setopt_array($curl, [
                  CURLOPT_URL => "https://api.nexusmls.io/Media",
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_ENCODING => "",
                  CURLOPT_MAXREDIRS => 10,
                  CURLOPT_TIMEOUT => 30,
                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                  CURLOPT_CUSTOMREQUEST => "POST",
                  CURLOPT_POSTFIELDS => json_encode([
                    'ResourceRecordKey' => $listing,
                    'MediaURL' => $url,
                    'ImageOf' => 'Attic'
                  ]),
                  CURLOPT_HTTPHEADER => [
                    "Authorization: Bearer $mlsApiKey",
                    "Content-Type: application/json"
                  ],
                ]);
                
                $response = curl_exec($curl);
                $err = curl_error($curl);
                
                curl_close($curl);
                
                if ($err) {
                  echo "cURL Error #:" . $err;
                }

            }
            echo '<p style="color: green;">Media Uploaded<p>';
        }

        // Get media links
        // echo 'Geting existing media links';

        // Encode the listing parameter for safe URL usage
        $listing = urlencode($listing);

        // Build the URL with properly encoded query parameters
        $url = "https://api.nexusmls.io/Media?" . http_build_query([
            '$filter' => "ResourceRecordKey eq '$listing'",
            '$select' => 'MediaKey,MediaURL'
        ]);

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "Authorization: Bearer $mlsApiKey"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $data = json_decode($response, true);
            $oldMediaItems = $data['value'];

            // var_dump($oldMediaItems);
        }


        //Handle the form Submission

        if (isset($_POST['ListingKey'])) {

            // echo 'Updating listing information';

            // Collect form data
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
            ];
        
    
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
                // $jsonResponse = json_decode($response, true);
                // echo 'Response: ';
                // var_dump($response);

                echo '<p style="color: green;">Listing Updated</p>';
                
            }


            
        }
        
    
        //Get single listing details

        $filter_params = urlencode("ListingKey eq '" . $listing . "'");
        $api_url = "https://api.nexusmls.io/Property?\$filter=" . $filter_params;
        

        curl_setopt_array($curl, [
            CURLOPT_URL => $api_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "Authorization: Bearer $mlsApiKey",
                "Content-Type: application/json"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo json_encode(["error" => "cURL Error #:" . $err]);
        } else {
            $jsonResponse = json_decode($response, true);
            $results = $jsonResponse['value'];
            if (json_last_error() === JSON_ERROR_NONE) {
                foreach ($results as $result) {
                    // var_dump($result);
                    
                    $PropertyType = $result['PropertyType'];
                    $StandardStatus = $result['StandardStatus'];
                    $ListPrice = $result['ListPrice'];
                    $YearBuilt = $result['YearBuilt'];
                    $LivingArea = $result['LivingArea'];
                    $LotSizeAcres = $result['LotSizeAcres'];
                    $LotSizeSquareFeet = $result['LotSizeSquareFeet'];
                    $LotSizeArea = $result['LotSizeArea'];
                    $BedroomsTotal = $result['BedroomsTotal'];
                    $BathroomsTotalInteger = $result['BathroomsTotalInteger'];
                    $Stories = $result['Stories'];
                    $BasementYN = $result['BasementYN'];
                    $GarageSpaces = $result['GarageSpaces'];
                    $AssociationFee = $result['AssociationFee'];

                    $Flooring = $result['Flooring'];
                    $Heating = $result['Heating'];
                    $Cooling = $result['Cooling'];
                    $Appliances = $result['Appliances'];
                    $FireplaceYN = $result['FireplaceYN'];
                    $InteriorFeatures = $result['InteriorFeatures'];

                    $ConstructionMaterials = $result['ConstructionMaterials'];
                    $Roof = $result['Roof'];
                    $ExteriorFeatures = $result['ExteriorFeatures'];
                    $PoolPrivateYN = $result['PoolPrivateYN'];

                    $StreetNumber = $result['StreetNumber'];
                    $StreetDirPrefix = $result['StreetDirPrefix'];
                    $StreetName = $result['StreetName'];
                    $StreetSuffix = $result['StreetSuffix'];
                    $City = $result['City'];
                    $StateOrProvince = $result['StateOrProvince'];
                    $PostalCode = $result['PostalCode'];
                    $SubdivisionName = $result['SubdivisionName'];
                    $HighSchoolDistrict = $result['HighSchoolDistrict'];
                    $ElementarySchool = $result['ElementarySchool'];
                    $MiddleOrJuniorSchool = $result['MiddleOrJuniorSchool'];
                    $HighSchool = $result['HighSchool'];

                    $ListingContractDate = $result['ListingContractDate'];
                    $ListAgentFullName = $result['ListAgentFullName'];
                    $ListAgentEmail = $result['ListAgentEmail'];
                    $ListAgentOfficePhone = $result['ListAgentOfficePhone'];
                    $ListAgentMobilePhone = $result['ListAgentMobilePhone'];
                    $OpenHouseModificationTimestamp = $result['OpenHouseModificationTimestamp'];
                    $VirtualTourURLBranded = $result['VirtualTourURLBranded'];
                    $VirtualTourURLUnbranded = $result['VirtualTourURLUnbranded'];

                    $PublicRemarks = $result['PublicRemarks'];

                    ?>
    <form method="POST" class="nexus-mls-form">
        <input type="hidden" name="ListingKey" value="<?php echo $listing; ?>">

        <!-- Property Details -->
        <h2>Property Details</h2>

        <div>
            <label for="PropertyType">Property Type</label>
            <select name="PropertyType" id="PropertyType">
                <option value="Business Opportunity" <?php echo $PropertyType == 'Business Opportunity' ? 'selected' : '' ?>>Business Opportunity</option>
                <option value="Commercial Lease" <?php echo $PropertyType == 'Commercial Lease' ? 'selected' : '' ?>>Commercial Lease</option>
                <option value="Commercial Sale" <?php echo $PropertyType == 'Commercial Sale' ? 'selected' : '' ?>>Commercial Sale</option>
                <option value="Farm" <?php echo $PropertyType == 'Farm' ? 'selected' : '' ?>>Farm</option>
                <option value="Land" <?php echo $PropertyType == 'Land' ? 'selected' : '' ?>>Land</option>
                <option value="Manufactured In Park" <?php echo $PropertyType == 'Manufactured In Park' ? 'selected' : '' ?>>Manufactured In Park</option>
                <option value="Residential" <?php echo $PropertyType == 'Residential' ? 'selected' : '' ?>>Residential</option>
                <option value="Residential Income" <?php echo $PropertyType == 'Residential Income' ? 'selected' : '' ?>>Residential Income</option>
                <option value="Residential Lease" <?php echo $PropertyType == 'Residential Lease' ? 'selected' : '' ?>>Residential Lease</option>
            </select>

        </div>

        <div>
            <label for="StandardStatus">Listing Status</label>
            <select name="StandardStatus" id="StandardStatus">
                <option value="Active" <?php echo $StandardStatus == 'Active' ? 'selected' : '' ?>>Active</option>
                <option value="Active Under Contract" <?php echo $StandardStatus == 'Active Under Contract' ? 'selected' : '' ?>>Active Under Contract</option>
                <option value="Canceled" <?php echo $StandardStatus == 'Canceled' ? 'selected' : '' ?>>Canceled</option>
                <option value="Closed" <?php echo $StandardStatus == 'Closed' ? 'selected' : '' ?>>Closed</option>
                <option value="Coming Soon" <?php echo $StandardStatus == 'Coming Soon' ? 'selected' : '' ?>>Coming Soon</option>
                <option value="Expired" <?php echo $StandardStatus == 'Expired' ? 'selected' : '' ?>>Expired</option>
                <option value="Hold" <?php echo $StandardStatus == 'Hold' ? 'selected' : '' ?>>Hold</option>
                <option value="Incomplete" <?php echo $StandardStatus == 'Incomplete' ? 'selected' : '' ?>>Incomplete</option>
                <option value="Pending" <?php echo $StandardStatus == 'Pending' ? 'selected' : '' ?>>Pending</option>
                <option value="Withdrawn" <?php echo $StandardStatus == 'Withdrawn' ? 'selected' : '' ?>>Withdrawn</option>
                <!-- <option value="Delete" <?php echo $StandardStatus == 'Delete' ? 'selected' : '' ?>>Delete</option> -->
            </select>
        </div>

        <div>
            <label for="ListPrice">Price</label>
            <input type="number" name="ListPrice" value="<?php echo $ListPrice; ?>">
        </div>

        <!-- <label for="ListingId">MLS Number</label>
        <input type="text" name="ListingId" value="Not found"> -->

        <div>
            <label for="YearBuilt">Year Built</label>
            <input type="text" name="YearBuilt" value="<?php echo $YearBuilt; ?>">
        </div>

        <div>
            <label for="LivingArea">Square Footage</label>
            <input type="text" name="LivingArea" value="<?php echo $LivingArea; ?>">
        </div>

        <div>
            <label for="LotSizeAcres">Lot Size Acres</label>
            <input type="text" name="LotSizeAcres" value="<?php echo $LotSizeAcres; ?>">
        </div>

        <div>
            <label for="LotSizeSquareFeet">Lot Size SquareFeet</label>
            <input type="text" name="LotSizeSquareFeet" value="<?php echo $LotSizeSquareFeet; ?>">
        </div>


        <div>
            <label for="LotSizeAcres">Lot Size Area</label>
            <input type="text" name="LotSizeAcres" value="<?php echo $LotSizeAcres; ?>">
        </div>


        <div>
            <label for="BedroomsTotal">Bedrooms</label>
            <input type="text" name="BedroomsTotal" value="<?php echo $BedroomsTotal; ?>">
        </div>

        <div>
            <label for="BathroomsTotalInteger">Bathrooms</label>
            <input type="text" name="BathroomsTotalInteger" value="<?php echo $BathroomsTotalInteger; ?>">
        </div>

        <div>
            <label for="Stories">Number of Floors</label>
            <input type="text" name="Stories" value="<?php echo $Stories; ?>">
        </div>

        <div>
            <label for="BasementYN">Basement</label>
            <div class="inline-radiofields">
                <label>
                    <input type="radio" name="BasementYN" value="true" <?php echo $BasementYN == true ? 'checked' : '' ?>>
                    <span>Yes</span>
                </label>
                <label>
                    <input type="radio" name="BasementYN" value="false" <?php echo $BasementYN == false ? 'checked' : '' ?>>
                    <span>No</span>
                </label>
            </div>
        </div>


        <div>
            <label for="GarageSpaces">Parking Spaces</label>
            <input type="text" name="GarageSpaces" value="<?php echo $GarageSpaces; ?>">
        </div>

        <div>
            <label for="AssociationFee">HOA Fees</label>
            <input type="text" name="AssociationFee" value="<?php echo $AssociationFee; ?>">
        </div>

        <!-- Interior Features -->
        <h2>Interior Features</h2>

        <div>
            <h5>Flooring Types</h5>
            <div class="inline-checkboxes">
                <label>
                    <input type="checkbox" name="Flooring[]" value="Adobe" <?php echo in_array('Adobe', $Flooring) ? 'checked' : ''; ?>>
                    <span>Adobe</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Bamboo" <?php echo in_array('Bamboo', $Flooring) ? 'checked' : ''; ?>>
                    <span>Bamboo</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Brick" <?php echo in_array('Brick', $Flooring) ? 'checked' : ''; ?>>
                    <span>Brick</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Carpet" <?php echo in_array('Carpet', $Flooring) ? 'checked' : ''; ?>>
                    <span>Carpet</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Ceramic Tile" <?php echo in_array('Ceramic Tile', $Flooring) ? 'checked' : ''; ?>>
                    <span>Ceramic Tile</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Clay" <?php echo in_array('Clay', $Flooring) ? 'checked' : ''; ?>>
                    <span>Clay</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Combination" <?php echo in_array('Combination', $Flooring) ? 'checked' : ''; ?>>
                    <span>Combination</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Concrete" <?php echo in_array('Concrete', $Flooring) ? 'checked' : ''; ?>>
                    <span>Concrete</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Cork" <?php echo in_array('Cork', $Flooring) ? 'checked' : ''; ?>>
                    <span>Cork</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="CRI Green Label Plus Certified Carpet" <?php echo in_array('CRI Green Label Plus Certified Carpet', $Flooring) ? 'checked' : ''; ?>>
                    <span>CRI Green Label Plus Certified Carpet</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Dirt" <?php echo in_array('Dirt', $Flooring) ? 'checked' : ''; ?>>
                    <span>Dirt</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="FloorScore(r) Certified Flooring" <?php echo in_array('FloorScore(r) Certified Flooring', $Flooring) ? 'checked' : ''; ?>>
                    <span>FloorScore(r) Certified Flooring</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="FSC or SFI Certified Source Hardwood" <?php echo in_array('FSC or SFI Certified Source Hardwood', $Flooring) ? 'checked' : ''; ?>>
                    <span>FSC or SFI Certified Source Hardwood</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Granite" <?php echo in_array('Granite', $Flooring) ? 'checked' : ''; ?>>
                    <span>Granite</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Hardwood" <?php echo in_array('Hardwood', $Flooring) ? 'checked' : ''; ?>>
                    <span>Hardwood</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Laminate" <?php echo in_array('Laminate', $Flooring) ? 'checked' : ''; ?>>
                    <span>Laminate</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Linoleum" <?php echo in_array('Linoleum', $Flooring) ? 'checked' : ''; ?>>
                    <span>Linoleum</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Marble" <?php echo in_array('Marble', $Flooring) ? 'checked' : ''; ?>>
                    <span>Marble</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="None" <?php echo in_array('None', $Flooring) ? 'checked' : ''; ?>>
                    <span>None</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Other" <?php echo in_array('Other', $Flooring) ? 'checked' : ''; ?>>
                    <span>Other</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Painted/Stained" <?php echo in_array('Painted/Stained', $Flooring) ? 'checked' : ''; ?>>
                    <span>Painted/Stained</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Parquet" <?php echo in_array('Parquet', $Flooring) ? 'checked' : ''; ?>>
                    <span>Parquet</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Pavers" <?php echo in_array('Pavers', $Flooring) ? 'checked' : ''; ?>>
                    <span>Pavers</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Reclaimed Wood" <?php echo in_array('Reclaimed Wood', $Flooring) ? 'checked' : ''; ?>>
                    <span>Reclaimed Wood</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="See Remarks" <?php echo in_array('See Remarks', $Flooring) ? 'checked' : ''; ?>>
                    <span>See Remarks</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Simulated Wood" <?php echo in_array('Simulated Wood', $Flooring) ? 'checked' : ''; ?>>
                    <span>Simulated Wood</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Slate" <?php echo in_array('Slate', $Flooring) ? 'checked' : ''; ?>>
                    <span>Slate</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Softwood" <?php echo in_array('Softwood', $Flooring) ? 'checked' : ''; ?>>
                    <span>Softwood</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Stamped" <?php echo in_array('Stamped', $Flooring) ? 'checked' : ''; ?>>
                    <span>Stamped</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Stone" <?php echo in_array('Stone', $Flooring) ? 'checked' : ''; ?>>
                    <span>Stone</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Sustainable" <?php echo in_array('Sustainable', $Flooring) ? 'checked' : ''; ?>>
                    <span>Sustainable</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Terrazzo" <?php echo in_array('Terrazzo', $Flooring) ? 'checked' : ''; ?>>
                    <span>Terrazzo</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Tile" <?php echo in_array('Tile', $Flooring) ? 'checked' : ''; ?>>
                    <span>Tile</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Varies" <?php echo in_array('Varies', $Flooring) ? 'checked' : ''; ?>>
                    <span>Varies</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Vinyl" <?php echo in_array('Vinyl', $Flooring) ? 'checked' : ''; ?>>
                    <span>Vinyl</span>
                </label>
                <label>
                    <input type="checkbox" name="Flooring[]" value="Wood" <?php echo in_array('Wood', $Flooring) ? 'checked' : ''; ?>>
                    <span>Wood</span>
                </label>
            </div>
        </div>


   
        <div>
    <h5>Heating Systems</h5>
    <div class="inline-checkboxes">
        <label>
            <input type="checkbox" name="Heating[]" value="Active Solar" <?php echo in_array("Active Solar", $Heating) ? 'checked' : ''; ?>>
            <span>Active Solar</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Baseboard" <?php echo in_array("Baseboard", $Heating) ? 'checked' : ''; ?>>
            <span>Baseboard</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Ceiling" <?php echo in_array("Ceiling", $Heating) ? 'checked' : ''; ?>>
            <span>Ceiling</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Central" <?php echo in_array("Central", $Heating) ? 'checked' : ''; ?>>
            <span>Central</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Coal" <?php echo in_array("Coal", $Heating) ? 'checked' : ''; ?>>
            <span>Coal</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Coal Stove" <?php echo in_array("Coal Stove", $Heating) ? 'checked' : ''; ?>>
            <span>Coal Stove</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Ductless" <?php echo in_array("Ductless", $Heating) ? 'checked' : ''; ?>>
            <span>Ductless</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Electric" <?php echo in_array("Electric", $Heating) ? 'checked' : ''; ?>>
            <span>Electric</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="ENERGY STAR/ACCA RSI Qualified Installation" <?php echo in_array("ENERGY STAR/ACCA RSI Qualified Installation", $Heating) ? 'checked' : ''; ?>>
            <span>ENERGY STAR/ACCA RSI Qualified Installation</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="ENERGY STAR Qualified Equipment" <?php echo in_array("ENERGY STAR Qualified Equipment", $Heating) ? 'checked' : ''; ?>>
            <span>ENERGY STAR Qualified Equipment</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Exhaust Fan" <?php echo in_array("Exhaust Fan", $Heating) ? 'checked' : ''; ?>>
            <span>Exhaust Fan</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Fireplace Insert" <?php echo in_array("Fireplace Insert", $Heating) ? 'checked' : ''; ?>>
            <span>Fireplace Insert</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Fireplace(s)" <?php echo in_array("Fireplace(s)", $Heating) ? 'checked' : ''; ?>>
            <span>Fireplace(s)</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Floor Furnace" <?php echo in_array("Floor Furnace", $Heating) ? 'checked' : ''; ?>>
            <span>Floor Furnace</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Forced Air" <?php echo in_array("Forced Air", $Heating) ? 'checked' : ''; ?>>
            <span>Forced Air</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Geothermal" <?php echo in_array("Geothermal", $Heating) ? 'checked' : ''; ?>>
            <span>Geothermal</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Gravity" <?php echo in_array("Gravity", $Heating) ? 'checked' : ''; ?>>
            <span>Gravity</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Heat Pump" <?php echo in_array("Heat Pump", $Heating) ? 'checked' : ''; ?>>
            <span>Heat Pump</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Hot Water" <?php echo in_array("Hot Water", $Heating) ? 'checked' : ''; ?>>
            <span>Hot Water</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Humidity Control" <?php echo in_array("Humidity Control", $Heating) ? 'checked' : ''; ?>>
            <span>Humidity Control</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Kerosene" <?php echo in_array("Kerosene", $Heating) ? 'checked' : ''; ?>>
            <span>Kerosene</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Natural Gas" <?php echo in_array("Natural Gas", $Heating) ? 'checked' : ''; ?>>
            <span>Natural Gas</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="None" <?php echo in_array("None", $Heating) ? 'checked' : ''; ?>>
            <span>None</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Oil" <?php echo in_array("Oil", $Heating) ? 'checked' : ''; ?>>
            <span>Oil</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Other" <?php echo in_array("Other", $Heating) ? 'checked' : ''; ?>>
            <span>Other</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Passive Solar" <?php echo in_array("Passive Solar", $Heating) ? 'checked' : ''; ?>>
            <span>Passive Solar</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Pellet Stove" <?php echo in_array("Pellet Stove", $Heating) ? 'checked' : ''; ?>>
            <span>Pellet Stove</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Propane" <?php echo in_array("Propane", $Heating) ? 'checked' : ''; ?>>
            <span>Propane</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Propane Stove" <?php echo in_array("Propane Stove", $Heating) ? 'checked' : ''; ?>>
            <span>Propane Stove</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Radiant" <?php echo in_array("Radiant", $Heating) ? 'checked' : ''; ?>>
            <span>Radiant</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Radiant Ceiling" <?php echo in_array("Radiant Ceiling", $Heating) ? 'checked' : ''; ?>>
            <span>Radiant Ceiling</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Radiant Floor" <?php echo in_array("Radiant Floor", $Heating) ? 'checked' : ''; ?>>
            <span>Radiant Floor</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="See Remarks" <?php echo in_array("See Remarks", $Heating) ? 'checked' : ''; ?>>
            <span>See Remarks</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Separate Meters" <?php echo in_array("Separate Meters", $Heating) ? 'checked' : ''; ?>>
            <span>Separate Meters</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Solar" <?php echo in_array("Solar", $Heating) ? 'checked' : ''; ?>>
            <span>Solar</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Space Heater" <?php echo in_array("Space Heater", $Heating) ? 'checked' : ''; ?>>
            <span>Space Heater</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Steam" <?php echo in_array("Steam", $Heating) ? 'checked' : ''; ?>>
            <span>Steam</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Varies by Unit" <?php echo in_array("Varies by Unit", $Heating) ? 'checked' : ''; ?>>
            <span>Varies by Unit</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Wall Furnace" <?php echo in_array("Wall Furnace", $Heating) ? 'checked' : ''; ?>>
            <span>Wall Furnace</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Wood" <?php echo in_array("Wood", $Heating) ? 'checked' : ''; ?>>
            <span>Wood</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Wood Stove" <?php echo in_array("Wood Stove", $Heating) ? 'checked' : ''; ?>>
            <span>Wood Stove</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Zoned" <?php echo in_array("Zoned", $Heating) ? 'checked' : ''; ?>>
            <span>Zoned</span>
        </label>
    </div>
</div>

      

<div>
    <h5>Cooling Systems</h5>
    <div class="inline-checkboxes">
        <label>
            <input type="checkbox" name="Cooling[]" value="Attic Fan" <?php echo in_array("Attic Fan", $Cooling) ? 'checked' : ''; ?>>
            <span>Attic Fan</span>
        </label>
        <label>
            <input type="checkbox" name="Cooling[]" value="Ceiling Fan(s)" <?php echo in_array("Ceiling Fan(s)", $Cooling) ? 'checked' : ''; ?>>
            <span>Ceiling Fan(s)</span>
        </label>
        <label>
            <input type="checkbox" name="Cooling[]" value="Central Air" <?php echo in_array("Central Air", $Cooling) ? 'checked' : ''; ?>>
            <span>Central Air</span>
        </label>
        <label>
            <input type="checkbox" name="Cooling[]" value="Dual" <?php echo in_array("Dual", $Cooling) ? 'checked' : ''; ?>>
            <span>Dual</span>
        </label>
        <label>
            <input type="checkbox" name="Cooling[]" value="Ductless" <?php echo in_array("Ductless", $Cooling) ? 'checked' : ''; ?>>
            <span>Ductless</span>
        </label>
        <label>
            <input type="checkbox" name="Cooling[]" value="Electric" <?php echo in_array("Electric", $Cooling) ? 'checked' : ''; ?>>
            <span>Electric</span>
        </label>
        <label>
            <input type="checkbox" name="Cooling[]" value="ENERGY STAR Qualified Equipment" <?php echo in_array("ENERGY STAR Qualified Equipment", $Cooling) ? 'checked' : ''; ?>>
            <span>ENERGY STAR Qualified Equipment</span>
        </label>
        <label>
            <input type="checkbox" name="Cooling[]" value="Evaporative Cooling" <?php echo in_array("Evaporative Cooling", $Cooling) ? 'checked' : ''; ?>>
            <span>Evaporative Cooling</span>
        </label>
        <label>
            <input type="checkbox" name="Cooling[]" value="Exhaust Fan" <?php echo in_array("Exhaust Fan", $Cooling) ? 'checked' : ''; ?>>
            <span>Exhaust Fan</span>
        </label>
        <label>
            <input type="checkbox" name="Cooling[]" value="Gas" <?php echo in_array("Gas", $Cooling) ? 'checked' : ''; ?>>
            <span>Gas</span>
        </label>
        <label>
            <input type="checkbox" name="Cooling[]" value="Geothermal" <?php echo in_array("Geothermal", $Cooling) ? 'checked' : ''; ?>>
            <span>Geothermal</span>
        </label>
        <label>
            <input type="checkbox" name="Cooling[]" value="Heat Pump" <?php echo in_array("Heat Pump", $Cooling) ? 'checked' : ''; ?>>
            <span>Heat Pump</span>
        </label>
        <label>
            <input type="checkbox" name="Cooling[]" value="Humidity Control" <?php echo in_array("Humidity Control", $Cooling) ? 'checked' : ''; ?>>
            <span>Humidity Control</span>
        </label>
        <label>
            <input type="checkbox" name="Cooling[]" value="Multi Units" <?php echo in_array("Multi Units", $Cooling) ? 'checked' : ''; ?>>
            <span>Multi Units</span>
        </label>
        <label>
            <input type="checkbox" name="Cooling[]" value="None" <?php echo in_array("None", $Cooling) ? 'checked' : ''; ?>>
            <span>None</span>
        </label>
        <label>
            <input type="checkbox" name="Cooling[]" value="Other" <?php echo in_array("Other", $Cooling) ? 'checked' : ''; ?>>
            <span>Other</span>
        </label>
        <label>
            <input type="checkbox" name="Cooling[]" value="Roof Turbine(s)" <?php echo in_array("Roof Turbine(s)", $Cooling) ? 'checked' : ''; ?>>
            <span>Roof Turbine(s)</span>
        </label>
        <label>
            <input type="checkbox" name="Cooling[]" value="Separate Meters" <?php echo in_array("Separate Meters", $Cooling) ? 'checked' : ''; ?>>
            <span>Separate Meters</span>
        </label>
        <label>
            <input type="checkbox" name="Cooling[]" value="Varies by Unit" <?php echo in_array("Varies by Unit", $Cooling) ? 'checked' : ''; ?>>
            <span>Varies by Unit</span>
        </label>
        <label>
            <input type="checkbox" name="Cooling[]" value="Wall Unit(s)" <?php echo in_array("Wall Unit(s)", $Cooling) ? 'checked' : ''; ?>>
            <span>Wall Unit(s)</span>
        </label>
        <label>
            <input type="checkbox" name="Cooling[]" value="Wall/Window Unit(s)" <?php echo in_array("Wall/Window Unit(s)", $Cooling) ? 'checked' : ''; ?>>
            <span>Wall/Window Unit(s)</span>
        </label>
        <label>
            <input type="checkbox" name="Cooling[]" value="Whole House Fan" <?php echo in_array("Whole House Fan", $Cooling) ? 'checked' : ''; ?>>
            <span>Whole House Fan</span>
        </label>
        <label>
            <input type="checkbox" name="Cooling[]" value="Window Unit(s)" <?php echo in_array("Window Unit(s)", $Cooling) ? 'checked' : ''; ?>>
            <span>Window Unit(s)</span>
        </label>
        <label>
            <input type="checkbox" name="Cooling[]" value="Zoned" <?php echo in_array("Zoned", $Cooling) ? 'checked' : ''; ?>>
            <span>Zoned</span>
        </label>
    </div>
</div>



        <div>
            <h5>Appliances</h5>
            <div class="inline-checkboxes">
                <label>
                    <input type="checkbox" name="Appliances[]" value="Bar Fridge" <?php echo in_array("Bar Fridge", $Appliances) ? 'checked' : ''; ?>>
                    <span>Bar Fridge</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Built-In Electric Oven" <?php echo in_array("Built-In Electric Oven", $Appliances) ? 'checked' : ''; ?>>
                    <span>Built-In Electric Oven</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Built-In Electric Range" <?php echo in_array("Built-In Electric Range", $Appliances) ? 'checked' : ''; ?>>
                    <span>Built-In Electric Range</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Built-In Freezer" <?php echo in_array("Built-In Freezer", $Appliances) ? 'checked' : ''; ?>>
                    <span>Built-In Freezer</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Built-In Gas Oven" <?php echo in_array("Built-In Gas Oven", $Appliances) ? 'checked' : ''; ?>>
                    <span>Built-In Gas Oven</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Built-In Gas Range" <?php echo in_array("Built-In Gas Range", $Appliances) ? 'checked' : ''; ?>>
                    <span>Built-In Gas Range</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Built-In Range" <?php echo in_array("Built-In Range", $Appliances) ? 'checked' : ''; ?>>
                    <span>Built-In Range</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Built-In Refrigerator" <?php echo in_array("Built-In Refrigerator", $Appliances) ? 'checked' : ''; ?>>
                    <span>Built-In Refrigerator</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Convection Oven" <?php echo in_array("Convection Oven", $Appliances) ? 'checked' : ''; ?>>
                    <span>Convection Oven</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Cooktop" <?php echo in_array("Cooktop", $Appliances) ? 'checked' : ''; ?>>
                    <span>Cooktop</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Dishwasher" <?php echo in_array("Dishwasher", $Appliances) ? 'checked' : ''; ?>>
                    <span>Dishwasher</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Disposal" <?php echo in_array("Disposal", $Appliances) ? 'checked' : ''; ?>>
                    <span>Disposal</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Double Oven" <?php echo in_array("Double Oven", $Appliances) ? 'checked' : ''; ?>>
                    <span>Double Oven</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Down Draft" <?php echo in_array("Down Draft", $Appliances) ? 'checked' : ''; ?>>
                    <span>Down Draft</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Dryer" <?php echo in_array("Dryer", $Appliances) ? 'checked' : ''; ?>>
                    <span>Dryer</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Electric Cooktop" <?php echo in_array("Electric Cooktop", $Appliances) ? 'checked' : ''; ?>>
                    <span>Electric Cooktop</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Electric Oven" <?php echo in_array("Electric Oven", $Appliances) ? 'checked' : ''; ?>>
                    <span>Electric Oven</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Electric Range" <?php echo in_array("Electric Range", $Appliances) ? 'checked' : ''; ?>>
                    <span>Electric Range</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Electric Water Heater" <?php echo in_array("Electric Water Heater", $Appliances) ? 'checked' : ''; ?>>
                    <span>Electric Water Heater</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="ENERGY STAR Qualified Appliances" <?php echo in_array("ENERGY STAR Qualified Appliances", $Appliances) ? 'checked' : ''; ?>>
                    <span>ENERGY STAR Qualified Appliances</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="ENERGY STAR Qualified Dishwasher" <?php echo in_array("ENERGY STAR Qualified Dishwasher", $Appliances) ? 'checked' : ''; ?>>
                    <span>ENERGY STAR Qualified Dishwasher</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="ENERGY STAR Qualified Dryer" <?php echo in_array("ENERGY STAR Qualified Dryer", $Appliances) ? 'checked' : ''; ?>>
                    <span>ENERGY STAR Qualified Dryer</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="ENERGY STAR Qualified Freezer" <?php echo in_array("ENERGY STAR Qualified Freezer", $Appliances) ? 'checked' : ''; ?>>
                    <span>ENERGY STAR Qualified Freezer</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="ENERGY STAR Qualified Refrigerator" <?php echo in_array("ENERGY STAR Qualified Refrigerator", $Appliances) ? 'checked' : ''; ?>>
                    <span>ENERGY STAR Qualified Refrigerator</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="ENERGY STAR Qualified Washer" <?php echo in_array("ENERGY STAR Qualified Washer", $Appliances) ? 'checked' : ''; ?>>
                    <span>ENERGY STAR Qualified Washer</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="ENERGY STAR Qualified Water Heater" <?php echo in_array("ENERGY STAR Qualified Water Heater", $Appliances) ? 'checked' : ''; ?>>
                    <span>ENERGY STAR Qualified Water Heater</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Exhaust Fan" <?php echo in_array("Exhaust Fan", $Appliances) ? 'checked' : ''; ?>>
                    <span>Exhaust Fan</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Free-Standing Electric Oven" <?php echo in_array("Free-Standing Electric Oven", $Appliances) ? 'checked' : ''; ?>>
                    <span>Free-Standing Electric Oven</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Free-Standing Electric Range" <?php echo in_array("Free-Standing Electric Range", $Appliances) ? 'checked' : ''; ?>>
                    <span>Free-Standing Electric Range</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Free-Standing Freezer" <?php echo in_array("Free-Standing Freezer", $Appliances) ? 'checked' : ''; ?>>
                    <span>Free-Standing Freezer</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Free-Standing Gas Oven" <?php echo in_array("Free-Standing Gas Oven", $Appliances) ? 'checked' : ''; ?>>
                    <span>Free-Standing Gas Oven</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Free-Standing Gas Range" <?php echo in_array("Free-Standing Gas Range", $Appliances) ? 'checked' : ''; ?>>
                    <span>Free-Standing Gas Range</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Free-Standing Range" <?php echo in_array("Free-Standing Range", $Appliances) ? 'checked' : ''; ?>>
                    <span>Free-Standing Range</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Free-Standing Refrigerator" <?php echo in_array("Free-Standing Refrigerator", $Appliances) ? 'checked' : ''; ?>>
                    <span>Free-Standing Refrigerator</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Freezer" <?php echo in_array("Freezer", $Appliances) ? 'checked' : ''; ?>>
                    <span>Freezer</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Gas Cooktop" <?php echo in_array("Gas Cooktop", $Appliances) ? 'checked' : ''; ?>>
                    <span>Gas Cooktop</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Gas Oven" <?php echo in_array("Gas Oven", $Appliances) ? 'checked' : ''; ?>>
                    <span>Gas Oven</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Gas Range" <?php echo in_array("Gas Range", $Appliances) ? 'checked' : ''; ?>>
                    <span>Gas Range</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Gas Water Heater" <?php echo in_array("Gas Water Heater", $Appliances) ? 'checked' : ''; ?>>
                    <span>Gas Water Heater</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Humidifier" <?php echo in_array("Humidifier", $Appliances) ? 'checked' : ''; ?>>
                    <span>Humidifier</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Ice Maker" <?php echo in_array("Ice Maker", $Appliances) ? 'checked' : ''; ?>>
                    <span>Ice Maker</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Indoor Grill" <?php echo in_array("Indoor Grill", $Appliances) ? 'checked' : ''; ?>>
                    <span>Indoor Grill</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Induction Cooktop" <?php echo in_array("Induction Cooktop", $Appliances) ? 'checked' : ''; ?>>
                    <span>Induction Cooktop</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Instant Hot Water" <?php echo in_array("Instant Hot Water", $Appliances) ? 'checked' : ''; ?>>
                    <span>Instant Hot Water</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Microwave" <?php echo in_array("Microwave", $Appliances) ? 'checked' : ''; ?>>
                    <span>Microwave</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="None" <?php echo in_array("None", $Appliances) ? 'checked' : ''; ?>>
                    <span>None</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Other" <?php echo in_array("Other", $Appliances) ? 'checked' : ''; ?>>
                    <span>Other</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Oven" <?php echo in_array("Oven", $Appliances) ? 'checked' : ''; ?>>
                    <span>Oven</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Plumbed For Ice Maker" <?php echo in_array("Plumbed For Ice Maker", $Appliances) ? 'checked' : ''; ?>>
                    <span>Plumbed For Ice Maker</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Portable Dishwasher" <?php echo in_array("Portable Dishwasher", $Appliances) ? 'checked' : ''; ?>>
                    <span>Portable Dishwasher</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Propane Cooktop" <?php echo in_array("Propane Cooktop", $Appliances) ? 'checked' : ''; ?>>
                    <span>Propane Cooktop</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Range" <?php echo in_array("Range", $Appliances) ? 'checked' : ''; ?>>
                    <span>Range</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Range Hood" <?php echo in_array("Range Hood", $Appliances) ? 'checked' : ''; ?>>
                    <span>Range Hood</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Refrigerator" <?php echo in_array("Refrigerator", $Appliances) ? 'checked' : ''; ?>>
                    <span>Refrigerator</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Self Cleaning Oven" <?php echo in_array("Self Cleaning Oven", $Appliances) ? 'checked' : ''; ?>>
                    <span>Self Cleaning Oven</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Solar Hot Water" <?php echo in_array("Solar Hot Water", $Appliances) ? 'checked' : ''; ?>>
                    <span>Solar Hot Water</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Stainless Steel Appliance(s)" <?php echo in_array("Stainless Steel Appliance(s)", $Appliances) ? 'checked' : ''; ?>>
                    <span>Stainless Steel Appliance(s)</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Tankless Water Heater" <?php echo in_array("Tankless Water Heater", $Appliances) ? 'checked' : ''; ?>>
                    <span>Tankless Water Heater</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Trash Compactor" <?php echo in_array("Trash Compactor", $Appliances) ? 'checked' : ''; ?>>
                    <span>Trash Compactor</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Vented Exhaust Fan" <?php echo in_array("Vented Exhaust Fan", $Appliances) ? 'checked' : ''; ?>>
                    <span>Vented Exhaust Fan</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Warming Drawer" <?php echo in_array("Warming Drawer", $Appliances) ? 'checked' : ''; ?>>
                    <span>Warming Drawer</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Washer" <?php echo in_array("Washer", $Appliances) ? 'checked' : ''; ?>>
                    <span>Washer</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Washer/Dryer" <?php echo in_array("Washer/Dryer", $Appliances) ? 'checked' : ''; ?>>
                    <span>Washer/Dryer</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Washer/Dryer Stacked" <?php echo in_array("Washer/Dryer Stacked", $Appliances) ? 'checked' : ''; ?>>
                    <span>Washer/Dryer Stacked</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Water Heater" <?php echo in_array("Water Heater", $Appliances) ? 'checked' : ''; ?>>
                    <span>Water Heater</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Water Purifier" <?php echo in_array("Water Purifier", $Appliances) ? 'checked' : ''; ?>>
                    <span>Water Purifier</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Water Purifier Owned" <?php echo in_array("Water Purifier Owned", $Appliances) ? 'checked' : ''; ?>>
                    <span>Water Purifier Owned</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Water Purifier Rented" <?php echo in_array("Water Purifier Rented", $Appliances) ? 'checked' : ''; ?>>
                    <span>Water Purifier Rented</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Water Softener" <?php echo in_array("Water Softener", $Appliances) ? 'checked' : ''; ?>>
                    <span>Water Softener</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Water Softener Owned" <?php echo in_array("Water Softener Owned", $Appliances) ? 'checked' : ''; ?>>
                    <span>Water Softener Owned</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Water Softener Rented" <?php echo in_array("Water Softener Rented", $Appliances) ? 'checked' : ''; ?>>
                    <span>Water Softener Rented</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Wine Cooler" <?php echo in_array("Wine Cooler", $Appliances) ? 'checked' : ''; ?>>
                    <span>Wine Cooler</span>
                </label>
                <label>
                    <input type="checkbox" name="Appliances[]" value="Wine Refrigerator" <?php echo in_array("Wine Refrigerator", $Appliances) ? 'checked' : ''; ?>>
                    <span>Wine Refrigerator</span>
                </label>
            </div>

        </div>


        <div>
            <h5>Fireplace</h5>
            <div class="inline-radiofields">
                <label for="fireplace-true">
                    <input type="radio" name="FireplaceYN" value="true" <?php echo $FireplaceYN == true ? 'checked' : '' ?>>
                    <span>Yes</span>
                </label>
                <label for="fireplace-false">
                    <input type="radio" name="FireplaceYN" value="false" <?php echo $FireplaceYN == false ? 'checked' : '' ?>>
                    <span>No</span>
                </label>
            </div>
        </div>


        <div>
            <h5>Interior Amenities</h5>
            <div class="inline-checkboxes">
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Bookcases" <?php echo in_array("Bookcases", $InteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Bookcases</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Built-in Features" <?php echo in_array("Built-in Features", $InteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Built-in Features</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Ceiling Fan(s)" <?php echo in_array("Ceiling Fan(s)", $InteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Ceiling Fan(s)</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Coffered Ceiling(s)" <?php echo in_array("Coffered Ceiling(s)", $InteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Coffered Ceiling(s)</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Dry Bar" <?php echo in_array("Dry Bar", $InteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Dry Bar</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Pantry" <?php echo in_array("Pantry", $InteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Pantry</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="See Remarks" <?php echo in_array("See Remarks", $InteriorFeatures) ? 'checked' : ''; ?>>
                    <span>See Remarks</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Solar Tube(s)" <?php echo in_array("Solar Tube(s)", $InteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Solar Tube(s)</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Sound System" <?php echo in_array("Sound System", $InteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Sound System</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Stone Counters" <?php echo in_array("Stone Counters", $InteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Stone Counters</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Wired for Data" <?php echo in_array("Wired for Data", $InteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Wired for Data</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Wired for Sound" <?php echo in_array("Wired for Sound", $InteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Wired for Sound</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Beamed Ceilings" <?php echo in_array("Beamed Ceilings", $InteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Beamed Ceilings</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Breakfast Bar" <?php echo in_array("Breakfast Bar", $InteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Breakfast Bar</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Central Vacuum" <?php echo in_array("Central Vacuum", $InteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Central Vacuum</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Chandelier" <?php echo in_array("Chandelier", $InteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Chandelier</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Double Vanity" <?php echo in_array("Double Vanity", $InteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Double Vanity</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Eat-in Kitchen" <?php echo in_array("Eat-in Kitchen", $InteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Eat-in Kitchen</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Entrance Foyer" <?php echo in_array("Entrance Foyer", $InteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Entrance Foyer</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Granite Counters" <?php echo in_array("Granite Counters", $InteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Granite Counters</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="High Speed Internet" <?php echo in_array("High Speed Internet", $InteriorFeatures) ? 'checked' : ''; ?>>
                    <span>High Speed Internet</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Laminate Counters" <?php echo in_array("Laminate Counters", $InteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Laminate Counters</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Natural Woodwork" <?php echo in_array("Natural Woodwork", $InteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Natural Woodwork</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Smart Home" <?php echo in_array("Smart Home", $InteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Smart Home</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Soaking Tub" <?php echo in_array("Soaking Tub", $InteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Soaking Tub</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Vaulted Ceiling(s)" <?php echo in_array("Vaulted Ceiling(s)", $InteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Vaulted Ceiling(s)</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="WaterSense Fixture(s)" <?php echo in_array("WaterSense Fixture(s)", $InteriorFeatures) ? 'checked' : ''; ?>>
                    <span>WaterSense Fixture(s)</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Bidet" <?php echo in_array("Bidet", $InteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Bidet</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Cedar Closet(s)" <?php echo in_array("Cedar Closet(s)", $InteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Cedar Closet(s)</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Elevator" <?php echo in_array("Elevator", $InteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Elevator</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="In-Law Floorplan" <?php echo in_array("In-Law Floorplan", $InteriorFeatures) ? 'checked' : ''; ?>>
                    <span>In-Law Floorplan</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Low Flow Plumbing Fixtures" <?php echo in_array("Low Flow Plumbing Fixtures", $InteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Low Flow Plumbing Fixtures</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Master Downstairs" <?php echo in_array("Master Downstairs", $InteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Master Downstairs</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Storage" <?php echo in_array("Storage", $InteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Storage</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Tile Counters" <?php echo in_array("Tile Counters", $InteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Tile Counters</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Track Lighting" <?php echo in_array("Track Lighting", $InteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Track Lighting</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Tray Ceiling(s)" <?php echo in_array("Tray Ceiling(s)", $InteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Tray Ceiling(s)</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Wet Bar" <?php echo in_array("Wet Bar", $InteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Wet Bar</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Bar" <?php echo in_array("Bar", $InteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Bar</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Cathedral Ceiling(s)" <?php echo in_array("Cathedral Ceiling(s)", $InteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Cathedral Ceiling(s)</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Crown Molding" <?php echo in_array("Crown Molding", $InteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Crown Molding</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Dumbwaiter" <?php echo in_array("Dumbwaiter", $InteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Dumbwaiter</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="High Ceilings" <?php echo in_array("High Ceilings", $InteriorFeatures) ? 'checked' : ''; ?>>
                    <span>High Ceilings</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="His and Hers Closets" <?php echo in_array("His and Hers Closets", $InteriorFeatures) ? 'checked' : ''; ?>>
                    <span>His and Hers Closets</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Kitchen Island" <?php echo in_array("Kitchen Island", $InteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Kitchen Island</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Open Floorplan" <?php echo in_array("Open Floorplan", $InteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Open Floorplan</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Other" <?php echo in_array("Other", $InteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Other</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Recessed Lighting" <?php echo in_array("Recessed Lighting", $InteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Recessed Lighting</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Sauna" <?php echo in_array("Sauna", $InteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Sauna</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Smart Thermostat" <?php echo in_array("Smart Thermostat", $InteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Smart Thermostat</span>
                </label>
                <label>
                    <input type="checkbox" name="InteriorFeatures[]" value="Walk-In Closet(s)" <?php echo in_array("Walk-In Closet(s)", $InteriorFeatures) ? 'checked' : ''; ?>>
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
                    <input type="checkbox" name="ConstructionMaterials[]" value="Adobe" <?php echo in_array("Adobe", $ConstructionMaterials) ? 'checked' : ''; ?>>
                    <span>Adobe</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Asbestos" <?php echo in_array("Asbestos", $ConstructionMaterials) ? 'checked' : ''; ?>>
                    <span>Asbestos</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Blown-In Insulation" <?php echo in_array("Blown-In Insulation", $ConstructionMaterials) ? 'checked' : ''; ?>>
                    <span>Blown-In Insulation</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Brick Veneer" <?php echo in_array("Brick Veneer", $ConstructionMaterials) ? 'checked' : ''; ?>>
                    <span>Brick Veneer</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Frame" <?php echo in_array("Frame", $ConstructionMaterials) ? 'checked' : ''; ?>>
                    <span>Frame</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Glass" <?php echo in_array("Glass", $ConstructionMaterials) ? 'checked' : ''; ?>>
                    <span>Glass</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="ICFs (Insulated Concrete Forms)" <?php echo in_array("ICFs (Insulated Concrete Forms)", $ConstructionMaterials) ? 'checked' : ''; ?>>
                    <span>ICFs (Insulated Concrete Forms)</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Lap Siding" <?php echo in_array("Lap Siding", $ConstructionMaterials) ? 'checked' : ''; ?>>
                    <span>Lap Siding</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Log" <?php echo in_array("Log", $ConstructionMaterials) ? 'checked' : ''; ?>>
                    <span>Log</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Rammed Earth" <?php echo in_array("Rammed Earth", $ConstructionMaterials) ? 'checked' : ''; ?>>
                    <span>Rammed Earth</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Redwood Siding" <?php echo in_array("Redwood Siding", $ConstructionMaterials) ? 'checked' : ''; ?>>
                    <span>Redwood Siding</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Spray Foam Insulation" <?php echo in_array("Spray Foam Insulation", $ConstructionMaterials) ? 'checked' : ''; ?>>
                    <span>Spray Foam Insulation</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Vertical Siding" <?php echo in_array("Vertical Siding", $ConstructionMaterials) ? 'checked' : ''; ?>>
                    <span>Vertical Siding</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Wood Siding" <?php echo in_array("Wood Siding", $ConstructionMaterials) ? 'checked' : ''; ?>>
                    <span>Wood Siding</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Asphalt" <?php echo in_array("Asphalt", $ConstructionMaterials) ? 'checked' : ''; ?>>
                    <span>Asphalt</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Attic/Crawl Hatchway(s) Insulated" <?php echo in_array("Attic/Crawl Hatchway(s) Insulated", $ConstructionMaterials) ? 'checked' : ''; ?>>
                    <span>Attic/Crawl Hatchway(s) Insulated</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Block" <?php echo in_array("Block", $ConstructionMaterials) ? 'checked' : ''; ?>>
                    <span>Block</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Fiber Cement" <?php echo in_array("Fiber Cement", $ConstructionMaterials) ? 'checked' : ''; ?>>
                    <span>Fiber Cement</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Fiberglass Siding" <?php echo in_array("Fiberglass Siding", $ConstructionMaterials) ? 'checked' : ''; ?>>
                    <span>Fiberglass Siding</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="ICAT Recessed Lighting" <?php echo in_array("ICAT Recessed Lighting", $ConstructionMaterials) ? 'checked' : ''; ?>>
                    <span>ICAT Recessed Lighting</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Recycled/Bio-Based Insulation" <?php echo in_array("Recycled/Bio-Based Insulation", $ConstructionMaterials) ? 'checked' : ''; ?>>
                    <span>Recycled/Bio-Based Insulation</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="See Remarks" <?php echo in_array("See Remarks", $ConstructionMaterials) ? 'checked' : ''; ?>>
                    <span>See Remarks</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Steel Siding" <?php echo in_array("Steel Siding", $ConstructionMaterials) ? 'checked' : ''; ?>>
                    <span>Steel Siding</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Stucco" <?php echo in_array("Stucco", $ConstructionMaterials) ? 'checked' : ''; ?>>
                    <span>Stucco</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Synthetic Stucco" <?php echo in_array("Synthetic Stucco", $ConstructionMaterials) ? 'checked' : ''; ?>>
                    <span>Synthetic Stucco</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Unknown" <?php echo in_array("Unknown", $ConstructionMaterials) ? 'checked' : ''; ?>>
                    <span>Unknown</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Aluminum Siding" <?php echo in_array("Aluminum Siding", $ConstructionMaterials) ? 'checked' : ''; ?>>
                    <span>Aluminum Siding</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Brick" <?php echo in_array("Brick", $ConstructionMaterials) ? 'checked' : ''; ?>>
                    <span>Brick</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Clapboard" <?php echo in_array("Clapboard", $ConstructionMaterials) ? 'checked' : ''; ?>>
                    <span>Clapboard</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Concrete" <?php echo in_array("Concrete", $ConstructionMaterials) ? 'checked' : ''; ?>>
                    <span>Concrete</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Ducts Professionally Air-Sealed" <?php echo in_array("Ducts Professionally Air-Sealed", $ConstructionMaterials) ? 'checked' : ''; ?>>
                    <span>Ducts Professionally Air-Sealed</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Foam Insulation" <?php echo in_array("Foam Insulation", $ConstructionMaterials) ? 'checked' : ''; ?>>
                    <span>Foam Insulation</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="HardiPlank Type" <?php echo in_array("HardiPlank Type", $ConstructionMaterials) ? 'checked' : ''; ?>>
                    <span>HardiPlank Type</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Log Siding" <?php echo in_array("Log Siding", $ConstructionMaterials) ? 'checked' : ''; ?>>
                    <span>Log Siding</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Natural Building" <?php echo in_array("Natural Building", $ConstructionMaterials) ? 'checked' : ''; ?>>
                    <span>Natural Building</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Slump Block" <?php echo in_array("Slump Block", $ConstructionMaterials) ? 'checked' : ''; ?>>
                    <span>Slump Block</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Stone" <?php echo in_array("Stone", $ConstructionMaterials) ? 'checked' : ''; ?>>
                    <span>Stone</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Stone Veneer" <?php echo in_array("Stone Veneer", $ConstructionMaterials) ? 'checked' : ''; ?>>
                    <span>Stone Veneer</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Vinyl Siding" <?php echo in_array("Vinyl Siding", $ConstructionMaterials) ? 'checked' : ''; ?>>
                    <span>Vinyl Siding</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Batts Insulation" <?php echo in_array("Batts Insulation", $ConstructionMaterials) ? 'checked' : ''; ?>>
                    <span>Batts Insulation</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Board & Batten Siding" <?php echo in_array("Board & Batten Siding", $ConstructionMaterials) ? 'checked' : ''; ?>>
                    <span>Board & Batten Siding</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Cedar" <?php echo in_array("Cedar", $ConstructionMaterials) ? 'checked' : ''; ?>>
                    <span>Cedar</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Cement Siding" <?php echo in_array("Cement Siding", $ConstructionMaterials) ? 'checked' : ''; ?>>
                    <span>Cement Siding</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Exterior Duct-Work is Insulated" <?php echo in_array("Exterior Duct-Work is Insulated", $ConstructionMaterials) ? 'checked' : ''; ?>>
                    <span>Exterior Duct-Work is Insulated</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Low VOC Insulation" <?php echo in_array("Low VOC Insulation", $ConstructionMaterials) ? 'checked' : ''; ?>>
                    <span>Low VOC Insulation</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Masonite" <?php echo in_array("Masonite", $ConstructionMaterials) ? 'checked' : ''; ?>>
                    <span>Masonite</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Metal Siding" <?php echo in_array("Metal Siding", $ConstructionMaterials) ? 'checked' : ''; ?>>
                    <span>Metal Siding</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Other" <?php echo in_array("Other", $ConstructionMaterials) ? 'checked' : ''; ?>>
                    <span>Other</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Plaster" <?php echo in_array("Plaster", $ConstructionMaterials) ? 'checked' : ''; ?>>
                    <span>Plaster</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Radiant Barrier" <?php echo in_array("Radiant Barrier", $ConstructionMaterials) ? 'checked' : ''; ?>>
                    <span>Radiant Barrier</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Shake Siding" <?php echo in_array("Shake Siding", $ConstructionMaterials) ? 'checked' : ''; ?>>
                    <span>Shake Siding</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Shingle Siding" <?php echo in_array("Shingle Siding", $ConstructionMaterials) ? 'checked' : ''; ?>>
                    <span>Shingle Siding</span>
                </label>
                <label>
                    <input type="checkbox" name="ConstructionMaterials[]" value="Straw" <?php echo in_array("Straw", $ConstructionMaterials) ? 'checked' : ''; ?>>
                    <span>Straw</span>
                </label>

            </div>
        </div>



        <div>
            <h5>Roof Type</h5>
            <div class="inline-checkboxes">
                <label>
                    <input type="checkbox" name="Roof[]" value="Composition" <?php echo in_array("Composition", $Roof) ? 'checked' : ''; ?>>
                    <span>Composition</span>
                </label>
                <label>
                    <input type="checkbox" name="Roof[]" value="Metal" <?php echo in_array("Metal", $Roof) ? 'checked' : ''; ?>>
                    <span>Metal</span>
                </label>
                <label>
                    <input type="checkbox" name="Roof[]" value="Shake" <?php echo in_array("Shake", $Roof) ? 'checked' : ''; ?>>
                    <span>Shake</span>
                </label>
                <label>
                    <input type="checkbox" name="Roof[]" value="Tile" <?php echo in_array("Tile", $Roof) ? 'checked' : ''; ?>>
                    <span>Tile</span>
                </label>
                <label>
                    <input type="checkbox" name="Roof[]" value="Rubber" <?php echo in_array("Rubber", $Roof) ? 'checked' : ''; ?>>
                    <span>Rubber</span>
                </label>
                <label>
                    <input type="checkbox" name="Roof[]" value="Rolled Comp" <?php echo in_array("Rolled Comp", $Roof) ? 'checked' : ''; ?>>
                    <span>Rolled Comp</span>
                </label>
            </div>
        </div>



        <div>
            <h5>Exterior Features</h5>
            <div class="inline-checkboxes">
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Balcony" <?php echo in_array("Balcony", $ExteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Balcony</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Kennel" <?php echo in_array("Kennel", $ExteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Kennel</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Lighting" <?php echo in_array("Lighting", $ExteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Lighting</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Outdoor Shower" <?php echo in_array("Outdoor Shower", $ExteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Outdoor Shower</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Private Entrance" <?php echo in_array("Private Entrance", $ExteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Private Entrance</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Uncovered Courtyard" <?php echo in_array("Uncovered Courtyard", $ExteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Uncovered Courtyard</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Dock" <?php echo in_array("Dock", $ExteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Dock</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Misting System" <?php echo in_array("Misting System", $ExteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Misting System</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Outdoor Kitchen" <?php echo in_array("Outdoor Kitchen", $ExteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Outdoor Kitchen</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Playground" <?php echo in_array("Playground", $ExteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Playground</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Private Yard" <?php echo in_array("Private Yard", $ExteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Private Yard</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Rain Gutters" <?php echo in_array("Rain Gutters", $ExteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Rain Gutters</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="RV Hookup" <?php echo in_array("RV Hookup", $ExteriorFeatures) ? 'checked' : ''; ?>>
                    <span>RV Hookup</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Awning(s)" <?php echo in_array("Awning(s)", $ExteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Awning(s)</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Barbecue" <?php echo in_array("Barbecue", $ExteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Barbecue</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Basketball Court" <?php echo in_array("Basketball Court", $ExteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Basketball Court</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Boat Slip" <?php echo in_array("Boat Slip", $ExteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Boat Slip</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Built-in Barbecue" <?php echo in_array("Built-in Barbecue", $ExteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Built-in Barbecue</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Courtyard" <?php echo in_array("Courtyard", $ExteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Courtyard</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Covered Courtyard" <?php echo in_array("Covered Courtyard", $ExteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Covered Courtyard</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Dog Run" <?php echo in_array("Dog Run", $ExteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Dog Run</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Electric Grill" <?php echo in_array("Electric Grill", $ExteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Electric Grill</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Other" <?php echo in_array("Other", $ExteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Other</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Permeable Paving" <?php echo in_array("Permeable Paving", $ExteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Permeable Paving</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Storage" <?php echo in_array("Storage", $ExteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Storage</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Tennis Court(s)" <?php echo in_array("Tennis Court(s)", $ExteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Tennis Court(s)</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Fire Pit" <?php echo in_array("Fire Pit", $ExteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Fire Pit</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Garden" <?php echo in_array("Garden", $ExteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Garden</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Gas Grill" <?php echo in_array("Gas Grill", $ExteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Gas Grill</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Gray Water System" <?php echo in_array("Gray Water System", $ExteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Gray Water System</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="None" <?php echo in_array("None", $ExteriorFeatures) ? 'checked' : ''; ?>>
                    <span>None</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Outdoor Grill" <?php echo in_array("Outdoor Grill", $ExteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Outdoor Grill</span>
                </label>
                <label>
                    <input type="checkbox" name="ExteriorFeatures[]" value="Rain Barrel/Cistern(s)" <?php echo in_array("Rain Barrel/Cistern(s)", $ExteriorFeatures) ? 'checked' : ''; ?>>
                    <span>Rain Barrel/Cistern(s)</span>
                </label>

            </div>
        </div>



        <div>
            <h5>Pool</h5>
            <div class="inline-radiofields">
                <label>
                    <input type="radio" name="PoolPrivateYN" value="true" <?php echo $PoolPrivateYN == true ? 'checked' : '' ?>>
                    <span>True</span>
                </label>
                <label>
                    <input type="radio" name="PoolPrivateYN" value="false" <?php echo $PoolPrivateYN == false ? 'checked' : '' ?>>
                    <span>False</span>
                </label>
            </div>
        </div>



        <!-- Location Information -->
        <h2>Location Information</h2>

        <div>
            <label for="StreetNumber">Street Number</label>
            <input type="text" name="StreetNumber" value="<?php echo $StreetNumber; ?>">
        </div>

        <div>
            <label for="StreetDirPrefix">Street Dir Prefix</label>
            <select name="StreetDirPrefix" id="StreetDirPrefix">
                <option value="N" <?php echo $StreetDirPrefix == "N" ? "selected" : ''; ?>>N</option>
                <option value="NE" <?php echo $StreetDirPrefix == "NE" ? "selected" : ''; ?>>NE</option>
                <option value="NW" <?php echo $StreetDirPrefix == "NW" ? "selected" : ''; ?>>NW</option>
                <option value="E" <?php echo $StreetDirPrefix == "E" ? "selected" : ''; ?>>E</option>
                <option value="S" <?php echo $StreetDirPrefix == "S" ? "selected" : ''; ?>>S</option>
                <option value="SE" <?php echo $StreetDirPrefix == "SE" ? "selected" : ''; ?>>SE</option>
                <option value="SW" <?php echo $StreetDirPrefix == "SW" ? "selected" : ''; ?>>SW</option>
                <option value="W" <?php echo $StreetDirPrefix == "W" ? "selected" : ''; ?>>W</option>
            </select>

        </div>

        <div>
            <label for="StreetName">Street Name</label>
            <input type="text" name="StreetName" value="<?php echo $StreetName; ?>">
        </div>

        <div>
            <label for="StreetSuffix">Street Suffix</label>
            <input type="text" name="StreetSuffix" value="<?php echo $StreetSuffix; ?>">
        </div>


        <div>
            <label for="City">City</label>
            <input type="text" name="City" value="<?php echo $StreetSuffix; ?>">
        </div>

        <div>
            <label for="StateOrProvince">State</label>
            <select name="StateOrProvince" id="StateOrProvince">
                <option value="AB" <?php echo $StateOrProvince == "AB" ? "selected" : ''; ?>>AB</option>
                <option value="AK" <?php echo $StateOrProvince == "AK" ? "selected" : ''; ?>>AK</option>
                <option value="AL" <?php echo $StateOrProvince == "AL" ? "selected" : ''; ?>>AL</option>
                <option value="AR" <?php echo $StateOrProvince == "AR" ? "selected" : ''; ?>>AR</option>
                <option value="AZ" <?php echo $StateOrProvince == "AZ" ? "selected" : ''; ?>>AZ</option>
                <option value="BC" <?php echo $StateOrProvince == "BC" ? "selected" : ''; ?>>BC</option>
                <option value="CA" <?php echo $StateOrProvince == "CA" ? "selected" : ''; ?>>CA</option>
                <option value="CO" <?php echo $StateOrProvince == "CO" ? "selected" : ''; ?>>CO</option>
                <option value="CT" <?php echo $StateOrProvince == "CT" ? "selected" : ''; ?>>CT</option>
                <option value="DC" <?php echo $StateOrProvince == "DC" ? "selected" : ''; ?>>DC</option>
                <option value="DE" <?php echo $StateOrProvince == "DE" ? "selected" : ''; ?>>DE</option>
                <option value="FL" <?php echo $StateOrProvince == "FL" ? "selected" : ''; ?>>FL</option>
                <option value="GA" <?php echo $StateOrProvince == "GA" ? "selected" : ''; ?>>GA</option>
                <option value="HI" <?php echo $StateOrProvince == "HI" ? "selected" : ''; ?>>HI</option>
                <option value="IA" <?php echo $StateOrProvince == "IA" ? "selected" : ''; ?>>IA</option>
                <option value="ID" <?php echo $StateOrProvince == "ID" ? "selected" : ''; ?>>ID</option>
                <option value="IL" <?php echo $StateOrProvince == "IL" ? "selected" : ''; ?>>IL</option>
                <option value="IN" <?php echo $StateOrProvince == "IN" ? "selected" : ''; ?>>IN</option>
                <option value="KS" <?php echo $StateOrProvince == "KS" ? "selected" : ''; ?>>KS</option>
                <option value="KY" <?php echo $StateOrProvince == "KY" ? "selected" : ''; ?>>KY</option>
                <option value="LA" <?php echo $StateOrProvince == "LA" ? "selected" : ''; ?>>LA</option>
                <option value="MA" <?php echo $StateOrProvince == "MA" ? "selected" : ''; ?>>MA</option>
                <option value="MB" <?php echo $StateOrProvince == "MB" ? "selected" : ''; ?>>MB</option>
                <option value="MD" <?php echo $StateOrProvince == "MD" ? "selected" : ''; ?>>MD</option>
                <option value="ME" <?php echo $StateOrProvince == "ME" ? "selected" : ''; ?>>ME</option>
                <option value="MI" <?php echo $StateOrProvince == "MI" ? "selected" : ''; ?>>MI</option>
                <option value="MN" <?php echo $StateOrProvince == "MN" ? "selected" : ''; ?>>MN</option>
                <option value="MO" <?php echo $StateOrProvince == "MO" ? "selected" : ''; ?>>MO</option>
                <option value="MS" <?php echo $StateOrProvince == "MS" ? "selected" : ''; ?>>MS</option>
                <option value="MT" <?php echo $StateOrProvince == "MT" ? "selected" : ''; ?>>MT</option>
                <option value="NB" <?php echo $StateOrProvince == "NB" ? "selected" : ''; ?>>NB</option>
                <option value="NC" <?php echo $StateOrProvince == "NC" ? "selected" : ''; ?>>NC</option>
                <option value="ND" <?php echo $StateOrProvince == "ND" ? "selected" : ''; ?>>ND</option>
                <option value="NE" <?php echo $StateOrProvince == "NE" ? "selected" : ''; ?>>NE</option>
                <option value="NF" <?php echo $StateOrProvince == "NF" ? "selected" : ''; ?>>NF</option>
                <option value="NH" <?php echo $StateOrProvince == "NH" ? "selected" : ''; ?>>NH</option>
                <option value="NJ" <?php echo $StateOrProvince == "NJ" ? "selected" : ''; ?>>NJ</option>
                <option value="NM" <?php echo $StateOrProvince == "NM" ? "selected" : ''; ?>>NM</option>
                <option value="NS" <?php echo $StateOrProvince == "NS" ? "selected" : ''; ?>>NS</option>
                <option value="NT" <?php echo $StateOrProvince == "NT" ? "selected" : ''; ?>>NT</option>
                <option value="NU" <?php echo $StateOrProvince == "NU" ? "selected" : ''; ?>>NU</option>
                <option value="NV" <?php echo $StateOrProvince == "NV" ? "selected" : ''; ?>>NV</option>
                <option value="NY" <?php echo $StateOrProvince == "NY" ? "selected" : ''; ?>>NY</option>
                <option value="OH" <?php echo $StateOrProvince == "OH" ? "selected" : ''; ?>>OH</option>
                <option value="OK" <?php echo $StateOrProvince == "OK" ? "selected" : ''; ?>>OK</option>
                <option value="ON" <?php echo $StateOrProvince == "ON" ? "selected" : ''; ?>>ON</option>
                <option value="OR" <?php echo $StateOrProvince == "OR" ? "selected" : ''; ?>>OR</option>
                <option value="PA" <?php echo $StateOrProvince == "PA" ? "selected" : ''; ?>>PA</option>
                <option value="PE" <?php echo $StateOrProvince == "PE" ? "selected" : ''; ?>>PE</option>
                <option value="QC" <?php echo $StateOrProvince == "QC" ? "selected" : ''; ?>>QC</option>
                <option value="RI" <?php echo $StateOrProvince == "RI" ? "selected" : ''; ?>>RI</option>
                <option value="SC" <?php echo $StateOrProvince == "SC" ? "selected" : ''; ?>>SC</option>
                <option value="SD" <?php echo $StateOrProvince == "SD" ? "selected" : ''; ?>>SD</option>
                <option value="SK" <?php echo $StateOrProvince == "SK" ? "selected" : ''; ?>>SK</option>
                <option value="TN" <?php echo $StateOrProvince == "TN" ? "selected" : ''; ?>>TN</option>
                <option value="TX" <?php echo $StateOrProvince == "TX" ? "selected" : ''; ?>>TX</option>
                <option value="UT" <?php echo $StateOrProvince == "UT" ? "selected" : ''; ?>>UT</option>
                <option value="VA" <?php echo $StateOrProvince == "VA" ? "selected" : ''; ?>>VA</option>
                <option value="VI" <?php echo $StateOrProvince == "VI" ? "selected" : ''; ?>>VI</option>
                <option value="VT" <?php echo $StateOrProvince == "VT" ? "selected" : ''; ?>>VT</option>
                <option value="WA" <?php echo $StateOrProvince == "WA" ? "selected" : ''; ?>>WA</option>
                <option value="WI" <?php echo $StateOrProvince == "WI" ? "selected" : ''; ?>>WI</option>
                <option value="WV" <?php echo $StateOrProvince == "WV" ? "selected" : ''; ?>>WV</option>
                <option value="WY" <?php echo $StateOrProvince == "WY" ? "selected" : ''; ?>>WY</option>
                <option value="YT" <?php echo $StateOrProvince == "YT" ? "selected" : ''; ?>>YT</option>
            </select>

        </div>

        <div>
            <label for="PostalCode">ZIP Code</label>
            <input type="text" name="PostalCode" value="<?php echo $PostalCode; ?>">
        </div>

        <div>
            <label for="SubdivisionName">Neighborhood</label>
            <input type="text" name="SubdivisionName" value="<?php echo $SubdivisionName; ?>">
        </div>

        <div>
            <label for="HighSchoolDistrict">School District</label>
            <input type="text" name="HighSchoolDistrict" value="<?php echo $HighSchoolDistrict; ?>">
        </div>

        <div>
            <label for="ElementarySchool">Elementary School</label>
            <input type="text" name="ElementarySchool" value="<?php echo $ElementarySchool; ?>">
        </div>

        <div>
            <label for="MiddleOrJuniorSchool">Middle School</label>
            <input type="text" name="MiddleOrJuniorSchool" value="<?php echo $MiddleOrJuniorSchool; ?>">
        </div>

        <div>
            <label for="HighSchool">High School</label>
            <input type="text" name="HighSchool" value="<?php echo $HighSchool; ?>">
        </div>

        <!-- Listing Information -->
        <h2>Listing Information</h2>

        <div>
            <label for="ListingContractDate">Listing Date</label>
            <input type="date" name="ListingContractDate" value="<?php echo date('Y-m-d', strtotime($ListingContractDate)); ?>">
        </div>


        <div>
            <label for="ListAgentFullName">List Agent FullName</label>
            <input type="text" name="ListAgentFullName" value="<?php echo $ListAgentFullName; ?>">
        </div>



        <div>
            <label for="ListAgentEmail">List Agent Email</label>
            <input type="text" name="ListAgentEmail" value="<?php echo $ListAgentEmail; ?>">
        </div>
        
        <div>
            <label for="ListAgentOfficePhone">List Agent Phone</label>
            <input type="text" name="ListAgentOfficePhone" value="<?php echo $ListAgentOfficePhone; ?>">
        </div>

        <div>
            <label for="ListAgentMobilePhone">List Agent Mobile Phone</label>
            <input type="text" name="ListAgentMobilePhone" value="<?php echo $ListAgentMobilePhone; ?>">
        </div>

        <div>
            <label for="OpenHouseModificationTimestamp">Open House</label>
            <input type="date" name="OpenHouseModificationTimestamp" value="<?php echo date('Y-m-d', strtotime($OpenHouseModificationTimestamp)); ?>">
        </div>

        <div>
            <label for="VirtualTourURLBranded">Virtual Tour URL Branded</label>
            <input type="text" name="VirtualTourURLBranded" value="<?php echo $VirtualTourURLBranded; ?>">
        </div>

        <div>
            <label for="VirtualTourURLUnbranded">Virtual Tour URL Unbranded</label>
            <input type="text" name="VirtualTourURLUnbranded" value="<?php echo $VirtualTourURLUnbranded; ?>">
        </div>

        <!-- Additional Information -->
        <h2>Additional Information</h2>

        <div>
            <label for="PublicRemarks">Property Description</label>
            <textarea name="PublicRemarks"><?php echo $PublicRemarks; ?></textarea>
        </div>



        <button type="submit">Update Property</button>
    </form>

    <h2 id="media">Media</h2>



    <form method="POST" class="nexus-mls-form">
        <div class="upload-field">
            <label for="Media">Photos</label>
            <input type="file" name="Media" id="mediaFiles" multiple accept="image/*" required>
            <div id="uploadPreview">
                <?php foreach($oldMediaItems as $item): ?>
                    <div class="preview-item">

                    <input type="checkbox" 
                                   name="Media[]" 
                                   value="${url}" 
                                   id="media_${index}"
                                   checked>
                            <label for="media_${index}">
                                <img src="<?php echo $item['MediaURL'] ?>" width="100" alt="Preview">
                            </label>
                            <a type="button" class="remove-image" href="?tab=all-listings&listing=<?php echo $listing; ?>&deleteMedia=<?php echo $item['MediaKey'] ?>#media">Remove</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <button type="submit">Upload Photos</button>
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


                    <?php
                }
            } else {
                echo json_encode(["error" => "Invalid JSON response"]);
            }
        }
        
        
?>

<?php endif; ?>