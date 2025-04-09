<?php

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.nexusmls.io/Property('$listing')/OpenHouse",
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

$OpenHouseData = json_decode($response, true);
$OpenHouses = $OpenHouseData['value'];

$startDateTime  = $OpenHouses[0]['OpenHouseStartTime'] ?? null;
$endDateTime  = $OpenHouses[0]['OpenHouseEndTime'] ?? null;
$dateTime  = $OpenHouses[0]['OpenHouseDate'] ?? null;

// Convert to DateTime objects
$startDT = new DateTime($startDateTime);
$endDT = new DateTime($endDateTime);
$dateDT = new DateTime($dateTime);

// Format for the input fields
$startTime = $startDT->format('H:i');  // Format for time input: HH:MM
$endTime = $endDT->format('H:i');      // Format for time input: HH:MM
$date = $dateDT->format('Y-m-d');      // Format for date input: YYYY-MM-DD

// echo '<pre>';
// var_dump($OpenHouses);
// echo '</pre>';