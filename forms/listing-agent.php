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

    <h2>Listing Information</h2>

    <div>
        <label for="ListPrice">List Price</label>
        <input type="text" id="ListPrice" name="ListPrice" value="<?php echo $listingData['ListPrice']; ?>">
    </div>

    <div>
        <label for="Exclusions">Exclusions</label>
        <input type="text" id="Exclusions" name="Exclusions" value="<?php echo $listingData['Exclusions']; ?>">
    </div>

    <div>
        <label for="Inclusions">Inclusions</label>
        <input type="text" id="Inclusions" name="Inclusions" value="<?php echo $listingData['Inclusions']; ?>">
    </div>


    <div>
        <label for="Concessions" style="font-size: 18px; font-weight: 700;">
            <input type="checkbox" id="Concessions" name="Concessions" value="Yes" <?php echo $listingData['Concessions'] == 'Yes' ? 'checked' : ''; ?>>
            Concessions
        </label>
    </div>

    <div class="Concessions-fields" style="display: <?php echo $listingData['Concessions'] ? 'block' : 'none'; ?>; margin-bottom: 20px;">
        <input type="text" id="BuyerBrokerageCompensation" name="BuyerBrokerageCompensation" placeholder="Amount" value="<?php echo $listingData['BuyerBrokerageCompensation']; ?>">
        <select name="BuyerBrokerageCompensationType">
            <option value="">Select Type</option>
            <option value="$" <?php echo $listingData['BuyerBrokerageCompensationType'] == '$' ? 'selected' : ''; ?>>$</option>
            <option value="%" <?php echo $listingData['BuyerBrokerageCompensationType'] == '%' ? 'selected' : ''; ?>>%</option>
            <option value="Other" <?php echo $listingData['BuyerBrokerageCompensationType'] == 'Other' ? 'selected' : ''; ?>>Other</option>
            <option value="See Remarks" <?php echo $listingData['BuyerBrokerageCompensationType'] == 'See Remarks' ? 'selected' : ''; ?>>See Remarks</option>
        </select>
    </div>

    <div>
        <h5>Listing Terms</h5>
        <div class="inline-checkboxes">

        <label>
            <input type="checkbox" name="ListingTerms[]" value="1031 Exchange" <?php echo in_array('1031 Exchange', $listingData['ListingTerms']) ? 'checked' : ''; ?>>
            <span>1031 Exchange</span>
        </label>

        <label>
            <input type="checkbox" name="ListingTerms[]" value="All Inclusive Trust Deed" <?php echo in_array('All Inclusive Trust Deed', $listingData['ListingTerms']) ? 'checked' : ''; ?>>
            <span>All Inclusive Trust Deed</span>
        </label>

        <label>
            <input type="checkbox" name="ListingTerms[]" value="Assumable" <?php echo in_array('Assumable', $listingData['ListingTerms']) ? 'checked' : ''; ?>>
            <span>Assumable</span>
        </label>

        <label>
            <input type="checkbox" name="ListingTerms[]" value="Cash" <?php echo in_array('Cash', $listingData['ListingTerms']) ? 'checked' : ''; ?>>
            <span>Cash</span>
        </label>

        <label>
            <input type="checkbox" name="ListingTerms[]" value="Contract" <?php echo in_array('Contract', $listingData['ListingTerms']) ? 'checked' : ''; ?>>
            <span>Contract</span>
        </label>

        <label>
            <input type="checkbox" name="ListingTerms[]" value="Conventional" <?php echo in_array('Conventional', $listingData['ListingTerms']) ? 'checked' : ''; ?>>
            <span>Conventional</span>
        </label>

        <label>
            <input type="checkbox" name="ListingTerms[]" value="Existing Bonds" <?php echo in_array('Existing Bonds', $listingData['ListingTerms']) ? 'checked' : ''; ?>>
            <span>Existing Bonds</span>
        </label>

        <label>
            <input type="checkbox" name="ListingTerms[]" value="FHA" <?php echo in_array('FHA', $listingData['ListingTerms']) ? 'checked' : ''; ?>>
            <span>FHA</span>
        </label>

        <label>
            <input type="checkbox" name="ListingTerms[]" value="Land Use Fee" <?php echo in_array('Land Use Fee', $listingData['ListingTerms']) ? 'checked' : ''; ?>>
            <span>Land Use Fee</span>
        </label>

        <label>
            <input type="checkbox" name="ListingTerms[]" value="Lease Back" <?php echo in_array('Lease Back', $listingData['ListingTerms']) ? 'checked' : ''; ?>>
            <span>Lease Back</span>
        </label>

        <label>
            <input type="checkbox" name="ListingTerms[]" value="Lease Option" <?php echo in_array('Lease Option', $listingData['ListingTerms']) ? 'checked' : ''; ?>>
            <span>Lease Option</span>
        </label>

        <label>
            <input type="checkbox" name="ListingTerms[]" value="Lease Purchase" <?php echo in_array('Lease Purchase', $listingData['ListingTerms']) ? 'checked' : ''; ?>>
            <span>Lease Purchase</span>
        </label>

        <label>
            <input type="checkbox" name="ListingTerms[]" value="Lien Release" <?php echo in_array('Lien Release', $listingData['ListingTerms']) ? 'checked' : ''; ?>>
            <span>Lien Release</span>
        </label>

        <label>
            <input type="checkbox" name="ListingTerms[]" value="Owner May Carry" <?php echo in_array('Owner May Carry', $listingData['ListingTerms']) ? 'checked' : ''; ?>>
            <span>Owner May Carry</span>
        </label>

        <label>
            <input type="checkbox" name="ListingTerms[]" value="Owner Pay Points" <?php echo in_array('Owner Pay Points', $listingData['ListingTerms']) ? 'checked' : ''; ?>>
            <span>Owner Pay Points</span>
        </label>

        <label>
            <input type="checkbox" name="ListingTerms[]" value="Owner Will Carry" <?php echo in_array('Owner Will Carry', $listingData['ListingTerms']) ? 'checked' : ''; ?>>
            <span>Owner Will Carry</span>
        </label>

        <label>
            <input type="checkbox" name="ListingTerms[]" value="Private Financing Available" <?php echo in_array('Private Financing Available', $listingData['ListingTerms']) ? 'checked' : ''; ?>>
            <span>Private Financing Available</span>
        </label>

        <label>
            <input type="checkbox" name="ListingTerms[]" value="Relocation Property" <?php echo in_array('Relocation Property', $listingData['ListingTerms']) ? 'checked' : ''; ?>>
            <span>Relocation Property</span>
        </label>

        <label>
            <input type="checkbox" name="ListingTerms[]" value="Seller Equity Share" <?php echo in_array('Seller Equity Share', $listingData['ListingTerms']) ? 'checked' : ''; ?>>
            <span>Seller Equity Share</span>
        </label>

        <label>
            <input type="checkbox" name="ListingTerms[]" value="Special Funding" <?php echo in_array('Special Funding', $listingData['ListingTerms']) ? 'checked' : ''; ?>>
            <span>Special Funding</span>
        </label>

        <label>
            <input type="checkbox" name="ListingTerms[]" value="Submit" <?php echo in_array('Submit', $listingData['ListingTerms']) ? 'checked' : ''; ?>>
            <span>Submit</span>
        </label>

        <label>
            <input type="checkbox" name="ListingTerms[]" value="Trade" <?php echo in_array('Trade', $listingData['ListingTerms']) ? 'checked' : ''; ?>>
            <span>Trade</span>
        </label>

        <label>
            <input type="checkbox" name="ListingTerms[]" value="Trust Conveyance" <?php echo in_array('Trust Conveyance', $listingData['ListingTerms']) ? 'checked' : ''; ?>>
            <span>Trust Conveyance</span>
        </label>

        <label>
            <input type="checkbox" name="ListingTerms[]" value="Trust Deed" <?php echo in_array('Trust Deed', $listingData['ListingTerms']) ? 'checked' : ''; ?>>
            <span>Trust Deed</span>
        </label>

        <label>
            <input type="checkbox" name="ListingTerms[]" value="USDA Loan" <?php echo in_array('USDA Loan', $listingData['ListingTerms']) ? 'checked' : ''; ?>>
            <span>USDA Loan</span>
        </label>

        <label>
            <input type="checkbox" name="ListingTerms[]" value="VA Loan" <?php echo in_array('VA Loan', $listingData['ListingTerms']) ? 'checked' : ''; ?>>
            <span>VA Loan</span>
        </label>

        </div>
    </div>

    <div>
        <label for="HomeWarrantyYN" style="font-size: 18px; font-weight: 700;">
            <input type="checkbox" id="HomeWarrantyYN" name="HomeWarrantyYN" value="true" <?php echo $listingData['HomeWarrantyYN'] ? 'checked' : ''; ?>>
            Home Warranty
        </label>
    </div>

    <div class="HomeWarrantyYN-fields" style="display: <?php echo $listingData['HomeWarrantyYN'] ? 'block' : 'none'; ?>; margin-bottom: 20px;">
        <input type="text" id="HomeWarrantyRepresentative" name="HomeWarrantyRepresentative" value="<?php echo $listingData['HomeWarrantyRepresentative']; ?>" placeholder="Provider">
    </div>

    <div>
        <label for="PrivateRemarks">PrivateRemarks</label>
        <textarea id="PrivateRemarks" name="PrivateRemarks" rows="4" cols="50"><?php echo $listingData['PrivateRemarks']; ?></textarea>
    </div>

    <div>
        <label for="PublicRemarks">PublicRemarks</label>
        <textarea id="PublicRemarks" name="PublicRemarks" rows="4" cols="50"><?php echo $listingData['PublicRemarks']; ?></textarea>
    </div>

    <h2>Listing Contact/Agent</h2>

    <div>
        <label for="ListOfficeName">Listing Entity</label>
        <input type="text" id="ListOfficeName" name="ListOfficeName" value="<?php echo $listingData['ListOfficeName']; ?>">
    </div>

    <div>
        <label for="ListOfficePhone">Listing Entity Contact Phone</label>
        <input type="text" id="ListOfficePhone" name="ListOfficePhone" value="<?php echo $listingData['ListOfficePhone']; ?>">
    </div>

    <div>
        <label for="ListAgentFullName">Agent / Contact Full Name</label>
        <input type="text" id="ListAgentFullName" name="ListAgentFullName" value="<?php echo $listingData['ListAgentFullName']; ?>">
    </div>

    <div>
        <label for="ListAgentPreferredPhone">Agent / Contact Phone</label>
        <input type="text" id="ListAgentPreferredPhone" name="ListAgentPreferredPhone" value="<?php echo $listingData['ListAgentPreferredPhone']; ?>">
    </div>

    <div>
        <label for="ListAgentEmail">Agent / Contact Email</label>
        <input type="email" id="ListAgentEmail" name="ListAgentEmail" value="<?php echo $listingData['ListAgentEmail']; ?>">
    </div>

    <div>
        <label for="ListAgentStateLicense">Agent / Contact License</label>
        <input type="text" id="ListAgentStateLicense" name="ListAgentStateLicense" value="<?php echo $listingData['ListAgentStateLicense']; ?>">
    </div>

    <div>
        <label for="DefaultLeadsEmail">Default Leads Email</label>
        <input type="email" id="DefaultLeadsEmail" name="DefaultLeadsEmail" value="<?php echo $listingData['DefaultLeadsEmail']; ?>">
    </div>

    <button type="submit" style="margin-top: 20px;">Save Information</button>
</form>


<script>
    jQuery(document).ready(function($) {
        // Show or hide the Concessions fields based on the checkbox state
        $('#Concessions').change(function() {
            if ($(this).is(':checked')) {
                $('.Concessions-fields').show();
            } else {
                $('.Concessions-fields').hide();
            }
        });
        // Trigger change event on page load to set the initial state
        $('#Concessions').trigger('change');

        // Show or hide the Home Warranty fields based on the checkbox state
        $('#HomeWarrantyYN').change(function() {
            if ($(this).is(':checked')) {
                $('.HomeWarrantyYN-fields').show();
            } else {
                $('.HomeWarrantyYN-fields').hide();
            }
        });

        // Trigger change event on page load to set the initial state
        $('#HomeWarrantyYN').trigger('change');


    });
</script>