<form method="POST" class="nexus-mls-form listing-tab-content">
<input type="hidden" name="ListingKey" value="<?php echo $listing; ?>">

<h2>Characteristics</h2>

<h5>Property Condition</h5>
<div class="inline-checkboxes">
    <label>
        <input type="checkbox" name="PropertyCondition[]" value="Fixer" <?php echo in_array('Fixer', $listingData['PropertyCondition']) ? 'checked' : ''; ?>>
        <span>Fixer</span>
    </label>
    <label>
        <input type="checkbox" name="PropertyCondition[]" value="New Construction" <?php echo in_array('New Construction', $listingData['PropertyCondition']) ? 'checked' : ''; ?>>
        <span>New Construction</span>
    </label>
    <label>
        <input type="checkbox" name="PropertyCondition[]" value="Under Construction" <?php echo in_array('Under Construction', $listingData['PropertyCondition']) ? 'checked' : ''; ?>>
        <span>Under Construction</span>
    </label>
    <label>
        <input type="checkbox" name="PropertyCondition[]" value="Updated/Remodeled" <?php echo in_array('Updated/Remodeled', $listingData['PropertyCondition']) ? 'checked' : ''; ?>>
        <span>Updated/Remodeled</span>
    </label>
    <label>
        <input type="checkbox" name="PropertyCondition[]" value="To Be Built" <?php echo in_array('To Be Built', $listingData['PropertyCondition']) ? 'checked' : ''; ?>>
        <span>To Be Built</span>
    </label>
    <label>
        <input type="checkbox" name="PropertyCondition[]" value="Additions/Alterations" <?php echo in_array('Additions/Alterations', $listingData['PropertyCondition']) ? 'checked' : ''; ?>>
        <span>Additions/Alterations</span>
    </label>
    <label>
        <input type="checkbox" name="PropertyCondition[]" value="Building Permit" <?php echo in_array('Building Permit', $listingData['PropertyCondition']) ? 'checked' : ''; ?>>
        <span>Building Permit</span>
    </label>
    <label>
        <input type="checkbox" name="PropertyCondition[]" value="Repairs Cosmetic" <?php echo in_array('Repairs Cosmetic', $listingData['PropertyCondition']) ? 'checked' : ''; ?>>
        <span>Repairs Cosmetic</span>
    </label>
    <label>
        <input type="checkbox" name="PropertyCondition[]" value="Repairs Major" <?php echo in_array('Repairs Major', $listingData['PropertyCondition']) ? 'checked' : ''; ?>>
        <span>Repairs Major</span>
    </label>
    <label>
        <input type="checkbox" name="PropertyCondition[]" value="Turnkey" <?php echo in_array('Turnkey', $listingData['PropertyCondition']) ? 'checked' : ''; ?>>
        <span>Turnkey</span>
    </label>
</div>


<h5>Accessibility Features</h5>
<div class="inline-checkboxes">
    <label>
        <input type="checkbox" name="AccessibilityFeatures[]" value="None" <?php echo in_array('None', $listingData['AccessibilityFeatures']) ? 'checked' : ''; ?>>
        <span>None</span>
    </label>
    <label>
        <input type="checkbox" name="AccessibilityFeatures[]" value="Accessible Approach with Ramp" <?php echo in_array('Accessible Approach with Ramp', $listingData['AccessibilityFeatures']) ? 'checked' : ''; ?>>
        <span>Accessible Approach with Ramp</span>
    </label>
    <label>
        <input type="checkbox" name="AccessibilityFeatures[]" value="Accessible Bedroom" <?php echo in_array('Accessible Bedroom', $listingData['AccessibilityFeatures']) ? 'checked' : ''; ?>>
        <span>Accessible Bedroom</span>
    </label>
    <label>
        <input type="checkbox" name="AccessibilityFeatures[]" value="Accessible Central Living Area" <?php echo in_array('Accessible Central Living Area', $listingData['AccessibilityFeatures']) ? 'checked' : ''; ?>>
        <span>Accessible Central Living Area</span>
    </label>
    <label>
        <input type="checkbox" name="AccessibilityFeatures[]" value="Accessible Closets" <?php echo in_array('Accessible Closets', $listingData['AccessibilityFeatures']) ? 'checked' : ''; ?>>
        <span>Accessible Closets</span>
    </label>
    <label>
        <input type="checkbox" name="AccessibilityFeatures[]" value="Accessible Common Area" <?php echo in_array('Accessible Common Area', $listingData['AccessibilityFeatures']) ? 'checked' : ''; ?>>
        <span>Accessible Common Area</span>
    </label>
    <label>
        <input type="checkbox" name="AccessibilityFeatures[]" value="Accessible Doors" <?php echo in_array('Accessible Doors', $listingData['AccessibilityFeatures']) ? 'checked' : ''; ?>>
        <span>Accessible Doors</span>
    </label>
    <label>
        <input type="checkbox" name="AccessibilityFeatures[]" value="Accessible Electrical and Environmental Controls" <?php echo in_array('Accessible Electrical and Environmental Controls', $listingData['AccessibilityFeatures']) ? 'checked' : ''; ?>>
        <span>Accessible Electrical and Environmental Controls</span>
    </label>
    <label>
        <input type="checkbox" name="AccessibilityFeatures[]" value="Accessible Elevator Installed" <?php echo in_array('Accessible Elevator Installed', $listingData['AccessibilityFeatures']) ? 'checked' : ''; ?>>
        <span>Accessible Elevator Installed</span>
    </label>
    <label>
        <input type="checkbox" name="AccessibilityFeatures[]" value="Accessible Entrance" <?php echo in_array('Accessible Entrance', $listingData['AccessibilityFeatures']) ? 'checked' : ''; ?>>
        <span>Accessible Entrance</span>
    </label>
    <label>
        <input type="checkbox" name="AccessibilityFeatures[]" value="Accessible for Hearing-Impairment" <?php echo in_array('Accessible for Hearing-Impairment', $listingData['AccessibilityFeatures']) ? 'checked' : ''; ?>>
        <span>Accessible for Hearing-Impairment</span>
    </label>
    <label>
        <input type="checkbox" name="AccessibilityFeatures[]" value="Accessible Full Bath" <?php echo in_array('Accessible Full Bath', $listingData['AccessibilityFeatures']) ? 'checked' : ''; ?>>
        <span>Accessible Full Bath</span>
    </label>
    <label>
        <input type="checkbox" name="AccessibilityFeatures[]" value="Accessible Hallway(s)" <?php echo in_array('Accessible Hallway(s)', $listingData['AccessibilityFeatures']) ? 'checked' : ''; ?>>
        <span>Accessible Hallway(s)</span>
    </label>
    <label>
        <input type="checkbox" name="AccessibilityFeatures[]" value="Accessible Kitchen" <?php echo in_array('Accessible Kitchen', $listingData['AccessibilityFeatures']) ? 'checked' : ''; ?>>
        <span>Accessible Kitchen</span>
    </label>
    <label>
        <input type="checkbox" name="AccessibilityFeatures[]" value="Accessible Kitchen Appliances" <?php echo in_array('Accessible Kitchen Appliances', $listingData['AccessibilityFeatures']) ? 'checked' : ''; ?>>
        <span>Accessible Kitchen Appliances</span>
    </label>
    <label>
        <input type="checkbox" name="AccessibilityFeatures[]" value="Accessible Stairway" <?php echo in_array('Accessible Stairway', $listingData['AccessibilityFeatures']) ? 'checked' : ''; ?>>
        <span>Accessible Stairway</span>
    </label>
    <label>
        <input type="checkbox" name="AccessibilityFeatures[]" value="Accessible Washer/Dryer" <?php echo in_array('Accessible Washer/Dryer', $listingData['AccessibilityFeatures']) ? 'checked' : ''; ?>>
        <span>Accessible Washer/Dryer</span>
    </label>
    <label>
        <input type="checkbox" name="AccessibilityFeatures[]" value="Adaptable Bathroom Walls" <?php echo in_array('Adaptable Bathroom Walls', $listingData['AccessibilityFeatures']) ? 'checked' : ''; ?>>
        <span>Adaptable Bathroom Walls</span>
    </label>
    <label>
        <input type="checkbox" name="AccessibilityFeatures[]" value="Adaptable For Elevator" <?php echo in_array('Adaptable For Elevator', $listingData['AccessibilityFeatures']) ? 'checked' : ''; ?>>
        <span>Adaptable For Elevator</span>
    </label>
    <label>
        <input type="checkbox" name="AccessibilityFeatures[]" value="Ceiling Track" <?php echo in_array('Ceiling Track', $listingData['AccessibilityFeatures']) ? 'checked' : ''; ?>>
        <span>Ceiling Track</span>
    </label>
    <label>
        <input type="checkbox" name="AccessibilityFeatures[]" value="Central Living Area" <?php echo in_array('Central Living Area', $listingData['AccessibilityFeatures']) ? 'checked' : ''; ?>>
        <span>Central Living Area</span>
    </label>
    <label>
        <input type="checkbox" name="AccessibilityFeatures[]" value="Common Area" <?php echo in_array('Common Area', $listingData['AccessibilityFeatures']) ? 'checked' : ''; ?>>
        <span>Common Area</span>
    </label>
    <label>
        <input type="checkbox" name="AccessibilityFeatures[]" value="Customized Wheelchair Accessible" <?php echo in_array('Customized Wheelchair Accessible', $listingData['AccessibilityFeatures']) ? 'checked' : ''; ?>>
        <span>Customized Wheelchair Accessible</span>
    </label>
    <label>
        <input type="checkbox" name="AccessibilityFeatures[]" value="Electronic Environmental Controls" <?php echo in_array('Electronic Environmental Controls', $listingData['AccessibilityFeatures']) ? 'checked' : ''; ?>>
        <span>Electronic Environmental Controls</span>
    </label>
    <label>
        <input type="checkbox" name="AccessibilityFeatures[]" value="Enhanced Accessible" <?php echo in_array('Enhanced Accessible', $listingData['AccessibilityFeatures']) ? 'checked' : ''; ?>>
        <span>Enhanced Accessible</span>
    </label>
    <label>
        <input type="checkbox" name="AccessibilityFeatures[]" value="Exterior Wheelchair Lift" <?php echo in_array('Exterior Wheelchair Lift', $listingData['AccessibilityFeatures']) ? 'checked' : ''; ?>>
        <span>Exterior Wheelchair Lift</span>
    </label>
    <label>
        <input type="checkbox" name="AccessibilityFeatures[]" value="Grip-Accessible Features" <?php echo in_array('Grip-Accessible Features', $listingData['AccessibilityFeatures']) ? 'checked' : ''; ?>>
        <span>Grip-Accessible Features</span>
    </label>
    <label>
        <input type="checkbox" name="AccessibilityFeatures[]" value="Reinforced Floors" <?php echo in_array('Reinforced Floors', $listingData['AccessibilityFeatures']) ? 'checked' : ''; ?>>
        <span>Reinforced Floors</span>
    </label>
    <label>
        <input type="checkbox" name="AccessibilityFeatures[]" value="Safe Emergency Egress from Home" <?php echo in_array('Safe Emergency Egress from Home', $listingData['AccessibilityFeatures']) ? 'checked' : ''; ?>>
        <span>Safe Emergency Egress from Home</span>
    </label>
    <label>
        <input type="checkbox" name="AccessibilityFeatures[]" value="Smart Technology" <?php echo in_array('Smart Technology', $listingData['AccessibilityFeatures']) ? 'checked' : ''; ?>>
        <span>Smart Technology</span>
    </label>
    <label>
        <input type="checkbox" name="AccessibilityFeatures[]" value="Stair Lift" <?php echo in_array('Stair Lift', $listingData['AccessibilityFeatures']) ? 'checked' : ''; ?>>
        <span>Stair Lift</span>
    </label>
    <label>
        <input type="checkbox" name="AccessibilityFeatures[]" value="Standby Generator" <?php echo in_array('Standby Generator', $listingData['AccessibilityFeatures']) ? 'checked' : ''; ?>>
        <span>Standby Generator</span>
    </label>
    <label>
        <input type="checkbox" name="AccessibilityFeatures[]" value="Therapeutic Whirlpool" <?php echo in_array('Therapeutic Whirlpool', $listingData['AccessibilityFeatures']) ? 'checked' : ''; ?>>
        <span>Therapeutic Whirlpool</span>
    </label>
    <label>
        <input type="checkbox" name="AccessibilityFeatures[]" value="Visitable" <?php echo in_array('Visitable', $listingData['AccessibilityFeatures']) ? 'checked' : ''; ?>>
        <span>Visitable</span>
    </label>
    <label>
        <input type="checkbox" name="AccessibilityFeatures[]" value="Visitor Bathroom" <?php echo in_array('Visitor Bathroom', $listingData['AccessibilityFeatures']) ? 'checked' : ''; ?>>
        <span>Visitor Bathroom</span>
    </label>
    <label>
        <input type="checkbox" name="AccessibilityFeatures[]" value="Walker-Accessible Stairs" <?php echo in_array('Walker-Accessible Stairs', $listingData['AccessibilityFeatures']) ? 'checked' : ''; ?>>
        <span>Walker-Accessible Stairs</span>
    </label>
