<?php

require_once plugin_dir_path(__FILE__) . '../fetch-room-details.php';
$updateBathroomURL = home_url('/wp-json/my-plugin/v1/update-number-of-bathrooms');

// Handle form submission
if (isset($_POST['resourseKey'])) {
    // Get the resource key
    $resourceKey = $_POST['resourseKey'];

    //Update Rooms


    $curl = curl_init();
    foreach($rooms as $room){
        // echo 'Deleting old rooms';
        
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.nexusmls.io/PropertyRooms('{$room['RoomKey']}')",
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
    
    // Initialize rooms array
    $newRooms = [];
    
    // Add Owner's Bedroom if checkbox is checked
    if (isset($_POST['OwnersBedroomYN']) && $_POST['OwnersBedroomYN'] == 'true') {
        array_push($newRooms, [
            'RoomType' => "Owner's Bedroom",
            'BedroomClosetType' => isset($_POST['OwnersBedroomClosetType']) ? $_POST['OwnersBedroomClosetType'] : '',
            'RoomLevel' => isset($_POST['OwnersBedroomRoomLevel']) ? $_POST['OwnersBedroomRoomLevel'] : '',
            'RoomLength' => isset($_POST['OwnersBedroomLength']) ? $_POST['OwnersBedroomLength'] : '',
            'RoomWidth' => isset($_POST['OwnersBedroomWidth']) ? $_POST['OwnersBedroomWidth'] : ''
        ]);

        //Update the $OwnersBedroom variable to reflect the new data
        $OwnersBedroom = [
            'RoomType' => "Owner's Bedroom",
            'BedroomClosetType' => isset($_POST['OwnersBedroomClosetType']) ? $_POST['OwnersBedroomClosetType'] : '',
            'RoomLevel' => isset($_POST['OwnersBedroomRoomLevel']) ? $_POST['OwnersBedroomRoomLevel'] : '',
            'RoomLength' => isset($_POST['OwnersBedroomLength']) ? $_POST['OwnersBedroomLength'] : '',
            'RoomWidth' => isset($_POST['OwnersBedroomWidth']) ? $_POST['OwnersBedroomWidth'] : ''
        ];
    }else{
        // If the checkbox is not checked, set $OwnersBedroom to null
        $OwnersBedroom = null;
    }
    
    // Add Bedroom 1 if checkbox is checked
    if (isset($_POST['Bedroom1YN']) && $_POST['Bedroom1YN'] == 'true') {
        array_push($newRooms, [
            'RoomType' => "Bedroom 1",
            'BedroomClosetType' => isset($_POST['Bedroom1ClosetType']) ? $_POST['Bedroom1ClosetType'] : '',
            'RoomLevel' => isset($_POST['Bedroom1RoomLevel']) ? $_POST['Bedroom1RoomLevel'] : '',
            'RoomLength' => isset($_POST['Bedroom1Length']) ? $_POST['Bedroom1Length'] : '',
            'RoomWidth' => isset($_POST['Bedroom1Width']) ? $_POST['Bedroom1Width'] : ''
        ]);

        //Update the $Bedroom1 variable to reflect the new data
        $Bedroom1 = [
            'RoomType' => "Bedroom 1",
            'BedroomClosetType' => isset($_POST['Bedroom1ClosetType']) ? $_POST['Bedroom1ClosetType'] : '',
            'RoomLevel' => isset($_POST['Bedroom1RoomLevel']) ? $_POST['Bedroom1RoomLevel'] : '',
            'RoomLength' => isset($_POST['Bedroom1Length']) ? $_POST['Bedroom1Length'] : '',
            'RoomWidth' => isset($_POST['Bedroom1Width']) ? $_POST['Bedroom1Width'] : ''
        ];
    }else{
        // If the checkbox is not checked, set $Bedroom1 to null
        $Bedroom1 = null;
    }

    // Add Bedroom 2 if checkbox is checked
    if (isset($_POST['Bedroom2YN']) && $_POST['Bedroom2YN'] == 'true') {
        array_push($newRooms, [
            'RoomType' => "Bedroom 2",
            'BedroomClosetType' => isset($_POST['Bedroom2ClosetType']) ? $_POST['Bedroom2ClosetType'] : '',
            'RoomLevel' => isset($_POST['Bedroom2RoomLevel']) ? $_POST['Bedroom2RoomLevel'] : '',
            'RoomLength' => isset($_POST['Bedroom2Length']) ? $_POST['Bedroom2Length'] : '',
            'RoomWidth' => isset($_POST['Bedroom2Width']) ? $_POST['Bedroom2Width'] : ''
        ]);

        //Update the $Bedroom2 variable to reflect the new data
        $Bedroom2 = [
            'RoomType' => "Bedroom 2",
            'BedroomClosetType' => isset($_POST['Bedroom2ClosetType']) ? $_POST['Bedroom2ClosetType'] : '',
            'RoomLevel' => isset($_POST['Bedroom2RoomLevel']) ? $_POST['Bedroom2RoomLevel'] : '',
            'RoomLength' => isset($_POST['Bedroom2Length']) ? $_POST['Bedroom2Length'] : '',
            'RoomWidth' => isset($_POST['Bedroom2Width']) ? $_POST['Bedroom2Width'] : ''
        ];
    }else{
        // If the checkbox is not checked, set $Bedroom2 to null
        $Bedroom2 = null;
    }

    // Add Bedroom 3 if checkbox is checked
    if (isset($_POST['Bedroom3YN']) && $_POST['Bedroom3YN'] == 'true') {
        array_push($newRooms, [
            'RoomType' => "Bedroom 3",
            'BedroomClosetType' => isset($_POST['Bedroom3ClosetType']) ? $_POST['Bedroom3ClosetType'] : '',
            'RoomLevel' => isset($_POST['Bedroom3RoomLevel']) ? $_POST['Bedroom3RoomLevel'] : '',
            'RoomLength' => isset($_POST['Bedroom3Length']) ? $_POST['Bedroom3Length'] : '',
            'RoomWidth' => isset($_POST['Bedroom3Width']) ? $_POST['Bedroom3Width'] : ''
        ]);

        //Update the $Bedroom3 variable to reflect the new data
        $Bedroom3 = [
            'RoomType' => "Bedroom 3",
            'BedroomClosetType' => isset($_POST['Bedroom3ClosetType']) ? $_POST['Bedroom3ClosetType'] : '',
            'RoomLevel' => isset($_POST['Bedroom3RoomLevel']) ? $_POST['Bedroom3RoomLevel'] : '',
            'RoomLength' => isset($_POST['Bedroom3Length']) ? $_POST['Bedroom3Length'] : '',
            'RoomWidth' => isset($_POST['Bedroom3Width']) ? $_POST['Bedroom3Width'] : ''
        ];

    }else{
        // If the checkbox is not checked, set $Bedroom3 to null
        $Bedroom3 = null;
    }

    // Add Bedroom 4 if checkbox is checked
    if (isset($_POST['Bedroom4YN']) && $_POST['Bedroom4YN'] == 'true') {
        array_push($newRooms, [
            'RoomType' => "Bedroom 4",
            'BedroomClosetType' => isset($_POST['Bedroom4ClosetType']) ? $_POST['Bedroom4ClosetType'] : '',
            'RoomLevel' => isset($_POST['Bedroom4RoomLevel']) ? $_POST['Bedroom4RoomLevel'] : '',
            'RoomLength' => isset($_POST['Bedroom4Length']) ? $_POST['Bedroom4Length'] : '',
            'RoomWidth' => isset($_POST['Bedroom4Width']) ? $_POST['Bedroom4Width'] : ''
        ]);

        //Update the $Bedroom4 variable to reflect the new data
        $Bedroom4 = [
            'RoomType' => "Bedroom 4",
            'BedroomClosetType' => isset($_POST['Bedroom4ClosetType']) ? $_POST['Bedroom4ClosetType'] : '',
            'RoomLevel' => isset($_POST['Bedroom4RoomLevel']) ? $_POST['Bedroom4RoomLevel'] : '',
            'RoomLength' => isset($_POST['Bedroom4Length']) ? $_POST['Bedroom4Length'] : '',
            'RoomWidth' => isset($_POST['Bedroom4Width']) ? $_POST['Bedroom4Width'] : ''
        ];
    }else{
        // If the checkbox is not checked, set $Bedroom4 to null
        $Bedroom4 = null;
    }

    // Add Bedroom 5 if checkbox is checked
    if (isset($_POST['Bedroom5YN']) && $_POST['Bedroom5YN'] == 'true') {
        array_push($newRooms, [
            'RoomType' => "Bedroom 5",
            'BedroomClosetType' => isset($_POST['Bedroom5ClosetType']) ? $_POST['Bedroom5ClosetType'] : '',
            'RoomLevel' => isset($_POST['Bedroom5RoomLevel']) ? $_POST['Bedroom5RoomLevel'] : '',
            'RoomLength' => isset($_POST['Bedroom5Length']) ? $_POST['Bedroom5Length'] : '',
            'RoomWidth' => isset($_POST['Bedroom5Width']) ? $_POST['Bedroom5Width'] : ''
        ]);

        //Update the $Bedroom5 variable to reflect the new data
        $Bedroom5 = [
            'RoomType' => "Bedroom 5",
            'BedroomClosetType' => isset($_POST['Bedroom5ClosetType']) ? $_POST['Bedroom5ClosetType'] : '',
            'RoomLevel' => isset($_POST['Bedroom5RoomLevel']) ? $_POST['Bedroom5RoomLevel'] : '',
            'RoomLength' => isset($_POST['Bedroom5Length']) ? $_POST['Bedroom5Length'] : '',
            'RoomWidth' => isset($_POST['Bedroom5Width']) ? $_POST['Bedroom5Width'] : ''
        ];
    }else{
        // If the checkbox is not checked, set $Bedroom5 to null
        $Bedroom5 = null;
    }

    // Add Dining Room if checkbox is checked
    if (isset($_POST['DiningRoomYN']) && $_POST['DiningRoomYN'] == 'true') {
        array_push($newRooms, [
            'RoomType' => "Dining Room",
            'BedroomClosetType' => isset($_POST['DiningRoomClosetType']) ? $_POST['DiningRoomClosetType'] : '',
            'RoomLevel' => isset($_POST['DiningRoomRoomLevel']) ? $_POST['DiningRoomRoomLevel'] : '',
            'RoomLength' => isset($_POST['DiningRoomLength']) ? $_POST['DiningRoomLength'] : '',
            'RoomWidth' => isset($_POST['DiningRoomWidth']) ? $_POST['DiningRoomWidth'] : ''
        ]);

        //Update the $DiningRoom variable to reflect the new data
        $DiningRoom = [
            'RoomType' => "Dining Room",
            'BedroomClosetType' => isset($_POST['DiningRoomClosetType']) ? $_POST['DiningRoomClosetType'] : '',
            'RoomLevel' => isset($_POST['DiningRoomRoomLevel']) ? $_POST['DiningRoomRoomLevel'] : '',
            'RoomLength' => isset($_POST['DiningRoomLength']) ? $_POST['DiningRoomLength'] : '',
            'RoomWidth' => isset($_POST['DiningRoomWidth']) ? $_POST['DiningRoomWidth'] : ''
        ];
    }else{
        // If the checkbox is not checked, set $DiningRoom to null
        $DiningRoom = null;
    }

    // Add Basement if checkbox is checked
    if (isset($_POST['BasementYN']) && $_POST['BasementYN'] == 'true') {
        array_push($newRooms, [
            'RoomType' => "Basement",
            'BedroomClosetType' => isset($_POST['BasementClosetType']) ? $_POST['BasementClosetType'] : '',
            'RoomLevel' => isset($_POST['BasementRoomLevel']) ? $_POST['BasementRoomLevel'] : '',
            'RoomLength' => isset($_POST['BasementLength']) ? $_POST['BasementLength'] : '',
            'RoomWidth' => isset($_POST['BasementWidth']) ? $_POST['BasementWidth'] : ''
        ]);

        //Update the $Basement variable to reflect the new data
        $Basement = [
            'RoomType' => "Basement",
            'BedroomClosetType' => isset($_POST['BasementClosetType']) ? $_POST['BasementClosetType'] : '',
            'RoomLevel' => isset($_POST['BasementRoomLevel']) ? $_POST['BasementRoomLevel'] : '',
            'RoomLength' => isset($_POST['BasementLength']) ? $_POST['BasementLength'] : '',
            'RoomWidth' => isset($_POST['BasementWidth']) ? $_POST['BasementWidth'] : ''
        ];
    }else{
        // If the checkbox is not checked, set $Basement to null
        $Basement = null;
    }

    // Add Den if checkbox is checked
    if (isset($_POST['DenYN']) && $_POST['DenYN'] == 'true') {
        array_push($newRooms, [
            'RoomType' => "Den",
            'BedroomClosetType' => isset($_POST['DenClosetType']) ? $_POST['DenClosetType'] : '',
            'RoomLevel' => isset($_POST['DenRoomLevel']) ? $_POST['DenRoomLevel'] : '',
            'RoomLength' => isset($_POST['DenLength']) ? $_POST['DenLength'] : '',
            'RoomWidth' => isset($_POST['DenWidth']) ? $_POST['DenWidth'] : ''
        ]);

        //Update the $Den variable to reflect the new data
        $Den = [
            'RoomType' => "Den",
            'BedroomClosetType' => isset($_POST['DenClosetType']) ? $_POST['DenClosetType'] : '',
            'RoomLevel' => isset($_POST['DenRoomLevel']) ? $_POST['DenRoomLevel'] : '',
            'RoomLength' => isset($_POST['DenLength']) ? $_POST['DenLength'] : '',
            'RoomWidth' => isset($_POST['DenWidth']) ? $_POST['DenWidth'] : ''
        ];
    }else{
        // If the checkbox is not checked, set $Den to null
        $Den = null;
    }

    // Add Family Room if checkbox is checked
    if (isset($_POST['FamilyRoomYN']) && $_POST['FamilyRoomYN'] == 'true') {
        array_push($newRooms, [
            'RoomType' => "Family Room",
            'BedroomClosetType' => isset($_POST['FamilyRoomClosetType']) ? $_POST['FamilyRoomClosetType'] : '',
            'RoomLevel' => isset($_POST['FamilyRoomRoomLevel']) ? $_POST['FamilyRoomRoomLevel'] : '',
            'RoomLength' => isset($_POST['FamilyRoomLength']) ? $_POST['FamilyRoomLength'] : '',
            'RoomWidth' => isset($_POST['FamilyRoomWidth']) ? $_POST['FamilyRoomWidth'] : ''
        ]);

        //Update the $FamilyRoom variable to reflect the new data
        $FamilyRoom = [
            'RoomType' => "Family Room",
            'BedroomClosetType' => isset($_POST['FamilyRoomClosetType']) ? $_POST['FamilyRoomClosetType'] : '',
            'RoomLevel' => isset($_POST['FamilyRoomRoomLevel']) ? $_POST['FamilyRoomRoomLevel'] : '',
            'RoomLength' => isset($_POST['FamilyRoomLength']) ? $_POST['FamilyRoomLength'] : '',
            'RoomWidth' => isset($_POST['FamilyRoomWidth']) ? $_POST['FamilyRoomWidth'] : ''
        ];
    }else{
        // If the checkbox is not checked, set $FamilyRoom to null
        $FamilyRoom = null;
    }

    // Add Game Room if checkbox is checked
    if (isset($_POST['GameRoomYN']) && $_POST['GameRoomYN'] == 'true') {
        array_push($newRooms, [
            'RoomType' => "Game Room",
            'BedroomClosetType' => isset($_POST['GameRoomClosetType']) ? $_POST['GameRoomClosetType'] : '',
            'RoomLevel' => isset($_POST['GameRoomRoomLevel']) ? $_POST['GameRoomRoomLevel'] : '',
            'RoomLength' => isset($_POST['GameRoomLength']) ? $_POST['GameRoomLength'] : '',
            'RoomWidth' => isset($_POST['GameRoomWidth']) ? $_POST['GameRoomWidth'] : ''
        ]);

        //Update the $GameRoom variable to reflect the new data
        $GameRoom = [
            'RoomType' => "Game Room",
            'BedroomClosetType' => isset($_POST['GameRoomClosetType']) ? $_POST['GameRoomClosetType'] : '',
            'RoomLevel' => isset($_POST['GameRoomRoomLevel']) ? $_POST['GameRoomRoomLevel'] : '',
            'RoomLength' => isset($_POST['GameRoomLength']) ? $_POST['GameRoomLength'] : '',
            'RoomWidth' => isset($_POST['GameRoomWidth']) ? $_POST['GameRoomWidth'] : ''
        ];
    }else{
        // If the checkbox is not checked, set $GameRoom to null
        $GameRoom = null;
    }

    // Add Great Room if checkbox is checked
    if (isset($_POST['GreatRoomYN']) && $_POST['GreatRoomYN'] == 'true') {
        array_push($newRooms, [
            'RoomType' => "Great Room",
            'BedroomClosetType' => isset($_POST['GreatRoomClosetType']) ? $_POST['GreatRoomClosetType'] : '',
            'RoomLevel' => isset($_POST['GreatRoomRoomLevel']) ? $_POST['GreatRoomRoomLevel'] : '',
            'RoomLength' => isset($_POST['GreatRoomLength']) ? $_POST['GreatRoomLength'] : '',
            'RoomWidth' => isset($_POST['GreatRoomWidth']) ? $_POST['GreatRoomWidth'] : ''
        ]);

        //Update the $GreatRoom variable to reflect the new data
        $GreatRoom = [
            'RoomType' => "Great Room",
            'BedroomClosetType' => isset($_POST['GreatRoomClosetType']) ? $_POST['GreatRoomClosetType'] : '',
            'RoomLevel' => isset($_POST['GreatRoomRoomLevel']) ? $_POST['GreatRoomRoomLevel'] : '',
            'RoomLength' => isset($_POST['GreatRoomLength']) ? $_POST['GreatRoomLength'] : '',
            'RoomWidth' => isset($_POST['GreatRoomWidth']) ? $_POST['GreatRoomWidth'] : ''
        ];
    }else{
        // If the checkbox is not checked, set $GreatRoom to null
        $GreatRoom = null;
    }

    // Add Gym if checkbox is checked
    if (isset($_POST['GymYN']) && $_POST['GymYN'] == 'true') {
        array_push($newRooms, [
            'RoomType' => "Gym",
            'BedroomClosetType' => isset($_POST['GymClosetType']) ? $_POST['GymClosetType'] : '',
            'RoomLevel' => isset($_POST['GymRoomLevel']) ? $_POST['GymRoomLevel'] : '',
            'RoomLength' => isset($_POST['GymLength']) ? $_POST['GymLength'] : '',
            'RoomWidth' => isset($_POST['GymWidth']) ? $_POST['GymWidth'] : ''
        ]);

        //Update the $Gym variable to reflect the new data
        $Gym = [
            'RoomType' => "Gym",
            'BedroomClosetType' => isset($_POST['GymClosetType']) ? $_POST['GymClosetType'] : '',
            'RoomLevel' => isset($_POST['GymRoomLevel']) ? $_POST['GymRoomLevel'] : '',
            'RoomLength' => isset($_POST['GymLength']) ? $_POST['GymLength'] : '',
            'RoomWidth' => isset($_POST['GymWidth']) ? $_POST['GymWidth'] : ''
        ];
    }else{
        // If the checkbox is not checked, set $Gym to null
        $Gym = null;
    }

    // Add Kitchen if checkbox is checked
    if (isset($_POST['KitchenYN']) && $_POST['KitchenYN'] == 'true') {
        array_push($newRooms, [
            'RoomType' => "Kitchen",
            'BedroomClosetType' => isset($_POST['KitchenClosetType']) ? $_POST['KitchenClosetType'] : '',
            'RoomLevel' => isset($_POST['KitchenRoomLevel']) ? $_POST['KitchenRoomLevel'] : '',
            'RoomLength' => isset($_POST['KitchenLength']) ? $_POST['KitchenLength'] : '',
            'RoomWidth' => isset($_POST['KitchenWidth']) ? $_POST['KitchenWidth'] : ''
        ]);

        //Update the $Kitchen variable to reflect the new data
        $Kitchen = [
            'RoomType' => "Kitchen",
            'BedroomClosetType' => isset($_POST['KitchenClosetType']) ? $_POST['KitchenClosetType'] : '',
            'RoomLevel' => isset($_POST['KitchenRoomLevel']) ? $_POST['KitchenRoomLevel'] : '',
            'RoomLength' => isset($_POST['KitchenLength']) ? $_POST['KitchenLength'] : '',
            'RoomWidth' => isset($_POST['KitchenWidth']) ? $_POST['KitchenWidth'] : ''
        ];
    }else{
        // If the checkbox is not checked, set $Kitchen to null
        $Kitchen = null;
    }

    // Add Laundry if checkbox is checked
    if (isset($_POST['LaundryYN']) && $_POST['LaundryYN'] == 'true') {
        array_push($newRooms, [
            'RoomType' => "Laundry",
            'BedroomClosetType' => isset($_POST['LaundryClosetType']) ? $_POST['LaundryClosetType'] : '',
            'RoomLevel' => isset($_POST['LaundryRoomLevel']) ? $_POST['LaundryRoomLevel'] : '',
            'RoomLength' => isset($_POST['LaundryLength']) ? $_POST['LaundryLength'] : '',
            'RoomWidth' => isset($_POST['LaundryWidth']) ? $_POST['LaundryWidth'] : ''
        ]);

        //Update the $Laundry variable to reflect the new data
        $Laundry = [
            'RoomType' => "Laundry",
            'BedroomClosetType' => isset($_POST['LaundryClosetType']) ? $_POST['LaundryClosetType'] : '',
            'RoomLevel' => isset($_POST['LaundryRoomLevel']) ? $_POST['LaundryRoomLevel'] : '',
            'RoomLength' => isset($_POST['LaundryLength']) ? $_POST['LaundryLength'] : '',
            'RoomWidth' => isset($_POST['LaundryWidth']) ? $_POST['LaundryWidth'] : ''
        ];
    }else{
        // If the checkbox is not checked, set $Laundry to null
        $Laundry = null;
    }

    // Add Library if checkbox is checked
    if (isset($_POST['LibraryYN']) && $_POST['LibraryYN'] == 'true') {
        array_push($newRooms, [
            'RoomType' => "Library",
            'BedroomClosetType' => isset($_POST['LibraryClosetType']) ? $_POST['LibraryClosetType'] : '',
            'RoomLevel' => isset($_POST['LibraryRoomLevel']) ? $_POST['LibraryRoomLevel'] : '',
            'RoomLength' => isset($_POST['LibraryLength']) ? $_POST['LibraryLength'] : '',
            'RoomWidth' => isset($_POST['LibraryWidth']) ? $_POST['LibraryWidth'] : ''
        ]);

        //Update the $Library variable to reflect the new data
        $Library = [
            'RoomType' => "Library",
            'BedroomClosetType' => isset($_POST['LibraryClosetType']) ? $_POST['LibraryClosetType'] : '',
            'RoomLevel' => isset($_POST['LibraryRoomLevel']) ? $_POST['LibraryRoomLevel'] : '',
            'RoomLength' => isset($_POST['LibraryLength']) ? $_POST['LibraryLength'] : '',
            'RoomWidth' => isset($_POST['LibraryWidth']) ? $_POST['LibraryWidth'] : ''
        ];
    }else{
        // If the checkbox is not checked, set $Library to null
        $Library = null;
    }

    // Add Living Room if checkbox is checked
    if (isset($_POST['LivingRoomYN']) && $_POST['LivingRoomYN'] == 'true') {
        array_push($newRooms, [
            'RoomType' => "Living Room",
            'BedroomClosetType' => isset($_POST['LivingRoomClosetType']) ? $_POST['LivingRoomClosetType'] : '',
            'RoomLevel' => isset($_POST['LivingRoomRoomLevel']) ? $_POST['LivingRoomRoomLevel'] : '',
            'RoomLength' => isset($_POST['LivingRoomLength']) ? $_POST['LivingRoomLength'] : '',
            'RoomWidth' => isset($_POST['LivingRoomWidth']) ? $_POST['LivingRoomWidth'] : ''
        ]);

        //Update the $LivingRoom variable to reflect the new data
        $LivingRoom = [
            'RoomType' => "Living Room",
            'BedroomClosetType' => isset($_POST['LivingRoomClosetType']) ? $_POST['LivingRoomClosetType'] : '',
            'RoomLevel' => isset($_POST['LivingRoomRoomLevel']) ? $_POST['LivingRoomRoomLevel'] : '',
            'RoomLength' => isset($_POST['LivingRoomLength']) ? $_POST['LivingRoomLength'] : '',
            'RoomWidth' => isset($_POST['LivingRoomWidth']) ? $_POST['LivingRoomWidth'] : ''
        ];
    }else{
        // If the checkbox is not checked, set $LivingRoom to null
        $LivingRoom = null;
    }

    // Add Loft if checkbox is checked
    if (isset($_POST['LoftYN']) && $_POST['LoftYN'] == 'true') {
        array_push($newRooms, [
            'RoomType' => "Loft",
            'BedroomClosetType' => isset($_POST['LoftClosetType']) ? $_POST['LoftClosetType'] : '',
            'RoomLevel' => isset($_POST['LoftRoomLevel']) ? $_POST['LoftRoomLevel'] : '',
            'RoomLength' => isset($_POST['LoftLength']) ? $_POST['LoftLength'] : '',
            'RoomWidth' => isset($_POST['LoftWidth']) ? $_POST['LoftWidth'] : ''
        ]);

        //Update the $Loft variable to reflect the new data
        $Loft = [
            'RoomType' => "Loft",
            'BedroomClosetType' => isset($_POST['LoftClosetType']) ? $_POST['LoftClosetType'] : '',
            'RoomLevel' => isset($_POST['LoftRoomLevel']) ? $_POST['LoftRoomLevel'] : '',
            'RoomLength' => isset($_POST['LoftLength']) ? $_POST['LoftLength'] : '',
            'RoomWidth' => isset($_POST['LoftWidth']) ? $_POST['LoftWidth'] : ''
        ];
    }else{
        // If the checkbox is not checked, set $Loft to null
        $Loft = null;
    }

    // Add Media Room if checkbox is checked
    if (isset($_POST['MediaRoomYN']) && $_POST['MediaRoomYN'] == 'true') {
        array_push($newRooms, [
            'RoomType' => "Media Room",
            'BedroomClosetType' => isset($_POST['MediaRoomClosetType']) ? $_POST['MediaRoomClosetType'] : '',
            'RoomLevel' => isset($_POST['MediaRoomRoomLevel']) ? $_POST['MediaRoomRoomLevel'] : '',
            'RoomLength' => isset($_POST['MediaRoomLength']) ? $_POST['MediaRoomLength'] : '',
            'RoomWidth' => isset($_POST['MediaRoomWidth']) ? $_POST['MediaRoomWidth'] : ''
        ]);

        //Update the $MediaRoom variable to reflect the new data
        $MediaRoom = [
            'RoomType' => "Media Room",
            'BedroomClosetType' => isset($_POST['MediaRoomClosetType']) ? $_POST['MediaRoomClosetType'] : '',
            'RoomLevel' => isset($_POST['MediaRoomRoomLevel']) ? $_POST['MediaRoomRoomLevel'] : '',
            'RoomLength' => isset($_POST['MediaRoomLength']) ? $_POST['MediaRoomLength'] : '',
            'RoomWidth' => isset($_POST['MediaRoomWidth']) ? $_POST['MediaRoomWidth'] : ''
        ];
    }else{
        // If the checkbox is not checked, set $MediaRoom to null
        $MediaRoom = null;
    }

    // Add Office if checkbox is checked
    if (isset($_POST['OfficeYN']) && $_POST['OfficeYN'] == 'true') {
        array_push($newRooms, [
            'RoomType' => "Office",
            'BedroomClosetType' => isset($_POST['OfficeClosetType']) ? $_POST['OfficeClosetType'] : '',
            'RoomLevel' => isset($_POST['OfficeRoomLevel']) ? $_POST['OfficeRoomLevel'] : '',
            'RoomLength' => isset($_POST['OfficeLength']) ? $_POST['OfficeLength'] : '',
            'RoomWidth' => isset($_POST['OfficeWidth']) ? $_POST['OfficeWidth'] : ''
        ]);

        //Update the $Office variable to reflect the new data
        $Office = [
            'RoomType' => "Office",
            'BedroomClosetType' => isset($_POST['OfficeClosetType']) ? $_POST['OfficeClosetType'] : '',
            'RoomLevel' => isset($_POST['OfficeRoomLevel']) ? $_POST['OfficeRoomLevel'] : '',
            'RoomLength' => isset($_POST['OfficeLength']) ? $_POST['OfficeLength'] : '',
            'RoomWidth' => isset($_POST['OfficeWidth']) ? $_POST['OfficeWidth'] : ''
        ];
    }else{
        // If the checkbox is not checked, set $Office to null
        $Office = null;
    }

    // Add Sauna if checkbox is checked
    if (isset($_POST['SaunaYN']) && $_POST['SaunaYN'] == 'true') {
        array_push($newRooms, [
            'RoomType' => "Sauna",
            'BedroomClosetType' => isset($_POST['SaunaClosetType']) ? $_POST['SaunaClosetType'] : '',
            'RoomLevel' => isset($_POST['SaunaRoomLevel']) ? $_POST['SaunaRoomLevel'] : '',
            'RoomLength' => isset($_POST['SaunaLength']) ? $_POST['SaunaLength'] : '',
            'RoomWidth' => isset($_POST['SaunaWidth']) ? $_POST['SaunaWidth'] : ''
        ]);

        //Update the $Sauna variable to reflect the new data
        $Sauna = [
            'RoomType' => "Sauna",
            'BedroomClosetType' => isset($_POST['SaunaClosetType']) ? $_POST['SaunaClosetType'] : '',
            'RoomLevel' => isset($_POST['SaunaRoomLevel']) ? $_POST['SaunaRoomLevel'] : '',
            'RoomLength' => isset($_POST['SaunaLength']) ? $_POST['SaunaLength'] : '',
            'RoomWidth' => isset($_POST['SaunaWidth']) ? $_POST['SaunaWidth'] : ''
        ];
    }else{
        // If the checkbox is not checked, set $Sauna to null
        $Sauna = null;
    }

    // Add Utility Room if checkbox is checked
    if (isset($_POST['UtilityRoomYN']) && $_POST['UtilityRoomYN'] == 'true') {
        array_push($newRooms, [
            'RoomType' => "Utility Room",
            'BedroomClosetType' => isset($_POST['UtilityRoomClosetType']) ? $_POST['UtilityRoomClosetType'] : '',
            'RoomLevel' => isset($_POST['UtilityRoomRoomLevel']) ? $_POST['UtilityRoomRoomLevel'] : '',
            'RoomLength' => isset($_POST['UtilityRoomLength']) ? $_POST['UtilityRoomLength'] : '',
            'RoomWidth' => isset($_POST['UtilityRoomWidth']) ? $_POST['UtilityRoomWidth'] : ''
        ]);

        //Update the $UtilityRoom variable to reflect the new data
        $UtilityRoom = [
            'RoomType' => "Utility Room",
            'BedroomClosetType' => isset($_POST['UtilityRoomClosetType']) ? $_POST['UtilityRoomClosetType'] : '',
            'RoomLevel' => isset($_POST['UtilityRoomRoomLevel']) ? $_POST['UtilityRoomRoomLevel'] : '',
            'RoomLength' => isset($_POST['UtilityRoomLength']) ? $_POST['UtilityRoomLength'] : '',
            'RoomWidth' => isset($_POST['UtilityRoomWidth']) ? $_POST['UtilityRoomWidth'] : ''
        ];
    }else{
        // If the checkbox is not checked, set $UtilityRoom to null
        $UtilityRoom = null;
    }

    // Add Workshop if checkbox is checked
    if (isset($_POST['WorkshopYN']) && $_POST['WorkshopYN'] == 'true') {
        array_push($newRooms, [
            'RoomType' => "Workshop",
            'BedroomClosetType' => isset($_POST['WorkshopClosetType']) ? $_POST['WorkshopClosetType'] : '',
            'RoomLevel' => isset($_POST['WorkshopRoomLevel']) ? $_POST['WorkshopRoomLevel'] : '',
            'RoomLength' => isset($_POST['WorkshopLength']) ? $_POST['WorkshopLength'] : '',
            'RoomWidth' => isset($_POST['WorkshopWidth']) ? $_POST['WorkshopWidth'] : ''
        ]);

        //Update the $Workshop variable to reflect the new data
        $Workshop = [
            'RoomType' => "Workshop",
            'BedroomClosetType' => isset($_POST['WorkshopClosetType']) ? $_POST['WorkshopClosetType'] : '',
            'RoomLevel' => isset($_POST['WorkshopRoomLevel']) ? $_POST['WorkshopRoomLevel'] : '',
            'RoomLength' => isset($_POST['WorkshopLength']) ? $_POST['WorkshopLength'] : '',
            'RoomWidth' => isset($_POST['WorkshopWidth']) ? $_POST['WorkshopWidth'] : ''
        ];
    }else{
        // If the checkbox is not checked, set $Workshop to null
        $Workshop = null;
    }

    // echo '<pre>';
    //     var_Dump($newRooms);
    // echo '</pre>';

    //Adding new rooms to the listing

    foreach($newRooms as $room) {

        curl_setopt_array($curl, [
          CURLOPT_URL => "https://api.nexusmls.io/PropertyRooms",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => json_encode([
            'ListingKey' => $resourceKey,
            'RoomType' => $room['RoomType'],
            'BedroomClosetType' => $room['BedroomClosetType'],
            'RoomLevel' => $room['RoomLevel'],
            'RoomLength' => $room['RoomLength'],
            'RoomWidth' => $room['RoomWidth']
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
        }else{
            $jsonResponse = json_decode($response, true);
            

            // echo '<pre>';
            //     var_Dump($jsonResponse);
            // echo '</pre>';
        }

    }

}

?>



<form method="POST" class="nexus-mls-form listing-tab-content" style="margin-top: 50px;" id="roomForm">
<input type="hidden" name="resourseKey" value="<?php echo $listing; ?>">


<h2>Room Details</h2>


<div class="column-5">
    <label for="BathroomsFull"># of Bathrooms</label>
    <input class="bathroomField" type="text" name="BathroomsFull" id="BathroomsFull" placeholder="Full Baths" value="<?php echo $listingData['BathroomsFull']; ?>" >
    <input class="bathroomField" type="text" name="BathroomsThreeQuarter" id="BathroomsThreeQuarter" placeholder="Three-Quarter Baths" value="<?php echo $listingData['BathroomsThreeQuarter']; ?>" >
    <input class="bathroomField" type="text" name="BathroomsHalf" id="BathroomsHalf" placeholder="Half Baths" value="<?php echo $listingData['BathroomsHalf']; ?>" >
    <input class="bathroomField" type="text" name="BathroomsOneQuarter" id="BathroomsOneQuarter" placeholder="Quarter Baths" value="<?php echo $listingData['BathroomsOneQuarter']; ?>" >
</div>

<div>
    <label for="OwnersBedroomYN" style="font-size: 18px; font-weight: 700;">
        <input type="checkbox" id="OwnersBedroomYN" name="OwnersBedroomYN" value="true" <?php echo $OwnersBedroom ? 'checked' : ''; ?>>
        Owners Bedroom
    </label>
</div>

<div class="OwnersBedroomYN-fields" style="display: <?php echo $OwnersBedroom ? 'block' : 'none'; ?>;margin-bottom: 20px;">
    <div class="column-4">
       <input type="text" name="OwnersBedroomLength" id="OwnersBedroomRoomLength" placeholder="Width (ft)" value="<?php echo $OwnersBedroom ? $OwnersBedroom['RoomLength'] : ''; ?>" >
       <input type="text" name="OwnersBedroomWidth" id="OwnersBedroomRoomWidth" placeholder="Length (ft)" value="<?php echo $OwnersBedroom ? $OwnersBedroom['RoomWidth'] : ''; ?>" >
        <select name="OwnersBedroomClosetType">
            <option value="">Select Closet Type</option>
            <option value="None" <?php echo $OwnersBedroom && $OwnersBedroom['BedroomClosetType'] == 'None' ? 'selected' : ''; ?>>None</option>
            <option value="Built-in Closet" <?php echo $OwnersBedroom && $OwnersBedroom['BedroomClosetType'] == 'Built-in Closet' ? 'selected' : ''; ?>>Built-in Closet</option>
            <option value="Walk-in Closet" <?php echo $OwnersBedroom && $OwnersBedroom['BedroomClosetType'] == 'Walk-in Closet' ? 'selected' : ''; ?>>Walk-in Closet</option>
        </select>
        <select name="OwnersBedroomRoomLevel">
            <option value="">Select Room Level</option>
            <option value="Basement" <?php echo $OwnersBedroom && $OwnersBedroom['RoomLevel'] == 'Basement' ? 'selected' : ''; ?>>Basement</option>
            <option value="First" <?php echo $OwnersBedroom && $OwnersBedroom['RoomLevel'] == 'First' ? 'selected' : ''; ?>>First</option>
            <option value="Lower" <?php echo $OwnersBedroom && $OwnersBedroom['RoomLevel'] == 'Lower' ? 'selected' : ''; ?>>Lower</option>
            <option value="Main" <?php echo $OwnersBedroom && $OwnersBedroom['RoomLevel'] == 'Main' ? 'selected' : ''; ?>>Main</option>
            <option value="Second" <?php echo $OwnersBedroom && $OwnersBedroom['RoomLevel'] == 'Second' ? 'selected' : ''; ?>>Second</option>
            <option value="Third" <?php echo $OwnersBedroom && $OwnersBedroom['RoomLevel'] == 'Third' ? 'selected' : ''; ?>>Third</option>
            <option value="Upper" <?php echo $OwnersBedroom && $OwnersBedroom['RoomLevel'] == 'Upper' ? 'selected' : ''; ?>>Upper</option>
        </select>
    </div>
</div>

<div>
    <label for="Bedroom1YN" style="font-size: 18px; font-weight: 700;">
        <input type="checkbox" id="Bedroom1YN" name="Bedroom1YN" value="true" <?php echo $Bedroom1 ? 'checked' : ''; ?>>
        Bedroom 1
    </label>
</div>

<div class="Bedroom1YN-fields" style="display: <?php echo $Bedroom1 ? 'block' : 'none'; ?>; margin-bottom: 20px;">
    <div class="column-4">
       <input type="text" name="Bedroom1Length" id="Bedroom1RoomLength" placeholder="Width (ft)" value="<?php echo $Bedroom1 ? $Bedroom1['RoomLength'] : ''; ?>" >
       <input type="text" name="Bedroom1Width" id="Bedroom1RoomWidth" placeholder="Length (ft)" value="<?php echo $Bedroom1 ? $Bedroom1['RoomWidth'] : ''; ?>" >
        <select name="Bedroom1ClosetType">
            <option value="">Select Closet Type</option>
            <option value="None" <?php echo $Bedroom1 && $Bedroom1['BedroomClosetType'] == 'None' ? 'selected' : ''; ?>>None</option>
            <option value="Built-in Closet" <?php echo $Bedroom1 && $Bedroom1['BedroomClosetType'] == 'Built-in Closet' ? 'selected' : ''; ?>>Built-in Closet</option>
            <option value="Walk-in Closet" <?php echo $Bedroom1 && $Bedroom1['BedroomClosetType'] == 'Walk-in Closet' ? 'selected' : ''; ?>>Walk-in Closet</option>
        </select>
        <select name="Bedroom1RoomLevel">
            <option value="">Select Room Level</option>
            <option value="Basement" <?php echo $Bedroom1 && $Bedroom1['RoomLevel'] == 'Basement' ? 'selected' : ''; ?>>Basement</option>
            <option value="First" <?php echo $Bedroom1 && $Bedroom1['RoomLevel'] == 'First' ? 'selected' : ''; ?>>First</option>
            <option value="Lower" <?php echo $Bedroom1 && $Bedroom1['RoomLevel'] == 'Lower' ? 'selected' : ''; ?>>Lower</option>
            <option value="Main" <?php echo $Bedroom1 && $Bedroom1['RoomLevel'] == 'Main' ? 'selected' : ''; ?>>Main</option>
            <option value="Second" <?php echo $Bedroom1 && $Bedroom1['RoomLevel'] == 'Second' ? 'selected' : ''; ?>>Second</option>
            <option value="Third" <?php echo $Bedroom1 && $Bedroom1['RoomLevel'] == 'Third' ? 'selected' : ''; ?>>Third</option>
            <option value="Upper" <?php echo $Bedroom1 && $Bedroom1['RoomLevel'] == 'Upper' ? 'selected' : ''; ?>>Upper</option>
        </select>
    </div>
</div>


<div>
    <label for="Bedroom2YN" style="font-size: 18px; font-weight: 700;">
        <input type="checkbox" id="Bedroom2YN" name="Bedroom2YN" value="true" <?php echo $Bedroom2 ? 'checked' : ''; ?>>
        Bedroom 2
    </label>
</div>

<div class="Bedroom2YN-fields" style="display: <?php echo $Bedroom2 ? 'block' : 'none'; ?>; margin-bottom: 20px;">
    <div class="column-4">
       <input type="text" name="Bedroom2Length" id="Bedroom2RoomLength" placeholder="Width (ft)" value="<?php echo $Bedroom2 ? $Bedroom2['RoomLength'] : ''; ?>" >
       <input type="text" name="Bedroom2Width" id="Bedroom2RoomWidth" placeholder="Length (ft)" value="<?php echo $Bedroom2 ? $Bedroom2['RoomWidth'] : ''; ?>" >
        <select name="Bedroom2ClosetType">
            <option value="">Select Closet Type</option>
            <option value="None" <?php echo $Bedroom2 && $Bedroom2['BedroomClosetType'] == 'None' ? 'selected' : ''; ?>>None</option>
            <option value="Built-in Closet" <?php echo $Bedroom2 && $Bedroom2['BedroomClosetType'] == 'Built-in Closet' ? 'selected' : ''; ?>>Built-in Closet</option>
            <option value="Walk-in Closet" <?php echo $Bedroom2 && $Bedroom2['BedroomClosetType'] == 'Walk-in Closet' ? 'selected' : ''; ?>>Walk-in Closet</option>
        </select>
        <select name="Bedroom2RoomLevel">
            <option value="">Select Room Level</option>
            <option value="Basement" <?php echo $Bedroom2 && $Bedroom2['RoomLevel'] == 'Basement' ? 'selected' : ''; ?>>Basement</option>
            <option value="First" <?php echo $Bedroom2 && $Bedroom2['RoomLevel'] == 'First' ? 'selected' : ''; ?>>First</option>
            <option value="Lower" <?php echo $Bedroom2 && $Bedroom2['RoomLevel'] == 'Lower' ? 'selected' : ''; ?>>Lower</option>
            <option value="Main" <?php echo $Bedroom2 && $Bedroom2['RoomLevel'] == 'Main' ? 'selected' : ''; ?>>Main</option>
            <option value="Second" <?php echo $Bedroom2 && $Bedroom2['RoomLevel'] == 'Second' ? 'selected' : ''; ?>>Second</option>
            <option value="Third" <?php echo $Bedroom2 && $Bedroom2['RoomLevel'] == 'Third' ? 'selected' : ''; ?>>Third</option>
            <option value="Upper" <?php echo $Bedroom2 && $Bedroom2['RoomLevel'] == 'Upper' ? 'selected' : ''; ?>>Upper</option>
        </select>
    </div>
</div>


<div>
    <label for="Bedroom3YN" style="font-size: 18px; font-weight: 700;">
        <input type="checkbox" id="Bedroom3YN" name="Bedroom3YN" value="true" <?php echo $Bedroom3 ? 'checked' : ''; ?>>
        Bedroom 3
    </label>
</div>

<div class="Bedroom3YN-fields" style="display: <?php echo $Bedroom3 ? 'block' : 'none'; ?>; margin-bottom: 20px;">
    <div class="column-4">
       <input type="text" name="Bedroom3Length" id="Bedroom3RoomLength" placeholder="Width (ft)" value="<?php echo $Bedroom3 ? $Bedroom3['RoomLength'] : ''; ?>" >
       <input type="text" name="Bedroom3Width" id="Bedroom3RoomWidth" placeholder="Length (ft)" value="<?php echo $Bedroom3 ? $Bedroom3['RoomWidth'] : ''; ?>" >
        <select name="Bedroom3ClosetType">
            <option value="">Select Closet Type</option>
            <option value="None" <?php echo $Bedroom3 && $Bedroom3['BedroomClosetType'] == 'None' ? 'selected' : ''; ?>>None</option>
            <option value="Built-in Closet" <?php echo $Bedroom3 && $Bedroom3['BedroomClosetType'] == 'Built-in Closet' ? 'selected' : ''; ?>>Built-in Closet</option>
            <option value="Walk-in Closet" <?php echo $Bedroom3 && $Bedroom3['BedroomClosetType'] == 'Walk-in Closet' ? 'selected' : ''; ?>>Walk-in Closet</option>
        </select>
        <select name="Bedroom3RoomLevel">
            <option value="">Select Room Level</option>
            <option value="Basement" <?php echo $Bedroom3 && $Bedroom3['RoomLevel'] == 'Basement' ? 'selected' : ''; ?>>Basement</option>
            <option value="First" <?php echo $Bedroom3 && $Bedroom3['RoomLevel'] == 'First' ? 'selected' : ''; ?>>First</option>
            <option value="Lower" <?php echo $Bedroom3 && $Bedroom3['RoomLevel'] == 'Lower' ? 'selected' : ''; ?>>Lower</option>
            <option value="Main" <?php echo $Bedroom3 && $Bedroom3['RoomLevel'] == 'Main' ? 'selected' : ''; ?>>Main</option>
            <option value="Second" <?php echo $Bedroom3 && $Bedroom3['RoomLevel'] == 'Second' ? 'selected' : ''; ?>>Second</option>
            <option value="Third" <?php echo $Bedroom3 && $Bedroom3['RoomLevel'] == 'Third' ? 'selected' : ''; ?>>Third</option>
            <option value="Upper" <?php echo $Bedroom3 && $Bedroom3['RoomLevel'] == 'Upper' ? 'selected' : ''; ?>>Upper</option>
        </select>
    </div>
</div>


<div>
    <label for="Bedroom4YN" style="font-size: 18px; font-weight: 700;">
        <input type="checkbox" id="Bedroom4YN" name="Bedroom4YN" value="true" <?php echo $Bedroom4 ? 'checked' : ''; ?>>
        Bedroom 4
    </label>
</div>

<div class="Bedroom4YN-fields" style="display: <?php echo $Bedroom4 ? 'block' : 'none'; ?>; margin-bottom: 20px;">
    <div class="column-4">
       <input type="text" name="Bedroom4Length" id="Bedroom4RoomLength" placeholder="Width (ft)" value="<?php echo $Bedroom4 ? $Bedroom4['RoomLength'] : ''; ?>" >
       <input type="text" name="Bedroom4Width" id="Bedroom4RoomWidth" placeholder="Length (ft)" value="<?php echo $Bedroom4 ? $Bedroom4['RoomWidth'] : ''; ?>" >
        <select name="Bedroom4ClosetType">
            <option value="">Select Closet Type</option>
            <option value="None" <?php echo $Bedroom4 && $Bedroom4['BedroomClosetType'] == 'None' ? 'selected' : ''; ?>>None</option>
            <option value="Built-in Closet" <?php echo $Bedroom4 && $Bedroom4['BedroomClosetType'] == 'Built-in Closet' ? 'selected' : ''; ?>>Built-in Closet</option>
            <option value="Walk-in Closet" <?php echo $Bedroom4 && $Bedroom4['BedroomClosetType'] == 'Walk-in Closet' ? 'selected' : ''; ?>>Walk-in Closet</option>
        </select>
        <select name="Bedroom4RoomLevel">
            <option value="">Select Room Level</option>
            <option value="Basement" <?php echo $Bedroom4 && $Bedroom4['RoomLevel'] == 'Basement' ? 'selected' : ''; ?>>Basement</option>
            <option value="First" <?php echo $Bedroom4 && $Bedroom4['RoomLevel'] == 'First' ? 'selected' : ''; ?>>First</option>
            <option value="Lower" <?php echo $Bedroom4 && $Bedroom4['RoomLevel'] == 'Lower' ? 'selected' : ''; ?>>Lower</option>
            <option value="Main" <?php echo $Bedroom4 && $Bedroom4['RoomLevel'] == 'Main' ? 'selected' : ''; ?>>Main</option>
            <option value="Second" <?php echo $Bedroom4 && $Bedroom4['RoomLevel'] == 'Second' ? 'selected' : ''; ?>>Second</option>
            <option value="Third" <?php echo $Bedroom4 && $Bedroom4['RoomLevel'] == 'Third' ? 'selected' : ''; ?>>Third</option>
            <option value="Upper" <?php echo $Bedroom4 && $Bedroom4['RoomLevel'] == 'Upper' ? 'selected' : ''; ?>>Upper</option>
        </select>
    </div>
</div>


<div>
    <label for="Bedroom5YN" style="font-size: 18px; font-weight: 700;">
        <input type="checkbox" id="Bedroom5YN" name="Bedroom5YN" value="true" <?php echo $Bedroom5 ? 'checked' : ''; ?>>
        Bedroom 5
    </label>
</div>

<div class="Bedroom5YN-fields" style="display: <?php echo $Bedroom5 ? 'block' : 'none'; ?>; margin-bottom: 20px;">
    <div class="column-4">
       <input type="text" name="Bedroom5Length" id="Bedroom5RoomLength" placeholder="Width (ft)" value="<?php echo $Bedroom5 ? $Bedroom5['RoomLength'] : ''; ?>" >
       <input type="text" name="Bedroom5Width" id="Bedroom5RoomWidth" placeholder="Length (ft)" value="<?php echo $Bedroom5 ? $Bedroom5['RoomWidth'] : ''; ?>" >
        <select name="Bedroom5ClosetType">
            <option value="">Select Closet Type</option>
            <option value="None" <?php echo $Bedroom5 && $Bedroom5['BedroomClosetType'] == 'None' ? 'selected' : ''; ?>>None</option>
            <option value="Built-in Closet" <?php echo $Bedroom5 && $Bedroom5['BedroomClosetType'] == 'Built-in Closet' ? 'selected' : ''; ?>>Built-in Closet</option>
            <option value="Walk-in Closet" <?php echo $Bedroom5 && $Bedroom5['BedroomClosetType'] == 'Walk-in Closet' ? 'selected' : ''; ?>>Walk-in Closet</option>
        </select>
        <select name="Bedroom5RoomLevel">
            <option value="">Select Room Level</option>
            <option value="Basement" <?php echo $Bedroom5 && $Bedroom5['RoomLevel'] == 'Basement' ? 'selected' : ''; ?>>Basement</option>
            <option value="First" <?php echo $Bedroom5 && $Bedroom5['RoomLevel'] == 'First' ? 'selected' : ''; ?>>First</option>
            <option value="Lower" <?php echo $Bedroom5 && $Bedroom5['RoomLevel'] == 'Lower' ? 'selected' : ''; ?>>Lower</option>
            <option value="Main" <?php echo $Bedroom5 && $Bedroom5['RoomLevel'] == 'Main' ? 'selected' : ''; ?>>Main</option>
            <option value="Second" <?php echo $Bedroom5 && $Bedroom5['RoomLevel'] == 'Second' ? 'selected' : ''; ?>>Second</option>
            <option value="Third" <?php echo $Bedroom5 && $Bedroom5['RoomLevel'] == 'Third' ? 'selected' : ''; ?>>Third</option>
            <option value="Upper" <?php echo $Bedroom5 && $Bedroom5['RoomLevel'] == 'Upper' ? 'selected' : ''; ?>>Upper</option>
        </select>
    </div>
</div>


<div>
    <label for="DiningRoomYN" style="font-size: 18px; font-weight: 700;">
        <input type="checkbox" id="DiningRoomYN" name="DiningRoomYN" value="true" <?php echo $DiningRoom ? 'checked' : ''; ?>>
        Dining Room
    </label>
</div>

<div class="DiningRoomYN-fields" style="display: <?php echo $DiningRoom ? 'block' : 'none'; ?>; margin-bottom: 20px;">
    <div class="column-4">
       <input type="text" name="DiningRoomLength" id="DiningRoomLength" placeholder="Width (ft)" value="<?php echo $DiningRoom ? $DiningRoom['RoomLength'] : ''; ?>" >
       <input type="text" name="DiningRoomWidth" id="DiningRoomWidth" placeholder="Length (ft)" value="<?php echo $DiningRoom ? $DiningRoom['RoomWidth'] : ''; ?>" >
        <select name="DiningRoomLevel">
            <option value="">Select Room Level</option>
            <option value="Basement" <?php echo $DiningRoom && $DiningRoom['RoomLevel'] == 'Basement' ? 'selected' : ''; ?>>Basement</option>
            <option value="First" <?php echo $DiningRoom && $DiningRoom['RoomLevel'] == 'First' ? 'selected' : ''; ?>>First</option>
            <option value="Lower" <?php echo $DiningRoom && $DiningRoom['RoomLevel'] == 'Lower' ? 'selected' : ''; ?>>Lower</option>
            <option value="Main" <?php echo $DiningRoom && $DiningRoom['RoomLevel'] == 'Main' ? 'selected' : ''; ?>>Main</option>
            <option value="Second" <?php echo $DiningRoom && $DiningRoom['RoomLevel'] == 'Second' ? 'selected' : ''; ?>>Second</option>
            <option value="Third" <?php echo $DiningRoom && $DiningRoom['RoomLevel'] == 'Third' ? 'selected' : ''; ?>>Third</option>
            <option value="Upper" <?php echo $DiningRoom && $DiningRoom['RoomLevel'] == 'Upper' ? 'selected' : ''; ?>>Upper</option>
        </select>
    </div>
</div>


<div>
    <label for="BasementYN" style="font-size: 18px; font-weight: 700;">
        <input type="checkbox" id="BasementYN" name="BasementYN" value="true" <?php echo $Basement ? 'checked' : ''; ?>>
        Basement
    </label>
</div>

<div class="BasementYN-fields" style="display: <?php echo $Basement ? 'block' : 'none'; ?>; margin-bottom: 20px;">
    <div class="column-4">
       <input type="text" name="BasementLength" id="BasementLength" placeholder="Width (ft)" value="<?php echo $Basement ? $Basement['RoomLength'] : ''; ?>" >
       <input type="text" name="BasementWidth" id="BasementWidth" placeholder="Length (ft)" value="<?php echo $Basement ? $Basement['RoomWidth'] : ''; ?>" >

        <select name="BasementRoomLevel">
            <option value="">Select Room Level</option>
            <option value="Basement" <?php echo $Basement && $Basement['RoomLevel'] == 'Basement' ? 'selected' : ''; ?>>Basement</option>
            <option value="First" <?php echo $Basement && $Basement['RoomLevel'] == 'First' ? 'selected' : ''; ?>>First</option>
            <option value="Lower" <?php echo $Basement && $Basement['RoomLevel'] == 'Lower' ? 'selected' : ''; ?>>Lower</option>
            <option value="Main" <?php echo $Basement && $Basement['RoomLevel'] == 'Main' ? 'selected' : ''; ?>>Main</option>
            <option value="Second" <?php echo $Basement && $Basement['RoomLevel'] == 'Second' ? 'selected' : ''; ?>>Second</option>
            <option value="Third" <?php echo $Basement && $Basement['RoomLevel'] == 'Third' ? 'selected' : ''; ?>>Third</option>
            <option value="Upper" <?php echo $Basement && $Basement['RoomLevel'] == 'Upper' ? 'selected' : ''; ?>>Upper</option>
        </select>
    </div>
</div>

<div>
    <label for="DenYN" style="font-size: 18px; font-weight: 700;">
        <input type="checkbox" id="DenYN" name="DenYN" value="true" <?php echo $Den ? 'checked' : ''; ?>>
        Den
    </label>
</div>

<div class="DenYN-fields" style="display: <?php echo $Den ? 'block' : 'none'; ?>; margin-bottom: 20px;">
    <div class="column-4">
       <input type="text" name="DenLength" id="DenLength" placeholder="Width (ft)" value="<?php echo $Den ? $Den['RoomLength'] : ''; ?>" >
       <input type="text" name="DenWidth" id="DenWidth" placeholder="Length (ft)" value="<?php echo $Den ? $Den['RoomWidth'] : ''; ?>" >
       
        <select name="DenRoomLevel">
            <option value="">Select Room Level</option>
            <option value="Basement" <?php echo $Den && $Den['RoomLevel'] == 'Basement' ? 'selected' : ''; ?>>Basement</option>
            <option value="First" <?php echo $Den && $Den['RoomLevel'] == 'First' ? 'selected' : ''; ?>>First</option>
            <option value="Lower" <?php echo $Den && $Den['RoomLevel'] == 'Lower' ? 'selected' : ''; ?>>Lower</option>
            <option value="Main" <?php echo $Den && $Den['RoomLevel'] == 'Main' ? 'selected' : ''; ?>>Main</option>
            <option value="Second" <?php echo $Den && $Den['RoomLevel'] == 'Second' ? 'selected' : ''; ?>>Second</option>
            <option value="Third" <?php echo $Den && $Den['RoomLevel'] == 'Third' ? 'selected' : ''; ?>>Third</option>
            <option value="Upper" <?php echo $Den && $Den['RoomLevel'] == 'Upper' ? 'selected' : ''; ?>>Upper</option>
        </select>
    </div>
</div>


<div>
    <label for="FamilyRoomYN" style="font-size: 18px; font-weight: 700;">
        <input type="checkbox" id="FamilyRoomYN" name="FamilyRoomYN" value="true" <?php echo $FamilyRoom ? 'checked' : ''; ?>>
        Family Room
    </label>
</div>

<div class="FamilyRoomYN-fields" style="display: <?php echo $FamilyRoom ? 'block' : 'none'; ?>; margin-bottom: 20px;">
    <div class="column-4">
       <input type="text" name="FamilyRoomLength" id="FamilyRoomLength" placeholder="Width (ft)" value="<?php echo $FamilyRoom ? $FamilyRoom['RoomLength'] : ''; ?>" >
       <input type="text" name="FamilyRoomWidth" id="FamilyRoomWidth" placeholder="Length (ft)" value="<?php echo $FamilyRoom ? $FamilyRoom['RoomWidth'] : ''; ?>" >
       
        <select name="FamilyRoomRoomLevel">
            <option value="">Select Room Level</option>
            <option value="Basement" <?php echo $FamilyRoom && $FamilyRoom['RoomLevel'] == 'Basement' ? 'selected' : ''; ?>>Basement</option>
            <option value="First" <?php echo $FamilyRoom && $FamilyRoom['RoomLevel'] == 'First' ? 'selected' : ''; ?>>First</option>
            <option value="Lower" <?php echo $FamilyRoom && $FamilyRoom['RoomLevel'] == 'Lower' ? 'selected' : ''; ?>>Lower</option>
            <option value="Main" <?php echo $FamilyRoom && $FamilyRoom['RoomLevel'] == 'Main' ? 'selected' : ''; ?>>Main</option>
            <option value="Second" <?php echo $FamilyRoom && $FamilyRoom['RoomLevel'] == 'Second' ? 'selected' : ''; ?>>Second</option>
            <option value="Third" <?php echo $FamilyRoom && $FamilyRoom['RoomLevel'] == 'Third' ? 'selected' : ''; ?>>Third</option>
            <option value="Upper" <?php echo $FamilyRoom && $FamilyRoom['RoomLevel'] == 'Upper' ? 'selected' : ''; ?>>Upper</option>
        </select>
    </div>
</div>


<div>
    <label for="GameRoomYN" style="font-size: 18px; font-weight: 700;">
        <input type="checkbox" id="GameRoomYN" name="GameRoomYN" value="true" <?php echo $GameRoom ? 'checked' : ''; ?>>
        Game Room
    </label>
</div>

<div class="GameRoomYN-fields" style="display: <?php echo $GameRoom ? 'block' : 'none'; ?>; margin-bottom: 20px;">
    <div class="column-4">
       <input type="text" name="GameRoomLength" id="GameRoomLength" placeholder="Width (ft)" value="<?php echo $GameRoom ? $GameRoom['RoomLength'] : ''; ?>" >
       <input type="text" name="GameRoomWidth" id="GameRoomWidth" placeholder="Length (ft)" value="<?php echo $GameRoom ? $GameRoom['RoomWidth'] : ''; ?>" >
       
        <select name="GameRoomRoomLevel">
            <option value="">Select Room Level</option>
            <option value="Basement" <?php echo $GameRoom && $GameRoom['RoomLevel'] == 'Basement' ? 'selected' : ''; ?>>Basement</option>
            <option value="First" <?php echo $GameRoom && $GameRoom['RoomLevel'] == 'First' ? 'selected' : ''; ?>>First</option>
            <option value="Lower" <?php echo $GameRoom && $GameRoom['RoomLevel'] == 'Lower' ? 'selected' : ''; ?>>Lower</option>
            <option value="Main" <?php echo $GameRoom && $GameRoom['RoomLevel'] == 'Main' ? 'selected' : ''; ?>>Main</option>
            <option value="Second" <?php echo $GameRoom && $GameRoom['RoomLevel'] == 'Second' ? 'selected' : ''; ?>>Second</option>
            <option value="Third" <?php echo $GameRoom && $GameRoom['RoomLevel'] == 'Third' ? 'selected' : ''; ?>>Third</option>
            <option value="Upper" <?php echo $GameRoom && $GameRoom['RoomLevel'] == 'Upper' ? 'selected' : ''; ?>>Upper</option>
        </select>
    </div>
</div>


<div>
    <label for="GreatRoomYN" style="font-size: 18px; font-weight: 700;">
        <input type="checkbox" id="GreatRoomYN" name="GreatRoomYN" value="true" <?php echo $GreatRoom ? 'checked' : ''; ?>>
        Great Room
    </label>
</div>

<div class="GreatRoomYN-fields" style="display: <?php echo $GreatRoom ? 'block' : 'none'; ?>; margin-bottom: 20px;">
    <div class="column-4">
       <input type="text" name="GreatRoomLength" id="GreatRoomLength" placeholder="Width (ft)" value="<?php echo $GreatRoom ? $GreatRoom['RoomLength'] : ''; ?>" >
       <input type="text" name="GreatRoomWidth" id="GreatRoomWidth" placeholder="Length (ft)" value="<?php echo $GreatRoom ? $GreatRoom['RoomWidth'] : ''; ?>" >
       
        <select name="GreatRoomRoomLevel">
            <option value="">Select Room Level</option>
            <option value="Basement" <?php echo $GreatRoom && $GreatRoom['RoomLevel'] == 'Basement' ? 'selected' : ''; ?>>Basement</option>
            <option value="First" <?php echo $GreatRoom && $GreatRoom['RoomLevel'] == 'First' ? 'selected' : ''; ?>>First</option>
            <option value="Lower" <?php echo $GreatRoom && $GreatRoom['RoomLevel'] == 'Lower' ? 'selected' : ''; ?>>Lower</option>
            <option value="Main" <?php echo $GreatRoom && $GreatRoom['RoomLevel'] == 'Main' ? 'selected' : ''; ?>>Main</option>
            <option value="Second" <?php echo $GreatRoom && $GreatRoom['RoomLevel'] == 'Second' ? 'selected' : ''; ?>>Second</option>
            <option value="Third" <?php echo $GreatRoom && $GreatRoom['RoomLevel'] == 'Third' ? 'selected' : ''; ?>>Third</option>
            <option value="Upper" <?php echo $GreatRoom && $GreatRoom['RoomLevel'] == 'Upper' ? 'selected' : ''; ?>>Upper</option>
        </select>
    </div>
</div>


<div>
    <label for="GymYN" style="font-size: 18px; font-weight: 700;">
        <input type="checkbox" id="GymYN" name="GymYN" value="true" <?php echo $Gym ? 'checked' : ''; ?>>
        Gym
    </label>
</div>

<div class="GymYN-fields" style="display: <?php echo $Gym ? 'block' : 'none'; ?>; margin-bottom: 20px;">
    <div class="column-4">
       <input type="text" name="GymLength" id="GymLength" placeholder="Width (ft)" value="<?php echo $Gym ? $Gym['RoomLength'] : ''; ?>" >
       <input type="text" name="GymWidth" id="GymWidth" placeholder="Length (ft)" value="<?php echo $Gym ? $Gym['RoomWidth'] : ''; ?>" >
       
        <select name="GymRoomLevel">
            <option value="">Select Room Level</option>
            <option value="Basement" <?php echo $Gym && $Gym['RoomLevel'] == 'Basement' ? 'selected' : ''; ?>>Basement</option>
            <option value="First" <?php echo $Gym && $Gym['RoomLevel'] == 'First' ? 'selected' : ''; ?>>First</option>
            <option value="Lower" <?php echo $Gym && $Gym['RoomLevel'] == 'Lower' ? 'selected' : ''; ?>>Lower</option>
            <option value="Main" <?php echo $Gym && $Gym['RoomLevel'] == 'Main' ? 'selected' : ''; ?>>Main</option>
            <option value="Second" <?php echo $Gym && $Gym['RoomLevel'] == 'Second' ? 'selected' : ''; ?>>Second</option>
            <option value="Third" <?php echo $Gym && $Gym['RoomLevel'] == 'Third' ? 'selected' : ''; ?>>Third</option>
            <option value="Upper" <?php echo $Gym && $Gym['RoomLevel'] == 'Upper' ? 'selected' : ''; ?>>Upper</option>
        </select>
    </div>
</div>


<div>
    <label for="KitchenYN" style="font-size: 18px; font-weight: 700;">
        <input type="checkbox" id="KitchenYN" name="KitchenYN" value="true" <?php echo $Kitchen ? 'checked' : ''; ?>>
        Kitchen
    </label>
</div>

<div class="KitchenYN-fields" style="display: <?php echo $Kitchen ? 'block' : 'none'; ?>; margin-bottom: 20px;">
    <div class="column-4">
       <input type="text" name="KitchenLength" id="KitchenLength" placeholder="Width (ft)" value="<?php echo $Kitchen ? $Kitchen['RoomLength'] : ''; ?>" >
       <input type="text" name="KitchenWidth" id="KitchenWidth" placeholder="Length (ft)" value="<?php echo $Kitchen ? $Kitchen['RoomWidth'] : ''; ?>" >
       
        <select name="KitchenRoomLevel">
            <option value="">Select Room Level</option>
            <option value="Basement" <?php echo $Kitchen && $Kitchen['RoomLevel'] == 'Basement' ? 'selected' : ''; ?>>Basement</option>
            <option value="First" <?php echo $Kitchen && $Kitchen['RoomLevel'] == 'First' ? 'selected' : ''; ?>>First</option>
            <option value="Lower" <?php echo $Kitchen && $Kitchen['RoomLevel'] == 'Lower' ? 'selected' : ''; ?>>Lower</option>
            <option value="Main" <?php echo $Kitchen && $Kitchen['RoomLevel'] == 'Main' ? 'selected' : ''; ?>>Main</option>
            <option value="Second" <?php echo $Kitchen && $Kitchen['RoomLevel'] == 'Second' ? 'selected' : ''; ?>>Second</option>
            <option value="Third" <?php echo $Kitchen && $Kitchen['RoomLevel'] == 'Third' ? 'selected' : ''; ?>>Third</option>
            <option value="Upper" <?php echo $Kitchen && $Kitchen['RoomLevel'] == 'Upper' ? 'selected' : ''; ?>>Upper</option>
        </select>
    </div>
</div>


<div>
    <label for="LaundryYN" style="font-size: 18px; font-weight: 700;">
        <input type="checkbox" id="LaundryYN" name="LaundryYN" value="true" <?php echo $Laundry ? 'checked' : ''; ?>>
        Laundry
    </label>
</div>

<div class="LaundryYN-fields" style="display: <?php echo $Laundry ? 'block' : 'none'; ?>; margin-bottom: 20px;">
    <div class="column-4">
       <input type="text" name="LaundryLength" id="LaundryLength" placeholder="Width (ft)" value="<?php echo $Laundry ? $Laundry['RoomLength'] : ''; ?>" >
       <input type="text" name="LaundryWidth" id="LaundryWidth" placeholder="Length (ft)" value="<?php echo $Laundry ? $Laundry['RoomWidth'] : ''; ?>" >
       
        <select name="LaundryRoomLevel">
            <option value="">Select Room Level</option>
            <option value="Basement" <?php echo $Laundry && $Laundry['RoomLevel'] == 'Basement' ? 'selected' : ''; ?>>Basement</option>
            <option value="First" <?php echo $Laundry && $Laundry['RoomLevel'] == 'First' ? 'selected' : ''; ?>>First</option>
            <option value="Lower" <?php echo $Laundry && $Laundry['RoomLevel'] == 'Lower' ? 'selected' : ''; ?>>Lower</option>
            <option value="Main" <?php echo $Laundry && $Laundry['RoomLevel'] == 'Main' ? 'selected' : ''; ?>>Main</option>
            <option value="Second" <?php echo $Laundry && $Laundry['RoomLevel'] == 'Second' ? 'selected' : ''; ?>>Second</option>
            <option value="Third" <?php echo $Laundry && $Laundry['RoomLevel'] == 'Third' ? 'selected' : ''; ?>>Third</option>
            <option value="Upper" <?php echo $Laundry && $Laundry['RoomLevel'] == 'Upper' ? 'selected' : ''; ?>>Upper</option>
        </select>
    </div>
</div>


<div>
    <label for="LibraryYN" style="font-size: 18px; font-weight: 700;">
        <input type="checkbox" id="LibraryYN" name="LibraryYN" value="true" <?php echo $Library ? 'checked' : ''; ?>>
        Library
    </label>
</div>

<div class="LibraryYN-fields" style="display: <?php echo $Library ? 'block' : 'none'; ?>; margin-bottom: 20px;">
    <div class="column-4">
       <input type="text" name="LibraryLength" id="LibraryLength" placeholder="Width (ft)" value="<?php echo $Library ? $Library['RoomLength'] : ''; ?>" >
       <input type="text" name="LibraryWidth" id="LibraryWidth" placeholder="Length (ft)" value="<?php echo $Library ? $Library['RoomWidth'] : ''; ?>" >
       
        <select name="LibraryRoomLevel">
            <option value="">Select Room Level</option>
            <option value="Basement" <?php echo $Library && $Library['RoomLevel'] == 'Basement' ? 'selected' : ''; ?>>Basement</option>
            <option value="First" <?php echo $Library && $Library['RoomLevel'] == 'First' ? 'selected' : ''; ?>>First</option>
            <option value="Lower" <?php echo $Library && $Library['RoomLevel'] == 'Lower' ? 'selected' : ''; ?>>Lower</option>
            <option value="Main" <?php echo $Library && $Library['RoomLevel'] == 'Main' ? 'selected' : ''; ?>>Main</option>
            <option value="Second" <?php echo $Library && $Library['RoomLevel'] == 'Second' ? 'selected' : ''; ?>>Second</option>
            <option value="Third" <?php echo $Library && $Library['RoomLevel'] == 'Third' ? 'selected' : ''; ?>>Third</option>
            <option value="Upper" <?php echo $Library && $Library['RoomLevel'] == 'Upper' ? 'selected' : ''; ?>>Upper</option>
        </select>
    </div>
</div>


<div>
    <label for="LivingRoomYN" style="font-size: 18px; font-weight: 700;">
        <input type="checkbox" id="LivingRoomYN" name="LivingRoomYN" value="true" <?php echo $LivingRoom ? 'checked' : ''; ?>>
        Living Room
    </label>
</div>

<div class="LivingRoomYN-fields" style="display: <?php echo $LivingRoom ? 'block' : 'none'; ?>; margin-bottom: 20px;">
    <div class="column-4">
       <input type="text" name="LivingRoomLength" id="LivingRoomLength" placeholder="Width (ft)" value="<?php echo $LivingRoom ? $LivingRoom['RoomLength'] : ''; ?>" >
       <input type="text" name="LivingRoomWidth" id="LivingRoomWidth" placeholder="Length (ft)" value="<?php echo $LivingRoom ? $LivingRoom['RoomWidth'] : ''; ?>" >
       
        <select name="LivingRoomRoomLevel">
            <option value="">Select Room Level</option>
            <option value="Basement" <?php echo $LivingRoom && $LivingRoom['RoomLevel'] == 'Basement' ? 'selected' : ''; ?>>Basement</option>
            <option value="First" <?php echo $LivingRoom && $LivingRoom['RoomLevel'] == 'First' ? 'selected' : ''; ?>>First</option>
            <option value="Lower" <?php echo $LivingRoom && $LivingRoom['RoomLevel'] == 'Lower' ? 'selected' : ''; ?>>Lower</option>
            <option value="Main" <?php echo $LivingRoom && $LivingRoom['RoomLevel'] == 'Main' ? 'selected' : ''; ?>>Main</option>
            <option value="Second" <?php echo $LivingRoom && $LivingRoom['RoomLevel'] == 'Second' ? 'selected' : ''; ?>>Second</option>
            <option value="Third" <?php echo $LivingRoom && $LivingRoom['RoomLevel'] == 'Third' ? 'selected' : ''; ?>>Third</option>
            <option value="Upper" <?php echo $LivingRoom && $LivingRoom['RoomLevel'] == 'Upper' ? 'selected' : ''; ?>>Upper</option>
        </select>
    </div>
</div>


<div>
    <label for="LoftYN" style="font-size: 18px; font-weight: 700;">
        <input type="checkbox" id="LoftYN" name="LoftYN" value="true" <?php echo $Loft ? 'checked' : ''; ?>>
        Loft
    </label>
</div>

<div class="LoftYN-fields" style="display: <?php echo $Loft ? 'block' : 'none'; ?>; margin-bottom: 20px;">
    <div class="column-4">
       <input type="text" name="LoftLength" id="LoftLength" placeholder="Width (ft)" value="<?php echo $Loft ? $Loft['RoomLength'] : ''; ?>" >
       <input type="text" name="LoftWidth" id="LoftWidth" placeholder="Length (ft)" value="<?php echo $Loft ? $Loft['RoomWidth'] : ''; ?>" >
       
        <select name="LoftRoomLevel">
            <option value="">Select Room Level</option>
            <option value="Basement" <?php echo $Loft && $Loft['RoomLevel'] == 'Basement' ? 'selected' : ''; ?>>Basement</option>
            <option value="First" <?php echo $Loft && $Loft['RoomLevel'] == 'First' ? 'selected' : ''; ?>>First</option>
            <option value="Lower" <?php echo $Loft && $Loft['RoomLevel'] == 'Lower' ? 'selected' : ''; ?>>Lower</option>
            <option value="Main" <?php echo $Loft && $Loft['RoomLevel'] == 'Main' ? 'selected' : ''; ?>>Main</option>
            <option value="Second" <?php echo $Loft && $Loft['RoomLevel'] == 'Second' ? 'selected' : ''; ?>>Second</option>
            <option value="Third" <?php echo $Loft && $Loft['RoomLevel'] == 'Third' ? 'selected' : ''; ?>>Third</option>
            <option value="Upper" <?php echo $Loft && $Loft['RoomLevel'] == 'Upper' ? 'selected' : ''; ?>>Upper</option>
        </select>
    </div>
</div>


<div>
    <label for="MediaRoomYN" style="font-size: 18px; font-weight: 700;">
        <input type="checkbox" id="MediaRoomYN" name="MediaRoomYN" value="true" <?php echo $MediaRoom ? 'checked' : ''; ?>>
        Media Room
    </label>
</div>

<div class="MediaRoomYN-fields" style="display: <?php echo $MediaRoom ? 'block' : 'none'; ?>; margin-bottom: 20px;">
    <div class="column-4">
       <input type="text" name="MediaRoomLength" id="MediaRoomLength" placeholder="Width (ft)" value="<?php echo $MediaRoom ? $MediaRoom['RoomLength'] : ''; ?>" >
       <input type="text" name="MediaRoomWidth" id="MediaRoomWidth" placeholder="Length (ft)" value="<?php echo $MediaRoom ? $MediaRoom['RoomWidth'] : ''; ?>" >
       
        <select name="MediaRoomRoomLevel">
            <option value="">Select Room Level</option>
            <option value="Basement" <?php echo $MediaRoom && $MediaRoom['RoomLevel'] == 'Basement' ? 'selected' : ''; ?>>Basement</option>
            <option value="First" <?php echo $MediaRoom && $MediaRoom['RoomLevel'] == 'First' ? 'selected' : ''; ?>>First</option>
            <option value="Lower" <?php echo $MediaRoom && $MediaRoom['RoomLevel'] == 'Lower' ? 'selected' : ''; ?>>Lower</option>
            <option value="Main" <?php echo $MediaRoom && $MediaRoom['RoomLevel'] == 'Main' ? 'selected' : ''; ?>>Main</option>
            <option value="Second" <?php echo $MediaRoom && $MediaRoom['RoomLevel'] == 'Second' ? 'selected' : ''; ?>>Second</option>
            <option value="Third" <?php echo $MediaRoom && $MediaRoom['RoomLevel'] == 'Third' ? 'selected' : ''; ?>>Third</option>
            <option value="Upper" <?php echo $MediaRoom && $MediaRoom['RoomLevel'] == 'Upper' ? 'selected' : ''; ?>>Upper</option>
        </select>
    </div>
</div>


<div>
    <label for="OfficeYN" style="font-size: 18px; font-weight: 700;">
        <input type="checkbox" id="OfficeYN" name="OfficeYN" value="true" <?php echo $Office ? 'checked' : ''; ?>>
        Office
    </label>
</div>

<div class="OfficeYN-fields" style="display: <?php echo $Office ? 'block' : 'none'; ?>; margin-bottom: 20px;">
    <div class="column-4">
       <input type="text" name="OfficeLength" id="OfficeLength" placeholder="Width (ft)" value="<?php echo $Office ? $Office['RoomLength'] : ''; ?>" >
       <input type="text" name="OfficeWidth" id="OfficeWidth" placeholder="Length (ft)" value="<?php echo $Office ? $Office['RoomWidth'] : ''; ?>" >
       
        <select name="OfficeRoomLevel">
            <option value="">Select Room Level</option>
            <option value="Basement" <?php echo $Office && $Office['RoomLevel'] == 'Basement' ? 'selected' : ''; ?>>Basement</option>
            <option value="First" <?php echo $Office && $Office['RoomLevel'] == 'First' ? 'selected' : ''; ?>>First</option>
            <option value="Lower" <?php echo $Office && $Office['RoomLevel'] == 'Lower' ? 'selected' : ''; ?>>Lower</option>
            <option value="Main" <?php echo $Office && $Office['RoomLevel'] == 'Main' ? 'selected' : ''; ?>>Main</option>
            <option value="Second" <?php echo $Office && $Office['RoomLevel'] == 'Second' ? 'selected' : ''; ?>>Second</option>
            <option value="Third" <?php echo $Office && $Office['RoomLevel'] == 'Third' ? 'selected' : ''; ?>>Third</option>
            <option value="Upper" <?php echo $Office && $Office['RoomLevel'] == 'Upper' ? 'selected' : ''; ?>>Upper</option>
        </select>
    </div>
</div>


<div>
    <label for="SaunaYN" style="font-size: 18px; font-weight: 700;">
        <input type="checkbox" id="SaunaYN" name="SaunaYN" value="true" <?php echo $Sauna ? 'checked' : ''; ?>>
        Sauna
    </label>
</div>

<div class="SaunaYN-fields" style="display: <?php echo $Sauna ? 'block' : 'none'; ?>; margin-bottom: 20px;">
    <div class="column-4">
       <input type="text" name="SaunaLength" id="SaunaLength" placeholder="Width (ft)" value="<?php echo $Sauna ? $Sauna['RoomLength'] : ''; ?>" >
       <input type="text" name="SaunaWidth" id="SaunaWidth" placeholder="Length (ft)" value="<?php echo $Sauna ? $Sauna['RoomWidth'] : ''; ?>" >
       
        <select name="SaunaRoomLevel">
            <option value="">Select Room Level</option>
            <option value="Basement" <?php echo $Sauna && $Sauna['RoomLevel'] == 'Basement' ? 'selected' : ''; ?>>Basement</option>
            <option value="First" <?php echo $Sauna && $Sauna['RoomLevel'] == 'First' ? 'selected' : ''; ?>>First</option>
            <option value="Lower" <?php echo $Sauna && $Sauna['RoomLevel'] == 'Lower' ? 'selected' : ''; ?>>Lower</option>
            <option value="Main" <?php echo $Sauna && $Sauna['RoomLevel'] == 'Main' ? 'selected' : ''; ?>>Main</option>
            <option value="Second" <?php echo $Sauna && $Sauna['RoomLevel'] == 'Second' ? 'selected' : ''; ?>>Second</option>
            <option value="Third" <?php echo $Sauna && $Sauna['RoomLevel'] == 'Third' ? 'selected' : ''; ?>>Third</option>
            <option value="Upper" <?php echo $Sauna && $Sauna['RoomLevel'] == 'Upper' ? 'selected' : ''; ?>>Upper</option>
        </select>
    </div>
</div>


<div>
    <label for="UtilityRoomYN" style="font-size: 18px; font-weight: 700;">
        <input type="checkbox" id="UtilityRoomYN" name="UtilityRoomYN" value="true" <?php echo $UtilityRoom ? 'checked' : ''; ?>>
        Utility Room
    </label>
</div>

<div class="UtilityRoomYN-fields" style="display: <?php echo $UtilityRoom ? 'block' : 'none'; ?>; margin-bottom: 20px;">
    <div class="column-4">
       <input type="text" name="UtilityRoomLength" id="UtilityRoomLength" placeholder="Width (ft)" value="<?php echo $UtilityRoom ? $UtilityRoom['RoomLength'] : ''; ?>" >
       <input type="text" name="UtilityRoomWidth" id="UtilityRoomWidth" placeholder="Length (ft)" value="<?php echo $UtilityRoom ? $UtilityRoom['RoomWidth'] : ''; ?>" >
       
        <select name="UtilityRoomRoomLevel">
            <option value="">Select Room Level</option>
            <option value="Basement" <?php echo $UtilityRoom && $UtilityRoom['RoomLevel'] == 'Basement' ? 'selected' : ''; ?>>Basement</option>
            <option value="First" <?php echo $UtilityRoom && $UtilityRoom['RoomLevel'] == 'First' ? 'selected' : ''; ?>>First</option>
            <option value="Lower" <?php echo $UtilityRoom && $UtilityRoom['RoomLevel'] == 'Lower' ? 'selected' : ''; ?>>Lower</option>
            <option value="Main" <?php echo $UtilityRoom && $UtilityRoom['RoomLevel'] == 'Main' ? 'selected' : ''; ?>>Main</option>
            <option value="Second" <?php echo $UtilityRoom && $UtilityRoom['RoomLevel'] == 'Second' ? 'selected' : ''; ?>>Second</option>
            <option value="Third" <?php echo $UtilityRoom && $UtilityRoom['RoomLevel'] == 'Third' ? 'selected' : ''; ?>>Third</option>
            <option value="Upper" <?php echo $UtilityRoom && $UtilityRoom['RoomLevel'] == 'Upper' ? 'selected' : ''; ?>>Upper</option>
        </select>
    </div>
</div>


<div>
    <label for="WorkshopYN" style="font-size: 18px; font-weight: 700;">
        <input type="checkbox" id="WorkshopYN" name="WorkshopYN" value="true" <?php echo $Workshop ? 'checked' : ''; ?>>
        Workshop
    </label>
</div>

<div class="WorkshopYN-fields" style="display: <?php echo $Workshop ? 'block' : 'none'; ?>; margin-bottom: 20px;">
    <div class="column-4">
       <input type="text" name="WorkshopLength" id="WorkshopLength" placeholder="Width (ft)" value="<?php echo $Workshop ? $Workshop['RoomLength'] : ''; ?>" >
       <input type="text" name="WorkshopWidth" id="WorkshopWidth" placeholder="Length (ft)" value="<?php echo $Workshop ? $Workshop['RoomWidth'] : ''; ?>" >
       
        <select name="WorkshopRoomLevel">
            <option value="">Select Room Level</option>
            <option value="Basement" <?php echo $Workshop && $Workshop['RoomLevel'] == 'Basement' ? 'selected' : ''; ?>>Basement</option>
            <option value="First" <?php echo $Workshop && $Workshop['RoomLevel'] == 'First' ? 'selected' : ''; ?>>First</option>
            <option value="Lower" <?php echo $Workshop && $Workshop['RoomLevel'] == 'Lower' ? 'selected' : ''; ?>>Lower</option>
            <option value="Main" <?php echo $Workshop && $Workshop['RoomLevel'] == 'Main' ? 'selected' : ''; ?>>Main</option>
            <option value="Second" <?php echo $Workshop && $Workshop['RoomLevel'] == 'Second' ? 'selected' : ''; ?>>Second</option>
            <option value="Third" <?php echo $Workshop && $Workshop['RoomLevel'] == 'Third' ? 'selected' : ''; ?>>Third</option>
            <option value="Upper" <?php echo $Workshop && $Workshop['RoomLevel'] == 'Upper' ? 'selected' : ''; ?>>Upper</option>
        </select>
    </div>
</div>







 <button type="submit">Update Rooms</button>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ownersBedroomCheckbox = document.getElementById('OwnersBedroomYN');
        const ownersBedroomFields = document.querySelector('.OwnersBedroomYN-fields');

        ownersBedroomCheckbox.addEventListener('change', function() {
            if (this.checked) {
                ownersBedroomFields.style.display = 'block';
            } else {
                ownersBedroomFields.style.display = 'none';
            }
        });

        const bedroom1Checkbox = document.getElementById('Bedroom1YN');
        const bedroom1Fields = document.querySelector('.Bedroom1YN-fields');

        bedroom1Checkbox.addEventListener('change', function() {
            if (this.checked) {
                bedroom1Fields.style.display = 'block';
            } else {
                bedroom1Fields.style.display = 'none';
            }
        });

        const bedroom2Checkbox = document.getElementById('Bedroom2YN');
        const bedroom2Fields = document.querySelector('.Bedroom2YN-fields');

        bedroom2Checkbox.addEventListener('change', function() {
            if (this.checked) {
                bedroom2Fields.style.display = 'block';
            } else {
                bedroom2Fields.style.display = 'none';
            }
        });

        const bedroom3Checkbox = document.getElementById('Bedroom3YN');
        const bedroom3Fields = document.querySelector('.Bedroom3YN-fields');

        bedroom3Checkbox.addEventListener('change', function() {
            if (this.checked) {
                bedroom3Fields.style.display = 'block';
            } else {
                bedroom3Fields.style.display = 'none';
            }
        });

        const bedroom4Checkbox = document.getElementById('Bedroom4YN');
        const bedroom4Fields = document.querySelector('.Bedroom4YN-fields');

        bedroom4Checkbox.addEventListener('change', function() {
            if (this.checked) {
                bedroom4Fields.style.display = 'block';
            } else {
                bedroom4Fields.style.display = 'none';
            }
        });

        const bedroom5Checkbox = document.getElementById('Bedroom5YN');
        const bedroom5Fields = document.querySelector('.Bedroom5YN-fields');

        bedroom5Checkbox.addEventListener('change', function() {
            if (this.checked) {
                bedroom5Fields.style.display = 'block';
            } else {
                bedroom5Fields.style.display = 'none';
            }
        });

        const diningRoomCheckbox = document.getElementById('DiningRoomYN');
        const diningRoomFields = document.querySelector('.DiningRoomYN-fields');

        diningRoomCheckbox.addEventListener('change', function() {
            if (this.checked) {
                diningRoomFields.style.display = 'block';
            } else {
                diningRoomFields.style.display = 'none';
            }
        });

        const basementCheckbox = document.getElementById('BasementYN');
        const basementFields = document.querySelector('.BasementYN-fields');

        basementCheckbox.addEventListener('change', function() {
            if (this.checked) {
                basementFields.style.display = 'block';
            } else {
                basementFields.style.display = 'none';
            }
        });

        const denCheckbox = document.getElementById('DenYN');
        const denFields = document.querySelector('.DenYN-fields');

        denCheckbox.addEventListener('change', function() {
            if (this.checked) {
                denFields.style.display = 'block';
            } else {
                denFields.style.display = 'none';
            }
        });

        const familyRoomCheckbox = document.getElementById('FamilyRoomYN');
        const familyRoomFields = document.querySelector('.FamilyRoomYN-fields');

        familyRoomCheckbox.addEventListener('change', function() {
            if (this.checked) {
                familyRoomFields.style.display = 'block';
            } else {
                familyRoomFields.style.display = 'none';
            }
        });

        const gameRoomCheckbox = document.getElementById('GameRoomYN');
        const gameRoomFields = document.querySelector('.GameRoomYN-fields');

        gameRoomCheckbox.addEventListener('change', function() {
            if (this.checked) {
                gameRoomFields.style.display = 'block';
            } else {
                gameRoomFields.style.display = 'none';
            }
        });

        const greatRoomCheckbox = document.getElementById('GreatRoomYN');
        const greatRoomFields = document.querySelector('.GreatRoomYN-fields');

        greatRoomCheckbox.addEventListener('change', function() {
            if (this.checked) {
                greatRoomFields.style.display = 'block';
            } else {
                greatRoomFields.style.display = 'none';
            }
        });

        const gymCheckbox = document.getElementById('GymYN');
        const gymFields = document.querySelector('.GymYN-fields');

        gymCheckbox.addEventListener('change', function() {
            if (this.checked) {
                gymFields.style.display = 'block';
            } else {
                gymFields.style.display = 'none';
            }
        });

        const kitchenCheckbox = document.getElementById('KitchenYN');
        const kitchenFields = document.querySelector('.KitchenYN-fields');

        kitchenCheckbox.addEventListener('change', function() {
            if (this.checked) {
                kitchenFields.style.display = 'block';
            } else {
                kitchenFields.style.display = 'none';
            }
        });

        const laundryCheckbox = document.getElementById('LaundryYN');
        const laundryFields = document.querySelector('.LaundryYN-fields');

        laundryCheckbox.addEventListener('change', function() {
            if (this.checked) {
                laundryFields.style.display = 'block';
            } else {
                laundryFields.style.display = 'none';
            }
        });

        const libraryCheckbox = document.getElementById('LibraryYN');
        const libraryFields = document.querySelector('.LibraryYN-fields');

        libraryCheckbox.addEventListener('change', function() {
            if (this.checked) {
                libraryFields.style.display = 'block';
            } else {
                libraryFields.style.display = 'none';
            }
        });

        const livingRoomCheckbox = document.getElementById('LivingRoomYN');
        const livingRoomFields = document.querySelector('.LivingRoomYN-fields');

        livingRoomCheckbox.addEventListener('change', function() {
            if (this.checked) {
                livingRoomFields.style.display = 'block';
            } else {
                livingRoomFields.style.display = 'none';
            }
        });

        const loftCheckbox = document.getElementById('LoftYN');
        const loftFields = document.querySelector('.LoftYN-fields');

        loftCheckbox.addEventListener('change', function() {
            if (this.checked) {
                loftFields.style.display = 'block';
            } else {
                loftFields.style.display = 'none';
            }
        });

        const mediaRoomCheckbox = document.getElementById('MediaRoomYN');
        const mediaRoomFields = document.querySelector('.MediaRoomYN-fields');

        mediaRoomCheckbox.addEventListener('change', function() {
            if (this.checked) {
                mediaRoomFields.style.display = 'block';
            } else {
                mediaRoomFields.style.display = 'none';
            }
        });

        const officeCheckbox = document.getElementById('OfficeYN');
        const officeFields = document.querySelector('.OfficeYN-fields');

        officeCheckbox.addEventListener('change', function() {
            if (this.checked) {
                officeFields.style.display = 'block';
            } else {
                officeFields.style.display = 'none';
            }
        });

        const saunaCheckbox = document.getElementById('SaunaYN');
        const saunaFields = document.querySelector('.SaunaYN-fields');

        saunaCheckbox.addEventListener('change', function() {
            if (this.checked) {
                saunaFields.style.display = 'block';
            } else {
                saunaFields.style.display = 'none';
            }
        });

        const utilityRoomCheckbox = document.getElementById('UtilityRoomYN');
        const utilityRoomFields = document.querySelector('.UtilityRoomYN-fields');

        utilityRoomCheckbox.addEventListener('change', function() {
            if (this.checked) {
                utilityRoomFields.style.display = 'block';
            } else {
                utilityRoomFields.style.display = 'none';
            }
        });

        const workshopCheckbox = document.getElementById('WorkshopYN');
        const workshopFields = document.querySelector('.WorkshopYN-fields');

        workshopCheckbox.addEventListener('change', function() {
            if (this.checked) {
                workshopFields.style.display = 'block';
            } else {
                workshopFields.style.display = 'none';
            }
        });


    });
</script>


<script>

// Wait for the document to be ready
jQuery(document).ready(function($) {
    // Add submit handler to the roomForm
    $('#roomForm').on('submit', function(e) {
        // Prevent the default form submission initially
        e.preventDefault();
        
        // Store reference to the form
        const form = this;
        
        // Send AJAX request first
        fetch('<?php echo esc_js($updateBathroomURL); ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                listing_key: '<?php echo esc_js($_GET['listing']); ?>',
                BathroomsFull: $("#BathroomsFull").val(),
                BathroomsThreeQuarter: $("#BathroomsThreeQuarter").val(),
                BathroomsHalf: $("#BathroomsHalf").val(),
                BathroomsOneQuarter: $("#BathroomsOneQuarter").val(),
            })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log('Success:', data);
            
            // Show success message
            // alert('Bathroom information updated successfully!');
            
            // Continue with the normal form submission
            form.submit();
        })
        .catch(error => {
            console.error('Error:', error);
            
            // Show error message to the user
            alert('There was a problem updating the bathroom information. Please try again.');
            
            // Optionally allow the form to submit anyway
            // Uncomment the line below if you want the form to submit even on AJAX failure
            // form.submit();
        });
    });
});

</script>