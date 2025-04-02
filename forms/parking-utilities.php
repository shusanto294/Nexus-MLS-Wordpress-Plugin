<form method="POST" class="nexus-mls-form listing-tab-content">
<input type="hidden" name="ListingKey" value="<?php echo $listing; ?>">

<h2>Parking</h2>

<div>
    <label for="GarageYN">
        <input type="checkbox" id="GarageYN" name="GarageYN" value="true" <?php echo $listingData['GarageYN'] ? 'checked' : ''; ?>>
        Garage
    </label>
</div>

<div class="GarageYN-fields" style="display: <?php echo $listingData['GarageYN'] ? 'block' : 'none'; ?>;">
    <input type="text" id="GarageSpaces" name="GarageSpaces" placeholder="# of Spaces" value="<?php echo $listingData['GarageSpaces']; ?>">
</div>

<div>
    <label for="CarportYN">
        <input type="checkbox" id="CarportYN" name="CarportYN" value="true" <?php echo $listingData['CarportYN'] ? 'checked' : ''; ?>>
        Carport
    </label>
</div>

<div class="CarportYN-fields" style="display: <?php echo $listingData['CarportYN'] ? 'block' : 'none'; ?>;">
    <input type="text" id="CarportSpaces" name="CarportSpaces" placeholder="# of Spaces" value="<?php echo $listingData['CarportSpaces']; ?>">
</div>

<div>
    <label for="OpenParkingYN">
        <input type="checkbox" id="OpenParkingYN" name="OpenParkingYN" value="true" <?php echo $listingData['OpenParkingYN'] ? 'checked' : ''; ?>>
        Open Parking
    </label>
</div>

<div class="OpenParkingYN-fields" style="display: <?php echo $listingData['OpenParkingYN'] ? 'block' : 'none'; ?>;">
    <input type="text" id="OpenParkingSpaces" name="OpenParkingSpaces" placeholder="# of Spaces" value="<?php echo $listingData['OpenParkingSpaces']; ?>">
</div>

<h5>Parking Features</h5>

