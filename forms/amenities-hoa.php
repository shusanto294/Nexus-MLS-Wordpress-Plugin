<form method="POST" class="nexus-mls-form listing-tab-content">
    <input type="hidden" name="ListingKey" value="<?php echo $listing; ?>">

    <h2>Amenities</h2>

    <div>
        <label for="PoolPrivateYN" style="font-size: 18px; font-weight: 700;">
            <input type="checkbox" id="PoolPrivateYN" name="PoolPrivateYN" value="true" <?php echo $listingData['PoolPrivateYN'] ? 'checked' : ''; ?>>
            Private Pool
        </label>
    </div>

    <div class="PoolFeatures-fields" style="display: <?php echo $listingData['PoolPrivateYN'] ? 'block' : 'none'; ?>; margin-bottom: 20px;">

        <div class="inline-checkboxes">
            <label>
                <input type="checkbox" name="PoolFeatures[]" value="None" <?php echo in_array('None', $listingData['PoolFeatures']) ? 'checked' : ''; ?>>
                <span>None</span>
            </label>
            
            <label>
                <input type="checkbox" name="PoolFeatures[]" value="Above Ground" <?php echo in_array('Above Ground', $listingData['PoolFeatures']) ? 'checked' : ''; ?>>
                <span>Above Ground</span>
            </label>

            <label>
                <input type="checkbox" name="PoolFeatures[]" value="Association" <?php echo in_array('Association', $listingData['PoolFeatures']) ? 'checked' : ''; ?>>
                <span>Association</span>
            </label>

            <label>
                <input type="checkbox" name="PoolFeatures[]" value="Black Bottom" <?php echo in_array('Black Bottom', $listingData['PoolFeatures']) ? 'checked' : ''; ?>>
                <span>Black Bottom</span>
            </label>

            <label>
                <input type="checkbox" name="PoolFeatures[]" value="Cabana" <?php echo in_array('Cabana', $listingData['PoolFeatures']) ? 'checked' : ''; ?>>
                <span>Cabana</span>
            </label>

            <label>
                <input type="checkbox" name="PoolFeatures[]" value="Community" <?php echo in_array('Community', $listingData['PoolFeatures']) ? 'checked' : ''; ?>>
                <span>Community</span>
            </label>

            <label>
                <input type="checkbox" name="PoolFeatures[]" value="Diving Board" <?php echo in_array('Diving Board', $listingData['PoolFeatures']) ? 'checked' : ''; ?>>
                <span>Diving Board</span>
            </label>

            <label>
                <input type="checkbox" name="PoolFeatures[]" value="Electric Heat" <?php echo in_array('Electric Heat', $listingData['PoolFeatures']) ? 'checked' : ''; ?>>
                <span>Electric Heat</span>
            </label>

            <label>
                <input type="checkbox" name="PoolFeatures[]" value="ENERGY STAR Qualified pool pump" <?php echo in_array('ENERGY STAR Qualified pool pump', $listingData['PoolFeatures']) ? 'checked' : ''; ?>>
                <span>ENERGY STAR Qualified pool pump</span>
            </label>

            <label>
                <input type="checkbox" name="PoolFeatures[]" value="Fenced" <?php echo in_array('Fenced', $listingData['PoolFeatures']) ? 'checked' : ''; ?>>
                <span>Fenced</span>
            </label>

            <label>
                <input type="checkbox" name="PoolFeatures[]" value="Fiberglass" <?php echo in_array('Fiberglass', $listingData['PoolFeatures']) ? 'checked' : ''; ?>>
                <span>Fiberglass</span>
            </label>

            <label>
                <input type="checkbox" name="PoolFeatures[]" value="Filtered" <?php echo in_array('Filtered', $listingData['PoolFeatures']) ? 'checked' : ''; ?>>
                <span>Filtered</span>
            </label>

            <label>
                <input type="checkbox" name="PoolFeatures[]" value="Gas Heat" <?php echo in_array('Gas Heat', $listingData['PoolFeatures']) ? 'checked' : ''; ?>>
                <span>Gas Heat</span>
            </label>

            <label>
                <input type="checkbox" name="PoolFeatures[]" value="Gunite" <?php echo in_array('Gunite', $listingData['PoolFeatures']) ? 'checked' : ''; ?>>
                <span>Gunite</span>
            </label>

            <label>
                <input type="checkbox" name="PoolFeatures[]" value="Heated" <?php echo in_array('Heated', $listingData['PoolFeatures']) ? 'checked' : ''; ?>>
                <span>Heated</span>
            </label>

            <label>
                <input type="checkbox" name="PoolFeatures[]" value="Indoor" <?php echo in_array('Indoor', $listingData['PoolFeatures']) ? 'checked' : ''; ?>>
                <span>Indoor</span>
            </label>

            <label>
                <input type="checkbox" name="PoolFeatures[]" value="Infinity" <?php echo in_array('Infinity', $listingData['PoolFeatures']) ? 'checked' : ''; ?>>
                <span>Infinity</span>
            </label>

            <label>
                <input type="checkbox" name="PoolFeatures[]" value="In Ground" <?php echo in_array('In Ground', $listingData['PoolFeatures']) ? 'checked' : ''; ?>>
                <span>In Ground</span>
            </label>

            <label>
                <input type="checkbox" name="PoolFeatures[]" value="Lap" <?php echo in_array('Lap', $listingData['PoolFeatures']) ? 'checked' : ''; ?>>
                <span>Lap</span>
            </label>

            <label>
                <input type="checkbox" name="PoolFeatures[]" value="Liner" <?php echo in_array('Liner', $listingData['PoolFeatures']) ? 'checked' : ''; ?>>
                <span>Liner</span>
            </label>

            <label>
                <input type="checkbox" name="PoolFeatures[]" value="Other" <?php echo in_array('Other', $listingData['PoolFeatures']) ? 'checked' : ''; ?>>
                <span>Other</span>
            </label>

            <label>
                <input type="checkbox" name="PoolFeatures[]" value="Outdoor Pool" <?php echo in_array('Outdoor Pool', $listingData['PoolFeatures']) ? 'checked' : ''; ?>>
                <span>Outdoor Pool</span>
            </label>
            
            <label>
                <input type="checkbox" name="PoolFeatures[]" value="Pool/Spa Combo" <?php echo in_array('Pool/Spa Combo', $listingData['PoolFeatures']) ? 'checked' : ''; ?>>
                <span>Pool/Spa Combo</span>
            </label>

            <label>
                <input type="checkbox" name="PoolFeatures[]" value="Pool Cover" <?php echo in_array('Pool Cover', $listingData['PoolFeatures']) ? 'checked' : ''; ?>>
                <span>Pool Cover</span>
            </label>

            <label>
                <input type="checkbox" name="PoolFeatures[]" value="Pool Sweep" <?php echo in_array('Pool Sweep', $listingData['PoolFeatures']) ? 'checked' : ''; ?>>
                <span>Pool Sweep</span>
            </label>

            <label>
                <input type="checkbox" name="PoolFeatures[]" value="Private" <?php echo in_array('Private', $listingData['PoolFeatures']) ? 'checked' : ''; ?>>
                <span>Private</span>
            </label>

            <label>
                <input type="checkbox" name="PoolFeatures[]" value="Salt Water" <?php echo in_array('Salt Water', $listingData['PoolFeatures']) ? 'checked' : ''; ?>>
                <span>Salt Water</span>
            </label>

            <label>
                <input type="checkbox" name="PoolFeatures[]" value="Screen Enclosure" <?php echo in_array('Screen Enclosure', $listingData['PoolFeatures']) ? 'checked' : ''; ?>>
                <span>Screen Enclosure</span>
            </label>

            <label>
                <input type="checkbox" name="PoolFeatures[]" value="See Remarks" <?php echo in_array('See Remarks', $listingData['PoolFeatures']) ? 'checked' : ''; ?>>
                <span>See Remarks</span>
            </label>

            <label>
                <input type="checkbox" name="PoolFeatures[]" value="Solar Cover" <?php echo in_array('Solar Cover', $listingData['PoolFeatures']) ? 'checked' : ''; ?>>
                <span>Solar Cover</span>
            </label>

            <label>
                <input type="checkbox" name="PoolFeatures[]" value="Solar Heat" <?php echo in_array('Solar Heat', $listingData['PoolFeatures']) ? 'checked' : ''; ?>>
                <span>Solar Heat</span>
            </label>

            <label>
                <input type="checkbox" name="PoolFeatures[]" value="Sport" <?php echo in_array('Sport', $listingData['PoolFeatures']) ? 'checked' : ''; ?>>
                <span>Sport</span>
            </label>

            <label>
                <input type="checkbox" name="PoolFeatures[]" value="Tile" <?php echo in_array('Tile', $listingData['PoolFeatures']) ? 'checked' : ''; ?>>
                <span>Tile</span>
            </label>

            <label>
                <input type="checkbox" name="PoolFeatures[]" value="Vinyl" <?php echo in_array('Vinyl', $listingData['PoolFeatures']) ? 'checked' : ''; ?>>
                <span>Vinyl</span>
            </label>

            <label>
                <input type="checkbox" name="PoolFeatures[]" value="Waterfall" <?php echo in_array('Waterfall', $listingData['PoolFeatures']) ? 'checked' : ''; ?>>
                <span>Waterfall</span>
            </label>


        </div>
    </div>

    <div>
        <label for="SpaYN" style="font-size: 18px; font-weight: 700;">
            <input type="checkbox" id="SpaYN" name="SpaYN" value="true" <?php echo $listingData['SpaYN'] ? 'checked' : ''; ?>>
            Spa
        </label>
    </div>

    <div class="SpaFeatures-fields" style="display: <?php echo $listingData['SpaYN'] ? 'block' : 'none'; ?>; margin-bottom: 20px;">

        <div class="inline-checkboxes">
            <label>
                <input type="checkbox" name="SpaFeatures[]" value="None" <?php echo in_array('None', $listingData['SpaFeatures']) ? 'checked' : ''; ?>>
                <span>None</span>
            </label>

            <label>
                <input type="checkbox" name="SpaFeatures[]" value="Above Ground" <?php echo in_array('Above Ground', $listingData['SpaFeatures']) ? 'checked' : ''; ?>>
                <span>Above Ground</span>
            </label>

            <label>
                <input type="checkbox" name="SpaFeatures[]" value="Bath" <?php echo in_array('Bath', $listingData['SpaFeatures']) ? 'checked' : ''; ?>>
                <span>Bath</span>
            </label>

            <label>
                <input type="checkbox" name="SpaFeatures[]" value="Community" <?php echo in_array('Community', $listingData['SpaFeatures']) ? 'checked' : ''; ?>>
                <span>Community</span>
            </label>

            <label>
                <input type="checkbox" name="SpaFeatures[]" value="Fiberglass" <?php echo in_array('Fiberglass', $listingData['SpaFeatures']) ? 'checked' : ''; ?>>
                <span>Fiberglass</span>
            </label>

            <label>
                <input type="checkbox" name="SpaFeatures[]" value="Gunite" <?php echo in_array('Gunite', $listingData['SpaFeatures']) ? 'checked' : ''; ?>>
                <span>Gunite</span>
            </label>

            <label>
                <input type="checkbox" name="SpaFeatures[]" value="Heated" <?php echo in_array('Heated', $listingData['SpaFeatures']) ? 'checked' : ''; ?>>
                <span>Heated</span>
            </label>

            <label>
                <input type="checkbox" name="SpaFeatures[]" value="In Ground" <?php echo in_array('In Ground', $listingData['SpaFeatures']) ? 'checked' : ''; ?>>
                <span>In Ground</span>
            </label>

            <label>
                <input type="checkbox" name="SpaFeatures[]" value="Private" <?php echo in_array('Private', $listingData['SpaFeatures']) ? 'checked' : ''; ?>>
                <span>Private</span>
            </label>

            <label>
                <input type="checkbox" name="SpaFeatures[]" value="See Remarks" <?php echo in_array('See Remarks', $listingData['SpaFeatures']) ? 'checked' : ''; ?>>
                <span>See Remarks</span>
            </label>

        </div>
    </div>


