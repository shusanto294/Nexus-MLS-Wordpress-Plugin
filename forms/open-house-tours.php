<?php

require plugin_dir_path(__FILE__) . '../fetch-open-houses.php';   

//Delete open houses

// $switchValue = $_POST['OpenHouseYN'];
// var_dump($switchValue);




// Process the form submission
if(isset($_POST['ListingKey'])):



    $formData = array(
        'ShowingServiceName' => $_POST['ShowingServiceName'] ?? null,
        'ShowingURL' => $_POST['ShowingURL'] ?? null,
    );

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


    if(isset($_POST['OpenHouseYN'])):

        require plugin_dir_path(__FILE__) . '../delete-open-houses.php';   
    
        //Add new open house
    
        // Get the form input values
        $startTime = $_POST['OpenHouseStartTime']; // Format: HH:MM
        $endTime = $_POST['OpenHouseEndTime'];     // Format: HH:MM
        $date = $_POST['OpenHouseDate'];           // Format: YYYY-MM-DD
    
        // Convert to ISO format (YYYY-MM-DDThh:mm:ss.sssZ)
        $startDateTime = new DateTime($date . 'T' . $startTime . ':00');
        $endDateTime = new DateTime($date . 'T' . $endTime . ':00');
        $dateDateTime = new DateTime($date . 'T00:00:00');
    
        // Format to ISO 8601 with milliseconds and Z timezone
        $startISO = $startDateTime->format('Y-m-d\TH:i:s') . '.000Z';
        $endISO = $endDateTime->format('Y-m-d\TH:i:s') . '.000Z';
        $dateISO = $dateDateTime->format('Y-m-d\TH:i:s') . '.000Z';
    
        $curl = curl_init();
    
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.nexusmls.io/OpenHouse",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode([
              'ListingKey' => $listing,
              'OpenHouseStartTime' => $startISO,
              'OpenHouseEndTime' => $endISO,
              'OpenHouseDate' => $dateISO
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
              $OpenHouses[] = $jsonResponse;
          }
    else:
        require plugin_dir_path(__FILE__) . '../delete-open-houses.php';   
        $OpenHouses = array();
    endif;



endif;

require plugin_dir_path(__FILE__) . '../fetch-listing-details.php';

// var_dump($OpenHouses);


?>


<form method="POST" class="nexus-mls-form listing-tab-content">
<input type="hidden" name="ListingKey" value="<?php echo $listing; ?>">

<h2>Open House</h2>

<div >
    <label for="OpenHouseYN" style="font-size: 18px; font-weight: 700;" >
        <input type="checkbox" id="OpenHouseYN" name="OpenHouseYN" value="true" <?php echo count($OpenHouses) > 0 ? 'checked' : ''; ?>>
        Open House
    </label>
</div>

<div class="OpenHouseYN-fields" style="display: <?php echo count($OpenHouses) > 0 ? 'block' : 'none'; ?>;margin-bottom: 20px;">
    <div class="column-3">
        <div>
            <label for="OpenHouseStartTime">Start time</label>
            <input type="time" name="OpenHouseStartTime" placeholder="Start Time" value="<?php echo $startTime; ?>">
        </div>
        <div>
            <label for="OpenHouseEndTime">End time</label>
            <input type="time" name="OpenHouseEndTime" placeholder="End Time" value="<?php echo $endTime; ?>">
        </div>
        <div>
            <label for="OpenHouseDate">Date</label>
            <input type="date" name="OpenHouseDate" placeholder="Date" value="<?php echo $date; ?>">
        </div>
    </div>
</div>


<h5>Making Showing Requests via:</h5>

<div>
    <select name="ShowingServiceName">
        <option value="">Select Showing Service Name</option>
        <option value="About Time" <?php echo $listingData['ShowingServiceName'] == 'About Time' ? 'selected' : ''; ?>>About Time</option>
        <option value="Aligned Showings" <?php echo $listingData['ShowingServiceName'] == 'Aligned Showings' ? 'selected' : ''; ?>>Aligned Showings</option>
        <option value="Beans" <?php echo $listingData['ShowingServiceName'] == 'Beans' ? 'selected' : ''; ?>>Beans</option>
        <option value="BrokerBay" <?php echo $listingData['ShowingServiceName'] == 'BrokerBay' ? 'selected' : ''; ?>>BrokerBay</option>
        <option value="Contact Brokerage Office" <?php echo $listingData['ShowingServiceName'] == 'Contact Brokerage Office' ? 'selected' : ''; ?>>Contact Brokerage Office</option>
        <option value="Email Listing Agent" <?php echo $listingData['ShowingServiceName'] == 'Email Listing Agent' ? 'selected' : ''; ?>>Email Listing Agent</option>
        <option value="Instashowing" <?php echo $listingData['ShowingServiceName'] == 'Instashowing' ? 'selected' : ''; ?>>Instashowing</option>
        <option value="Local Showing by Delta Media" <?php echo $listingData['ShowingServiceName'] == 'Local Showing by Delta Media' ? 'selected' : ''; ?>>Local Showing by Delta Media</option>
        <option value="Phone Listing Agent" <?php echo $listingData['ShowingServiceName'] == 'Phone Listing Agent' ? 'selected' : ''; ?>>Phone Listing Agent</option>
        <option value="Real Happy" <?php echo $listingData['ShowingServiceName'] == 'Real Happy' ? 'selected' : ''; ?>>Real Happy</option>
        <option value="Sentrilock" <?php echo $listingData['ShowingServiceName'] == 'Sentrilock' ? 'selected' : ''; ?>>Sentrilock</option>
        <option value="Showingly" <?php echo $listingData['ShowingServiceName'] == 'Showingly' ? 'selected' : ''; ?>>Showingly</option>
        <option value="ShowingSmart" <?php echo $listingData['ShowingServiceName'] == 'ShowingSmart' ? 'selected' : ''; ?>>ShowingSmart</option>
        <option value="ShowingTime" <?php echo $listingData['ShowingServiceName'] == 'ShowingTime' ? 'selected' : ''; ?>>ShowingTime</option>
        <option value="TouchBase" <?php echo $listingData['ShowingServiceName'] == 'TouchBase' ? 'selected' : ''; ?>>TouchBase</option>
        <option value="Toura" <?php echo $listingData['ShowingServiceName'] == 'Toura' ? 'selected' : ''; ?>>Toura</option>
        <option value="TourZazz" <?php echo $listingData['ShowingServiceName'] == 'TourZazz' ? 'selected' : ''; ?>>TourZazz</option>
    </select>
</div>

<div>
    <input type="text" name="ShowingURL" placeholder="Showing URL" value="<?php echo $listingData['ShowingURL']; ?>">
</div>


<button type="submit">Save Information</button>
</form>

<script>
document.getElementById('OpenHouseYN').addEventListener('change', function() {
    var fields = document.querySelector('.OpenHouseYN-fields');
    if (this.checked) {
        fields.style.display = 'block';
    } else {
        fields.style.display = 'none';
    }
});
</script>