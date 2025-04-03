<form method="POST" class="nexus-mls-form listing-tab-content">
<input type="hidden" name="ListingKey" value="<?php echo $listing; ?>">

<h2>Open House</h2>


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