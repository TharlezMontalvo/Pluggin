<?php
/**
 * @package  WooCommemrce Advanced Lens
 */
namespace Inc\Base;

use Inc\Base\BaseController;
use Inc\Base\Templates\AddCustomData;

class SettingsLinks extends BaseController
{
	public function register() {
		add_action('admin_menu',array($this,'advanced_lens_settings'));
		add_action('wp_ajax_woocommerce_advanced_lens_custom_data',array($this,'woocommerce_advanced_lens_custom_data'));
		add_action('wp_ajax_woocommerce_advanced_lens_fetch_custom_data',array($this,'woocommerce_advanced_lens_fetch_custom_data'));
		add_action('wp_ajax_woocommerce_advanced_lens_fetch_sample_data',array($this,'woocommerce_advanced_lens_fetch_sample_data'));
	}
	
	public function advanced_lens_settings(){
		add_menu_page( "Advanced Lens Prescription", "Advanced Lens Prescription", "edit_pages", "advanced-lens-prescription", array($this,"display"),'dashicons-visibility');
	} 

	public function display(){
		$args = array(
			'post_type'      => 'product',
			'posts_per_page' =>-1
		);
		$loop = new \WP_Query( $args );
		echo "
		<div align='center' style='margin-top:1%;'>
			<label for='custom_options_products'> Select a product to add custom options : </label>
			<select id='custom_options_products'> 
				<option value='".NULL."'>Select the product</option>";
				while ( $loop->have_posts() ) : $loop->the_post();
					global $product;
					echo "<option value='".get_the_ID()."'>";
						echo get_the_title();
					echo"</option>";
				endwhile;
			echo "
			</select> 
			<button id='start_adding'> Go </button>
			<button id='copy_sample_data' style='display:none;'> Copy Sample Data to Product </button>
		</div> <hr>";
		wp_reset_query();
		$template = new AddCustomData();
		$template->register();
	}

	public function woocommerce_advanced_lens_custom_data(){
		
		global $wpdb;
		$product_id = $_POST['prod_id'];
		$product_type = $_POST['product_type'];
		$serialized_form_data_distance = array();
		$serialized_form_data_reading = array();
		$serialized_form_data_multifocal = array();
		$serialized_form_data_additional_price = array();
		$serialized_form_data_tint_colours = array();

		parse_str($_POST['DistanceData'], $serialized_form_data_distance);
		parse_str($_POST['ReadingData'], $serialized_form_data_reading);
		parse_str($_POST['MultifocalData'], $serialized_form_data_multifocal);
		parse_str($_POST['AdditionalPriceData'], $serialized_form_data_additional_price);
		parse_str($_POST['TintColoursData'], $serialized_form_data_tint_colours);

		$this->distance_data_db($product_id,$serialized_form_data_distance);
		$this->reading_data_db($product_id,$serialized_form_data_reading);
		$this->multifocal_data_db($product_id,$serialized_form_data_multifocal);
		$this->additional_price_data_db($product_id,$serialized_form_data_additional_price);
		$this->tint_colours_data_db($product_id,$serialized_form_data_tint_colours);

		$wp_adv_lens_product_table = $wpdb->prefix."adv_lens_products";

		$sql="SELECT * from $wp_adv_lens_product_table WHERE product_id = '$product_id';";
		$res = (int)$wpdb->get_var($sql);
		if($res == 0){
			$sql = "INSERT INTO $wp_adv_lens_product_table (product_id, product_type) VALUES ($product_id , '$product_type');";
			$wpdb->query($sql); 
		}else{
			$sql = "UPDATE $wp_adv_lens_product_table SET product_type = '$product_type' WHERE product_id = $product_id;";
			$wpdb->query($sql); 
		}
	}

