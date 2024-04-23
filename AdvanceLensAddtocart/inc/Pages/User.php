<?php 
/**
 * @package  WooCommemrce Advanced Lens
 */
namespace Inc\Pages;

use Inc\Base\BaseController;
use Inc\Pages\Templates\DisplayCustomData;

class User extends BaseController{

	public function register() {
		add_action('woocommerce_single_product_summary', array($this,'add_to_cart_custom_ajax'));
		add_action('wp_ajax_twf_add_users_custom_data_options_for_products',array($this,'twf_add_users_custom_data_options_for_products'));
		add_action('wp_ajax_nopriv_twf_add_users_custom_data_options_for_products', array($this,'twf_add_users_custom_data_options_for_products'));
		add_filter('woocommerce_add_cart_item_data',array($this,'twf_add_custom_data_to_woocommerce_session'),1,2);
		add_filter('woocommerce_get_cart_item_from_session', array($this,'twf_get_user_custom_data_session'), 1, 3 );
		add_filter('woocommerce_checkout_cart_item_quantity',array($this,'twf_display_custom_data_in_cart'),1,3); 
		add_filter('woocommerce_cart_item_price',array($this,'twf_display_custom_data_in_cart'),1,3);
		add_action('woocommerce_add_order_item_meta',array($this,'twf_add_custom_data_to_order_item_meta'),1,2);
		add_action('woocommerce_before_cart_item_quantity_zero',array($this,'twf_remove_custom_datas_from_cart'),1,1);
		add_action( 'woocommerce_before_calculate_totals',array($this,'twf_additional_price'), 1, 3 );
		add_action( 'woocommerce_thankyou', array($this,'custom_data_thank_you_page'));
		add_action( 'woocommerce_view_order', array($this,'custom_data_thank_you_page'));
		add_action( 'wp_footer' , array($this,'slide_toggle_jq'));
		add_action( 'wp_footer' , array($this,'display_lens_popup_in_footer'));
	}
	
	public function slide_toggle_jq(){
		?>
		<script>
			jQuery(document).ready(function(){
				jQuery(".js-btn-item-view").click(function(){
					jQuery(this).siblings(".sc-item-prescription").slideToggle();
				});
				jQuery(".close_prescription").click(function(){
					jQuery(this).parent(".sc-item-prescription").slideToggle();
				});
			});
		</script>
		<?php
	}
	
	public function display_lens_popup_in_footer(){
		$displaydata= new DisplayCustomData();
		$displaydata->display_popup_in_footer();
	}

	public function add_to_cart_custom_ajax( $id )
	{	
	
	?>
		<div class="lds-roller-holder">
		<div class="lds-roller">
			<div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div>
		</div>
	</div>
	<?php 
		$displaydata= new DisplayCustomData();
		$displaydata->register();
	?>
		<script type="text/javascript">
			jQuery(document).ready(function(){
				jQuery(".cart").on('submit',function(e){
                     // alert(product_final_price);
					if(product_final_price != 0 && prod_exists == 'true'){
                       
						e.preventDefault();
						fd = new FormData();
						fd.append('action','twf_add_users_custom_data_options_for_products');
						fd.append('id','<?php echo get_the_id(); ?>');
						fd.append('usage',usage);
                        //var prescription_values = 0;
                        //alert(prescription_values);
						if(prescription_values.right_eye_sphere_value != null){
							for ( var key in prescription_values ) {
								fd.append(key, prescription_values[key]);
							}
						}else{
							fd.append('prescription',prescription_values);
						}
				        if (typeof prescription_uploaded !== 'undefined'){
							fd.append('prescription_uploaded',prescription_uploaded);
						}
						fd.append('lens_type',lens_type);
						fd.append('colour',colour);
						fd.append('lens_option',lens_option);
						fd.append('additional_price',product_final_price);
						
						jQuery(".lds-roller-holder").css("display","flex");
						jQuery.ajax({
							url:"<?php echo admin_url('admin-ajax.php'); ?>",
							type:"POST",
							contentType: false,
							processData: false,
							cache: false,
							data:fd,
							success:function(response,status)
							{
								jQuery(".lds-roller-holder").css("display","none");
								var title= '<?php echo get_the_title(); ?>';
								var site_url='<?php echo site_url(); ?>';
								jQuery('.woocommerce-notices-wrapper').append('<div class="woocommerce-message" role="alert"> <a href="'+site_url+'/mi-carrito/" tabindex="1" class="button wc-forward">View cart</a> “'+title+'” has been added to your cart.</div>');
								jQuery(".single_add_to_cart_button").html("Add to Cart");
							}
						});
					}
				});
				
			});
		</script>
	<?php
	}

