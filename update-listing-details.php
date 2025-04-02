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
        'GarageYN',
        'CarportYN',
        'OpenParkingYN',
        'HeatingYN',
        'CoolingYN',
        'ElectricOnPropertyYN',
        'PoolPrivateYN',
        'SpaYN',
        'FireplaceYN',
        'WaterfrontYN',
        'PowerProductionYN',
        'AssociationYN',
        'CommunityStyleYN',
        'HomeWarrantyYN',
    ];

    // Loop through each field and set its value to true or false
    foreach ($booleanFields as $field) {
        $formData[$field] = isset($formData[$field]) ? true : false;
    }

    // Convert the Concessions field to Yes or No
    if(isset($formData['Concessions'])) {
        $formData['Concessions'] = 'Yes';
    } else {
        $formData['Concessions'] = 'No'; // Default to No if not set
    }


    var_dump($formData); // Debugging line to check the form data

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