<div>
    <label for="FireplaceYN" style="font-size: 18px; font-weight: 700;">
        <input type="checkbox" id="FireplaceYN" name="FireplaceYN" value="true" <?php echo $listingData['FireplaceYN'] ? 'checked' : ''; ?>>
        Fireplace
    </label>
</div>

<div class="FireplaceYN-fields" style="display: <?php echo $listingData['FireplaceYN'] ? 'block' : 'none'; ?>; margin-bottom: 20px;">
    <input type="text" name="FireplacesTotal" value="<?php echo $listingData['FireplacesTotal']; ?>" placeholder="# of Fireplaces">

    <div class="inline-checkboxes">

        <label>
            <input type="checkbox" name="FireplaceFeatures[]" value="None" <?php echo in_array('None', $listingData['FireplaceFeatures']) ? 'checked' : ''; ?>>
            <span>None</span>
        </label>

        <label>
            <input type="checkbox" name="FireplaceFeatures[]" value="Basement" <?php echo in_array('Basement', $listingData['FireplaceFeatures']) ? 'checked' : ''; ?>>
            <span>Basement</span>
        </label>

        <label>
            <input type="checkbox" name="FireplaceFeatures[]" value="Bath" <?php echo in_array('Bath', $listingData['FireplaceFeatures']) ? 'checked' : ''; ?>>
            <span>Bath</span>
        </label>

        <label>
            <input type="checkbox" name="FireplaceFeatures[]" value="Bedroom" <?php echo in_array('Bedroom', $listingData['FireplaceFeatures']) ? 'checked' : ''; ?>>
            <span>Bedroom</span>
        </label>

        <label>
            <input type="checkbox" name="FireplaceFeatures[]" value="Blower Fan" <?php echo in_array('Blower Fan', $listingData['FireplaceFeatures']) ? 'checked' : ''; ?>>
            <span>Blower Fan</span>
        </label>

        <label>
            <input type="checkbox" name="FireplaceFeatures[]" value="Circulating" <?php echo in_array('Circulating', $listingData['FireplaceFeatures']) ? 'checked' : ''; ?>>
            <span>Circulating</span>
        </label>

        <label>
            <input type="checkbox" name="FireplaceFeatures[]" value="Decorative" <?php echo in_array('Decorative', $listingData['FireplaceFeatures']) ? 'checked' : ''; ?>>
            <span>Decorative</span>
        </label>

        <label>
            <input type="checkbox" name="FireplaceFeatures[]" value="Den" <?php echo in_array('Den', $listingData['FireplaceFeatures']) ? 'checked' : ''; ?>>
            <span>Den</span>
        </label>

        <label>
            <input type="checkbox" name="FireplaceFeatures[]" value="Dining Room" <?php echo in_array('Dining Room', $listingData['FireplaceFeatures']) ? 'checked' : ''; ?>>
            <span>Dining Room</span>
        </label>

        <label>
            <input type="checkbox" name="FireplaceFeatures[]" value="Double Sided" <?php echo in_array('Double Sided', $listingData['FireplaceFeatures']) ? 'checked' : ''; ?>>
            <span>Double Sided</span>
        </label>

        <label>
            <input type="checkbox" name="FireplaceFeatures[]" value="Electric" <?php echo in_array('Electric', $listingData['FireplaceFeatures']) ? 'checked' : ''; ?>>
            <span>Electric</span>
        </label>

        <label>
            <input type="checkbox" name="FireplaceFeatures[]" value="EPA Certified Wood Stove" <?php echo in_array('EPA Certified Wood Stove', $listingData['FireplaceFeatures']) ? 'checked' : ''; ?>>
            <span>EPA Certified Wood Stove</span>
        </label>

        <label>
            <input type="checkbox" name="FireplaceFeatures[]" value="EPA Qualified Fireplace" <?php echo in_array('EPA Qualified Fireplace', $listingData['FireplaceFeatures']) ? 'checked' : ''; ?>>
            <span>EPA Qualified Fireplace</span>
        </label>

        <label>
            <input type="checkbox" name="FireplaceFeatures[]" value="Factory Built" <?php echo in_array('Factory Built', $listingData['FireplaceFeatures']) ? 'checked' : ''; ?>>
            <span>Factory Built</span>
        </label>

        <label>
            <input type="checkbox" name="FireplaceFeatures[]" value="Family Room" <?php echo in_array('Family Room', $listingData['FireplaceFeatures']) ? 'checked' : ''; ?>>
            <span>Family Room</span>
        </label>

        <label>
            <input type="checkbox" name="FireplaceFeatures[]" value="Fire Pit" <?php echo in_array('Fire Pit', $listingData['FireplaceFeatures']) ? 'checked' : ''; ?>>
            <span>Fire Pit</span>
        </label>

        <label>
            <input type="checkbox" name="FireplaceFeatures[]" value="Free Standing" <?php echo in_array('Free Standing', $listingData['FireplaceFeatures']) ? 'checked' : ''; ?>>
            <span>Free Standing</span>
        </label>

        <label>
            <input type="checkbox" name="FireplaceFeatures[]" value="Gas" <?php echo in_array('Gas', $listingData['FireplaceFeatures']) ? 'checked' : ''; ?>>
            <span>Gas</span>
        </label>

        <label>
            <input type="checkbox" name="FireplaceFeatures[]" value="Gas Log" <?php echo in_array('Gas Log', $listingData['FireplaceFeatures']) ? 'checked' : ''; ?>>
            <span>Gas Log</span>
        </label>

        <label>
            <input type="checkbox" name="FireplaceFeatures[]" value="Gas Starter" <?php echo in_array('Gas Starter', $listingData['FireplaceFeatures']) ? 'checked' : ''; ?>>
            <span>Gas Starter</span>
        </label>

        <label>
            <input type="checkbox" name="FireplaceFeatures[]" value="Glass Doors" <?php echo in_array('Glass Doors', $listingData['FireplaceFeatures']) ? 'checked' : ''; ?>>
            <span>Glass Doors</span>
        </label>

        <label>
            <input type="checkbox" name="FireplaceFeatures[]" value="Great Room" <?php echo in_array('Great Room', $listingData['FireplaceFeatures']) ? 'checked' : ''; ?>>
            <span>Great Room</span>
        </label>

        <label>
            <input type="checkbox" name="FireplaceFeatures[]" value="Heatilator" <?php echo in_array('Heatilator', $listingData['FireplaceFeatures']) ? 'checked' : ''; ?>>
            <span>Heatilator</span>
        </label>

        <label>
            <input type="checkbox" name="FireplaceFeatures[]" value="Insert" <?php echo in_array('Insert', $listingData['FireplaceFeatures']) ? 'checked' : ''; ?>>
            <span>Insert</span>
        </label>

        <label>
            <input type="checkbox" name="FireplaceFeatures[]" value="Kitchen" <?php echo in_array('Kitchen', $listingData['FireplaceFeatures']) ? 'checked' : ''; ?>>
            <span>Kitchen</span>
        </label>

        <label>
            <input type="checkbox" name="FireplaceFeatures[]" value="Library" <?php echo in_array('Library', $listingData['FireplaceFeatures']) ? 'checked' : ''; ?>>
            <span>Library</span>
        </label>

        <label>
            <input type="checkbox" name="FireplaceFeatures[]" value="Living Room" <?php echo in_array('Living Room', $listingData['FireplaceFeatures']) ? 'checked' : ''; ?>>
            <span>Living Room</span>
        </label>

        <label>
            <input type="checkbox" name="FireplaceFeatures[]" value="Masonry" <?php echo in_array('Masonry', $listingData['FireplaceFeatures']) ? 'checked' : ''; ?>>
            <span>Masonry</span>
        </label>

        <label>
            <input type="checkbox" name="FireplaceFeatures[]" value="Master Bedroom" <?php echo in_array('Master Bedroom', $listingData['FireplaceFeatures']) ? 'checked' : ''; ?>>
            <span>Master Bedroom</span>
        </label>

        <label>
            <input type="checkbox" name="FireplaceFeatures[]" value="Metal" <?php echo in_array('Metal', $listingData['FireplaceFeatures']) ? 'checked' : ''; ?>>
            <span>Metal</span>
        </label>

        <label>
            <input type="checkbox" name="FireplaceFeatures[]" value="Other" <?php echo in_array('Other', $listingData['FireplaceFeatures']) ? 'checked' : ''; ?>>
            <span>Other</span>
        </label>

        <label>
            <input type="checkbox" name="FireplaceFeatures[]" value="Outside" <?php echo in_array('Outside', $listingData['FireplaceFeatures']) ? 'checked' : ''; ?>>
            <span>Outside</span>
        </label>

        <label>
            <input type="checkbox" name="FireplaceFeatures[]" value="Pellet Stove" <?php echo in_array('Pellet Stove', $listingData['FireplaceFeatures']) ? 'checked' : ''; ?>>
            <span>Pellet Stove</span>
        </label>

        <label>
            <input type="checkbox" name="FireplaceFeatures[]" value="Propane" <?php echo in_array('Propane', $listingData['FireplaceFeatures']) ? 'checked' : ''; ?>>
            <span>Propane</span>
        </label>

        <label>
            <input type="checkbox" name="FireplaceFeatures[]" value="Raised Hearth" <?php echo in_array('Raised Hearth', $listingData['FireplaceFeatures']) ? 'checked' : ''; ?>>
            <span>Raised Hearth</span>
        </label>

        <label>
            <input type="checkbox" name="FireplaceFeatures[]" value="Recreation Room" <?php echo in_array('Recreation Room', $listingData['FireplaceFeatures']) ? 'checked' : ''; ?>>
            <span>Recreation Room</span>
        </label>

        <label>
            <input type="checkbox" name="FireplaceFeatures[]" value="Sealed Combustion" <?php echo in_array('Sealed Combustion', $listingData['FireplaceFeatures']) ? 'checked' : ''; ?>>
            <span>Sealed Combustion</span>
        </label>

        <label>
            <input type="checkbox" name="FireplaceFeatures[]" value="See Remarks" <?php echo in_array('See Remarks', $listingData['FireplaceFeatures']) ? 'checked' : ''; ?>>
            <span>See Remarks</span>
        </label>

        <label>
            <input type="checkbox" name="FireplaceFeatures[]" value="See Through" <?php echo in_array('See Through', $listingData['FireplaceFeatures']) ? 'checked' : ''; ?>>
            <span>See Through</span>
        </label>

        <label>
            <input type="checkbox" name="FireplaceFeatures[]" value="Stone" <?php echo in_array('Stone', $listingData['FireplaceFeatures']) ? 'checked' : ''; ?>>
            <span>Stone</span>
        </label>

        <label>
            <input type="checkbox" name="FireplaceFeatures[]" value="Ventless" <?php echo in_array('Ventless', $listingData['FireplaceFeatures']) ? 'checked' : ''; ?>>
            <span>Ventless</span>
        </label>

        <label>
            <input type="checkbox" name="FireplaceFeatures[]" value="Wood Burning" <?php echo in_array('Wood Burning', $listingData['FireplaceFeatures']) ? 'checked' : ''; ?>>
            <span>Wood Burning</span>
        </label>

        <label>
            <input type="checkbox" name="FireplaceFeatures[]" value="Wood Burning Stove" <?php echo in_array('Wood Burning Stove', $listingData['FireplaceFeatures']) ? 'checked' : ''; ?>>
            <span>Wood Burning Stove</span>
        </label>

        <label>
            <input type="checkbox" name="FireplaceFeatures[]" value="Zero Clearance" <?php echo in_array('Zero Clearance', $listingData['FireplaceFeatures']) ? 'checked' : ''; ?>>
            <span>Zero Clearance</span>
        </label>

    </div>
