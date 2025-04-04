<?php

//Get existing listing data

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.nexusmls.io/Property('$listing')/Rooms",
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

$listingRooms = json_decode($response, true);

$rooms = $listingRooms['value'];

$OwnersBedroom = null;
$Bedroom1 = null;
$Bedroom2 = null;
$Bedroom3 = null;
$Bedroom4 = null;
$Bedroom5 = null;
$DiningRoom = null;
$Basement = null;
$Den = null;
$FamilyRoom = null;
$GameRoom = null;
$GreatRoom = null;
$Gym = null;
$Kitchen = null;
$Laundry = null;
$Library = null;
$LivingRoom = null;
$Loft = null;
$MediaRoom = null;
$Office = null;
$Sauna = null;
$UtilityRoom = null;
$Workshop = null;


foreach ($rooms as $room) {
    if($room['RoomType'] == "Owner's Bedroom"){
        $OwnersBedroom = $room;
    }else if($room['RoomType'] == "Bedroom 1"){
        $Bedroom1 = $room;
    }else if($room['RoomType'] == "Bedroom 2"){
        $Bedroom2 = $room;
    }else if($room['RoomType'] == "Bedroom 3"){
        $Bedroom3 = $room;
    }else if($room['RoomType'] == "Bedroom 4"){
        $Bedroom4 = $room;
    }else if($room['RoomType'] == "Bedroom 5"){
        $Bedroom5 = $room;
    }else if($room['RoomType'] == "Dining Room"){
        $DiningRoom = $room;
    }else if($room['RoomType'] == "Basement"){
        $Basement = $room;
    }else if($room['RoomType'] == "Den"){
        $Den = $room;
    }else if($room['RoomType'] == "Family Room"){
        $FamilyRoom = $room;
    }else if($room['RoomType'] == "Game Room"){
        $GameRoom = $room;
    }else if($room['RoomType'] == "Great Room"){
        $GreatRoom = $room;
    }else if($room['RoomType'] == "Gym"){
        $Gym = $room;
    }else if($room['RoomType'] == "Kitchen"){
        $Kitchen = $room;
    }else if($room['RoomType'] == "Laundry"){
        $Laundry = $room;
    }else if($room['RoomType'] == "Library"){
        $Library = $room;
    }else if($room['RoomType'] == "Living Room"){
        $LivingRoom = $room;
    }else if($room['RoomType'] == "Loft"){
        $Loft = $room;
    }else if($room['RoomType'] == "Media Room"){
        $MediaRoom = $room;
    }else if($room['RoomType'] == "Office"){
        $Office = $room;
    }else if($room['RoomType'] == "Sauna"){
        $Sauna = $room;
    }else if($room['RoomType'] == "Utility Room"){
        $UtilityRoom = $room;
    }else if($room['RoomType'] == "Workshop"){
        $Workshop = $room;
    }

}

// echo '<pre>';
// var_dump($ownersRoom);
// echo '</pre>';

// if ($err) {
//   echo "cURL Error #:" . $err;
// } else {
//     echo '<pre>';
//       var_Dump($listingRooms);
//     echo '</pre>';
// }