	public function woocommerce_advanced_lens_fetch_custom_data(){
		global $wpdb;

		$product_id = $_POST['prod_id'];

		$products_table = $wpdb->prefix."adv_lens_products";
		$distance_table = $wpdb->prefix."adv_lens_distance_custom_data";
		$reading_table = $wpdb->prefix."adv_lens_reading_custom_data";
		$multifocal_table = $wpdb->prefix."adv_lens_multifocal_custom_data";
		$additional_price_table = $wpdb->prefix."adv_lens_additional_price_custom_data";
		$tint_colours_table = $wpdb->prefix."adv_lens_tint_colour_custom_data";

		$product_type = $wpdb->get_results("SELECT * FROM $products_table WHERE product_id = '$product_id';");
		$distance_data = $wpdb->get_results("SELECT * FROM $distance_table WHERE product_id = '$product_id';");
		$reading_data = $wpdb->get_results("SELECT * FROM $reading_table WHERE product_id = '$product_id';");
		$multifocal_data = $wpdb->get_results("SELECT * FROM $multifocal_table WHERE product_id = '$product_id';");
		$additional_price_data = $wpdb->get_results("SELECT * FROM $additional_price_table WHERE product_id = '$product_id';");
		$tint_colours_data = $wpdb->get_results("SELECT * FROM $tint_colours_table WHERE product_id = '$product_id';");

		if((int)$distance_data==0 && (int)$reading_data==0 && (int)$multifocal_data==0 && (int)$additional_price_data==0 && (int)$tint_colours_data==0){
			die();
		}

		$jsondata['product_type'] = $product_type;
		$jsondata['distance_data'] = unserialize($distance_data[0]->data);
		foreach ($reading_data as $key => $value) {
			$jsondata['reading_data'][$key] = unserialize($value->data);
		}
		foreach ($multifocal_data as $key => $value) {
			$jsondata['multifocal_data'][$key] = unserialize($value->data);
		}
		foreach ($additional_price_data as $key => $value) {
			$jsondata['additional_price_data'][$key] = unserialize($value->data);
		}
		foreach ($tint_colours_data as $key => $value) {
			$jsondata['tint_colours_data'][$key] = unserialize($value->data);
		}

		$jsondata = json_encode($jsondata);
		echo $jsondata; die();
	}
	
	public function woocommerce_advanced_lens_fetch_sample_data(){
		global $wpdb;

		$sample_data_table = $wpdb->prefix."adv_lens_sample_data";

		$sample_data = $wpdb->get_results("SELECT * FROM $sample_data_table;");
		
		foreach ($sample_data as $key => $value) {
			$jsondata['sample_data'][$key] = unserialize($value->data);
		}
		
		$jsondata = json_encode($jsondata);
		echo $jsondata; die();
	}

	public function distance_data_db($product_id,$serialized_form_data_distance){

		global $wpdb;

		$serialized_form_data_distance = serialize($serialized_form_data_distance);

		$wp_adv_lens_distance_custom_data_table = $wpdb->prefix."adv_lens_distance_custom_data";

		$sql="SELECT * from $wp_adv_lens_distance_custom_data_table WHERE product_id = '$product_id' and sub_type = 'Distance';";
		$res = (int)$wpdb->get_var($sql);
		if($res == 0){
			$sql = "INSERT INTO $wp_adv_lens_distance_custom_data_table (product_id, sub_type, data) VALUES ($product_id, 'Distance', '$serialized_form_data_distance');";
			$wpdb->query($sql); 
		}else{
			$sql = "UPDATE $wp_adv_lens_distance_custom_data_table SET data = '$serialized_form_data_distance' WHERE product_id = '$product_id' and sub_type = 'Distance';";
			$wpdb->query($sql); 
		}
	}

