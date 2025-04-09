<?php

//Delete open house
$curl = curl_init();
foreach($OpenHouses as $OpenHouse){
    // echo 'Deleting old rooms';
    
    curl_setopt_array($curl, [
        CURLOPT_URL => "https://api.nexusmls.io/OpenHouse('{$OpenHouse['OpenHouseKey']}')",
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
    
    
    
    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        // echo 'Room deleted successfully';
    }
}

curl_close($curl);