	public function twf_add_users_custom_data_options_for_products()
	{
		$product_id = $_POST['id']; //Product ID
		if($_POST['prescription_uploaded'] == 'true'){
			if($_FILES['prescription']['name'] != ''){
				$uploadedfile = $_FILES['prescription'];
				$upload_overrides = array( 'test_form' => false );

				$movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
				$imageurl = "";
				if ( $movefile && ! isset( $movefile['error'] ) ) {
				   $imageurl = $movefile['url'];
				}
			}
			$user_data['twf_user_custom_datas'] = ['usage' => $_POST['usage'], 'prescription' => $imageurl, 'lens_type' => $_POST['lens_type'],'colour' => $_POST['colour'],'lens_option' => $_POST['lens_option'],'additional_price' => $_POST['additional_price'],'prescription_uploaded' => $_POST['prescription_uploaded']];
		}else{
			$prescription = [];
			if(isset($_POST['right_eye_sphere_value'])){
				$prescription['right_eye_sphere_value'] = $_POST['right_eye_sphere_value'];
			}
			if(isset($_POST['right_eye_cylinder_value'])){
				$prescription['right_eye_cylinder_value'] = $_POST['right_eye_cylinder_value'];
			}
			if(isset($_POST['right_eye_axis_value'])){
				$prescription['right_eye_axis_value'] = $_POST['right_eye_axis_value'];
			}
			if(isset($_POST['right_eye_add_value'])){
				$prescription['right_eye_add_value'] = $_POST['right_eye_add_value'];
			}
			if(isset($_POST['left_eye_sphere_value'])){
				$prescription['left_eye_sphere_value'] = $_POST['left_eye_sphere_value'];
			}
			if(isset($_POST['left_eye_cylinder_value'])){
				$prescription['left_eye_cylinder_value'] = $_POST['left_eye_cylinder_value'];
			}
			if(isset($_POST['left_eye_axis_value'])){
				$prescription['left_eye_axis_value'] = $_POST['left_eye_axis_value'];
			}
			if(isset($_POST['left_eye_add_value'])){
				$prescription['left_eye_add_value'] = $_POST['left_eye_add_value'];
			}
			if(isset($_POST['right_pd_value'])){
				$prescription['right_pd_value'] = $_POST['right_pd_value'];
			}
			if(isset($_POST['left_pd_value'])){
				$prescription['left_pd_value'] = $_POST['left_pd_value'];
			}
			if(isset($_POST['single_pd_value'])){
				$prescription['single_pd_value'] = $_POST['single_pd_value'];
			}
			if(isset($_POST['prescription'])){
				$prescription = $_POST['prescription'];
			}
			$user_data['twf_user_custom_datas'] = ['usage' => $_POST['usage'], 'prescription' => $prescription, 'lens_type' => $_POST['lens_type'],'colour' => $_POST['colour'],'lens_option' => $_POST['lens_option'],'additional_price' => $_POST['additional_price'],'prescription_uploaded' => $_POST['prescription_uploaded']];
		}
		$user_custom_data_values = $user_data; //This is User custom value sent via AJAX
		session_start();
		$_SESSION['twf_user_custom_datas'] = $user_custom_data_values;
		//Add product to WooCommerce cart.
		$quantity = 1; //Or it can be some userinputted quantity
		if( WC()->cart->add_to_cart( $product_id, $quantity )) {
			global $woocommerce;
			$cart_url = $woocommerce->cart->get_cart_url();

			$output = array('success' => 1, 'msg' =>'Added the product to your cart', 'cart_url' => $cart_url );
		} else {
			$output = array('success' => 0, 'msg' => 'Something went wrong, please try again');
		}
		wp_die(json_encode($output));

	}

	public function twf_add_custom_data_to_woocommerce_session( $cart_item_data, $product_id ){

	    session_start();
	    if(empty($_SESSION['twf_user_custom_datas']))
	        return $cart_item_data;
	    else { 
	        $options = $_SESSION['twf_user_custom_datas'];

	        //Unset our custom session variable
	        unset($_SESSION['twf_user_custom_datas']);
	        if(empty($cart_item_data))
	            return $options;
	        else
	            return array_merge($cart_item_data, $options);
	    }

	}

