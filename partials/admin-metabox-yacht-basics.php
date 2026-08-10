<?php 
	$yacht_ysp_beam_feet = get_post_meta( $post->ID, 'YSP_BeamFeet', true );
	$yacht_ysp_beam_meter = get_post_meta( $post->ID, 'YSP_BeamMeter', true );
	$yacht_ysp_broker_name = get_post_meta( $post->ID, 'YSP_BrokerName', true );
	$yacht_ysp_city = get_post_meta( $post->ID, 'YSP_City', true );
	$yacht_ysp_country_id = get_post_meta( $post->ID, 'YSP_CountryID', true );
	$yacht_ysp_state = get_post_meta( $post->ID, 'YSP_State', true );
	$yacht_ysp_engine_count = get_post_meta( $post->ID, 'YSP_EngineCount', true );
	$yacht_ysp_engine_fuel = get_post_meta( $post->ID, 'YSP_EngineFuel', true );
	$yacht_ysp_engine_hours = get_post_meta( $post->ID, 'YSP_EngineHours', true );
	$yacht_ysp_engine_model = get_post_meta( $post->ID, 'YSP_EngineModel', true );
	$yacht_ysp_engine_power = get_post_meta( $post->ID, 'YSP_EnginePower', true );
	$yacht_ysp_engine_type = get_post_meta( $post->ID, 'YSP_EngineType', true );
	$yacht_ysp_usd_val = get_post_meta( $post->ID, 'YSP_USDVal', true );
	$yacht_norm_price = get_post_meta( $post->ID, 'NormPrice', true );
	$yacht_ysp_euro_val = get_post_meta( $post->ID, 'YSP_EuroVal', true );
	$yacht_ysp_aud_val = get_post_meta( $post->ID, 'YSP_AUDVal', true );
	$yacht_ysp_loa_feet = get_post_meta( $post->ID, 'YSP_LOAFeet', true );
	$yacht_ysp_loa_meter = get_post_meta( $post->ID, 'YSP_LOAMeter', true );
	$yacht_ysp_length = get_post_meta( $post->ID, 'YSP_Length', true );
	$yacht_ysp_NominalLength = get_post_meta( $post->ID, 'NominalLength', true );
	$yacht_ysp_listing_date = get_post_meta( $post->ID, 'YSP_ListingDate', true );
	$yacht_make_string = get_post_meta( $post->ID, 'MakeString', true );
	$yacht_model = get_post_meta( $post->ID, 'Model', true );
	$yacht_model_year = get_post_meta( $post->ID, 'ModelYear', true );
	$yacht_sales_status = get_post_meta( $post->ID, 'SalesStatus', true );
	$yacht_sale_class_code = get_post_meta( $post->ID, 'SaleClassCode', true );

	$yacht_additional_detail_description = get_post_meta( $post->ID, 'AdditionalDetailDescription', true );
	$yacht_boat_category_code = get_post_meta( $post->ID, 'BoatCategoryCode', true );
	$yacht_boat_class_code = get_post_meta( $post->ID, 'BoatClassCode', true );
	$yacht_boat_class_code_value = is_array($yacht_boat_class_code) ? ($yacht_boat_class_code[0] ?? '') : (string) $yacht_boat_class_code;
	$yacht_has_boat_hull_id = get_post_meta( $post->ID, 'HasBoatHullID', true );
	$yacht_boat_hull_id = get_post_meta( $post->ID, 'BoatHullID', true );
	$yacht_boat_hull_material_code = get_post_meta( $post->ID, 'BoatHullMaterialCode', true );
	$yacht_boat_name = get_post_meta( $post->ID, 'BoatName', true );
	$yacht_company_boat = get_post_meta( $post->ID, 'CompanyBoat', true );
	$yacht_company_name = get_post_meta( $post->ID, 'CompanyName', true );
	$yacht_document_id = get_post_meta( $post->ID, 'DocumentID', true );
	$yacht_general_boat_description = get_post_meta( $post->ID, 'GeneralBoatDescription', true );
	$yacht_fuel_tank_capacity_measure = get_post_meta( $post->ID, 'FuelTankCapacityMeasure', true );
	$yacht_fuel_tank_count_numeric = get_post_meta( $post->ID, 'FuelTankCountNumeric', true );
	$yacht_fuel_tank_material_code = get_post_meta( $post->ID, 'FuelTankMaterialCode', true );
	$yacht_heads_count_numeric = get_post_meta( $post->ID, 'HeadsCountNumeric', true );
	$yacht_holding_tank_capacity_measure = get_post_meta( $post->ID, 'HoldingTankCapacityMeasure', true );
	$yacht_holding_tank_count_numeric = get_post_meta( $post->ID, 'HoldingTankCountNumeric', true );
	$yacht_holding_tank_material_code = get_post_meta( $post->ID, 'HoldingTankMaterialCode', true );
	$yacht_water_tank_capacity_measure = get_post_meta( $post->ID, 'WaterTankCapacityMeasure', true );
	$yacht_water_tank_count_numeric = get_post_meta( $post->ID, 'WaterTankCountNumeric', true );
	$yacht_water_tank_material_code = get_post_meta( $post->ID, 'WaterTankMaterialCode', true );
	$yacht_total_engine_hours_numeric = get_post_meta( $post->ID, 'TotalEngineHoursNumeric', true );
	$yacht_total_engine_power_quantity = get_post_meta( $post->ID, 'TotalEnginePowerQuantity', true );

	$yacht_ysp_country_weight = get_post_meta( $post->ID, 'COUNTRY_WEIGHT', true );
	$yacht_ysp_make_weight = get_post_meta( $post->ID, 'MakeWeight', true );
	$yacht_ysp_company_weight = get_post_meta( $post->ID, 'CompanyWeight', true );
	$yacht_ysp_sales_status_weight = get_post_meta( $post->ID, 'SalesStatusWeight', true );

	$yacht_price = get_post_meta( $post->ID, 'Price', true );
	$yacht_cabins_count = get_post_meta( $post->ID, 'CabinsCountNumeric', true );
	$yacht_number_of_engines = get_post_meta( $post->ID, 'NumberOfEngines', true );
	$yacht_cruising_speed = get_post_meta( $post->ID, 'CruisingSpeedMeasure', true );
	$yacht_max_speed = get_post_meta( $post->ID, 'MaximumSpeedMeasure', true );
	$yacht_dry_weight = get_post_meta( $post->ID, 'DryWeightMeasure', true );
	$yacht_max_draft = get_post_meta( $post->ID, 'MaxDraft', true );
	$yacht_max_draft_feet = get_post_meta( $post->ID, 'YSP_Max_Draft_Feet_Measurement', true );
	$yacht_stock_number = get_post_meta( $post->ID, 'StockNumber', true );
	$yacht_designer_name = get_post_meta( $post->ID, 'DesignerName', true );
	$yacht_builder_name = get_post_meta( $post->ID, 'BuilderName', true );
	$yacht_bridge_clearance = get_post_meta( $post->ID, 'BridgeClearanceMeasure', true );
	$yacht_drive_type = get_post_meta( $post->ID, 'DriveTypeCode', true );
	$yacht_range = get_post_meta( $post->ID, 'RangeMeasure', true );
	$yacht_ysp_country = get_post_meta( $post->ID, 'YSP_Country', true );
	$yacht_ysp_full_country = get_post_meta( $post->ID, 'YSP_Full_Country', true );
	$yacht_ysp_beam_feet_measurement = get_post_meta( $post->ID, 'YSP_Beam_Feet_Measurement', true );