	public function reading_data_db($product_id,$serialized_form_data_reading){

		global $wpdb;

		$wp_adv_lens_reading_custom_data = $wpdb->prefix."adv_lens_reading_custom_data";

		$readers_data= array('readers_right_eye_sphere'=>$serialized_form_data_reading['readers_right_eye_sphere'],'readers_right_eye_cylinder'=>$serialized_form_data_reading['readers_right_eye_cylinder'],'readers_left_eye_sphere'=>$serialized_form_data_reading['readers_left_eye_sphere'],'readers_left_eye_cylinder'=>$serialized_form_data_reading['readers_left_eye_cylinder'],'readers_single_pd'=>$serialized_form_data_reading['readers_single_pd'],'readers_right_pd'=>$serialized_form_data_reading['readers_right_pd'],'readers_left_pd'=>$serialized_form_data_reading['readers_left_pd'],'readers_right_add'=>$serialized_form_data_reading['readers_right_add'],'readers_left_add'=>$serialized_form_data_reading['readers_left_add']);

		$readers_data = serialize($readers_data);


		$sql="SELECT * from $wp_adv_lens_reading_custom_data WHERE product_id = '$product_id' and sub_type = 'Readers';";
		$res = (int)$wpdb->get_var($sql);
		if($res == 0){
			$sql = "INSERT INTO $wp_adv_lens_reading_custom_data (product_id, sub_type, data) VALUES ($product_id, 'Readers', '$readers_data');";
			$wpdb->query($sql); 
		}else{
			$sql = "UPDATE $wp_adv_lens_reading_custom_data SET data = '$readers_data' WHERE product_id = '$product_id' and sub_type = 'Readers';";
			$wpdb->query($sql); 
		}


		$intermediate_data= array('intermediate_right_eye_sphere'=>$serialized_form_data_reading['intermediate_right_eye_sphere'],'intermediate_right_eye_cylinder'=>$serialized_form_data_reading['intermediate_right_eye_cylinder'],'intermediate_left_eye_sphere'=>$serialized_form_data_reading['intermediate_left_eye_sphere'],'intermediate_left_eye_cylinder'=>$serialized_form_data_reading['intermediate_left_eye_cylinder'],'intermediate_single_pd'=>$serialized_form_data_reading['intermediate_single_pd'],'intermediate_right_pd'=>$serialized_form_data_reading['intermediate_right_pd'],'intermediate_left_pd'=>$serialized_form_data_reading['intermediate_left_pd'],'intermediate_right_add'=>$serialized_form_data_reading['intermediate_right_add'],'intermediate_left_add'=>$serialized_form_data_reading['intermediate_left_add']);


		$intermediate_data = serialize($intermediate_data);

		$sql="SELECT * from $wp_adv_lens_reading_custom_data WHERE product_id = '$product_id' and sub_type = 'Intermediate';";
		$res = (int)$wpdb->get_var($sql);
		if($res == 0){
			$sql = "INSERT INTO $wp_adv_lens_reading_custom_data (product_id, sub_type, data) VALUES ($product_id, 'Intermediate', '$intermediate_data');";
			$wpdb->query($sql); 
		}else{
			$sql = "UPDATE $wp_adv_lens_reading_custom_data SET data = '$intermediate_data' WHERE product_id = '$product_id' and sub_type = 'Intermediate';";
			$wpdb->query($sql); 
		}

		
	}