</div>

<div>
    <label for="WaterfrontYN" style="font-size: 18px; font-weight: 700;">
        <input type="checkbox" id="WaterfrontYN" name="WaterfrontYN" value="true" <?php echo $listingData['WaterfrontYN'] ? 'checked' : ''; ?>>
        Waterfront Features
    </label>
</div>

<div class="WaterfrontYN-fields" style="display: <?php echo $listingData['WaterfrontYN'] ? 'block' : 'none'; ?>; margin-bottom: 20px;">
    <div class="inline-checkboxes">
        <label>
            <input type="checkbox" name="WaterfrontFeatures[]" value="Beach Access" <?php echo in_array('Beach Access', $listingData['WaterfrontFeatures']) ? 'checked' : ''; ?>>
            <span>Beach Access</span>
        </label>

        <label>
            <input type="checkbox" name="WaterfrontFeatures[]" value="Beach Front" <?php echo in_array('Beach Front', $listingData['WaterfrontFeatures']) ? 'checked' : ''; ?>>
            <span>Beach Front</span>
        </label>

        <label>
            <input type="checkbox" name="WaterfrontFeatures[]" value="Canal Access" <?php echo in_array('Canal Access', $listingData['WaterfrontFeatures']) ? 'checked' : ''; ?>>
            <span>Canal Access</span>
        </label>

        <label>
            <input type="checkbox" name="WaterfrontFeatures[]" value="Canal Front" <?php echo in_array('Canal Front', $listingData['WaterfrontFeatures']) ? 'checked' : ''; ?>>
            <span>Canal Front</span>
        </label>

        <label>
            <input type="checkbox" name="WaterfrontFeatures[]" value="Creek" <?php echo in_array('Creek', $listingData['WaterfrontFeatures']) ? 'checked' : ''; ?>>
            <span>Creek</span>
        </label>

        <label>
            <input type="checkbox" name="WaterfrontFeatures[]" value="Lagoon" <?php echo in_array('Lagoon', $listingData['WaterfrontFeatures']) ? 'checked' : ''; ?>>
            <span>Lagoon</span>
        </label>

        <label>
            <input type="checkbox" name="WaterfrontFeatures[]" value="Lake" <?php echo in_array('Lake', $listingData['WaterfrontFeatures']) ? 'checked' : ''; ?>>
            <span>Lake</span>
        </label>

        <label>
            <input type="checkbox" name="WaterfrontFeatures[]" value="Lake Front" <?php echo in_array('Lake Front', $listingData['WaterfrontFeatures']) ? 'checked' : ''; ?>>
            <span>Lake Front</span>
        </label>

        <label>
            <input type="checkbox" name="WaterfrontFeatures[]" value="Lake Privileges" <?php echo in_array('Lake Privileges', $listingData['WaterfrontFeatures']) ? 'checked' : ''; ?>>
            <span>Lake Privileges</span>
        </label>

        <label>
            <input type="checkbox" name="WaterfrontFeatures[]" value="Navigable Water" <?php echo in_array('Navigable Water', $listingData['WaterfrontFeatures']) ? 'checked' : ''; ?>>
            <span>Navigable Water</span>
        </label>

        <label>
            <input type="checkbox" name="WaterfrontFeatures[]" value="Ocean Access" <?php echo in_array('Ocean Access', $listingData['WaterfrontFeatures']) ? 'checked' : ''; ?>>
            <span>Ocean Access</span>
        </label>

        <label>
            <input type="checkbox" name="WaterfrontFeatures[]" value="Ocean Front" <?php echo in_array('Ocean Front', $listingData['WaterfrontFeatures']) ? 'checked' : ''; ?>>
            <span>Ocean Front</span>
        </label>

        <label>
            <input type="checkbox" name="WaterfrontFeatures[]" value="Pond" <?php echo in_array('Pond', $listingData['WaterfrontFeatures']) ? 'checked' : ''; ?>>
            <span>Pond</span>
        </label>

        <label>
            <input type="checkbox" name="WaterfrontFeatures[]" value="River Access" <?php echo in_array('River Access', $listingData['WaterfrontFeatures']) ? 'checked' : ''; ?>>
            <span>River Access</span>
        </label>

        <label>
            <input type="checkbox" name="WaterfrontFeatures[]" value="River Front" <?php echo in_array('River Front', $listingData['WaterfrontFeatures']) ? 'checked' : ''; ?>>
            <span>River Front</span>
        </label>

        <label>
            <input type="checkbox" name="WaterfrontFeatures[]" value="Seawall" <?php echo in_array('Seawall', $listingData['WaterfrontFeatures']) ? 'checked' : ''; ?>>
            <span>Seawall</span>
        </label>

        <label>
            <input type="checkbox" name="WaterfrontFeatures[]" value="Stream" <?php echo in_array('Stream', $listingData['WaterfrontFeatures']) ? 'checked' : ''; ?>>
            <span>Stream</span>
        </label>

        <label>
            <input type="checkbox" name="WaterfrontFeatures[]" value="Waterfront" <?php echo in_array('Waterfront', $listingData['WaterfrontFeatures']) ? 'checked' : ''; ?>>
            <span>Waterfront</span>
        </label>
    </div>
