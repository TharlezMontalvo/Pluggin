<?php 
/**
 * @package  WooCommemrce Advanced Lens
 */
namespace Inc\Pages;

use Inc\Base\BaseController;

class FrontEndAjaxHooks extends BaseController{

	public function register(){

		add_action( 'wp_head' , array($this,'javascript_variables') );
		add_action('wp_ajax_distance_prescription_data',array($this,'distance_prescription_data'));
		add_action('wp_ajax_nopriv_distance_prescription_data', array($this,'distance_prescription_data'));
		add_action('wp_ajax_reading_prescription_data',array($this,'reading_prescription_data'));
		add_action('wp_ajax_nopriv_reading_prescription_data', array($this,'reading_prescription_data'));
		add_action('wp_ajax_multifocal_prescription_data',array($this,'multifocal_prescription_data'));
		add_action('wp_ajax_nopriv_multifocal_prescription_data', array($this,'multifocal_prescription_data'));
		add_action('wp_ajax_get_additional_price',array($this,'get_additional_price'));
		add_action('wp_ajax_nopriv_get_additional_price', array($this,'get_additional_price'));
		add_action('wp_ajax_get_lens_colors',array($this,'get_lens_colors'));
		add_action('wp_ajax_nopriv_get_lens_colors', array($this,'get_lens_colors'));
		add_action('wp_ajax_get_product',array($this,'get_product'));
		add_action('wp_ajax_nopriv_get_product', array($this,'get_product'));
		add_action('wp_ajax_get_all_the_products',array($this,'get_all_the_products'));
		add_action('wp_ajax_nopriv_get_all_the_products', array($this,'get_all_the_products'));

	}

	public function javascript_variables(){
		if(get_post_type() == 'product'){
			$product = wc_get_product( get_the_ID() );
			$prod_price = $product->get_price();
			global $wpdb;
			$wp_adv_lens_product_table = $wpdb->prefix."adv_lens_products";
			$sql="SELECT * from $wp_adv_lens_product_table WHERE product_id = '".get_the_ID()."';";
			$resq = $wpdb->get_results($sql);
		}
		?>
			<script type="text/javascript">
				var ajax_url="<?php echo admin_url('admin-ajax.php'); ?>";
				var product_id="<?php echo get_the_ID(); ?>";
				<?php  ?>
				var product_original_price = Number("<?php echo $prod_price; ?>");
				var currency_symbol = "<?php echo get_woocommerce_currency_symbol(); ?>";
				var product_type = "<?php echo $resq[0]->product_type; ?>";
			</script>
		<?php
	}

	public function get_product(){
		global $wpdb;

		$wp_adv_lens_product_table = $wpdb->prefix."adv_lens_products";
		$product_id = $_POST['product_id'];
		$sql="SELECT * from $wp_adv_lens_product_table WHERE product_id = '$product_id';";
		$res = (int)$wpdb->get_var($sql);
		if($res == 0){
			die("false");
		}else{
			die("true");
		}
	}
	
	public function get_all_the_products(){
		global $wpdb;

		$wp_adv_lens_product_table = $wpdb->prefix."adv_lens_products";
		$sql="SELECT * from $wp_adv_lens_product_table;";
		$res = $wpdb->get_results($sql);
		foreach($res as $key => $value)
		{
			$prod_ids["product".$key] = $value->product_id;
		}
		die(json_encode($prod_ids));
	}

	public function distance_prescription_data(){
		global $wpdb;

		$product_id = $_POST['product_id'];
		$usage = $_POST['usage'];

		$table = $wpdb->prefix."adv_lens_distance_custom_data";

		$pres_data = $wpdb->get_results("SELECT * FROM $table WHERE product_id = '$product_id' AND sub_type= '$usage';");

		$jsondata['pres_data'] = unserialize($pres_data[0]->data);

		$jsondata = json_encode($jsondata);
		die($jsondata);
	}

	public function reading_prescription_data(){
		global $wpdb;

		$product_id = $_POST['product_id'];
		$usage = $_POST['usage'];

		$table = $wpdb->prefix."adv_lens_reading_custom_data";

		$pres_data = $wpdb->get_results("SELECT * FROM $table WHERE product_id = '$product_id' AND sub_type= '$usage';");

		$jsondata['pres_data'] = unserialize($pres_data[0]->data);

		$jsondata = json_encode($jsondata);
		die($jsondata);
	}

	public function multifocal_prescription_data(){
		global $wpdb;

		$product_id = $_POST['product_id'];
		$usage = $_POST['usage'];

		$table = $wpdb->prefix."adv_lens_multifocal_custom_data";

		$pres_data = $wpdb->get_results("SELECT * FROM $table WHERE product_id = '$product_id' AND sub_type= '$usage';");

		$jsondata['pres_data'] = unserialize($pres_data[0]->data);

		$jsondata = json_encode($jsondata);
		die($jsondata);
	}

	public function get_additional_price(){
		global $wpdb;

		$product_id = $_POST['product_id'];
		$price_cat = $_POST['price_cat'];

		$table = $wpdb->prefix."adv_lens_additional_price_custom_data";

		$pres_data = $wpdb->get_results("SELECT * FROM $table WHERE product_id = '$product_id' AND sub_type= '$price_cat';");

		$jsondata['price_data'] = unserialize($pres_data[0]->data);

		$jsondata = json_encode($jsondata);
		die($jsondata);
	}

	public function get_lens_colors(){
		global $wpdb;

		$product_id = $_POST['product_id'];
		$color_cat = $_POST['color_cat'];

		$table = $wpdb->prefix."adv_lens_tint_colour_custom_data";

		$pres_data = $wpdb->get_results("SELECT * FROM $table WHERE product_id = '$product_id' AND sub_type= '$color_cat';");

		$jsondata['color_data'] = unserialize($pres_data[0]->data);

		$jsondata = json_encode($jsondata);
		die($jsondata);
	}
		
}