	public function multifocal_data_db($product_id,$serialized_form_data_multifocal){

		global $wpdb;

		$wp_adv_lens_multifocal_custom_data = $wpdb->prefix."adv_lens_multifocal_custom_data";

		$bifocal_data= array('bifocal_right_eye_sphere'=>$serialized_form_data_multifocal['bifocal_right_eye_sphere'],'bifocal_right_eye_cylinder'=>$serialized_form_data_multifocal['bifocal_right_eye_cylinder'],'bifocal_left_eye_sphere'=>$serialized_form_data_multifocal['bifocal_left_eye_sphere'],'bifocal_left_eye_cylinder'=>$serialized_form_data_multifocal['bifocal_left_eye_cylinder'],'bifocal_single_pd'=>$serialized_form_data_multifocal['bifocal_single_pd'],'bifocal_right_pd'=>$serialized_form_data_multifocal['bifocal_right_pd'],'bifocal_left_pd'=>$serialized_form_data_multifocal['bifocal_left_pd'],'bifocal_right_add'=>$serialized_form_data_multifocal['bifocal_right_add'],'bifocal_left_add'=>$serialized_form_data_multifocal['bifocal_left_add']);

		$bifocal_data = serialize($bifocal_data);


		$sql="SELECT * from $wp_adv_lens_multifocal_custom_data WHERE product_id = '$product_id' and sub_type = 'Bifocal';";
		$res = (int)$wpdb->get_var($sql);
		if($res == 0){
			$sql = "INSERT INTO $wp_adv_lens_multifocal_custom_data (product_id, sub_type, data) VALUES ($product_id, 'Bifocal', '$bifocal_data');";
			$wpdb->query($sql); 
		}else{
			$sql = "UPDATE $wp_adv_lens_multifocal_custom_data SET data = '$bifocal_data' WHERE product_id = '$product_id' and sub_type = 'Bifocal';";
			$wpdb->query($sql); 
		}


		$progressive_data= array('progressive_right_eye_sphere'=>$serialized_form_data_multifocal['progressive_right_eye_sphere'],'progressive_right_eye_cylinder'=>$serialized_form_data_multifocal['progressive_right_eye_cylinder'],'progressive_left_eye_sphere'=>$serialized_form_data_multifocal['progressive_left_eye_sphere'],'progressive_left_eye_cylinder'=>$serialized_form_data_multifocal['progressive_left_eye_cylinder'],'progressive_single_pd'=>$serialized_form_data_multifocal['progressive_single_pd'],'progressive_right_pd'=>$serialized_form_data_multifocal['progressive_right_pd'],'progressive_left_pd'=>$serialized_form_data_multifocal['progressive_left_pd'],'progressive_right_add'=>$serialized_form_data_multifocal['progressive_right_add'],'progressive_left_add'=>$serialized_form_data_multifocal['progressive_left_add']);

		$progressive_data = serialize($progressive_data);

		$sql="SELECT * from $wp_adv_lens_multifocal_custom_data WHERE product_id = '$product_id' and sub_type = 'Progressive';";
		$res = (int)$wpdb->get_var($sql);
		if($res == 0){
			$sql = "INSERT INTO $wp_adv_lens_multifocal_custom_data (product_id, sub_type, data) VALUES ($product_id, 'Progressive', '$progressive_data');";
			$wpdb->query($sql); 
		}else{
			$sql = "UPDATE $wp_adv_lens_multifocal_custom_data SET data = '$progressive_data' WHERE product_id = '$product_id' and sub_type = 'Progressive';";
			$wpdb->query($sql); 
		}		


		$premium_data= array('premium_right_eye_sphere'=>$serialized_form_data_multifocal['premium_right_eye_sphere'],'premium_right_eye_cylinder'=>$serialized_form_data_multifocal['premium_right_eye_cylinder'],'premium_left_eye_sphere'=>$serialized_form_data_multifocal['premium_left_eye_sphere'],'premium_left_eye_cylinder'=>$serialized_form_data_multifocal['premium_left_eye_cylinder'],'premium_single_pd'=>$serialized_form_data_multifocal['premium_single_pd'],'premium_right_pd'=>$serialized_form_data_multifocal['premium_right_pd'],'premium_left_pd'=>$serialized_form_data_multifocal['premium_left_pd'],'premium_right_add'=>$serialized_form_data_multifocal['premium_right_add'],'premium_left_add'=>$serialized_form_data_multifocal['premium_left_add']);

		$premium_data = serialize($premium_data);

		$sql="SELECT * from $wp_adv_lens_multifocal_custom_data WHERE product_id = '$product_id' and sub_type = 'Premium';";
		$res = (int)$wpdb->get_var($sql);
		if($res == 0){
			$sql = "INSERT INTO $wp_adv_lens_multifocal_custom_data (product_id, sub_type, data) VALUES ($product_id, 'Premium', '$premium_data');";
			$wpdb->query($sql); 
		}else{
			$sql = "UPDATE $wp_adv_lens_multifocal_custom_data SET data = '$premium_data' WHERE product_id = '$product_id' and sub_type = 'Premium';";
			$wpdb->query($sql); 
		}
		
	}