</div>

<div>
    <label for="PowerProductionYN" style="font-size: 18px; font-weight: 700;">
        <input type="checkbox" id="PowerProductionYN" name="PowerProductionYN" value="true" <?php echo $listingData['PowerProductionYN'] ? 'checked' : ''; ?>>
        Power Production
    </label>
</div>

<div class="PowerProductionYN-fields" style="display: <?php echo $listingData['PowerProductionYN'] ? 'block' : 'none'; ?>; margin-bottom: 20px;">
    <div class="inline-checkboxes">
        <label>
            <input type="checkbox" name="PowerProductionType[]" value="Photovoltaics" <?php echo in_array('Photovoltaics', $listingData['PowerProductionType']) ? 'checked' : ''; ?>>
            <span>Photovoltaics</span>
        </label>

        <label>
            <input type="checkbox" name="PowerProductionType[]" value="Wind" <?php echo in_array('Wind', $listingData['PowerProductionType']) ? 'checked' : ''; ?>>
            <span>Wind</span>
        </label>
    </div>
</div>

<h2>Homeowners Association</h2>

<!-- switch AssociationYN and conditional text field AssociationName,  AssociationFee and select field AssociationFeeFrequency -->

<div>
    <label for="AssociationYN" style="font-size: 18px; font-weight: 700;">
        <input type="checkbox" id="AssociationYN" name="AssociationYN" value="true" <?php echo $listingData['AssociationYN'] ? 'checked' : ''; ?>>
        Association
    </label>
