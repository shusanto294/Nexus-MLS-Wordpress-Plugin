<?php if($currentTab == 'all-listings' && !$listing): ?>
    <div class="all-listing-header">
        <h2>My Listings</h2>
        <a href="?tab=add-new-listing">Add new Listing</a>
    </div>

    <?php

        $curl = curl_init();

        if(isset($_GET['delete'])){
            $listingKey = $_GET['delete'];

            curl_setopt_array($curl, [
                CURLOPT_URL => "https://api.nexusmls.io/Property('$listingKey')",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "PATCH",
                CURLOPT_POSTFIELDS => json_encode(array('StandardStatus' => 'Delete')), 
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

                echo '<p style="color: red;">Listing Deleted</p>';
                
            }
        }

        // Get current user email from WordPress
        $current_user = wp_get_current_user();
        $user_email = $current_user->user_email;

        // Build URL with parameters
        $filter_params = [
            "ListAgentEmail eq '" . $user_email . "'",
            "StandardStatus ne 'Delete'"
        ];
        $filter_params = urlencode(implode(" and ", $filter_params));
        $api_url = "https://api.nexusmls.io/Property?\$top=25&\$filter=" . $filter_params;

        if(isset($_POST['nextPageUrl'])){
            $api_url = $_POST['nextPageUrl'];
        }

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
                ?>

                

                    <table class="nexus-mls-table">

                        <tbody>
                            <?php
                            if (empty($results)) {
                                echo '<tr><td colspan="5">No listings found.</td></tr>';
                            } else {

                            ?>
                            <thead>
                                <tr>
                                    <th scope="col">Listing Key</th>
                                    <th scope="col">Street</th>
									<th scope="col">City</th>
									<th scope="col">State</th>
                                    <th scope="col">Satus</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <?php
                                foreach ($results as $result) {
                                    ?>
                                    <tr>
                                        <td><a href="?tab=all-listings&listing=<?php echo esc_html($result['ListingKey']); ?>"><?php echo esc_html($result['ListingKey']); ?></a></td>
                                        <td><?php echo esc_html($result['StreetName']); ?></td>
										<td><?php echo esc_html($result['City']); ?></td>
										<td><?php echo esc_html($result['StateOrProvince']); ?></td>
                                        <td><?php echo esc_html($result['StandardStatus']); ?></td>
                                        <td><?php echo isset($result['ListPrice']) ? '$' . number_format($result['ListPrice'], 2) : ''; ?></td>
                                        <td><a href="?tab=all-listings&delete=<?php echo $result['ListingKey'] ?>">Delete</a></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                <?php
            } else {
                echo json_encode(["error" => "Invalid JSON response"]);
            }
        }
        
?>

    <?php if(isset($jsonResponse['@odata.nextLink'])): ?>
        <form method="POST" class="nexus-mls-form pagination-form">
                <input type="hidden" name="nextPageUrl" value="<?php echo $jsonResponse['@odata.nextLink']; ?>">
                <button type="submit" class="pagination-button">Next Page</button>
        </form>
    <?php endif; ?>

<?php endif; ?>