	public function additional_price_data_db($product_id,$serialized_form_data_additional_price){
		global $wpdb;

		$wp_adv_lens_additional_price_custom_data  = $wpdb->prefix."adv_lens_additional_price_custom_data";

		$usage_price= array('bifocal_additional_price'=>$serialized_form_data_additional_price['bifocal_additional_price'],'progressive_additional_price'=>$serialized_form_data_additional_price['progressive_additional_price'],'premium_additional_price'=>$serialized_form_data_additional_price['premium_additional_price']);

		$usage_price = serialize($usage_price);


		$sql="SELECT * from $wp_adv_lens_additional_price_custom_data WHERE product_id = '$product_id' and sub_type = 'Usage';";
		$res = (int)$wpdb->get_var($sql);
		if($res == 0){
			$sql = "INSERT INTO $wp_adv_lens_additional_price_custom_data (product_id, sub_type, data) VALUES ($product_id, 'Usage', '$usage_price');";
			$wpdb->query($sql); 
		}else{
			$sql = "UPDATE $wp_adv_lens_additional_price_custom_data SET data = '$usage_price' WHERE product_id = '$product_id' and sub_type = 'Usage';";
			$wpdb->query($sql); 
		}

		$clear_lens= array('basic_lenses_additional_price'=>$serialized_form_data_additional_price['basic_lenses_additional_price'],'most_popular_lenses_additional_price'=>$serialized_form_data_additional_price['most_popular_lenses_additional_price'],'advanced_lenses_additional_price'=>$serialized_form_data_additional_price['advanced_lenses_additional_price']);

		$clear_lens = serialize($clear_lens);


		$sql="SELECT * from $wp_adv_lens_additional_price_custom_data WHERE product_id = '$product_id' and sub_type = 'Clear';";
		$res = (int)$wpdb->get_var($sql);
		if($res == 0){
			$sql = "INSERT INTO $wp_adv_lens_additional_price_custom_data (product_id, sub_type, data) VALUES ($product_id, 'Clear', '$clear_lens');";
			$wpdb->query($sql); 
		}else{
			$sql = "UPDATE $wp_adv_lens_additional_price_custom_data SET data = '$clear_lens' WHERE product_id = '$product_id' and sub_type = 'Clear';";
			$wpdb->query($sql); 
		}

		$blue_light= array('ebdblue_15_additional_price'=>$serialized_form_data_additional_price['ebdblue_15_additional_price'],'ebdblue_16_additional_price'=>$serialized_form_data_additional_price['ebdblue_16_additional_price'],'ebdblue_167_additional_price'=>$serialized_form_data_additional_price['ebdblue_167_additional_price'],'ebdblue_174_additional_price'=>$serialized_form_data_additional_price['ebdblue_174_additional_price']);

		$blue_light = serialize($blue_light);


		$sql="SELECT * from $wp_adv_lens_additional_price_custom_data WHERE product_id = '$product_id' and sub_type = 'BlueLight';";
		$res = (int)$wpdb->get_var($sql);
		if($res == 0){
			$sql = "INSERT INTO $wp_adv_lens_additional_price_custom_data (product_id, sub_type, data) VALUES ($product_id, 'BlueLight', '$blue_light');";
			$wpdb->query($sql); 
		}else{
			$sql = "UPDATE $wp_adv_lens_additional_price_custom_data SET data = '$blue_light' WHERE product_id = '$product_id' and sub_type = 'BlueLight';";
			$wpdb->query($sql); 
		}

		$sun_lens= array('basic_tint_additional_price'=>$serialized_form_data_additional_price['basic_tint_additional_price'],'gradient_tint_lenses_additional_price'=>$serialized_form_data_additional_price['gradient_tint_lenses_additional_price'],'mirrored_tint_additional_price'=>$serialized_form_data_additional_price['mirrored_tint_additional_price'],'polarized_basic_tint_additional_price'=>$serialized_form_data_additional_price['polarized_basic_tint_additional_price'],'polarized_mirrored_tint_additional_price'=>$serialized_form_data_additional_price['polarized_mirrored_tint_additional_price']);

		$sun_lens = serialize($sun_lens);


		$sql="SELECT * from $wp_adv_lens_additional_price_custom_data WHERE product_id = '$product_id' and sub_type = 'SunLens';";
		$res = (int)$wpdb->get_var($sql);
		if($res == 0){
			$sql = "INSERT INTO $wp_adv_lens_additional_price_custom_data (product_id, sub_type, data) VALUES ($product_id, 'SunLens', '$sun_lens');";
			$wpdb->query($sql); 
		}else{
			$sql = "UPDATE $wp_adv_lens_additional_price_custom_data SET data = '$sun_lens' WHERE product_id = '$product_id' and sub_type = 'SunLens';";
			$wpdb->query($sql); 
		}

		$light_adjusting= array('photochromic_additional_price'=>$serialized_form_data_additional_price['photochromic_additional_price'],'trasitions_Signature_additional_price'=>$serialized_form_data_additional_price['trasitions_Signature_additional_price'],'transitions_xtrative_additional_price'=>$serialized_form_data_additional_price['transitions_xtrative_additional_price']);

		$light_adjusting = serialize($light_adjusting);


		$sql="SELECT * from $wp_adv_lens_additional_price_custom_data WHERE product_id = '$product_id' and sub_type = 'LightAdjusting';";
		$res = (int)$wpdb->get_var($sql);
		if($res == 0){
			$sql = "INSERT INTO $wp_adv_lens_additional_price_custom_data (product_id, sub_type, data) VALUES ($product_id, 'LightAdjusting', '$light_adjusting');";
			$wpdb->query($sql); 
		}else{
			$sql = "UPDATE $wp_adv_lens_additional_price_custom_data SET data = '$light_adjusting' WHERE product_id = '$product_id' and sub_type = 'LightAdjusting';";
			$wpdb->query($sql); 
		}


		$customize_lens= array('customize_index_15_additional_price'=>$serialized_form_data_additional_price['customize_index_15_additional_price'],'customize_index_157_additional_price'=>$serialized_form_data_additional_price['customize_index_157_additional_price'],'customize_index_159_additional_price'=>$serialized_form_data_additional_price['customize_index_159_additional_price'],'customize_index_16_additional_price'=>$serialized_form_data_additional_price['customize_index_16_additional_price'],'customize_index_167_additional_price'=>$serialized_form_data_additional_price['customize_index_167_additional_price'],'customize_index_174_additional_price'=>$serialized_form_data_additional_price['customize_index_174_additional_price']);

		$customize_lens = serialize($customize_lens);


		$sql="SELECT * from $wp_adv_lens_additional_price_custom_data WHERE product_id = '$product_id' and sub_type = 'CustomizeLens';";
		$res = (int)$wpdb->get_var($sql);
		if($res == 0){
			$sql = "INSERT INTO $wp_adv_lens_additional_price_custom_data (product_id, sub_type, data) VALUES ($product_id, 'CustomizeLens', '$customize_lens');";
			$wpdb->query($sql); 
		}else{
			$sql = "UPDATE $wp_adv_lens_additional_price_custom_data SET data = '$customize_lens' WHERE product_id = '$product_id' and sub_type = 'CustomizeLens';";
			$wpdb->query($sql); 
		}

	}