<div class="inline-checkboxes">
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="None" <?php echo in_array('None', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>None</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Additional Parking" <?php echo in_array('Additional Parking', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Additional Parking</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Aggregate" <?php echo in_array('Aggregate', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Aggregate</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Alley Access" <?php echo in_array('Alley Access', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Alley Access</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Asphalt" <?php echo in_array('Asphalt', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Asphalt</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Assigned" <?php echo in_array('Assigned', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Assigned</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Attached" <?php echo in_array('Attached', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Attached</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Attached Carport" <?php echo in_array('Attached Carport', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Attached Carport</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Basement" <?php echo in_array('Basement', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Basement</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Boat" <?php echo in_array('Boat', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Boat</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Carport" <?php echo in_array('Carport', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Carport</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Circular Driveway" <?php echo in_array('Circular Driveway', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Circular Driveway</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Common" <?php echo in_array('Common', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Common</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Community Structure" <?php echo in_array('Community Structure', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Community Structure</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Concrete" <?php echo in_array('Concrete', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Concrete</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Converted Garage" <?php echo in_array('Converted Garage', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Converted Garage</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Covered" <?php echo in_array('Covered', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Covered</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Deck" <?php echo in_array('Deck', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Deck</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Deeded" <?php echo in_array('Deeded', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Deeded</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Detached" <?php echo in_array('Detached', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Detached</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Detached Carport" <?php echo in_array('Detached Carport', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Detached Carport</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Direct Access" <?php echo in_array('Direct Access', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Direct Access</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Drive Through" <?php echo in_array('Drive Through', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Drive Through</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Driveway" <?php echo in_array('Driveway', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Driveway</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Electric Gate" <?php echo in_array('Electric Gate', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Electric Gate</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Electric Vehicle Charging Station(s)" <?php echo in_array('Electric Vehicle Charging Station(s)', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Electric Vehicle Charging Station(s)</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Enclosed" <?php echo in_array('Enclosed', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Enclosed</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Garage" <?php echo in_array('Garage', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Garage</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Garage Door Opener" <?php echo in_array('Garage Door Opener', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Garage Door Opener</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Garage Faces Front" <?php echo in_array('Garage Faces Front', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Garage Faces Front</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Garage Faces Rear" <?php echo in_array('Garage Faces Rear', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Garage Faces Rear</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Garage Faces Side" <?php echo in_array('Garage Faces Side', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Garage Faces Side</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Gated" <?php echo in_array('Gated', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Gated</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Golf Cart Garage" <?php echo in_array('Golf Cart Garage', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Golf Cart Garage</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Gravel" <?php echo in_array('Gravel', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Gravel</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Guest" <?php echo in_array('Guest', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Guest</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Heated Garage" <?php echo in_array('Heated Garage', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Heated Garage</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Inside Entrance" <?php echo in_array('Inside Entrance', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Inside Entrance</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Kitchen Level" <?php echo in_array('Kitchen Level', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Kitchen Level</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Leased" <?php echo in_array('Leased', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Leased</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Lighted" <?php echo in_array('Lighted', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Lighted</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="No Garage" <?php echo in_array('No Garage', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>No Garage</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Off Site" <?php echo in_array('Off Site', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Off Site</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Off Street" <?php echo in_array('Off Street', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Off Street</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="On Site" <?php echo in_array('On Site', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>On Site</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="On Street" <?php echo in_array('On Street', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>On Street</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Open" <?php echo in_array('Open', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Open</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Other" <?php echo in_array('Other', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Other</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Outside" <?php echo in_array('Outside', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Outside</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Oversized" <?php echo in_array('Oversized', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Oversized</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Parking Lot" <?php echo in_array('Parking Lot', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Parking Lot</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Parking Pad" <?php echo in_array('Parking Pad', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Parking Pad</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Paved" <?php echo in_array('Paved', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Paved</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Paver Block" <?php echo in_array('Paver Block', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Paver Block</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Permit Required" <?php echo in_array('Permit Required', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Permit Required</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Private" <?php echo in_array('Private', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Private</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="RV Access/Parking" <?php echo in_array('RV Access/Parking', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>RV Access/Parking</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="RV Carport" <?php echo in_array('RV Carport', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>RV Carport</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="RV Garage" <?php echo in_array('RV Garage', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>RV Garage</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="RV Gated" <?php echo in_array('RV Gated', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>RV Gated</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Secured" <?php echo in_array('Secured', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Secured</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="See Remarks" <?php echo in_array('See Remarks', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>See Remarks</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Shared Driveway" <?php echo in_array('Shared Driveway', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Shared Driveway</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Side By Side" <?php echo in_array('Side By Side', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Side By Side</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Storage" <?php echo in_array('Storage', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Storage</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Tandem" <?php echo in_array('Tandem', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Tandem</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Unassigned" <?php echo in_array('Unassigned', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Unassigned</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Underground" <?php echo in_array('Underground', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Underground</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Unpaved" <?php echo in_array('Unpaved', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Unpaved</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Valet" <?php echo in_array('Valet', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Valet</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Varies by Unit" <?php echo in_array('Varies by Unit', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Varies by Unit</span>
    </label>
    <label>
        <input type="checkbox" name="ParkingFeatures[]" value="Workshop in Garage" <?php echo in_array('Workshop in Garage', $listingData['ParkingFeatures']) ? 'checked' : ''; ?>>
        <span>Workshop in Garage</span>
    </label>

</div>

<h2>Utilities</h2>

<div>
    <label for="HeatingYN" style="font-size: 18px; font-weight: 700;">
        <input type="checkbox" id="HeatingYN" name="HeatingYN" value="true" <?php echo $listingData['HeatingYN'] ? 'checked' : ''; ?>>
        Heating
    </label>
</div>

<div class="HeatingYN-fields" style="display: <?php echo $listingData['HeatingYN'] ? 'block' : 'none'; ?>;margin-bottom: 20px;">

   <div class="inline-checkboxes">
        <label>
            <input type="checkbox" name="Heating[]" value="None" <?php echo in_array('None', $listingData['Heating']) ? 'checked' : ''; ?>>
            <span>None</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Active Solar" <?php echo in_array('Active Solar', $listingData['Heating']) ? 'checked' : ''; ?>>
            <span>Active Solar</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Baseboard" <?php echo in_array('Baseboard', $listingData['Heating']) ? 'checked' : ''; ?>>
            <span>Baseboard</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Ceiling" <?php echo in_array('Ceiling', $listingData['Heating']) ? 'checked' : ''; ?>>
            <span>Ceiling</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Central" <?php echo in_array('Central', $listingData['Heating']) ? 'checked' : ''; ?>>
            <span>Central</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Coal" <?php echo in_array('Coal', $listingData['Heating']) ? 'checked' : ''; ?>>
            <span>Coal</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Coal Stove" <?php echo in_array('Coal Stove', $listingData['Heating']) ? 'checked' : ''; ?>>
            <span>Coal Stove</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Ductless" <?php echo in_array('Ductless', $listingData['Heating']) ? 'checked' : ''; ?>>
            <span>Ductless</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Electric" <?php echo in_array('Electric', $listingData['Heating']) ? 'checked' : ''; ?>>
            <span>Electric</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="ENERGY STAR Qualified Equipment" <?php echo in_array('ENERGY STAR Qualified Equipment', $listingData['Heating']) ? 'checked' : ''; ?>>
            <span>ENERGY STAR Qualified Equipment</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="ENERGY STAR/ACCA RSI Qualified Installation" <?php echo in_array('ENERGY STAR/ACCA RSI Qualified Installation', $listingData['Heating']) ? 'checked' : ''; ?>>
            <span>ENERGY STAR/ACCA RSI Qualified Installation</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Exhaust Fan" <?php echo in_array('Exhaust Fan', $listingData['Heating']) ? 'checked' : ''; ?>>
            <span>Exhaust Fan</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Fireplace Insert" <?php echo in_array('Fireplace Insert', $listingData['Heating']) ? 'checked' : ''; ?>>
            <span>Fireplace Insert</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Fireplace(s)" <?php echo in_array('Fireplace(s)', $listingData['Heating']) ? 'checked' : ''; ?>>
            <span>Fireplace(s)</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Floor Furnace" <?php echo in_array('Floor Furnace', $listingData['Heating']) ? 'checked' : ''; ?>>
            <span>Floor Furnace</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Forced Air" <?php echo in_array('Forced Air', $listingData['Heating']) ? 'checked' : ''; ?>>
            <span>Forced Air</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Geothermal" <?php echo in_array('Geothermal', $listingData['Heating']) ? 'checked' : ''; ?>>
            <span>Geothermal</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Gravity" <?php echo in_array('Gravity', $listingData['Heating']) ? 'checked' : ''; ?>>
            <span>Gravity</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Heat Pump" <?php echo in_array('Heat Pump', $listingData['Heating']) ? 'checked' : ''; ?>>
            <span>Heat Pump</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Hot Water" <?php echo in_array('Hot Water', $listingData['Heating']) ? 'checked' : ''; ?>>
            <span>Hot Water</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Humidity Control" <?php echo in_array('Humidity Control', $listingData['Heating']) ? 'checked' : ''; ?>>
            <span>Humidity Control</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Kerosene" <?php echo in_array('Kerosene', $listingData['Heating']) ? 'checked' : ''; ?>>
            <span>Kerosene</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Natural Gas" <?php echo in_array('Natural Gas', $listingData['Heating']) ? 'checked' : ''; ?>>
            <span>Natural Gas</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Oil" <?php echo in_array('Oil', $listingData['Heating']) ? 'checked' : ''; ?>>
            <span>Oil</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Other" <?php echo in_array('Other', $listingData['Heating']) ? 'checked' : ''; ?>>
            <span>Other</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Passive Solar" <?php echo in_array('Passive Solar', $listingData['Heating']) ? 'checked' : ''; ?>>
            <span>Passive Solar</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Pellet Stove" <?php echo in_array('Pellet Stove', $listingData['Heating']) ? 'checked' : ''; ?>>
            <span>Pellet Stove</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Propane" <?php echo in_array('Propane', $listingData['Heating']) ? 'checked' : ''; ?>>
            <span>Propane</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Propane Stove" <?php echo in_array('Propane Stove', $listingData['Heating']) ? 'checked' : ''; ?>>
            <span>Propane Stove</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Radiant" <?php echo in_array('Radiant', $listingData['Heating']) ? 'checked' : ''; ?>>
            <span>Radiant</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Radiant Ceiling" <?php echo in_array('Radiant Ceiling', $listingData['Heating']) ? 'checked' : ''; ?>>
            <span>Radiant Ceiling</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Radiant Floor" <?php echo in_array('Radiant Floor', $listingData['Heating']) ? 'checked' : ''; ?>>
            <span>Radiant Floor</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="See Remarks" <?php echo in_array('See Remarks', $listingData['Heating']) ? 'checked' : ''; ?>>
            <span>See Remarks</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Separate Meters" <?php echo in_array('Separate Meters', $listingData['Heating']) ? 'checked' : ''; ?>>
            <span>Separate Meters</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Solar" <?php echo in_array('Solar', $listingData['Heating']) ? 'checked' : ''; ?>>
            <span>Solar</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Space Heater" <?php echo in_array('Space Heater', $listingData['Heating']) ? 'checked' : ''; ?>>
            <span>Space Heater</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Steam" <?php echo in_array('Steam', $listingData['Heating']) ? 'checked' : ''; ?>>
            <span>Steam</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Varies by Unit" <?php echo in_array('Varies by Unit', $listingData['Heating']) ? 'checked' : ''; ?>>
            <span>Varies by Unit</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Wall Furnace" <?php echo in_array('Wall Furnace', $listingData['Heating']) ? 'checked' : ''; ?>>
            <span>Wall Furnace</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Wood" <?php echo in_array('Wood', $listingData['Heating']) ? 'checked' : ''; ?>>
            <span>Wood</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Wood Stove" <?php echo in_array('Wood Stove', $listingData['Heating']) ? 'checked' : ''; ?>>
            <span>Wood Stove</span>
        </label>
        <label>
            <input type="checkbox" name="Heating[]" value="Zoned" <?php echo in_array('Zoned', $listingData['Heating']) ? 'checked' : ''; ?>>
            <span>Zoned</span>
        </label>

    </div>
</div>

<div>
    <label for="CoolingYN" style="font-size: 18px; font-weight: 700;">
        <input type="checkbox" id="CoolingYN" name="CoolingYN" value="true" <?php echo $listingData['CoolingYN'] ? 'checked' : ''; ?>>
        Cooling
    </label>
</div>

<div class="CoolingYN-fields" style="display: <?php echo $listingData['CoolingYN'] ? 'block' : 'none'; ?>;margin-bottom: 20px;">
    <div class="inline-checkboxes">
        <label>
            <input type="checkbox" name="Cooling[]" value="None" <?php echo in_array('None', $listingData['Cooling']) ? 'checked' : ''; ?>>
            <span>None</span>
        </label>

        <label>
            <input type="checkbox" name="Cooling[]" value="Attic Fan" <?php echo in_array('Attic Fan', $listingData['Cooling']) ? 'checked' : ''; ?>>
            <span>Attic Fan</span>
        </label>
        <label>
            <input type="checkbox" name="Cooling[]" value="Ceiling Fan(s)" <?php echo in_array('Ceiling Fan(s)', $listingData['Cooling']) ? 'checked' : ''; ?>>
            <span>Ceiling Fan(s)</span>
        </label>
        <label>
            <input type="checkbox" name="Cooling[]" value="Central Air" <?php echo in_array('Central Air', $listingData['Cooling']) ? 'checked' : ''; ?>>
            <span>Central Air</span>
        </label>
        <label>
            <input type="checkbox" name="Cooling[]" value="Dual" <?php echo in_array('Dual', $listingData['Cooling']) ? 'checked' : ''; ?>>
            <span>Dual</span>
        </label>
        <label>
            <input type="checkbox" name="Cooling[]" value="Ductless" <?php echo in_array('Ductless', $listingData['Cooling']) ? 'checked' : ''; ?>>
            <span>Ductless</span>
        </label>
        <label>
            <input type="checkbox" name="Cooling[]" value="Electric" <?php echo in_array('Electric', $listingData['Cooling']) ? 'checked' : ''; ?>>
            <span>Electric</span>
        </label>
        <label>
            <input type="checkbox" name="Cooling[]" value="ENERGY STAR Qualified Equipment" <?php echo in_array('ENERGY STAR Qualified Equipment', $listingData['Cooling']) ? 'checked' : ''; ?>>
            <span>ENERGY STAR Qualified Equipment</span>
        </label>
        <label>
            <input type="checkbox" name="Cooling[]" value="Evaporative Cooling" <?php echo in_array('Evaporative Cooling', $listingData['Cooling']) ? 'checked' : ''; ?>>
            <span>Evaporative Cooling</span>
        </label>
        <label>
            <input type="checkbox" name="Cooling[]" value="Exhaust Fan" <?php echo in_array('Exhaust Fan', $listingData['Cooling']) ? 'checked' : ''; ?>>
            <span>Exhaust Fan</span>
        </label>
        <label>
            <input type="checkbox" name="Cooling[]" value="Gas" <?php echo in_array('Gas', $listingData['Cooling']) ? 'checked' : ''; ?>>
            <span>Gas</span>
        </label>
        <label>
            <input type="checkbox" name="Cooling[]" value="Geothermal" <?php echo in_array('Geothermal', $listingData['Cooling']) ? 'checked' : ''; ?>>
            <span>Geothermal</span>
        </label>
        <label>
            <input type="checkbox" name="Cooling[]" value="Heat Pump" <?php echo in_array('Heat Pump', $listingData['Cooling']) ? 'checked' : ''; ?>>
            <span>Heat Pump</span>
        </label>
        <label>
            <input type="checkbox" name="Cooling[]" value="Humidity Control" <?php echo in_array('Humidity Control', $listingData['Cooling']) ? 'checked' : ''; ?>>
            <span>Humidity Control</span>
        </label>
        <label>
            <input type="checkbox" name="Cooling[]" value="Multi Units" <?php echo in_array('Multi Units', $listingData['Cooling']) ? 'checked' : ''; ?>>
            <span>Multi Units</span>
        </label>
        <label>
            <input type="checkbox" name="Cooling[]" value="Other" <?php echo in_array('Other', $listingData['Cooling']) ? 'checked' : ''; ?>>
            <span>Other</span>
        </label>
        <label>
            <input type="checkbox" name="Cooling[]" value="Roof Turbine(s)" <?php echo in_array('Roof Turbine(s)', $listingData['Cooling']) ? 'checked' : ''; ?>>
            <span>Roof Turbine(s)</span>
        </label>
        <label>
            <input type="checkbox" name="Cooling[]" value="Separate Meters" <?php echo in_array('Separate Meters', $listingData['Cooling']) ? 'checked' : ''; ?>>
            <span>Separate Meters</span>
        </label>
        <label>
            <input type="checkbox" name="Cooling[]" value="Varies by Unit" <?php echo in_array('Varies by Unit', $listingData['Cooling']) ? 'checked' : ''; ?>>
            <span>Varies by Unit</span>
        </label>
        <label>
            <input type="checkbox" name="Cooling[]" value="Wall Unit(s)" <?php echo in_array('Wall Unit(s)', $listingData['Cooling']) ? 'checked' : ''; ?>>
            <span>Wall Unit(s)</span>
        </label>
        <label>
            <input type="checkbox" name="Cooling[]" value="Wall/Window Unit(s)" <?php echo in_array('Wall/Window Unit(s)', $listingData['Cooling']) ? 'checked' : ''; ?>>
            <span>Wall/Window Unit(s)</span>
        </label>
        <label>
            <input type="checkbox" name="Cooling[]" value="Whole House Fan" <?php echo in_array('Whole House Fan', $listingData['Cooling']) ? 'checked' : ''; ?>>
            <span>Whole House Fan</span>
        </label>
        <label>
            <input type="checkbox" name="Cooling[]" value="Window Unit(s)" <?php echo in_array('Window Unit(s)', $listingData['Cooling']) ? 'checked' : ''; ?>>
            <span>Window Unit(s)</span>
        </label>
        <label>
            <input type="checkbox" name="Cooling[]" value="Zoned" <?php echo in_array('Zoned', $listingData['Cooling']) ? 'checked' : ''; ?>>
            <span>Zoned</span>
        </label>
        
    </div>
</div>

<div>
    <label for="ElectricOnPropertyYN" style="font-size: 18px; font-weight: 700;">
        <input type="checkbox" id="ElectricOnPropertyYN" name="ElectricOnPropertyYN" value="true" <?php echo $listingData['ElectricOnPropertyYN'] ? 'checked' : ''; ?>>
        Electric
    </label>
</div>

<div class="ElectricOnPropertyYN-fields" style="display: <?php echo $listingData['ElectricOnPropertyYN'] ? 'block' : 'none'; ?>;margin-bottom: 20px;">
    <div class="inline-checkboxes">
        <label>
            <input type="checkbox" name="Electric[]" value="100 Amp Service" <?php echo in_array('100 Amp Service', $listingData['Electric']) ? 'checked' : ''; ?>>
            <span>100 Amp Service</span>
        </label>
        <label>
            <input type="checkbox" name="Electric[]" value="150 Amp Service" <?php echo in_array('150 Amp Service', $listingData['Electric']) ? 'checked' : ''; ?>>
            <span>150 Amp Service</span>
        </label>
        <label>
            <input type="checkbox" name="Electric[]" value="200+ Amp Service" <?php echo in_array('200+ Amp Service', $listingData['Electric']) ? 'checked' : ''; ?>>
            <span>200+ Amp Service</span>
        </label>
        <label>
            <input type="checkbox" name="Electric[]" value="220 Volts" <?php echo in_array('220 Volts', $listingData['Electric']) ? 'checked' : ''; ?>>
            <span>220 Volts</span>
        </label>
        <label>
            <input type="checkbox" name="Electric[]" value="220 Volts For Spa" <?php echo in_array('220 Volts For Spa', $listingData['Electric']) ? 'checked' : ''; ?>>
            <span>220 Volts For Spa</span>
        </label>
        <label>
            <input type="checkbox" name="Electric[]" value="220 Volts in Garage" <?php echo in_array('220 Volts in Garage', $listingData['Electric']) ? 'checked' : ''; ?>>
            <span>220 Volts in Garage</span>
        </label>
        <label>
            <input type="checkbox" name="Electric[]" value="220 Volts in Kitchen" <?php echo in_array('220 Volts in Kitchen', $listingData['Electric']) ? 'checked' : ''; ?>>
            <span>220 Volts in Kitchen</span>
        </label>
        <label>
            <input type="checkbox" name="Electric[]" value="220 Volts in Laundry" <?php echo in_array('220 Volts in Laundry', $listingData['Electric']) ? 'checked' : ''; ?>>
            <span>220 Volts in Laundry</span>
        </label>
        <label>
            <input type="checkbox" name="Electric[]" value="220 Volts in Workshop" <?php echo in_array('220 Volts in Workshop', $listingData['Electric']) ? 'checked' : ''; ?>>
            <span>220 Volts in Workshop</span>
        </label>
        <label>
            <input type="checkbox" name="Electric[]" value="440 Volts" <?php echo in_array('440 Volts', $listingData['Electric']) ? 'checked' : ''; ?>>
            <span>440 Volts</span>
        </label>
        <label>
            <input type="checkbox" name="Electric[]" value="Circuit Breakers" <?php echo in_array('Circuit Breakers', $listingData['Electric']) ? 'checked' : ''; ?>>
            <span>Circuit Breakers</span>
        </label>
        <label>
            <input type="checkbox" name="Electric[]" value="Energy Storage Device" <?php echo in_array('Energy Storage Device', $listingData['Electric']) ? 'checked' : ''; ?>>
            <span>Energy Storage Device</span>
        </label>
        <label>
            <input type="checkbox" name="Electric[]" value="Fuses" <?php echo in_array('Fuses', $listingData['Electric']) ? 'checked' : ''; ?>>
            <span>Fuses</span>
        </label>
        <label>
            <input type="checkbox" name="Electric[]" value="Generator" <?php echo in_array('Generator', $listingData['Electric']) ? 'checked' : ''; ?>>
            <span>Generator</span>
        </label>
        <label>
            <input type="checkbox" name="Electric[]" value="Net Meter" <?php echo in_array('Net Meter', $listingData['Electric']) ? 'checked' : ''; ?>>
            <span>Net Meter</span>
        </label>
        <label>
            <input type="checkbox" name="Electric[]" value="Photovoltaics Seller Owned" <?php echo in_array('Photovoltaics Seller Owned', $listingData['Electric']) ? 'checked' : ''; ?>>
            <span>Photovoltaics Seller Owned</span>
        </label>
        <label>
            <input type="checkbox" name="Electric[]" value="Photovoltaics Third-Party Owned" <?php echo in_array('Photovoltaics Third-Party Owned', $listingData['Electric']) ? 'checked' : ''; ?>>
            <span>Photovoltaics Third-Party Owned</span>
        </label>
        <label>
            <input type="checkbox" name="Electric[]" value="Pre-Wired for Renewables" <?php echo in_array('Pre-Wired for Renewables', $listingData['Electric']) ? 'checked' : ''; ?>>
            <span>Pre-Wired for Renewables</span>
        </label>
        <label>
            <input type="checkbox" name="Electric[]" value="Ready for Renewables" <?php echo in_array('Ready for Renewables', $listingData['Electric']) ? 'checked' : ''; ?>>
            <span>Ready for Renewables</span>
        </label>
        <label>
            <input type="checkbox" name="Electric[]" value="Underground" <?php echo in_array('Underground', $listingData['Electric']) ? 'checked' : ''; ?>>
            <span>Underground</span>
        </label>
        <label>
            <input type="checkbox" name="Electric[]" value="Wind Turbine Seller Owned" <?php echo in_array('Wind Turbine Seller Owned', $listingData['Electric']) ? 'checked' : ''; ?>>
            <span>Wind Turbine Seller Owned</span>
        </label>
        <label>
            <input type="checkbox" name="Electric[]" value="Wind Turbine Third-Party Owned" <?php echo in_array('Wind Turbine Third-Party Owned', $listingData['Electric']) ? 'checked' : ''; ?>>
            <span>Wind Turbine Third-Party Owned</span>
        </label>

    </div>
</div>

<div>
    <h5>Sewer</h5>
    <div class="inline-checkboxes">
        <label>
            <input type="checkbox" name="Sewer[]" value="None" <?php echo in_array('None', $listingData['Sewer']) ? 'checked' : ''; ?>>
            <span>None</span>
        </label>

        <label>
            <input type="checkbox" name="Sewer[]" value="Aerobic Septic" <?php echo in_array('Aerobic Septic', $listingData['Sewer']) ? 'checked' : ''; ?>>
            <span>Aerobic Septic</span>
        </label>
        <label>
            <input type="checkbox" name="Sewer[]" value="Cesspool" <?php echo in_array('Cesspool', $listingData['Sewer']) ? 'checked' : ''; ?>>
            <span>Cesspool</span>
        </label>
        <label>
            <input type="checkbox" name="Sewer[]" value="Engineered Septic" <?php echo in_array('Engineered Septic', $listingData['Sewer']) ? 'checked' : ''; ?>>
            <span>Engineered Septic</span>
        </label>
        <label>
            <input type="checkbox" name="Sewer[]" value="Holding Tank" <?php echo in_array('Holding Tank', $listingData['Sewer']) ? 'checked' : ''; ?>>
            <span>Holding Tank</span>
        </label>
        <label>
            <input type="checkbox" name="Sewer[]" value="Mound Septic" <?php echo in_array('Mound Septic', $listingData['Sewer']) ? 'checked' : ''; ?>>
            <span>Mound Septic</span>
        </label>
        <label>
            <input type="checkbox" name="Sewer[]" value="Other" <?php echo in_array('Other', $listingData['Sewer']) ? 'checked' : ''; ?>>
            <span>Other</span>
        </label>
        <label>
            <input type="checkbox" name="Sewer[]" value="Perc Test On File" <?php echo in_array('Perc Test On File', $listingData['Sewer']) ? 'checked' : ''; ?>>
            <span>Perc Test On File</span>
        </label>
        <label>
            <input type="checkbox" name="Sewer[]" value="Perc Test Required" <?php echo in_array('Perc Test Required', $listingData['Sewer']) ? 'checked' : ''; ?>>
            <span>Perc Test Required</span>
        </label>
        <label>
            <input type="checkbox" name="Sewer[]" value="Private Sewer" <?php echo in_array('Private Sewer', $listingData['Sewer']) ? 'checked' : ''; ?>>
            <span>Private Sewer</span>
        </label>
        <label>
            <input type="checkbox" name="Sewer[]" value="Public Sewer" <?php echo in_array('Public Sewer', $listingData['Sewer']) ? 'checked' : ''; ?>>
            <span>Public Sewer</span>
        </label>
        <label>
            <input type="checkbox" name="Sewer[]" value="Septic Needed" <?php echo in_array('Septic Needed', $listingData['Sewer']) ? 'checked' : ''; ?>>
            <span>Septic Needed</span>
        </label>
        <label>
            <input type="checkbox" name="Sewer[]" value="Septic Tank" <?php echo in_array('Septic Tank', $listingData['Sewer']) ? 'checked' : ''; ?>>
            <span>Septic Tank</span>
        </label>
        <label>
            <input type="checkbox" name="Sewer[]" value="Shared Septic" <?php echo in_array('Shared Septic', $listingData['Sewer']) ? 'checked' : ''; ?>>
            <span>Shared Septic</span>
        </label>
        <label>
            <input type="checkbox" name="Sewer[]" value="Unknown" <?php echo in_array('Unknown', $listingData['Sewer']) ? 'checked' : ''; ?>>
            <span>Unknown</span>
        </label>
    </div>
</div>


<h5>Water</h5>

<div class="inline-checkboxes">
    <label>
        <input type="checkbox" name="WaterSource[]" value="None" <?php echo in_array('None', $listingData['WaterSource']) ? 'checked' : ''; ?>>
        <span>None</span>
    </label>
    <label>
        <input type="checkbox" name="WaterSource[]" value="Cistern" <?php echo in_array('Cistern', $listingData['WaterSource']) ? 'checked' : ''; ?>>
        <span>Cistern</span>
    </label>
    <label>
        <input type="checkbox" name="WaterSource[]" value="Other" <?php echo in_array('Other', $listingData['WaterSource']) ? 'checked' : ''; ?>>
        <span>Other</span>
    </label>
    <label>
        <input type="checkbox" name="WaterSource[]" value="Private" <?php echo in_array('Private', $listingData['WaterSource']) ? 'checked' : ''; ?>>
        <span>Private</span>
    </label>
    <label>
        <input type="checkbox" name="WaterSource[]" value="Public" <?php echo in_array('Public', $listingData['WaterSource']) ? 'checked' : ''; ?>>
        <span>Public</span>
    </label>
    <label>
        <input type="checkbox" name="WaterSource[]" value="See Remarks" <?php echo in_array('See Remarks', $listingData['WaterSource']) ? 'checked' : ''; ?>>
        <span>See Remarks</span>
    </label>
    <label>
        <input type="checkbox" name="WaterSource[]" value="Shared Well" <?php echo in_array('Shared Well', $listingData['WaterSource']) ? 'checked' : ''; ?>>
        <span>Shared Well</span>
    </label>
    <label>
        <input type="checkbox" name="WaterSource[]" value="Spring" <?php echo in_array('Spring', $listingData['WaterSource']) ? 'checked' : ''; ?>>
        <span>Spring</span>
    </label>
    <label>
        <input type="checkbox" name="WaterSource[]" value="Well" <?php echo in_array('Well', $listingData['WaterSource']) ? 'checked' : ''; ?>>
        <span>Well</span>
    </label>
</div>



<h5>Other Utilities</h5>
<div class="inline-checkboxes">
    <label>
        <input type="checkbox" name="Utilities[]" value="None" <?php echo in_array('None', $listingData['Utilities']) ? 'checked' : ''; ?>>
        <span>None</span>
    </label>
    <label>
        <input type="checkbox" name="Utilities[]" value="Cable Available" <?php echo in_array('Cable Available', $listingData['Utilities']) ? 'checked' : ''; ?>>
        <span>Cable Available</span>
    </label>
    <label>
        <input type="checkbox" name="Utilities[]" value="Cable Connected" <?php echo in_array('Cable Connected', $listingData['Utilities']) ? 'checked' : ''; ?>>
        <span>Cable Connected</span>
    </label>
    <label>
        <input type="checkbox" name="Utilities[]" value="Cable Not Available" <?php echo in_array('Cable Not Available', $listingData['Utilities']) ? 'checked' : ''; ?>>
        <span>Cable Not Available</span>
    </label>
    <label>
        <input type="checkbox" name="Utilities[]" value="Natural Gas Available" <?php echo in_array('Natural Gas Available', $listingData['Utilities']) ? 'checked' : ''; ?>>
        <span>Natural Gas Available</span>
    </label>
    <label>
        <input type="checkbox" name="Utilities[]" value="Natural Gas Connected" <?php echo in_array('Natural Gas Connected', $listingData['Utilities']) ? 'checked' : ''; ?>>
        <span>Natural Gas Connected</span>
    </label>
    <label>
        <input type="checkbox" name="Utilities[]" value="Natural Gas Not Available" <?php echo in_array('Natural Gas Not Available', $listingData['Utilities']) ? 'checked' : ''; ?>>
        <span>Natural Gas Not Available</span>
    </label>
    <label>
        <input type="checkbox" name="Utilities[]" value="Other" <?php echo in_array('Other', $listingData['Utilities']) ? 'checked' : ''; ?>>
        <span>Other</span>
    </label>
    <label>
        <input type="checkbox" name="Utilities[]" value="Phone Available" <?php echo in_array('Phone Available', $listingData['Utilities']) ? 'checked' : ''; ?>>
        <span>Phone Available</span>
    </label>
    <label>
        <input type="checkbox" name="Utilities[]" value="Phone Connected" <?php echo in_array('Phone Connected', $listingData['Utilities']) ? 'checked' : ''; ?>>
        <span>Phone Connected</span>
    </label>
    <label>
        <input type="checkbox" name="Utilities[]" value="Phone Not Available" <?php echo in_array('Phone Not Available', $listingData['Utilities']) ? 'checked' : ''; ?>>
        <span>Phone Not Available</span>
    </label>
    <label>
        <input type="checkbox" name="Utilities[]" value="Propane" <?php echo in_array('Propane', $listingData['Utilities']) ? 'checked' : ''; ?>>
        <span>Propane</span>
    </label>
    <label>
        <input type="checkbox" name="Utilities[]" value="See Remarks" <?php echo in_array('See Remarks', $listingData['Utilities']) ? 'checked' : ''; ?>>
        <span>See Remarks</span>
    </label>
    <label>
        <input type="checkbox" name="Utilities[]" value="Underground Utilities" <?php echo in_array('Underground Utilities', $listingData['Utilities']) ? 'checked' : ''; ?>>
        <span>Underground Utilities</span>
    </label>
</div>




<button type="submit" style="margin-top: 20px;">Save Information</button>
</form>

<script>
    jQuery(document).ready(function($) {
        // Show or hide GarageYN fields based on checkbox state
        $('#GarageYN').change(function() {
            if ($(this).is(':checked')) {
                $('.GarageYN-fields').show();
            } else {
                $('.GarageYN-fields').hide();
            }
        });

        // Trigger change event on page load to set initial state
        $('#GarageYN').trigger('change');


        // Show or hide CarportYN fields based on checkbox state
        $('#CarportYN').change(function() {
            if ($(this).is(':checked')) {
                $('.CarportYN-fields').show();
            } else {
                $('.CarportYN-fields').hide();
            }
        });
        // Trigger change event on page load to set initial state
        $('#CarportYN').trigger('change');

        // Show or hide OpenParkingYN fields based on checkbox state
        $('#OpenParkingYN').change(function() {
            if ($(this).is(':checked')) {
                $('.OpenParkingYN-fields').show();
            } else {
                $('.OpenParkingYN-fields').hide();
            }
        });
        // Trigger change event on page load to set initial state
        $('#OpenParkingYN').trigger('change');

        // Show or hide HeatingYN fields based on checkbox state
        $('#HeatingYN').change(function() {
            if ($(this).is(':checked')) {
                $('.HeatingYN-fields').show();
            } else {
                $('.HeatingYN-fields').hide();
            }
        });
        // Trigger change event on page load to set initial state
        $('#HeatingYN').trigger('change');

        // Show or hide CoolingYN fields based on checkbox state
        $('#CoolingYN').change(function() {
            if ($(this).is(':checked')) {
                $('.CoolingYN-fields').show();
            } else {
                $('.CoolingYN-fields').hide();
            }
        });
        // Trigger change event on page load to set initial state
        $('#CoolingYN').trigger('change');

        // Show or hide ElectricOnPropertyYN fields based on checkbox state
        $('#ElectricOnPropertyYN').change(function() {
            if ($(this).is(':checked')) {
                $('.ElectricOnPropertyYN-fields').show();
            } else {
                $('.ElectricOnPropertyYN-fields').hide();
            }
        });
        // Trigger change event on page load to set initial state
        $('#ElectricOnPropertyYN').trigger('change');

    });
</script>