	public function twf_get_user_custom_data_session( $item, $values, $key ) {
		
    	//Check if the key exist and add it to item variable.
	    if (array_key_exists( 'twf_user_custom_datas', $values ) )
	    {
	        $item['twf_user_custom_datas'] = $values['twf_user_custom_datas'];
	    }
	    return $item;
	}

	

	public function twf_display_custom_data_in_cart( $product_name, $values, $cart_item_key ){
	    global $wpdb;

	    if(!empty($values['twf_user_custom_datas']))
	    {
			?>
			<div class="container" style="max-width: 100%;">
				<p class="pointer js-btn-item-view">
					<strong>Lens:</strong>
					<?php echo $values['twf_user_custom_datas']['usage'];?>	<i class="icon-arrow-down"></i>
				</p>
				<div class="sc-item-prescription">
					<span aria-hidden="true" class="close_prescription">&times;</span>
					<?php if(is_array($values['twf_user_custom_datas']['prescription'])){ ?>
						<table role="prescription-content" width="100%" cellspacing="0" cellpadding="0">
							<tbody>
								<tr>
									<th></th>
									<th>SPH</th>
									<th>CYL</th>
									<th>Axis</th>
									<?php if(isset($values['twf_user_custom_datas']['prescription']['right_eye_add_value']) && isset($values['twf_user_custom_datas']['prescription']['left_eye_add_value'])){?>
										<th>ADD</th>
									<?php } ?>
									<th>PD</th>
								</tr>
								<tr>
									<th>Right</th>
									<td class="od_sph"><?php echo $values['twf_user_custom_datas']['prescription']['right_eye_sphere_value']; ?></td>
									<td class="od_cyl"><?php echo $values['twf_user_custom_datas']['prescription']['right_eye_cylinder_value']; ?></td>
									<td class="od_axis"><?php echo $values['twf_user_custom_datas']['prescription']['right_eye_axis_value']; ?></td>
									<?php if(isset($values['twf_user_custom_datas']['prescription']['right_eye_add_value'])){ ?>
										<td class="od_add"><?php echo $values['twf_user_custom_datas']['prescription']['right_eye_add_value']; ?></td>
									<?php } ?>
									<?php if(isset($values['twf_user_custom_datas']['prescription']['single_pd_value'])){ ?>
										<td class="pd" rowspan="2"><?php echo $values['twf_user_custom_datas']['prescription']['single_pd_value']; ?></td>
									<?php }elseif(isset($values['twf_user_custom_datas']['prescription']['right_pd_value'])) { ?>
										<td class="pd"><?php echo $values['twf_user_custom_datas']['prescription']['right_pd_value']; ?></td>
									<?php } ?>
								</tr>
								<tr>
									<th>Left</th>
									<td class="os_sph"><?php echo $values['twf_user_custom_datas']['prescription']['left_eye_sphere_value']; ?></td>
									<td class="os_cyl"><?php echo $values['twf_user_custom_datas']['prescription']['left_eye_cylinder_value']; ?></td>
									<td class="os_axis"><?php echo $values['twf_user_custom_datas']['prescription']['left_eye_axis_value']; ?></td>
									<?php if(isset($values['twf_user_custom_datas']['prescription']['left_eye_add_value'])){ ?>
										<td class="os_add"><?php echo $values['twf_user_custom_datas']['prescription']['left_eye_add_value']; ?></td>
									<?php } ?>
									<?php if(isset($values['twf_user_custom_datas']['prescription']['single_pd_value'])){ }elseif(isset($values['twf_user_custom_datas']['prescription']['left_pd_value'])) {?>
										<td class="pd"><?php echo $values['twf_user_custom_datas']['prescription']['left_pd_value']; ?></td>
									<?php } ?>
								</tr>
							</tbody>
						</table>
					<?php } else if($values['twf_user_custom_datas']['prescription_uploaded'] == 'true') {?>
						<dl class="sc-lenses-list">
							<dd class="sc-lenses">
								<p> <a href="<?php echo $values['twf_user_custom_datas']['prescription'];?>" target="_blank">Click to view Prescription Image</a> </p>
							</dd>
						</dl>
					<?php }else{ ?>
						<dl class="sc-lenses-list">
							<dd class="sc-lenses">
								<p> <?php echo $values['twf_user_custom_datas']['prescription'];?> </p>
							</dd>
						</dl>
					<?php } ?>
					<dl class="sc-lenses-list">
						<dd class="sc-lenses">
							<p> Usage : <span class="sc-price-d price-symbol"><?php echo $values['twf_user_custom_datas']['usage'];?></span> </p>
						</dd>
						<dd class="sc-lenses">
							<p>Lens Type : <span class="sc-price-d price-symbol"><?php echo $values['twf_user_custom_datas']['lens_type'];?></span></p>
						</dd>
						<dd class="sc-lenses">
							<p> Color : <span class="sc-price-d price-symbol"><?php echo $values['twf_user_custom_datas']['colour'];?></span> </p>
						</dd>
						<dd class="sc-lenses">
							<p>Lens Price : <span class="sc-price-d price-symbol"><?php echo $values['twf_user_custom_datas']['additional_price'];?></span> </p>
						</dd>
						<dd class="sc-lenses">
							<p>- <?php echo $values['twf_user_custom_datas']['lens_option'];?><span class="sc-price-d price-symbol"></span></p>
						</dd>
					</dl>
				</div>
			</div>
		
			<?php
	    }
	}
	