</div>


<h5>Structure Type</h5>
<div class="inline-checkboxes">
    <label>
        <input type="checkbox" name="StructureType[]" value="None" <?php echo in_array('None', $listingData['StructureType']) ? 'checked' : ''; ?>>
        <span>None</span>
    </label>
    <label>
        <input type="checkbox" name="StructureType[]" value="Cabin" <?php echo in_array('Cabin', $listingData['StructureType']) ? 'checked' : ''; ?>>
        <span>Cabin</span>
    </label>
    <label>
        <input type="checkbox" name="StructureType[]" value="Dock" <?php echo in_array('Dock', $listingData['StructureType']) ? 'checked' : ''; ?>>
        <span>Dock</span>
    </label>
    <label>
        <input type="checkbox" name="StructureType[]" value="Duplex" <?php echo in_array('Duplex', $listingData['StructureType']) ? 'checked' : ''; ?>>
        <span>Duplex</span>
    </label>
    <label>
        <input type="checkbox" name="StructureType[]" value="Flex" <?php echo in_array('Flex', $listingData['StructureType']) ? 'checked' : ''; ?>>
        <span>Flex</span>
    </label>
    <label>
        <input type="checkbox" name="StructureType[]" value="Hotel/Motel" <?php echo in_array('Hotel/Motel', $listingData['StructureType']) ? 'checked' : ''; ?>>
        <span>Hotel/Motel</span>
    </label>
    <label>
        <input type="checkbox" name="StructureType[]" value="House" <?php echo in_array('House', $listingData['StructureType']) ? 'checked' : ''; ?>>
        <span>House</span>
    </label>
    <label>
        <input type="checkbox" name="StructureType[]" value="Industrial" <?php echo in_array('Industrial', $listingData['StructureType']) ? 'checked' : ''; ?>>
        <span>Industrial</span>
    </label>
    <label>
        <input type="checkbox" name="StructureType[]" value="Manufactured House" <?php echo in_array('Manufactured House', $listingData['StructureType']) ? 'checked' : ''; ?>>
        <span>Manufactured House</span>
    </label>
    <label>
        <input type="checkbox" name="StructureType[]" value="Mixed Use" <?php echo in_array('Mixed Use', $listingData['StructureType']) ? 'checked' : ''; ?>>
        <span>Mixed Use</span>
    </label>
    <label>
        <input type="checkbox" name="StructureType[]" value="Multi Family" <?php echo in_array('Multi Family', $listingData['StructureType']) ? 'checked' : ''; ?>>
        <span>Multi Family</span>
    </label>
    <label>
        <input type="checkbox" name="StructureType[]" value="Office" <?php echo in_array('Office', $listingData['StructureType']) ? 'checked' : ''; ?>>
        <span>Office</span>
    </label>
    <label>
        <input type="checkbox" name="StructureType[]" value="Quadruplex" <?php echo in_array('Quadruplex', $listingData['StructureType']) ? 'checked' : ''; ?>>
        <span>Quadruplex</span>
    </label>
    <label>
        <input type="checkbox" name="StructureType[]" value="Retail" <?php echo in_array('Retail', $listingData['StructureType']) ? 'checked' : ''; ?>>
        <span>Retail</span>
    </label>
    <label>
        <input type="checkbox" name="StructureType[]" value="Townhouse" <?php echo in_array('Townhouse', $listingData['StructureType']) ? 'checked' : ''; ?>>
        <span>Townhouse</span>
    </label>
    <label>
        <input type="checkbox" name="StructureType[]" value="Triplex" <?php echo in_array('Triplex', $listingData['StructureType']) ? 'checked' : ''; ?>> 
        <span>Triplex</span>
    </label>
    <label>
        <input type="checkbox" name="StructureType[]" value="Warehouse" <?php echo in_array('Warehouse', $listingData['StructureType']) ? 'checked' : ''; ?>>
        <span>Warehouse</span>
    </label>