</div>

<div class="AssociationYN-fields" style="display: <?php echo $listingData['AssociationYN'] ? 'block' : 'none'; ?>; margin-bottom: 20px;">
    <input type="text" name="AssociationName" value="<?php echo $listingData['AssociationName']; ?>" placeholder="Association Name">
    <input type="text" name="AssociationFee" value="<?php echo $listingData['AssociationFee']; ?>" placeholder="Association Fee">
    <select name="AssociationFeeFrequency">
        <option value="">Select Fee Frequency</option>
        <option value="Annually" <?php echo $listingData['AssociationFeeFrequency'] == 'Annually' ? 'selected' : ''; ?>>Annually</option>
        <option value="Bi-Monthly" <?php echo $listingData['AssociationFeeFrequency'] == 'Bi-Monthly' ? 'selected' : ''; ?>>Bi-Monthly</option>
        <option value="Bi-Weekly" <?php echo $listingData['AssociationFeeFrequency'] == 'Bi-Weekly' ? 'selected' : ''; ?>>Bi-Weekly</option>
        <option value="Daily" <?php echo $listingData['AssociationFeeFrequency'] == 'Daily' ? 'selected' : ''; ?>>Daily</option>
        <option value="Monthly" <?php echo $listingData['AssociationFeeFrequency'] == 'Monthly' ? 'selected' : ''; ?>>Monthly</option>
        <option value="One Time" <?php echo $listingData['AssociationFeeFrequency'] == 'One Time' ? 'selected' : ''; ?>>One Time</option>
    </select>
