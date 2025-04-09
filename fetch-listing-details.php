<?php

//Get existing listing data

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.nexusmls.io/Property('$listing')",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => [
    "Authorization: Bearer $mlsApiKey",
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

$listingData = json_decode($response, true);

if ($err) {
  $listingData = array();
  echo "cURL Error #:" . $err;
} else {
  // $listingData = json_decode($response, true);
}