</div>


<h5>Appliances</h5>
<div class="inline-checkboxes">
    <label>
        <input type="checkbox" name="Appliances[]" value="None" <?php echo in_array('None', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>None</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Bar Fridge" <?php echo in_array('Bar Fridge', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Bar Fridge</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Built-In Electric Oven" <?php echo in_array('Built-In Electric Oven', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Built-In Electric Oven</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Built-In Electric Range" <?php echo in_array('Built-In Electric Range', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Built-In Electric Range</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Built-In Freezer" <?php echo in_array('Built-In Freezer', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Built-In Freezer</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Built-In Gas Oven" <?php echo in_array('Built-In Gas Oven', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Built-In Gas Oven</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Built-In Gas Range" <?php echo in_array('Built-In Gas Range', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Built-In Gas Range</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Built-In Range" <?php echo in_array('Built-In Range', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Built-In Range</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Built-In Refrigerator" <?php echo in_array('Built-In Refrigerator', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Built-In Refrigerator</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Convection Oven" <?php echo in_array('Convection Oven', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Convection Oven</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Cooktop" <?php echo in_array('Cooktop', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Cooktop</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Dishwasher" <?php echo in_array('Dishwasher', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Dishwasher</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Disposal" <?php echo in_array('Disposal', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Disposal</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Double Oven" <?php echo in_array('Double Oven', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Double Oven</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Down Draft" <?php echo in_array('Down Draft', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Down Draft</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Dryer" <?php echo in_array('Dryer', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Dryer</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Electric Cooktop" <?php echo in_array('Electric Cooktop', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Electric Cooktop</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Electric Oven" <?php echo in_array('Electric Oven', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Electric Oven</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Electric Range" <?php echo in_array('Electric Range', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Electric Range</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Electric Water Heater" <?php echo in_array('Electric Water Heater', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Electric Water Heater</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="ENERGY STAR Qualified Appliances" <?php echo in_array('ENERGY STAR Qualified Appliances', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>ENERGY STAR Qualified Appliances</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="ENERGY STAR Qualified Dishwasher" <?php echo in_array('ENERGY STAR Qualified Dishwasher', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>ENERGY STAR Qualified Dishwasher</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="ENERGY STAR Qualified Dryer" <?php echo in_array('ENERGY STAR Qualified Dryer', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>ENERGY STAR Qualified Dryer</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="ENERGY STAR Qualified Freezer" <?php echo in_array('ENERGY STAR Qualified Freezer', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>ENERGY STAR Qualified Freezer</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="ENERGY STAR Qualified Refrigerator" <?php echo in_array('ENERGY STAR Qualified Refrigerator', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>ENERGY STAR Qualified Refrigerator</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="ENERGY STAR Qualified Washer" <?php echo in_array('ENERGY STAR Qualified Washer', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>ENERGY STAR Qualified Washer</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="ENERGY STAR Qualified Water Heater" <?php echo in_array('ENERGY STAR Qualified Water Heater', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>ENERGY STAR Qualified Water Heater</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Exhaust Fan" <?php echo in_array('Exhaust Fan', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Exhaust Fan</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Free-Standing Electric Oven" <?php echo in_array('Free-Standing Electric Oven', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Free-Standing Electric Oven</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Free-Standing Electric Range" <?php echo in_array('Free-Standing Electric Range', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Free-Standing Electric Range</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Free-Standing Freezer" <?php echo in_array('Free-Standing Freezer', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Free-Standing Freezer</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Free-Standing Gas Oven" <?php echo in_array('Free-Standing Gas Oven', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Free-Standing Gas Oven</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Free-Standing Gas Range" <?php echo in_array('Free-Standing Gas Range', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Free-Standing Gas Range</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Free-Standing Range" <?php echo in_array('Free-Standing Range', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Free-Standing Range</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Free-Standing Refrigerator" <?php echo in_array('Free-Standing Refrigerator', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Free-Standing Refrigerator</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Freezer" <?php echo in_array('Freezer', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Freezer</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Gas Cooktop" <?php echo in_array('Gas Cooktop', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Gas Cooktop</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Gas Oven" <?php echo in_array('Gas Oven', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Gas Oven</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Gas Range" <?php echo in_array('Gas Range', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Gas Range</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Gas Water Heater" <?php echo in_array('Gas Water Heater', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Gas Water Heater</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Heat Pump Water Heater" <?php echo in_array('Heat Pump Water Heater', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Heat Pump Water Heater</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Humidifier" <?php echo in_array('Humidifier', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Humidifier</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Ice Maker" <?php echo in_array('Ice Maker', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Ice Maker</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Indoor Grill" <?php echo in_array('Indoor Grill', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Indoor Grill</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Induction Cooktop" <?php echo in_array('Induction Cooktop', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Induction Cooktop</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Instant Hot Water" <?php echo in_array('Instant Hot Water', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Instant Hot Water</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Microwave" <?php echo in_array('Microwave', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Microwave</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Other" <?php echo in_array('Other', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Other</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Oven" <?php echo in_array('Oven', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Oven</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Plumbed For Ice Maker" <?php echo in_array('Plumbed For Ice Maker', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Plumbed For Ice Maker</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Portable Dishwasher" <?php echo in_array('Portable Dishwasher', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Portable Dishwasher</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Propane Cooktop" <?php echo in_array('Propane Cooktop', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Propane Cooktop</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Range" <?php echo in_array('Range', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Range</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Range Hood" <?php echo in_array('Range Hood', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Range Hood</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Refrigerator" <?php echo in_array('Refrigerator', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Refrigerator</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Self Cleaning Oven" <?php echo in_array('Self Cleaning Oven', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Self Cleaning Oven</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Smart Appliance(s)" <?php echo in_array('Smart Appliance(s)', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Smart Appliance(s)</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Solar Hot Water" <?php echo in_array('Solar Hot Water', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Solar Hot Water</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Stainless Steel Appliance(s)" <?php echo in_array('Stainless Steel Appliance(s)', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Stainless Steel Appliance(s)</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Tankless Water Heater" <?php echo in_array('Tankless Water Heater', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Tankless Water Heater</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Trash Compactor" <?php echo in_array('Trash Compactor', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Trash Compactor</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Vented Exhaust Fan" <?php echo in_array('Vented Exhaust Fan', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Vented Exhaust Fan</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Warming Drawer" <?php echo in_array('Warming Drawer', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Warming Drawer</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Washer" <?php echo in_array('Washer', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Washer</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Washer/Dryer" <?php echo in_array('Washer/Dryer', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Washer/Dryer</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Washer/Dryer Stacked" <?php echo in_array('Washer/Dryer Stacked', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Washer/Dryer Stacked</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Water Heater" <?php echo in_array('Water Heater', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Water Heater</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Water Purifier" <?php echo in_array('Water Purifier', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Water Purifier</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Water Purifier Owned" <?php echo in_array('Water Purifier Owned', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Water Purifier Owned</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Water Purifier Rented" <?php echo in_array('Water Purifier Rented', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Water Purifier Rented</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Water Softener" <?php echo in_array('Water Softener', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Water Softener</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Water Softener Owned" <?php echo in_array('Water Softener Owned', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Water Softener Owned</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Water Softener Rented" <?php echo in_array('Water Softener Rented', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Water Softener Rented</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Wine Cooler" <?php echo in_array('Wine Cooler', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Wine Cooler</span>
    </label>
    <label>
        <input type="checkbox" name="Appliances[]" value="Wine Refrigerator" <?php echo in_array('Wine Refrigerator', $listingData['Appliances']) ? 'checked' : ''; ?>>
        <span>Wine Refrigerator</span>
    </label>
</div>


<h5>Roof</h5>
<div class="inline-checkboxes">
    <label>
        <input type="checkbox" name="Roof[]" value="None" <?php echo in_array('None', $listingData['Roof']) ? 'checked' : ''; ?>>
        <span>None</span>
    </label>
    <label>
        <input type="checkbox" name="Roof[]" value="Aluminum" <?php echo in_array('Aluminum', $listingData['Roof']) ? 'checked' : ''; ?>>
        <span>Aluminum</span>
    </label>
    <label>
        <input type="checkbox" name="Roof[]" value="Asbestos Shingle" <?php echo in_array('Asbestos Shingle', $listingData['Roof']) ? 'checked' : ''; ?>>
        <span>Asbestos Shingle</span>
    </label>
    <label>
        <input type="checkbox" name="Roof[]" value="Asphalt" <?php echo in_array('Asphalt', $listingData['Roof']) ? 'checked' : ''; ?>>
        <span>Asphalt</span>
    </label>
    <label>
        <input type="checkbox" name="Roof[]" value="Bahama" <?php echo in_array('Bahama', $listingData['Roof']) ? 'checked' : ''; ?>>
        <span>Bahama</span>
    </label>
    <label>
        <input type="checkbox" name="Roof[]" value="Barrel" <?php echo in_array('Barrel', $listingData['Roof']) ? 'checked' : ''; ?>>
        <span>Barrel</span>
    </label>
    <label>
        <input type="checkbox" name="Roof[]" value="Bituthene" <?php echo in_array('Bituthene', $listingData['Roof']) ? 'checked' : ''; ?>>
        <span>Bituthene</span>
    </label>
    <label>
        <input type="checkbox" name="Roof[]" value="Built-Up" <?php echo in_array('Built-Up', $listingData['Roof']) ? 'checked' : ''; ?>>
        <span>Built-Up</span>
    </label>
    <label>
        <input type="checkbox" name="Roof[]" value="Composition" <?php echo in_array('Composition', $listingData['Roof']) ? 'checked' : ''; ?>>
        <span>Composition</span>
    </label>
    <label>
        <input type="checkbox" name="Roof[]" value="Concrete" <?php echo in_array('Concrete', $listingData['Roof']) ? 'checked' : ''; ?>>
        <span>Concrete</span>
    </label>
    <label>
        <input type="checkbox" name="Roof[]" value="Copper" <?php echo in_array('Copper', $listingData['Roof']) ? 'checked' : ''; ?>>
        <span>Copper</span>
    </label>
    <label>
        <input type="checkbox" name="Roof[]" value="Elastomeric" <?php echo in_array('Elastomeric', $listingData['Roof']) ? 'checked' : ''; ?>>
        <span>Elastomeric</span>
    </label>
    <label>
        <input type="checkbox" name="Roof[]" value="Fiberglass" <?php echo in_array('Fiberglass', $listingData['Roof']) ? 'checked' : ''; ?>>
        <span>Fiberglass</span>
    </label>
    <label>
        <input type="checkbox" name="Roof[]" value="Flat" <?php echo in_array('Flat', $listingData['Roof']) ? 'checked' : ''; ?>>
        <span>Flat</span>
    </label>
    <label>
        <input type="checkbox" name="Roof[]" value="Flat Tile" <?php echo in_array('Flat Tile', $listingData['Roof']) ? 'checked' : ''; ?>>
        <span>Flat Tile</span>
    </label>
    <label>
        <input type="checkbox" name="Roof[]" value="Foam" <?php echo in_array('Foam', $listingData['Roof']) ? 'checked' : ''; ?>>
        <span>Foam</span>
    </label>
    <label>
        <input type="checkbox" name="Roof[]" value="Green Roof" <?php echo in_array('Green Roof', $listingData['Roof']) ? 'checked' : ''; ?>>
        <span>Green Roof</span>
    </label>
    <label>
        <input type="checkbox" name="Roof[]" value="Mansard" <?php echo in_array('Mansard', $listingData['Roof']) ? 'checked' : ''; ?>>
        <span>Mansard</span>
    </label>

    <label>
        <input type="checkbox" name="Roof[]" value="Membrane" <?php echo in_array('Membrane', $listingData['Roof']) ? 'checked' : ''; ?>>
        <span>Membrane</span>
    </label>
    <label>
        <input type="checkbox" name="Roof[]" value="Metal" <?php echo in_array('Metal', $listingData['Roof']) ? 'checked' : ''; ?>>
        <span>Metal</span>
    </label>
    <label>
        <input type="checkbox" name="Roof[]" value="Mixed" <?php echo in_array('Mixed', $listingData['Roof']) ? 'checked' : ''; ?>>
        <span>Mixed</span>
    </label>
    <label>
        <input type="checkbox" name="Roof[]" value="Other" <?php echo in_array('Other', $listingData['Roof']) ? 'checked' : ''; ?>>
        <span>Other</span>
    </label>
    <label>
        <input type="checkbox" name="Roof[]" value="Rolled/Hot Mop" <?php echo in_array('Rolled/Hot Mop', $listingData['Roof']) ? 'checked' : ''; ?>>
        <span>Rolled/Hot Mop</span>
    </label>
    <label>
        <input type="checkbox" name="Roof[]" value="Rubber" <?php echo in_array('Rubber', $listingData['Roof']) ? 'checked' : ''; ?>>
        <span>Rubber</span>
    </label>
    <label>
        <input type="checkbox" name="Roof[]" value="See Remarks" <?php echo in_array('See Remarks', $listingData['Roof']) ? 'checked' : ''; ?>>
        <span>See Remarks</span>
    </label>
    <label>
        <input type="checkbox" name="Roof[]" value="Shake" <?php echo in_array('Shake', $listingData['Roof']) ? 'checked' : ''; ?>>
        <span>Shake</span>
    </label>
    <label>
        <input type="checkbox" name="Roof[]" value="Shingle" <?php echo in_array('Shingle', $listingData['Roof']) ? 'checked' : ''; ?>>
        <span>Shingle</span>
    </label>
    <label>
        <input type="checkbox" name="Roof[]" value="Slate" <?php echo in_array('Slate', $listingData['Roof']) ? 'checked' : ''; ?>>
        <span>Slate</span>
    </label>
    <label>
        <input type="checkbox" name="Roof[]" value="Spanish Tile" <?php echo in_array('Spanish Tile', $listingData['Roof']) ? 'checked' : ''; ?>>
        <span>Spanish Tile</span>
    </label>
    <label>
        <input type="checkbox" name="Roof[]" value="Stone" <?php echo in_array('Stone', $listingData['Roof']) ? 'checked' : ''; ?>>
        <span>Stone</span>
    </label>
    <label>
        <input type="checkbox" name="Roof[]" value="Synthetic" <?php echo in_array('Synthetic', $listingData['Roof']) ? 'checked' : ''; ?>>
        <span>Synthetic</span>
    </label>
    <label>
        <input type="checkbox" name="Roof[]" value="Tar/Gravel" <?php echo in_array('Tar/Gravel', $listingData['Roof']) ? 'checked' : ''; ?>>
        <span>Tar/Gravel</span>
    </label>
    <label>
        <input type="checkbox" name="Roof[]" value="Tile" <?php echo in_array('Tile', $listingData['Roof']) ? 'checked' : ''; ?>>
        <span>Tile</span>
    </label>
    <label>
        <input type="checkbox" name="Roof[]" value="Wood" <?php echo in_array('Wood', $listingData['Roof']) ? 'checked' : ''; ?>>
        <span>Wood</span>
    </label>
</div>

<h5>Flooring</h5>
<div class="inline-checkboxes">
    <label>
        <input type="checkbox" name="Flooring[]" value="None" <?php echo in_array('None', $listingData['Flooring']) ? 'checked' : ''; ?>>
        <span>None</span>
    </label>
    <label>
        <input type="checkbox" name="Flooring[]" value="Adobe" <?php echo in_array('Adobe', $listingData['Flooring']) ? 'checked' : ''; ?>>
        <span>Adobe</span>
    </label>
    <label>
        <input type="checkbox" name="Flooring[]" value="Bamboo" <?php echo in_array('Bamboo', $listingData['Flooring']) ? 'checked' : ''; ?>>
        <span>Bamboo</span>
    </label>
    <label>
        <input type="checkbox" name="Flooring[]" value="Brick" <?php echo in_array('Brick', $listingData['Flooring']) ? 'checked' : ''; ?>>
        <span>Brick</span>
    </label>
    <label>
        <input type="checkbox" name="Flooring[]" value="Carpet" <?php echo in_array('Carpet', $listingData['Flooring']) ? 'checked' : ''; ?>>
        <span>Carpet</span>
    </label>
    <label>
        <input type="checkbox" name="Flooring[]" value="Ceramic Tile" <?php echo in_array('Ceramic Tile', $listingData['Flooring']) ? 'checked' : ''; ?>>
        <span>Ceramic Tile</span>
    </label>
    <label>
        <input type="checkbox" name="Flooring[]" value="Clay" <?php echo in_array('Clay', $listingData['Flooring']) ? 'checked' : ''; ?>>
        <span>Clay</span>
    </label>
    <label>
        <input type="checkbox" name="Flooring[]" value="Combination" <?php echo in_array('Combination', $listingData['Flooring']) ? 'checked' : ''; ?>>
        <span>Combination</span>
    </label>
    <label>
        <input type="checkbox" name="Flooring[]" value="Concrete" <?php echo in_array('Concrete', $listingData['Flooring']) ? 'checked' : ''; ?>>
        <span>Concrete</span>
    </label>
    <label>
        <input type="checkbox" name="Flooring[]" value="Cork" <?php echo in_array('Cork', $listingData['Flooring']) ? 'checked' : ''; ?>>
        <span>Cork</span>
    </label>
    <label>
        <input type="checkbox" name="Flooring[]" value="CRI Green Label Plus Certified Carpet" <?php echo in_array('CRI Green Label Plus Certified Carpet', $listingData['Flooring']) ? 'checked' : ''; ?>>
        <span>CRI Green Label Plus Certified Carpet</span>
    </label>
    <label>
        <input type="checkbox" name="Flooring[]" value="Dirt" <?php echo in_array('Dirt', $listingData['Flooring']) ? 'checked' : ''; ?>>
        <span>Dirt</span>
    </label>
    <label>
        <input type="checkbox" name="Flooring[]" value="Engineered Hardwood" <?php echo in_array('Engineered Hardwood', $listingData['Flooring']) ? 'checked' : ''; ?>>
        <span>Engineered Hardwood</span>
    </label>
    <label>
        <input type="checkbox" name="Flooring[]" value="FloorScore(r) Certified Flooring" <?php echo in_array('FloorScore(r) Certified Flooring', $listingData['Flooring']) ? 'checked' : ''; ?>>
        <span>FloorScore(r) Certified Flooring</span>
    </label>
    <label>
        <input type="checkbox" name="Flooring[]" value="FSC or SFI Certified Source Hardwood" <?php echo in_array('FSC or SFI Certified Source Hardwood', $listingData['Flooring']) ? 'checked' : ''; ?>>
        <span>FSC or SFI Certified Source Hardwood</span>
    </label>
    <label>
        <input type="checkbox" name="Flooring[]" value="Granite" <?php echo in_array('Granite', $listingData['Flooring']) ? 'checked' : ''; ?>>
        <span>Granite</span>
    </label>
    <label>
        <input type="checkbox" name="Flooring[]" value="Hardwood" <?php echo in_array('Hardwood', $listingData['Flooring']) ? 'checked' : ''; ?>>
        <span>Hardwood</span>
    </label>
    <label>
        <input type="checkbox" name="Flooring[]" value="Laminate" <?php echo in_array('Laminate', $listingData['Flooring']) ? 'checked' : ''; ?>>
        <span>Laminate</span>
    </label>
    <label>
        <input type="checkbox" name="Flooring[]" value="Linoleum" <?php echo in_array('Linoleum', $listingData['Flooring']) ? 'checked' : ''; ?>>
        <span>Linoleum</span>
    </label>
    <label>
        <input type="checkbox" name="Flooring[]" value="Luxury Vinyl" <?php echo in_array('Luxury Vinyl', $listingData['Flooring']) ? 'checked' : ''; ?>>
        <span>Luxury Vinyl</span>
    </label>
    <label>
        <input type="checkbox" name="Flooring[]" value="Marble" <?php echo in_array('Marble', $listingData['Flooring']) ? 'checked' : ''; ?>>
        <span>Marble</span>
    </label>
    <label>
        <input type="checkbox" name="Flooring[]" value="Other" <?php echo in_array('Other', $listingData['Flooring']) ? 'checked' : ''; ?>>
        <span>Other</span>
    </label>
    <label>
        <input type="checkbox" name="Flooring[]" value="Painted/Stained" <?php echo in_array('Painted/Stained', $listingData['Flooring']) ? 'checked' : ''; ?>>
        <span>Painted/Stained</span>
    </label>
    <label>
        <input type="checkbox" name="Flooring[]" value="Parquet" <?php echo in_array('Parquet', $listingData['Flooring']) ? 'checked' : ''; ?>>
        <span>Parquet</span>
    </label>
    <label>
        <input type="checkbox" name="Flooring[]" value="Pavers" <?php echo in_array('Pavers', $listingData['Flooring']) ? 'checked' : ''; ?>>
        <span>Pavers</span>
    </label>
    <label>
        <input type="checkbox" name="Flooring[]" value="Plank" <?php echo in_array('Plank', $listingData['Flooring']) ? 'checked' : ''; ?>>
        <span>Plank</span>
    </label>
    <label>
        <input type="checkbox" name="Flooring[]" value="Reclaimed Wood" <?php echo in_array('Reclaimed Wood', $listingData['Flooring']) ? 'checked' : ''; ?>>
        <span>Reclaimed Wood</span>
    </label>
    <label>
        <input type="checkbox" name="Flooring[]" value="See Remarks" <?php echo in_array('See Remarks', $listingData['Flooring']) ? 'checked' : ''; ?>>
        <span>See Remarks</span>
    </label>
    <label>
        <input type="checkbox" name="Flooring[]" value="Simulated Wood" <?php echo in_array('Simulated Wood', $listingData['Flooring']) ? 'checked' : ''; ?>>
        <span>Simulated Wood</span>
    </label>
    <label>
        <input type="checkbox" name="Flooring[]" value="Slate" <?php echo in_array('Slate', $listingData['Flooring']) ? 'checked' : ''; ?>>
        <span>Slate</span>
    </label>
    <label>
        <input type="checkbox" name="Flooring[]" value="Softwood" <?php echo in_array('Softwood', $listingData['Flooring']) ? 'checked' : ''; ?>>
        <span>Softwood</span>
    </label>
    <label>
        <input type="checkbox" name="Flooring[]" value="Stamped" <?php echo in_array('Stamped', $listingData['Flooring']) ? 'checked' : ''; ?>>
        <span>Stamped</span>
    </label>
    <label>
        <input type="checkbox" name="Flooring[]" value="Stone" <?php echo in_array('Stone', $listingData['Flooring']) ? 'checked' : ''; ?>>
        <span>Stone</span>
    </label>
    <label>
        <input type="checkbox" name="Flooring[]" value="Sustainable" <?php echo in_array('Sustainable', $listingData['Flooring']) ? 'checked' : ''; ?>>
        <span>Sustainable</span>
    </label>
    <label>
        <input type="checkbox" name="Flooring[]" value="Terrazzo" <?php echo in_array('Terrazzo', $listingData['Flooring']) ? 'checked' : ''; ?>>
        <span>Terrazzo</span>
    </label>
    <label>
        <input type="checkbox" name="Flooring[]" value="Tile" <?php echo in_array('Tile', $listingData['Flooring']) ? 'checked' : ''; ?>>
        <span>Tile</span>   
    </label>
    <label>
        <input type="checkbox" name="Flooring[]" value="Varies" <?php echo in_array('Varies', $listingData['Flooring']) ? 'checked' : ''; ?>>
        <span>Varies</span>
    </label>
    <label>
        <input type="checkbox" name="Flooring[]" value="Vinyl" <?php echo in_array('Vinyl', $listingData['Flooring']) ? 'checked' : ''; ?>>
        <span>Vinyl</span>
    </label>
    <label>
        <input type="checkbox" name="Flooring[]" value="Wood" <?php echo in_array('Wood', $listingData['Flooring']) ? 'checked' : ''; ?>>
        <span>Wood</span>
    </label>
</div>


<h5>Architectural Style</h5>
<div class="inline-checkboxes">
    <label>
        <input type="checkbox" name="ArchitecturalStyle[]" value="A-Frame" <?php echo in_array('A-Frame', $listingData['ArchitecturalStyle']) ? 'checked' : ''; ?>>
        <span>A-Frame</span>
    </label>
    <label>
        <input type="checkbox" name="ArchitecturalStyle[]" value="Art Deco" <?php echo in_array('Art Deco', $listingData['ArchitecturalStyle']) ? 'checked' : ''; ?>>
        <span>Art Deco</span>
    </label>
    <label>
        <input type="checkbox" name="ArchitecturalStyle[]" value="Arts and Crafts" <?php echo in_array('Arts and Crafts', $listingData['ArchitecturalStyle']) ? 'checked' : ''; ?>>
        <span>Arts and Crafts</span>
    </label>
    <label>
        <input type="checkbox" name="ArchitecturalStyle[]" value="Barn Type" <?php echo in_array('Barn Type', $listingData['ArchitecturalStyle']) ? 'checked' : ''; ?>>
        <span>Barn Type</span>
    </label>
    <label>
        <input type="checkbox" name="ArchitecturalStyle[]" value="Bungalow" <?php echo in_array('Bungalow', $listingData['ArchitecturalStyle']) ? 'checked' : ''; ?>>
        <span>Bungalow</span>
    </label>
    <label>
        <input type="checkbox" name="ArchitecturalStyle[]" value="Cabin" <?php echo in_array('Cabin', $listingData['ArchitecturalStyle']) ? 'checked' : ''; ?>>
        <span>Cabin</span>
    </label>
    <label>
        <input type="checkbox" name="ArchitecturalStyle[]" value="Cape Cod" <?php echo in_array('Cape Cod', $listingData['ArchitecturalStyle']) ? 'checked' : ''; ?>>
        <span>Cape Cod</span>
    </label>
    <label>
        <input type="checkbox" name="ArchitecturalStyle[]" value="Chalet" <?php echo in_array('Chalet', $listingData['ArchitecturalStyle']) ? 'checked' : ''; ?>>
        <span>Chalet</span>
    </label>
    <label>
        <input type="checkbox" name="ArchitecturalStyle[]" value="Colonial" <?php echo in_array('Colonial', $listingData['ArchitecturalStyle']) ? 'checked' : ''; ?>>
        <span>Colonial</span>
    </label>
    <label>
        <input type="checkbox" name="ArchitecturalStyle[]" value="Contemporary" <?php echo in_array('Contemporary', $listingData['ArchitecturalStyle']) ? 'checked' : ''; ?>>
        <span>Contemporary</span>
    </label>
    <label>
        <input type="checkbox" name="ArchitecturalStyle[]" value="Cottage" <?php echo in_array('Cottage', $listingData['ArchitecturalStyle']) ? 'checked' : ''; ?>>
        <span>Cottage</span>
    </label>
    <label>
        <input type="checkbox" name="ArchitecturalStyle[]" value="Country English" <?php echo in_array('Country English', $listingData['ArchitecturalStyle']) ? 'checked' : ''; ?>>
        <span>Country English</span>
    </label>
    <label>
        <input type="checkbox" name="ArchitecturalStyle[]" value="Craftsman" <?php echo in_array('Craftsman', $listingData['ArchitecturalStyle']) ? 'checked' : ''; ?>>
        <span>Craftsman</span>
    </label>
    <label>
        <input type="checkbox" name="ArchitecturalStyle[]" value="Custom Built" <?php echo in_array('Custom Built', $listingData['ArchitecturalStyle']) ? 'checked' : ''; ?>>
        <span>Custom Built</span>
    </label>
    <label>
        <input type="checkbox" name="ArchitecturalStyle[]" value="Dome" <?php echo in_array('Dome', $listingData['ArchitecturalStyle']) ? 'checked' : ''; ?>>
        <span>Dome</span>
    </label>
    <label>
        <input type="checkbox" name="ArchitecturalStyle[]" value="Edwardian" <?php echo in_array('Edwardian', $listingData['ArchitecturalStyle']) ? 'checked' : ''; ?>>
        <span>Edwardian</span>
    </label>
    <label>
        <input type="checkbox" name="ArchitecturalStyle[]" value="Eichler" <?php echo in_array('Eichler', $listingData['ArchitecturalStyle']) ? 'checked' : ''; ?>>
        <span>Eichler</span>
    </label>
    <label>
        <input type="checkbox" name="ArchitecturalStyle[]" value="English" <?php echo in_array('English', $listingData['ArchitecturalStyle']) ? 'checked' : ''; ?>>
        <span>English</span>
    </label>
    <label>
        <input type="checkbox" name="ArchitecturalStyle[]" value="Farm House" <?php echo in_array('Farm House', $listingData['ArchitecturalStyle']) ? 'checked' : ''; ?>>
        <span>Farm House</span>
    </label>
    <label>
        <input type="checkbox" name="ArchitecturalStyle[]" value="Flat" <?php echo in_array('Flat', $listingData['ArchitecturalStyle']) ? 'checked' : ''; ?>>
        <span>Flat</span>
    </label>
    <label>
        <input type="checkbox" name="ArchitecturalStyle[]" value="French" <?php echo in_array('French', $listingData['ArchitecturalStyle']) ? 'checked' : ''; ?>>
        <span>French</span>
    </label>
    <label>
        <input type="checkbox" name="ArchitecturalStyle[]" value="Georgian" <?php echo in_array('Georgian', $listingData['ArchitecturalStyle']) ? 'checked' : ''; ?>>
        <span>Georgian</span>
    </label>
    <label>
        <input type="checkbox" name="ArchitecturalStyle[]" value="Log" <?php echo in_array('Log', $listingData['ArchitecturalStyle']) ? 'checked' : ''; ?>>
        <span>Log</span>
    </label>
    <label>
        <input type="checkbox" name="ArchitecturalStyle[]" value="Luxury" <?php echo in_array('Luxury', $listingData['ArchitecturalStyle']) ? 'checked' : ''; ?>>
        <span>Luxury</span>
    </label>
    <label>
        <input type="checkbox" name="ArchitecturalStyle[]" value="MacGregor" <?php echo in_array('MacGregor', $listingData['ArchitecturalStyle']) ? 'checked' : ''; ?>>
        <span>MacGregor</span>
    </label>
    <label>
        <input type="checkbox" name="ArchitecturalStyle[]" value="Marina" <?php echo in_array('Marina', $listingData['ArchitecturalStyle']) ? 'checked' : ''; ?>>
        <span>Marina</span>
    </label>
    <label>
        <input type="checkbox" name="ArchitecturalStyle[]" value="Mediterranean" <?php echo in_array('Mediterranean', $listingData['ArchitecturalStyle']) ? 'checked' : ''; ?>>
        <span>Mediterranean</span>
    </label>
    <label>
        <input type="checkbox" name="ArchitecturalStyle[]" value="Mid Century Modern" <?php echo in_array('Mid Century Modern', $listingData['ArchitecturalStyle']) ? 'checked' : ''; ?>>
        <span>Mid Century Modern</span>
    </label>
    <label>
        <input type="checkbox" name="ArchitecturalStyle[]" value="Modern" <?php echo in_array('Modern', $listingData['ArchitecturalStyle']) ? 'checked' : ''; ?>>
        <span>Modern</span>
    </label>
    <label>
        <input type="checkbox" name="ArchitecturalStyle[]" value="Normandy" <?php echo in_array('Normandy', $listingData['ArchitecturalStyle']) ? 'checked' : ''; ?>>
        <span>Normandy</span>
    </label>
    <label>
        <input type="checkbox" name="ArchitecturalStyle[]" value="Other (See Remarks)" <?php echo in_array('Other (See Remarks)', $listingData['ArchitecturalStyle']) ? 'checked' : ''; ?>>
        <span>Other (See Remarks)</span>
    </label>
    <label>
        <input type="checkbox" name="ArchitecturalStyle[]" value="Prairie" <?php echo in_array('Prairie', $listingData['ArchitecturalStyle']) ? 'checked' : ''; ?>>
        <span>Prairie</span>
    </label>
    <label>
        <input type="checkbox" name="ArchitecturalStyle[]" value="Ranch" <?php echo in_array('Ranch', $listingData['ArchitecturalStyle']) ? 'checked' : ''; ?>>
        <span>Ranch</span>
    </label>
    <label>
        <input type="checkbox" name="ArchitecturalStyle[]" value="Rustic" <?php echo in_array('Rustic', $listingData['ArchitecturalStyle']) ? 'checked' : ''; ?>>
        <span>Rustic</span>
    </label>
    <label>
        <input type="checkbox" name="ArchitecturalStyle[]" value="Santa Barbara/Tuscan" <?php echo in_array('Santa Barbara/Tuscan', $listingData['ArchitecturalStyle']) ? 'checked' : ''; ?>>
        <span>Santa Barbara/Tuscan</span>
    </label>
    <label>
        <input type="checkbox" name="ArchitecturalStyle[]" value="Shotgun" <?php echo in_array('Shotgun', $listingData['ArchitecturalStyle']) ? 'checked' : ''; ?>>
        <span>Shotgun</span>
    </label>
    <label>
        <input type="checkbox" name="ArchitecturalStyle[]" value="Spanish" <?php echo in_array('Spanish', $listingData['ArchitecturalStyle']) ? 'checked' : ''; ?>>
        <span>Spanish</span>
    </label>
    <label>
        <input type="checkbox" name="ArchitecturalStyle[]" value="Territorial/Santa Fe" <?php echo in_array('Territorial/Santa Fe', $listingData['ArchitecturalStyle']) ? 'checked' : ''; ?>>
        <span>Territorial/Santa Fe</span>
    </label>
    <label>
        <input type="checkbox" name="ArchitecturalStyle[]" value="Tract" <?php echo in_array('Tract', $listingData['ArchitecturalStyle']) ? 'checked' : ''; ?>>
        <span>Tract</span>
    </label>
    <label>
        <input type="checkbox" name="ArchitecturalStyle[]" value="Traditional" <?php echo in_array('Traditional', $listingData['ArchitecturalStyle']) ? 'checked' : ''; ?>>
        <span>Traditional</span>
    </label>
    <label>
        <input type="checkbox" name="ArchitecturalStyle[]" value="Tudor" <?php echo in_array('Tudor', $listingData['ArchitecturalStyle']) ? 'checked' : ''; ?>>
        <span>Tudor</span>
    </label>
    <label>
        <input type="checkbox" name="ArchitecturalStyle[]" value="Unknown" <?php echo in_array('Unknown', $listingData['ArchitecturalStyle']) ? 'checked' : ''; ?>>
        <span>Unknown</span>
    </label>
    <label>
        <input type="checkbox" name="ArchitecturalStyle[]" value="Victorian" <?php echo in_array('Victorian', $listingData['ArchitecturalStyle']) ? 'checked' : ''; ?>>
        <span>Victorian</span>
    </label>
    <label>
        <input type="checkbox" name="ArchitecturalStyle[]" value="Vintage" <?php echo in_array('Vintage', $listingData['ArchitecturalStyle']) ? 'checked' : ''; ?>>
        <span>Vintage</span>
    </label>
    <label>
        <input type="checkbox" name="ArchitecturalStyle[]" value="Yurt" <?php echo in_array('Yurt', $listingData['ArchitecturalStyle']) ? 'checked' : ''; ?>>
        <span>Yurt</span>
    </label>
</div>


<h5>Common Walls</h5>
<div class="inline-checkboxes">
    <label>
        <input type="checkbox" name="CommonWalls[]" value="1 Common Wall" <?php echo in_array('1 Common Wall', $listingData['CommonWalls']) ? 'checked' : ''; ?>>
        <span>1 Common Wall</span>
    </label>
    <label>
        <input type="checkbox" name="CommonWalls[]" value="2+ Common Walls" <?php echo in_array('2+ Common Walls', $listingData['CommonWalls']) ? 'checked' : ''; ?>>
        <span>2+ Common Walls</span>
    </label>
    <label>
        <input type="checkbox" name="CommonWalls[]" value="End Unit" <?php echo in_array('End Unit', $listingData['CommonWalls']) ? 'checked' : ''; ?>>
        <span>End Unit</span>
    </label>
    <label>
        <input type="checkbox" name="CommonWalls[]" value="No Common Walls" <?php echo in_array('No Common Walls', $listingData['CommonWalls']) ? 'checked' : ''; ?>>
        <span>No Common Walls</span>
    </label>
    <label>
        <input type="checkbox" name="CommonWalls[]" value="No One Above" <?php echo in_array('No One Above', $listingData['CommonWalls']) ? 'checked' : ''; ?>>
        <span>No One Above</span>
    </label>
    <label>
        <input type="checkbox" name="CommonWalls[]" value="No One Below" <?php echo in_array('No One Below', $listingData['CommonWalls']) ? 'checked' : ''; ?>>
        <span>No One Below</span>
    </label>
</div>


<h5>Foundation</h5>
<div class="inline-checkboxes">
    <label>
        <input type="checkbox" name="FoundationDetails[]" value="None" <?php echo in_array('None', $listingData['FoundationDetails']) ? 'checked' : ''; ?>>
        <span>None</span>
    </label>
    <label>
        <input type="checkbox" name="FoundationDetails[]" value="Block" <?php echo in_array('Block', $listingData['FoundationDetails']) ? 'checked' : ''; ?>>
        <span>Block</span>
    </label>
    <label> 
        <input type="checkbox" name="FoundationDetails[]" value="Brick/Mortar" <?php echo in_array('Brick/Mortar', $listingData['FoundationDetails']) ? 'checked' : ''; ?>>
        <span>Brick/Mortar</span>
    </label>
    <label>
        <input type="checkbox" name="FoundationDetails[]" value="Combination" <?php echo in_array('Combination', $listingData['FoundationDetails']) ? 'checked' : ''; ?>>
        <span>Combination</span>
    </label>
    <label>
        <input type="checkbox" name="FoundationDetails[]" value="Concrete Perimeter" <?php echo in_array('Concrete Perimeter', $listingData['FoundationDetails']) ? 'checked' : ''; ?>>
        <span>Concrete Perimeter</span>
    </label>
    <label>
        <input type="checkbox" name="FoundationDetails[]" value="Other" <?php echo in_array('Other', $listingData['FoundationDetails']) ? 'checked' : ''; ?>>
        <span>Other</span>
    </label>
    <label>
        <input type="checkbox" name="FoundationDetails[]" value="Permanent" <?php echo in_array('Permanent', $listingData['FoundationDetails']) ? 'checked' : ''; ?>>
        <span>Permanent</span>
    </label>
    <label>
        <input type="checkbox" name="FoundationDetails[]" value="Pillar/Post/Pier" <?php echo in_array('Pillar/Post/Pier', $listingData['FoundationDetails']) ? 'checked' : ''; ?>>
        <span>Pillar/Post/Pier</span>
    </label>
    <label>
        <input type="checkbox" name="FoundationDetails[]" value="Raised" <?php echo in_array('Raised', $listingData['FoundationDetails']) ? 'checked' : ''; ?>>
        <span>Raised</span>
    </label>
    <label>
        <input type="checkbox" name="FoundationDetails[]" value="See Remarks" <?php echo in_array('See Remarks', $listingData['FoundationDetails']) ? 'checked' : ''; ?>>
        <span>See Remarks</span>
    </label>
    <label>
        <input type="checkbox" name="FoundationDetails[]" value="Slab" <?php echo in_array('Slab', $listingData['FoundationDetails']) ? 'checked' : ''; ?>>
        <span>Slab</span>
    </label>
    <label>
        <input type="checkbox" name="FoundationDetails[]" value="Stone" <?php echo in_array('Stone', $listingData['FoundationDetails']) ? 'checked' : ''; ?>>
        <span>Stone</span>
    </label>
</div>


<h5>Road Frontage Type</h5>
<div class="inline-checkboxes">
    <label>
        <input type="checkbox" name="RoadFrontageType[]" value="None" <?php echo in_array('None', $listingData['RoadFrontageType']) ? 'checked' : ''; ?>>
        <span>None</span>
    </label>
    <label>
        <input type="checkbox" name="RoadFrontageType[]" value="Alley" <?php echo in_array('Alley', $listingData['RoadFrontageType']) ? 'checked' : ''; ?>>
        <span>Alley</span>
    </label>
    <label>
        <input type="checkbox" name="RoadFrontageType[]" value="City Street" <?php echo in_array('City Street', $listingData['RoadFrontageType']) ? 'checked' : ''; ?>>
        <span>City Street</span>
    </label>
    <label>
        <input type="checkbox" name="RoadFrontageType[]" value="County Road" <?php echo in_array('County Road', $listingData['RoadFrontageType']) ? 'checked' : ''; ?>>
        <span>County Road</span>
    </label>
    <label>
        <input type="checkbox" name="RoadFrontageType[]" value="Easement" <?php echo in_array('Easement', $listingData['RoadFrontageType']) ? 'checked' : ''; ?>>
        <span>Easement</span>
    </label>
    <label>
        <input type="checkbox" name="RoadFrontageType[]" value="Freeway" <?php echo in_array('Freeway', $listingData['RoadFrontageType']) ? 'checked' : ''; ?>>
        <span>Freeway</span>
    </label>
    <label>
        <input type="checkbox" name="RoadFrontageType[]" value="Highway" <?php echo in_array('Highway', $listingData['RoadFrontageType']) ? 'checked' : ''; ?>>
        <span>Highway</span>
    </label>
    <label>
        <input type="checkbox" name="RoadFrontageType[]" value="Interstate" <?php echo in_array('Interstate', $listingData['RoadFrontageType']) ? 'checked' : ''; ?>>
        <span>Interstate</span>
    </label>
    <label>
        <input type="checkbox" name="RoadFrontageType[]" value="Other" <?php echo in_array('Other', $listingData['RoadFrontageType']) ? 'checked' : ''; ?>>
        <span>Other</span>
    </label>
    <label>
        <input type="checkbox" name="RoadFrontageType[]" value="Private Road" <?php echo in_array('Private Road', $listingData['RoadFrontageType']) ? 'checked' : ''; ?>>
        <span>Private Road</span>
    </label>
    <label>
        <input type="checkbox" name="RoadFrontageType[]" value="See Remarks" <?php echo in_array('See Remarks', $listingData['RoadFrontageType']) ? 'checked' : ''; ?>>
        <span>See Remarks</span>
    </label>
    <label>
        <input type="checkbox" name="RoadFrontageType[]" value="State Road" <?php echo in_array('State Road', $listingData['RoadFrontageType']) ? 'checked' : ''; ?>>
        <span>State Road</span>
    </label>
    <label>
        <input type="checkbox" name="RoadFrontageType[]" value="Unimproved" <?php echo in_array('Unimproved', $listingData['RoadFrontageType']) ? 'checked' : ''; ?>>
        <span>Unimproved</span>
    </label>
</div>

<h2>Metrics</h2>


<div class="column-3">
    <label for="LivingArea">Livable Area</label>
    <div>
        <input type="text" id="LivingArea" name="LivingArea" placeholder="Total Livable Area" value="<?php echo $listingData['LivingArea']; ?>" >
    </div>
    <div>
        <select id="LivingAreaUnits" name="LivingAreaUnits" >
            <option value="Square Feet" <?php echo $listingData['LivingAreaUnits'] == 'Square Feet' ? 'selected' : ''?>>Square Feet</option>
            <option value="Square Meters" <?php echo $listingData['LivingAreaUnits'] == 'Square Meters' ? 'selected' : ''?>>Square Meters</option>
        </select>
    </div>
</div>

<div class="column-3">
    <label for="BuildingAreaTotal">Building Area</label>
    <div>
        <input type="text" id="BuildingAreaTotal" name="BuildingAreaTotal" placeholder="Total Building Area" value="<?php echo $listingData['BuildingAreaTotal']; ?>" >
    </div>
    <div>
        <select id="BuildingAreaUnits" name="BuildingAreaUnits">
            <option value="Square Feet" <?php echo $listingData['BuildingAreaUnits'] == 'Square Feet' ? 'selected' : ''?>>Square Feet</option>
            <option value="Square Meters" <?php echo $listingData['BuildingAreaUnits'] == 'Square Feet' ? 'selected' : ''?>>Square Meters</option>
        </select>
    </div>
</div>

<div class="column-3">
    <label for="BedroomsTotal"># of Bedrooms</label>
    <div style="grid-column: span 2;">
        <input type="text" name="BedroomsTotal" id="BedroomsTotal" placeholder="Total Bedrooms" value="<?php echo $listingData['BedroomsTotal']; ?>" >
    </div>
</div>

<div class="column-3">
    <label for="LotSizeArea">Lot Size</label>
    <div>
        <input type="text" id="LotSizeArea" name="LotSizeArea" placeholder="Total Area" value="<?php echo $listingData['LotSizeArea']; ?>" >
    </div>
    <div>
        <select id="LotSizeUnits" name="LotSizeUnits">
            <option value="Acres" <?php echo $listingData['LotSizeUnits'] == 'Acres' ? 'selected' : '' ?>>Acres</option>
            <option value="Square Feet" <?php echo $listingData['LotSizeUnits'] == 'Square Feet' ? 'selected' : '' ?>>Square Feet</option>
            <option value="Square Meters" <?php echo $listingData['LotSizeUnits'] == 'Square Meters' ? 'selected' : '' ?>>Square Meters</option>
        </select>
    </div>
</div>

<div class="column-3">
    <label for="Stories">Stories</label>
    <div style="grid-column: span 2;">
        <input type="text" name="Stories" id="Stories" placeholder="Total Stories" value="<?php echo $listingData['Stories']; ?>" >
    </div>
</div>

<div class="column-3">
    <label for="TaxAnnualAmount">Property Taxes</label>
    <div>
        <input type="text" id="TaxAnnualAmount" name="TaxAnnualAmount" placeholder="Tax Annual Amount" value="<?php echo $listingData['TaxAnnualAmount']; ?>" >
    </div>
    <div>
        <input type="text" id="TaxYear" name="TaxYear" placeholder="Tax Year" value="<?php echo $listingData['TaxYear']; ?>" >
    </div>
</div>

<h2>Room Details</h2>


<div class="column-5">
    <label for="BathroomsFull"># of Bathrooms</label>
    <input type="text" name="BathroomsFull" id="BathroomsFull" placeholder="Full Baths" value="<?php echo $listingData['BathroomsFull']; ?>" >
    <input type="text" name="BathroomsThreeQuarter" id="BathroomsThreeQuarter" placeholder="Three-Quarter Baths" value="<?php echo $listingData['BathroomsThreeQuarter']; ?>" >
    <input type="text" name="BathroomsHalf" id="BathroomsHalf" placeholder="Half Baths" value="<?php echo $listingData['BathroomsHalf']; ?>" >
    <input type="text" name="BathroomsOneQuarter" id="BathroomsOneQuarter" placeholder="Quarter Baths" value="<?php echo $listingData['BathroomsOneQuarter']; ?>" >
</div>

<!-- <div>
    <?php //echo $listingData['OwnersBedroom-RoomLength'] ?>
</div>

<div>
    Bedroom 1
</div> -->


 <button type="submit">Save Information</button>
</form>