</div>    


<div>
    <label for="CommunityStyleYN" style="font-size: 18px; font-weight: 700;">
        <input type="checkbox" id="CommunityStyleYN" name="CommunityStyleYN" value="true" <?php echo $listingData['CommunityStyleYN'] ? 'checked' : ''; ?>>
        Community Style
    </label>
</div>

<div class="CommunityStyleYN-fields" style="display: <?php echo $listingData['CommunityStyleYN'] ? 'block' : 'none'; ?>; margin-bottom: 20px;">
    <select name="CommunityStyle">
        <option value="">Select Fee Frequency</option>
        <option value="Gated" <?php echo $listingData['CommunityStyle'] == 'Gated' ? 'selected' : ''; ?>>Gated</option>
        <option value="Adult" <?php echo $listingData['CommunityStyle'] == 'Adult' ? 'selected' : ''; ?>>Adult</option>
        <option value="Condo Only" <?php echo $listingData['CommunityStyle'] == 'Condo Only' ? 'selected' : ''; ?>>Condo Only</option>
        <option value="Age Restricted" <?php echo $listingData['CommunityStyle'] == 'Age Restricted' ? 'selected' : ''; ?>>Age Restricted</option>
        <option value="Urban" <?php echo $listingData['CommunityStyle'] == 'Urban' ? 'selected' : ''; ?>>Urban</option>
        <option value="Townhomes" <?php echo $listingData['CommunityStyle'] == 'Townhomes' ? 'selected' : ''; ?>>Townhomes</option>
        <option value="Green" <?php echo $listingData['CommunityStyle'] == 'Green' ? 'selected' : ''; ?>>Green</option>
    </select>