	public function tint_colours_data_db($product_id,$serialized_form_data_tint_colours){
		global $wpdb;

		$wp_adv_lens_tint_colour_custom_data  = $wpdb->prefix."adv_lens_tint_colour_custom_data";

		$sun_lens_colour= array('basic_lens_tint_colours'=>$serialized_form_data_tint_colours['basic_lens_tint_colours'],'gradient_lens_tint_colours'=>$serialized_form_data_tint_colours['gradient_lens_tint_colours'],'mirrored_lens_tint_colours'=>$serialized_form_data_tint_colours['mirrored_lens_tint_colours'],'polarized_basic_lens_tint_colours'=>$serialized_form_data_tint_colours['polarized_basic_lens_tint_colours'],'polarized_mirrored_lens_tint_colours'=>$serialized_form_data_tint_colours['polarized_mirrored_lens_tint_colours']);

		$sun_lens_colour = serialize($sun_lens_colour);


		$sql="SELECT * from $wp_adv_lens_tint_colour_custom_data WHERE product_id = '$product_id' and sub_type = 'SunLensColour';";
		$res = (int)$wpdb->get_var($sql);
		if($res == 0){
			$sql = "INSERT INTO $wp_adv_lens_tint_colour_custom_data (product_id, sub_type, data) VALUES ($product_id, 'SunLensColour', '$sun_lens_colour');";
			$wpdb->query($sql); 
		}else{
			$sql = "UPDATE $wp_adv_lens_tint_colour_custom_data SET data = '$sun_lens_colour' WHERE product_id = '$product_id' and sub_type = 'SunLensColour';";
			$wpdb->query($sql); 
		}

		$light_adjusting_lens_colour= array('photochromic_tint_colours'=>$serialized_form_data_tint_colours['photochromic_tint_colours'],'transitions_signature_tint_colours'=>$serialized_form_data_tint_colours['transitions_signature_tint_colours'],'transitions_xtractive_tint_colours'=>$serialized_form_data_tint_colours['transitions_xtractive_tint_colours']);

		$light_adjusting_lens_colour = serialize($light_adjusting_lens_colour);


		$sql="SELECT * from $wp_adv_lens_tint_colour_custom_data WHERE product_id = '$product_id' and sub_type = 'LightAdjustingLensColour';";
		$res = (int)$wpdb->get_var($sql);
		if($res == 0){
			$sql = "INSERT INTO $wp_adv_lens_tint_colour_custom_data (product_id, sub_type, data) VALUES ($product_id, 'LightAdjustingLensColour', '$light_adjusting_lens_colour');";
			$wpdb->query($sql); 
		}else{
			$sql = "UPDATE $wp_adv_lens_tint_colour_custom_data SET data = '$light_adjusting_lens_colour' WHERE product_id = '$product_id' and sub_type = 'LightAdjustingLensColour';";
			$wpdb->query($sql); 
		}
	}

}