	public function twf_add_custom_data_to_order_item_meta( $item_id, $values ) {
		global $woocommerce,$wpdb;

		if(!empty($values['twf_user_custom_datas'])){
			$twf_user_custom_datas = $values['twf_user_custom_datas'];
			wc_add_order_item_meta($item_id, 'twf_custom_data', $twf_user_custom_datas);
		}
	}
	
	public function twf_remove_custom_datas_from_item_meta( $cart_item_key ) {
		global $woocommerce;

		// Get cart
		$cart = $woocommerce->cart->get_cart();

		// For each item in cart, if item is upsell of deleted product, delete it
		foreach( $cart as $key => $values)
		{
			if ( $values['twf_user_custom_datas'] == $cart_item_key )
				unset( $woocommerce->cart->cart_contents[ $key ] );
		}
	}
	
	function twf_additional_price( $cart_object ) {

		global $wpdb;
		if ( is_admin() && ! defined( 'DOING_AJAX' ) )
        return; 
		if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
			// Put your plugin code here
			
				$coupon = False;
				if ($coupons = WC()->cart->get_applied_coupons()  == False ){ 
				  $coupon = False;
					foreach ( $cart_object->cart_contents as $key => $value ) {  
						$extra_charge = 0;
						if(isset($value['twf_user_custom_datas'])){
							$extra_charge = (int)$value['twf_user_custom_datas']['additional_price'];
							$value['data']->set_price($value['data']->price + $extra_charge);
		
						}
					
					}
				
				}else{
					foreach ( WC()->cart->get_applied_coupons() as $code ) {
						//~ $coupons1 = new WC_Coupon( $code );
						//~ echo $coupons1->type;die("test");
						//~ if ($coupons1->type == 'percent_product' || $coupons1->type == 'percent')
						$coupon = True;
					}

				}

				if ($coupon == True)
					foreach ( WC()->cart->get_cart() as $key => $value ) {  
						$extra_charge = 0;
						if(isset($value['twf_user_custom_datas'])){
							if ( did_action( 'woocommerce_before_calculate_totals' ) >= 2 )
							return;
							$extra_charge = (int)$value['twf_user_custom_datas']['additional_price'];
							$value['data']->set_price($value['data']->get_price()+$extra_charge);
						}
					
					}
			

		}
	}
	
	function custom_data_thank_you_page( $order_id ) {
		$order = wc_get_order( $order_id );
		foreach( $order->get_items() as $item_id => $item ){
			 $item_product_data_array = $item->get_data();
		}
		$all_meta_data['twf_user_custom_datas'] = wc_get_order_item_meta( $item_product_data_array['id'], 'twf_custom_data', true);
		if(!empty($all_meta_data)) {
		
			if(!empty($all_meta_data['twf_user_custom_datas']))
			{
				$values['twf_user_custom_datas']=$all_meta_data['twf_user_custom_datas'];
				?>
				<script>
				jQuery(document).ready(function(){
					var str='<?php echo $return_string; ?>';
					if(jQuery(".woocommerce-table--order-details").children("tbody").find(".product-name").append("<div class=\"container\" style=\"max-width: 100%;\"><p class=\"pointer js-btn-item-view\"><strong>Lens:</strong><?php echo $values['twf_user_custom_datas']['usage'];?>	<i class=\"icon-arrow-down\"></i></p><div class=\"sc-item-prescription\"><span aria-hidden=\"true\" class=\"close_prescription\">&times;</span><?php if(is_array($values['twf_user_custom_datas']['prescription'])){ ?><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\"><tbody><tr><th></th><th>SPH</th><th>CYL</th><th>Axis</th><?php if(isset($values['twf_user_custom_datas']['prescription']['right_eye_add_value']) && isset($values['twf_user_custom_datas']['prescription']['left_eye_add_value'])){?><th>ADD</th><?php } ?><th>PD</th></tr><tr><th>Right</th><td class=\"od_sph\"><?php echo $values['twf_user_custom_datas']['prescription']['right_eye_sphere_value']; ?></td><td class=\"od_cyl\"><?php echo $values['twf_user_custom_datas']['prescription']['right_eye_cylinder_value']; ?></td><td class=\"od_axis\"><?php echo $values['twf_user_custom_datas']['prescription']['right_eye_axis_value']; ?></td><?php if(isset($values['twf_user_custom_datas']['prescription']['right_eye_add_value'])){ ?><td class=\"od_add\"><?php echo $values['twf_user_custom_datas']['prescription']['right_eye_add_value']; ?></td><?php } ?><?php if(isset($values['twf_user_custom_datas']['prescription']['single_pd_value'])){ ?><td class=\"pd\" rowspan=\"2\"><?php echo $values['twf_user_custom_datas']['prescription']['single_pd_value']; ?></td><?php }elseif(isset($values['twf_user_custom_datas']['prescription']['right_pd_value'])) { ?><td class=\"pd\"><?php echo $values['twf_user_custom_datas']['prescription']['right_pd_value']; ?></td><?php } ?></tr><tr><th>Left</th><td class=\"os_sph\"><?php echo $values['twf_user_custom_datas']['prescription']['left_eye_sphere_value']; ?></td><td class=\"os_cyl\"><?php echo $values['twf_user_custom_datas']['prescription']['left_eye_cylinder_value']; ?></td><td class=\"os_axis\"><?php echo $values['twf_user_custom_datas']['prescription']['left_eye_axis_value']; ?></td><?php if(isset($values['twf_user_custom_datas']['prescription']['left_eye_add_value'])){ ?><td class=\"os_add\"><?php echo $values['twf_user_custom_datas']['prescription']['left_eye_add_value']; ?></td><?php } ?><?php if(isset($values['twf_user_custom_datas']['prescription']['single_pd_value'])){ }elseif(isset($values['twf_user_custom_datas']['prescription']['left_pd_value'])) {?><td class=\"pd\"><?php echo $values['twf_user_custom_datas']['prescription']['left_pd_value']; ?></td><?php } ?></tr></tbody></table><?php } else if($values['twf_user_custom_datas']['prescription_uploaded'] == 'true') { ?><dl class=\"sc-lenses-list\"><dd class=\"sc-lenses\"><p> <a href=\"<?php echo $values['twf_user_custom_datas']['prescription'];?>\" target=\"_blank\">Click to view Prescription Image</a></p></dd></dl><?php } else { ?><dl class=\"sc-lenses-list\"><dd class=\"sc-lenses\"><p> <?php echo $values['twf_user_custom_datas']['prescription'];?> </p></dd></dl><?php } ?><dl class=\"sc-lenses-list\"><dd class=\"sc-lenses\"><p> Usage : <span class=\"sc-price-d price-symbol\"><?php echo $values['twf_user_custom_datas']['usage'];?></span> </p></dd><dd class=\"sc-lenses\"><p>Lens Type : <span class=\"sc-price-d price-symbol\"><?php echo $values['twf_user_custom_datas']['lens_type'];?></span></p></dd><dd class=\"sc-lenses\"><p> Color : <span class=\"sc-price-d price-symbol\"><?php echo $values['twf_user_custom_datas']['colour'];?></span> </p></dd><dd class=\"sc-lenses\"><p>Lens Price : <span class=\"sc-price-d price-symbol\"><?php echo $values['twf_user_custom_datas']['additional_price'];?></span> </p></dd><dd class=\"sc-lenses\"><p>- <?php echo $values['twf_user_custom_datas']['lens_option'];?><span class=\"sc-price-d price-symbol\"></span></p></dd></dl></div></div>")){
						//~ jQuery(".js-btn-item-view").click(function(){
								//~ jQuery(this).siblings(".sc-item-prescription").slideToggle();
						//~ });
					}
				});
			</script>
			<?php
			}
		}
	}

}