</div>   

<h5>Community Features</h5>

<div class="inline-checkboxes">

    <label>
        <input type="checkbox" name="CommunityFeatures[]" value="None" <?php echo in_array('None', $listingData['CommunityFeatures']) ? 'checked' : ''; ?>>     
        <span>None</span>
    </label>

    <label>
        <input type="checkbox" name="CommunityFeatures[]" value="Airport/Runway" <?php echo in_array('Airport/Runway', $listingData['CommunityFeatures']) ? 'checked' : ''; ?>> 
        <span>Airport/Runway</span>
    </label>

    <label>
        <input type="checkbox" name="CommunityFeatures[]" value="Clubhouse" <?php echo in_array('Clubhouse', $listingData['CommunityFeatures']) ? 'checked' : ''; ?>>
        <span>Clubhouse</span>
    </label>

    <label>
        <input type="checkbox" name="CommunityFeatures[]" value="Curbs" <?php echo in_array('Curbs', $listingData['CommunityFeatures']) ? 'checked' : ''; ?>>
        <span>Curbs</span>
    </label>

    <label>
        <input type="checkbox" name="CommunityFeatures[]" value="Fishing" <?php echo in_array('Fishing', $listingData['CommunityFeatures']) ? 'checked' : ''; ?>>
        <span>Fishing</span>
    </label>

    <label>
        <input type="checkbox" name="CommunityFeatures[]" value="Fitness Center" <?php echo in_array('Fitness Center', $listingData['CommunityFeatures']) ? 'checked' : ''; ?>>
        <span>Fitness Center</span>
    </label>

    <label>
        <input type="checkbox" name="CommunityFeatures[]" value="Gated" <?php echo in_array('Gated', $listingData['CommunityFeatures']) ? 'checked' : ''; ?>>
        <span>Gated</span>
    </label>

    <label>
        <input type="checkbox" name="CommunityFeatures[]" value="Golf" <?php echo in_array('Golf', $listingData['CommunityFeatures']) ? 'checked' : ''; ?>>
        <span>Golf</span>
    </label>

    <label>
        <input type="checkbox" name="CommunityFeatures[]" value="Lake" <?php echo in_array('Lake', $listingData['CommunityFeatures']) ? 'checked' : ''; ?>>
        <span>Lake</span>
    </label>

    <label>
        <input type="checkbox" name="CommunityFeatures[]" value="Other" <?php echo in_array('Other', $listingData['CommunityFeatures']) ? 'checked' : ''; ?>>
        <span>Other</span>
    </label>

    <label>
        <input type="checkbox" name="CommunityFeatures[]" value="Park" <?php echo in_array('Park', $listingData['CommunityFeatures']) ? 'checked' : ''; ?>>
        <span>Park</span>
    </label>

    <label>
        <input type="checkbox" name="CommunityFeatures[]" value="Playground" <?php echo in_array('Playground', $listingData['CommunityFeatures']) ? 'checked' : ''; ?>>
        <span>Playground</span>
    </label>

    <label>
        <input type="checkbox" name="CommunityFeatures[]" value="Pool" <?php echo in_array('Pool', $listingData['CommunityFeatures']) ? 'checked' : ''; ?>>
        <span>Pool</span>
    </label>

    <label>
        <input type="checkbox" name="CommunityFeatures[]" value="Racquetball" <?php echo in_array('Racquetball', $listingData['CommunityFeatures']) ? 'checked' : ''; ?>>
        <span>Racquetball</span>
    </label>

    <label>
        <input type="checkbox" name="CommunityFeatures[]" value="Restaurant" <?php echo in_array('Restaurant', $listingData['CommunityFeatures']) ? 'checked' : ''; ?>>
        <span>Restaurant</span>
    </label>

    <label>
        <input type="checkbox" name="CommunityFeatures[]" value="Sidewalks" <?php echo in_array('Sidewalks', $listingData['CommunityFeatures']) ? 'checked' : ''; ?>>
        <span>Sidewalks</span>
    </label>

    <label>
        <input type="checkbox" name="CommunityFeatures[]" value="Stable(s)" <?php echo in_array('Stable(s)', $listingData['CommunityFeatures']) ? 'checked' : ''; ?>>
        <span>Stable(s)</span>
    </label>

    <label>
        <input type="checkbox" name="CommunityFeatures[]" value="Street Lights" <?php echo in_array('Street Lights', $listingData['CommunityFeatures']) ? 'checked' : ''; ?>>
        <span>Street Lights</span>
    </label>

    <label>
        <input type="checkbox" name="CommunityFeatures[]" value="Suburban" <?php echo in_array('Suburban', $listingData['CommunityFeatures']) ? 'checked' : ''; ?>>
        <span>Suburban</span>
    </label>

    <label>
        <input type="checkbox" name="CommunityFeatures[]" value="Tennis Court(s)" <?php echo in_array('Tennis Court(s)', $listingData['CommunityFeatures']) ? 'checked' : ''; ?>>
        <span>Tennis Court(s)</span>
    </label>