?>
<div id="yacht-metabox-basics">
	<div class="metafield">
		<label>Beam Measure (ft)</label>
		<input type="number" name="YSP_BeamFeet" step="0.1" value="<?= esc_attr( $yacht_ysp_beam_feet ) ?>">
	</div>
	<div class="metafield">
		<label>Beam Feet (display)</label>
		<input type="number" name="YSP_Beam_Feet_Measurement" step="0.1" value="<?= esc_attr( $yacht_ysp_beam_feet_measurement ?: $yacht_ysp_beam_feet ) ?>">
		<p class="description">Used on the listing specs. Defaults from Beam Measure if empty.</p>
	</div>
	<div class="metafield">
		<label>Beam Measure (m)</label>
		<input type="number" name="YSP_BeamMeter" step="0.1" value="<?= esc_attr( $yacht_ysp_beam_meter ) ?>">
	</div>
	<div class="metafield">
		<label>Max Draft</label>
		<input type="text" name="MaxDraft" value="<?= esc_attr( $yacht_max_draft ) ?>" placeholder="e.g. 4.5 ft">
	</div>
	<div class="metafield">
		<label>Max Draft (ft display)</label>
		<input type="number" name="YSP_Max_Draft_Feet_Measurement" step="0.1" value="<?= esc_attr( $yacht_max_draft_feet ) ?>">
	</div>
	<div class="metafield">
		<label>Broker Name</label>
		<input type="text" name="YSP_BrokerName" value="<?= esc_attr( $yacht_ysp_broker_name ) ?>">
	</div>
	<div class="metafield">
		<label>Yacht City Name</label>
		<input type="text" name="YSP_City" value="<?= esc_attr( $yacht_ysp_city ) ?>">
	</div>
	<div class="metafield">
		<label>Yacht Country Code / Name</label>
		<input type="text" name="YSP_CountryID" value="<?= esc_attr( $yacht_ysp_country_id ) ?>" placeholder="US or United States">
	</div>
	<div class="metafield">
		<label>Yacht Country (display)</label>
		<input type="text" name="YSP_Country" value="<?= esc_attr( $yacht_ysp_country ?: $yacht_ysp_country_id ) ?>">
	</div>
	<div class="metafield">
		<label>Full Country Name</label>
		<input type="text" name="YSP_Full_Country" value="<?= esc_attr( $yacht_ysp_full_country ) ?>" placeholder="United States">
	</div>
	<div class="metafield">
		<label>Yacht State Name</label>
		<input type="text" name="YSP_State" value="<?= esc_attr( $yacht_ysp_state ) ?>">
	</div>
	<div class="metafield">
		<label>Country Weight</label>
		<input type="number" name="COUNTRY_WEIGHT" value="<?= esc_attr( $yacht_ysp_country_weight ) ?>">
	</div>
	<div class="metafield">
		<label>Engine Count</label>
		<input type="text" name="YSP_EngineCount" value="<?= esc_attr( $yacht_ysp_engine_count ) ?>">
	</div>
	<div class="metafield">
		<label>Number of Engines</label>
		<input type="number" name="NumberOfEngines" value="<?= esc_attr( $yacht_number_of_engines ?: $yacht_ysp_engine_count ) ?>">
	</div>
	<div class="metafield">
		<label>Engine Fuel</label>
		<input type="text" name="YSP_EngineFuel" value="<?= esc_attr( $yacht_ysp_engine_fuel ) ?>">
	</div>
	<div class="metafield">
		<label>Engine Hours</label>
		<input type="number" name="YSP_EngineHours" value="<?= esc_attr( $yacht_ysp_engine_hours ) ?>">
	</div>
	<div class="metafield">
		<label>Engine Model</label>
		<input type="text" name="YSP_EngineModel" value="<?= esc_attr( $yacht_ysp_engine_model ) ?>">
	</div>
	<div class="metafield">
		<label>Engine Power</label>
		<input type="text" name="YSP_EnginePower" value="<?= esc_attr( $yacht_ysp_engine_power ) ?>">
	</div>
	<div class="metafield">
		<label>Engine Type</label>
		<input type="text" name="YSP_EngineType" value="<?= esc_attr( $yacht_ysp_engine_type ) ?>">
	</div>
	<div class="metafield">
		<label>YSP USD Value</label>
		<input type="number" name="YSP_USDVal" value="<?= esc_attr( $yacht_ysp_usd_val ) ?>">
	</div>
	<div class="metafield">
		<label>Price (USD numeric)</label>
		<input type="number" name="NormPrice" value="<?= esc_attr( $yacht_norm_price ) ?>">
	</div>
	<div class="metafield">
		<label>Price (display)</label>
		<input type="text" name="Price" value="<?= esc_attr( $yacht_price ) ?>" placeholder="e.g. 450000.00 USD">
		<p class="description">Shown on listing/search. Auto-filled from Price (USD numeric) if left blank.</p>
	</div>
	<div class="metafield">
		<label>Price (EUR)</label>
		<input type="number" name="YSP_EuroVal" value="<?= esc_attr( $yacht_ysp_euro_val ) ?>">
	</div>
	<div class="metafield">
		<label>Price (AUD)</label>
		<input type="number" name="YSP_AUDVal" value="<?= esc_attr( $yacht_ysp_aud_val ) ?>">
	</div>
	<div class="metafield">
		<label>Length (ft)</label>
		<input type="text" name="YSP_Length" id="ysp_length_ft" value="<?= esc_attr($yacht_ysp_length) ?>" placeholder="e.g. 55">
	</div>
	<div class="metafield">
		<label>Nominal Length (ft) <span style="color:#b32d2e;">*</span></label>
		<input type="text" name="NominalLength" id="ysp_nominal_length" value="<?= esc_attr($yacht_ysp_NominalLength) ?>" required placeholder="Required — used in search results">
		<p class="description">Required. If you fill Length above, this will auto-fill.</p>
	</div>
	<div class="metafield">
		<label>Overall Length (ft)</label>
		<input type="number" name="YSP_LOAFeet" step="0.1" value="<?= esc_attr( $yacht_ysp_loa_feet ) ?>">
	</div>
	<div class="metafield">
		<label>Overall Length (m)</label>
		<input type="number" name="YSP_LOAMeter" step="0.1" value="<?= esc_attr( $yacht_ysp_loa_meter ) ?>">
	</div>
	<div class="metafield">
		<label>Listing Date</label>
		<input type="date" name="YSP_ListingDate" value="<?= esc_attr( $yacht_ysp_listing_date ) ?>">
	</div>
	<div class="metafield">
		<label>Make</label>
		<input type="text" name="MakeString" value="<?= esc_attr( $yacht_make_string ) ?>">
	</div>
	<div class="metafield">
		<label>Model</label>
		<input type="text" name="Model" value="<?= esc_attr( $yacht_model ) ?>">
	</div>
	<div class="metafield">
		<label>Year</label>
		<input type="number" name="ModelYear" min="1900" max="<?= (string) date("Y") + 1 ?>" value="<?= esc_attr( $yacht_model_year ) ?>">
	</div>
	<div class="metafield">
		<label>Builder Name</label>
		<input type="text" name="BuilderName" value="<?= esc_attr( $yacht_builder_name ) ?>">
	</div>
	<div class="metafield">
		<label>Designer Name</label>
		<input type="text" name="DesignerName" value="<?= esc_attr( $yacht_designer_name ) ?>">
	</div>
	<div class="metafield">
		<label>Stock Number</label>
		<input type="text" name="StockNumber" value="<?= esc_attr( $yacht_stock_number ) ?>">
	</div>
	<div class="metafield">
		<label>Cabins / Staterooms</label>
		<input type="number" name="CabinsCountNumeric" value="<?= esc_attr( $yacht_cabins_count ) ?>">
	</div>
	<div class="metafield">
		<label>Cruising Speed</label>
		<input type="text" name="CruisingSpeedMeasure" value="<?= esc_attr( $yacht_cruising_speed ) ?>" placeholder="e.g. 22 kn">
	</div>
	<div class="metafield">
		<label>Maximum Speed</label>
		<input type="text" name="MaximumSpeedMeasure" value="<?= esc_attr( $yacht_max_speed ) ?>" placeholder="e.g. 30 kn">
	</div>
	<div class="metafield">
		<label>Range</label>
		<input type="text" name="RangeMeasure" value="<?= esc_attr( $yacht_range ) ?>">
	</div>
	<div class="metafield">
		<label>Dry Weight</label>
		<input type="text" name="DryWeightMeasure" value="<?= esc_attr( $yacht_dry_weight ) ?>">
	</div>
	<div class="metafield">
		<label>Bridge Clearance</label>
		<input type="text" name="BridgeClearanceMeasure" value="<?= esc_attr( $yacht_bridge_clearance ) ?>">
	</div>
	<div class="metafield">
		<label>Drive Type</label>
		<input type="text" name="DriveTypeCode" value="<?= esc_attr( $yacht_drive_type ) ?>">
	</div>
	<div class="metafield">
		<label>Make Weight</label>
		<input type="number" name="MakeWeight" value="<?= esc_attr( $yacht_ysp_make_weight ) ?>">
	</div>

	<div class="metafield">
		<label>Company Weight</label>
		<input type="number" name="CompanyWeight" value="<?= esc_attr( $yacht_ysp_company_weight ) ?>">
	</div>
	<div class="metafield">
		<label>Sales Status</label>
		<select name="SalesStatus">
			<option value="Active" <?php if ($yacht_sales_status == "Active") echo "selected"; ?>>Active</option>
			<option value="SalePending" <?php if ($yacht_sales_status == "SalePending") echo "selected"; ?>>Sale Pending</option>
			<option value="Sold" <?php if ($yacht_sales_status == "Sold") echo "selected"; ?>>Sold</option>
		</select>
	</div>
	<div class="metafield">
		<label>Sale Status Code</label>
		<select name="SaleClassCode">
			<option value="New" <?php if ($yacht_sale_class_code == "New") echo "selected"; ?>>New</option>
			<option value="Used" <?php if ($yacht_sale_class_code == "Used") echo "selected"; ?>>Used</option>
		</select>
	</div>
	<div class="metafield">
		<label>Sales Code Weight</label>
		<input type="number" name="SalesStatusWeight" value="<?= esc_attr( $yacht_ysp_sales_status_weight ) ?>">
	</div>
	<div class="metafield">
		<label>Yacht Category</label>
		<input type="text" name="BoatCategoryCode" value="<?= esc_attr( $yacht_boat_category_code ) ?>">
	</div>
	<div class="metafield">
		<label>Yacht Class</label>
		<input type="text" name="BoatClassCode" value="<?= esc_attr($yacht_boat_class_code_value) ?>">
	</div>
	<div class="metafield">
		<label>Has Hull ID</label>
		<input type="text" name="HasHullID" value="<?= esc_attr( $yacht_has_boat_hull_id ) ?>">
	</div>
	<div class="metafield">
		<label>Hull ID</label>
		<input type="text" name="BoatHullID" value="<?= esc_attr( $yacht_boat_hull_id ) ?>">
	</div>
	<div class="metafield">
		<label>Hull Material</label>
		<input type="text" name="BoatHullMaterialCode" value="<?= esc_attr( $yacht_boat_hull_material_code ) ?>">
	</div>
	<div class="metafield">
		<label>Yacht Name</label>
		<input type="text" name="BoatName" value="<?= esc_attr( $yacht_boat_name ) ?>">
	</div>
	<div class="metafield">
		<label>Company Owned</label>
		<select name="CompanyBoat">
			<option value="0" <?php if ($yacht_company_boat == "0") echo "selected"; ?>>No</option>
			<option value="1" <?php if ($yacht_company_boat == "1") echo "selected"; ?>>Yes</option>
		</select>
	</div>
	<div class="metafield">
		<label>Company Name</label>
		<input type="text" name="CompanyName" value="<?= esc_attr( $yacht_company_name ) ?>">
	</div>
	<div class="metafield">
		<label>Document ID</label>
		<input type="text" name="DocumentID" value="<?= esc_attr( $yacht_document_id ) ?>">
	</div>
	<div class="metafield">
		<label>Heads Count</label>
		<input type="number" name="HeadsCountNumeric" value="<?= esc_attr( $yacht_heads_count_numeric ) ?>">
	</div>
	<div class="metafield">
		<label>Fuel Tank Capacity</label>
		<input type="text" name="FuelTankCapacityMeasure" value="<?= esc_attr( $yacht_fuel_tank_capacity_measure ) ?>">
	</div>
	<div class="metafield">
		<label>Fuel Tank Count</label>
		<input type="text" name="FuelTankCountNumeric" value="<?= esc_attr( $yacht_fuel_tank_count_numeric ) ?>">
	</div>
	<div class="metafield">
		<label>Fuel Tank Material</label>
		<input type="text" name="FuelTankMaterialCode" value="<?= esc_attr( $yacht_fuel_tank_material_code ) ?>">
	</div>
	<div class="metafield">
		<label>Holding Tank Capacity</label>
		<input type="text" name="HoldingTankCapacityMeasure" value="<?= esc_attr( $yacht_holding_tank_capacity_measure ) ?>">
	</div>
	<div class="metafield">
		<label>Holding Tank Count</label>
		<input type="text" name="HoldingTankCountNumeric" value="<?= esc_attr( $yacht_holding_tank_count_numeric ) ?>">
	</div>
	<div class="metafield">
		<label>Holding Tank Material</label>
		<input type="text" name="HoldingTankMaterialCode" value="<?= esc_attr( $yacht_holding_tank_material_code ) ?>">
	</div>
	<div class="metafield">
		<label>Water Tank Capacity</label>
		<input type="text" name="WaterTankCapacityMeasure" value="<?= esc_attr( $yacht_water_tank_capacity_measure ) ?>">
	</div>
	<div class="metafield">
		<label>Water Tank Count</label>
		<input type="text" name="WaterTankCountNumeric" value="<?= esc_attr( $yacht_water_tank_count_numeric ) ?>">
	</div>
	<div class="metafield">
		<label>Water Tank Material</label>
		<input type="text" name="WaterTankMaterialCode" value="<?= esc_attr( $yacht_water_tank_material_code ) ?>">
	</div>
	<div class="metafield">
		<label>Total Engine Hours</label>
		<input type="number" name="TotalEngineHoursNumberic" value="<?= esc_attr( $yacht_total_engine_hours_numeric ) ?>">
	</div>
	<div class="metafield">
		<label>Total Engine Power Quantity</label>
		<input type="text" name="TotalEnginePowerQuantity" value="<?= esc_attr( $yacht_total_engine_power_quantity ) ?>">
	</div>
</div>

<style type="text/css">
	#yacht-metabox-basics .metafield{
		display: block;
		margin-top: 10px;
		margin-bottom: 10px;
		padding-bottom: 10px;
		border-bottom: 1px solid #000;

	}

	#yacht-metabox-basics .metafield label{
		display: block;
		margin-bottom: 10px;
	}

	#yacht-metabox-basics .metafield input{
		display: block;
		width: 100%;
		max-width: 500px;

	}
</style>
<script type="text/javascript">
(function () {
	var lengthInput = document.getElementById('ysp_length_ft');
	var nominalInput = document.getElementById('ysp_nominal_length');
	if (!lengthInput || !nominalInput) return;

	function syncNominalFromLength() {
		if (!nominalInput.value.trim() && lengthInput.value.trim()) {
			nominalInput.value = lengthInput.value.trim();
		}
	}

	lengthInput.addEventListener('input', syncNominalFromLength);
	lengthInput.addEventListener('change', syncNominalFromLength);

	var form = lengthInput.closest('form');
	if (form) {
		form.addEventListener('submit', syncNominalFromLength);
	}
})();
</script>