</div>

    <button type="submit" style="margin-top: 20px;">Save Information</button>
</form>

<script>
    jQuery(document).ready(function($) {
        // Show or hide PoolFeatures fields based on checkbox state
        $('#PoolPrivateYN').change(function() {
            if ($(this).is(':checked')) {
                $('.PoolFeatures-fields').show();
            } else {
                $('.PoolFeatures-fields').hide();
            }
        });

        // Trigger change event on page load to set initial state
        $('#PoolPrivateYN').trigger('change');

        // Show or hide SpaFeatures fields based on checkbox state
        $('#SpaYN').change(function() {
            if ($(this).is(':checked')) {
                $('.SpaFeatures-fields').show();
            } else {
                $('.SpaFeatures-fields').hide();
            }
        });

        // Trigger change event on page load to set initial state
        $('#SpaYN').trigger('change');

        // Show or hide FireplaceYN fields based on checkbox state
        $('#FireplaceYN').change(function() {
            if ($(this).is(':checked')) {
                $('.FireplaceYN-fields').show();
            } else {
                $('.FireplaceYN-fields').hide();
            }
        });

        // Trigger change event on page load to set initial state
        $('#FireplaceYN').trigger('change');

        // Show or hide WaterfrontYN fields based on checkbox state
        $('#WaterfrontYN').change(function() {
            if ($(this).is(':checked')) {
                $('.WaterfrontYN-fields').show();
            } else {
                $('.WaterfrontYN-fields').hide();
            }
        });

        // Trigger change event on page load to set initial state
        $('#WaterfrontYN').trigger('change');

        // Show or hide PowerProductionYN fields based on checkbox state
        $('#PowerProductionYN').change(function() {
            if ($(this).is(':checked')) {
                $('.PowerProductionYN-fields').show();
            } else {
                $('.PowerProductionYN-fields').hide();
            }
        });

        // Trigger change event on page load to set initial state
        $('#PowerProductionYN').trigger('change');

        // Show or hide AssociationYN fields based on checkbox state
        $('#AssociationYN').change(function() {
            if ($(this).is(':checked')) {
                $('.AssociationYN-fields').show();
            } else {
                $('.AssociationYN-fields').hide();
            }
        });

        // Trigger change event on page load to set initial state
        $('#AssociationYN').trigger('change');

        // Show or hide CommunityStyleYN fields based on checkbox state
        $('#CommunityStyleYN').change(function() {
            if ($(this).is(':checked')) {
                $('.CommunityStyleYN-fields').show();
            } else {
                $('.CommunityStyleYN-fields').hide();
            }
        });

        // Trigger change event on page load to set initial state
        $('#CommunityStyleYN').trigger('change');

    });
</script>
