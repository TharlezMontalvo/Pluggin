<?php 
/**
 * @package  WooCommemrce Advanced Lens
 */
 
namespace Inc\Base\Templates;

class AddCustomData{
	
	public function register(){
		?>
		<script>
		jQuery(document).ready(function(){
			jQuery("#product_type").change(function(){
				if(jQuery(this).val() == 'Eyeglasses'){
					jQuery(".eyeglass").each(function(){
						jQuery(this).show();
					});
				}else if(jQuery(this).val() == 'Sunglasses'){
					jQuery(".eyeglass").each(function(){
						jQuery(this).hide();
					});
				}
			});
			jQuery("#copy_sample_data").click(function(){
				jQuery(".lds-roller-holder").css("display","flex");
				jQuery.ajax({
					url : "<?php echo admin_url( 'admin-ajax.php' ); ?>",
					type : "POST",
					data : {
						action : "woocommerce_advanced_lens_fetch_sample_data",
					},
					success : function( response ){
						var res = JSON.parse(response);
						console.log(res);
						jQuery.each(res , function(i, item){
							jQuery.each(item , function(j, inner_item){
								jQuery.each(inner_item , function(k, final_inner_item){
									jQuery("input").each(function(){
										if(jQuery(this).attr("id")== k ){
											jQuery(this).val(final_inner_item);
										}
									});
								});
							});
						});
						jQuery(".lds-roller-holder").css("display","none");
					}
				});
			});
			jQuery("#start_adding").click(function(){
				jQuery(".lds-roller-holder").css("display","flex");
				if(Number(jQuery("#custom_options_products").val()) > 0){
					var prod_id = Number(jQuery("#custom_options_products").val());
					jQuery.ajax({
						url : "<?php echo admin_url( 'admin-ajax.php' ); ?>",
						type : "POST",
						data : {
							action : "woocommerce_advanced_lens_fetch_custom_data",
							prod_id : prod_id,
						},
						success : function( response ){
							if(response){
								var res = JSON.parse(response);
								if(res.product_type[0].product_type == 'Eyeglasses'){
									jQuery.each(res.distance_data , function(i, item){
										jQuery("#distance_c_data_form").find("input").each(function(){
											if(jQuery(this).attr("id")== i ){
												jQuery(this).val(item);
											}
										});
									});
									jQuery.each(res.reading_data , function(i, item){
										jQuery.each(item , function(j, inner_item){
											jQuery("#reading_c_data_form").find("input").each(function(){
												if(jQuery(this).attr("id")== j ){
													jQuery(this).val(inner_item);
												}
											});
										});
									});
									jQuery.each(res.multifocal_data , function(i, item){
										jQuery.each(item , function(j, inner_item){
											jQuery("#multifocal_c_data_form").find("input").each(function(){
												if(jQuery(this).attr("id")== j ){
													jQuery(this).val(inner_item);
												}
											});
										});
									});
									jQuery.each(res.additional_price_data , function(i, item){
										jQuery.each(item , function(j, inner_item){
											jQuery("#additional_price_c_data_form").find("input").each(function(){
												if(jQuery(this).attr("id")== j ){
													jQuery(this).val(inner_item);
												}
											});
										});
									});
									jQuery.each(res.tint_colours_data , function(i, item){
										jQuery.each(item , function(j, inner_item){
											jQuery("#color_tints_c_data_form").find("input").each(function(){
												if(jQuery(this).attr("id")== j ){
													jQuery(this).val(inner_item);
												}
											});
										});
									});
									jQuery(".eyeglass").each(function(){
										jQuery(this).show();
									});
									jQuery("#product_type").val(res.product_type[0].product_type);
									jQuery("#copy_sample_data").show();
								}else if(res.product_type[0].product_type == 'Sunglasses'){
									jQuery.each(res.distance_data , function(i, item){
										jQuery("#distance_c_data_form").find("input").each(function(){
											if(jQuery(this).attr("id")== i ){
												jQuery(this).val(item);
											}
										});
									});
									jQuery.each(res.reading_data , function(i, item){
										jQuery.each(item , function(j, inner_item){
											jQuery("#reading_c_data_form").find("input").each(function(){
												if(jQuery(this).attr("id")== j ){
													jQuery(this).val(inner_item);
												}
											});
										});
									});
									jQuery.each(res.multifocal_data , function(i, item){
										jQuery.each(item , function(j, inner_item){
											jQuery("#multifocal_c_data_form").find("input").each(function(){
												if(jQuery(this).attr("id")== j ){
													jQuery(this).val(inner_item);
												}
											});
										});
									});
									jQuery.each(res.additional_price_data , function(i, item){
										jQuery.each(item , function(j, inner_item){
											jQuery("#additional_price_c_data_form").find("input").each(function(){
												if(jQuery(this).attr("id")== j ){
													jQuery(this).val(inner_item);
												}
											});
										});
									});
									jQuery.each(res.tint_colours_data , function(i, item){
										jQuery.each(item , function(j, inner_item){
											jQuery("#color_tints_c_data_form").find("input").each(function(){
												if(jQuery(this).attr("id")== j ){
													jQuery(this).val(inner_item);
												}
											});
										});
									});
									jQuery(".eyeglass").each(function(){
										jQuery(this).hide();
									});
									jQuery("#product_type").val(res.product_type[0].product_type);
									jQuery("#copy_sample_data").show();
								}
							}else{
								jQuery("input").val("");
								jQuery("#copy_sample_data").show();
							}
							jQuery("#custom_data_form").show();
							jQuery("#product_id").val(prod_id);
							jQuery(".lds-roller-holder").css("display","none");
						},
					});
				}else{
					jQuery("#custom_data_form").hide();
					alert("Please Select a Product to Continue.");
					jQuery("#copy_sample_data").hide();
					jQuery("#product_id").val(Number(jQuery("#custom_options_products").val()));
					jQuery(".lds-roller-holder").css("display","none");
				}
			});
		});
		</script>
		<div id="custom_data_form" style="display:none;">
			<label for="product_type"> Select Product Type :  </label>
			<select id="product_type"> 
				<option value="Eyeglasses">Eyeglasses</option>
				<option value="Sunglasses">Sunglasses</option>
			</select>
			<div>
				<form id="distance_c_data_form" method="POST" class="eyeglass">
					<input type="hidden" id="product_id">
					<h1>Distance</h1>
					
					<div class="grid_auto_fit">
						<div class="">
							<label for="distance_right_eye_sphere">Right Eye Sphere</label>
							<input type="text" id="distance_right_eye_sphere" name="distance_right_eye_sphere">
							<span>To add Multiple Seperate with '|'</span>
						</div>
						
						<div class="" style="border:1px solid red;">
							<label for="distance_right_eye_cylinder">Right Eye Cylinder</label>
							<input type="text" id="distance_right_eye_cylinder" name="distance_right_eye_cylinder"> <span>To add Multiple Seperate with '|'</span>
						</div>

						<div class="" style="border:1px solid red;">
							<label for="distance_left_eye_sphere">Left Eye Sphere</label>
							<input type="text" id="distance_left_eye_sphere" name="distance_left_eye_sphere">
							<span>Multiple Seperate with '|'</span>
						</div>

						<div class="" style="border:1px solid red;">
							<label for="distance_left_eye_cylinder">Left Eye Cylinder</label>
							<input type="text" id="distance_left_eye_cylinder" name="distance_left_eye_cylinder">
							<span>To add 	Multiple Seperate with '|'</span>
						</div>
					</div>
					<h2>Single PD</h2>
					<div class="grid_auto_fit">
						<div class="">
							<label for="distance_single_pd">Single PD</label>
							<input type="text" id="distance_single_pd" name="distance_single_pd">
							<span>To add Multiple Seperate with '|'</span>
						</div>
					</div>
					

					
					<h2>Two PD Numbers</h2>
					<div class="grid_auto_fit">
						<div class="">
							<label for="distance_right_pd">Right PD</label>
							<input type="text" id="distance_right_pd" name="distance_right_pd">
							<span>To add Multiple Seperate with '|'</span>
						</div>
						<div class="">
							<label for="distance_left_pd">Izquierdo DP</label>
							<input type="text" id="distance_left_pd"  name="distance_left_pd">
							<span>To add Multiple Seperate with '|'</span>
						</div>
					</div>
				</form>
				<form id="reading_c_data_form" method="POST" class="eyeglass">
					<h1>Reading</h1>
					
					<h3><u>Readers</u></h3>

					<div class="grid_auto_fit">
						<div>
							<label for="readers_right_eye_sphere">Right Eye Sphere</label>
							<input type="text" id="readers_right_eye_sphere"  name="readers_right_eye_sphere">
							<span>To add Multiple Seperate with '|' </span>
						</div>
						
						<div>
							<label for="readers_right_eye_cylinder">Right Eye Cylinder</label>
							<input type="text" id="readers_right_eye_cylinder" name="readers_right_eye_cylinder"> <span>To add Multiple Seperate with '|' </span>
						</div>
						
						<div>
						<label for="readers_left_eye_sphere">Left Eye Sphere</label>
						<input type="text" id="readers_left_eye_sphere" name="readers_left_eye_sphere"> <span>To add Multiple Seperate with '|' </span>
						</div>
						
						<div>
							<label for="readers_left_eye_cylinder">Left Eye Cylinder</label>
							<input type="text" id="readers_left_eye_cylinder" name="readers_left_eye_cylinder"> <span>To add Multiple Seperate with '|'  </span>
						</div>
					</div>
					
					<h2>Single PD</h2>
					<div class="grid_auto_fit">
						<div>
							<label for="readers_single_pd">Single PD</label>
							<input type="text" id="readers_single_pd" name="readers_single_pd"><span>To add Multiple Seperate with '|'</span>
						</div>
						
					</div>

					<h2>Two PD Numbers</h2>
					
					<div class="grid_auto_fit">
						<div>
							<label for="readers_right_pd">Right PD</label>
							<input type="text" id="readers_right_pd" name="readers_right_pd"><span>To add Multiple Seperate with '|'</span>
						</div>
						
						<div>
							<label for="readers_left_pd">Left PD</label>
							<input type="text" id="readers_left_pd" name="readers_left_pd"><span>To add Multiple Seperate with '|'</span>
						</div>
					</div>
					
					<h2>ADD</h2>
					<div class="grid_auto_fit">
						<div>
							<label for="readers_right_add">Right ADD</label>
							<input type="text" id="readers_right_add" name="readers_right_add"><span>To add Multiple Seperate with '|'</span>
						</div>
						
						<div>
							<label for="readers_left_add">Left ADD</label>
							<input type="text" id="readers_left_add" name="readers_left_add"><span>To add Multiple Seperate with '|'</span> 
						</div>
					</div>
					<h3><u>Intermediate</u></h3>
					
					<div class="grid_auto_fit">
						<div>
							<label for="intermediate_right_eye_sphere">Right Eye Sphere</label>
							<input type="text" id="intermediate_right_eye_sphere" name="intermediate_right_eye_sphere"><span> To add Multiple Seperate with '|'</span> 
						</div>
						
						<div>
							<label for="intermediate_right_eye_cylinder">Right Eye Cylinder</label>
							<input type="text" id="intermediate_right_eye_cylinder" name="intermediate_right_eye_cylinder"><span> To add Multiple Seperate with '|'</span> 
						</div>
						
						<div>
						<label for="intermediate_left_eye_sphere">Left Eye Sphere</label>
						<input type="text" id="intermediate_left_eye_sphere" name="intermediate_left_eye_sphere"><span>To add Multiple Seperate with '|'</span>
						</div>
						
						<div>
							<label for="intermediate_left_eye_cylinder">Left Eye Cylinder</label>
							<input type="text" id="intermediate_left_eye_cylinder" name="intermediate_left_eye_cylinder"><span>To add Multiple Seperate with '|'</span>
						</div>
					</div>
					
					<h2>Single PD</h2>
					
					<div class="grid_auto_fit">
						<div>
							<label for="intermediate_single_pd">Single PD</label>
							<input type="text" id="intermediate_single_pd" name="intermediate_single_pd"><span>To add Multiple Seperate with '|'</span>
						</div>
					</div>
					
						<h2>Two PD Numbers</h2>
						<div class="grid_auto_fit">
							<div>
								<label for="intermediate_right_pd">Right PD</label>
								<input type="text" id="intermediate_right_pd" name="intermediate_right_pd"><span>To add Multiple Seperate with '|' </span>
							</div>
							<div>
								<label for="intermediate_left_pd">Left PD</label>
								<input type="text" id="intermediate_left_pd" name="intermediate_left_pd"><span>To add Multiple Seperate with '|' </span>
							</div>
						</div>
						
						<h2>ADD</h2>
						<div class="grid_auto_fit">
							<div>
								<label for="intermediate_right_add">Right ADD</label>
								<input type="text" id="intermediate_right_add" name="intermediate_right_add"><span>To add Multiple Seperate with '|' </span>
							</div>
							<div>
								<label for="intermediate_left_add">Left ADD</label>
								<input type="text" id="intermediate_left_add" name="intermediate_left_add"><span>To add Multiple Seperate with '|' </span>
							</div>
						</div>
						
					
					
				</form>
				<form id="multifocal_c_data_form" method="POST" class="eyeglass">
					<h1>Multifocal</h1>
					
					<h3><u>Bifocal</u></h3>
					
					<div class="grid_auto_fit">
						<div>
							<label for="bifocal_right_eye_sphere">Right Eye Sphere</label>
							<input type="text" id="bifocal_right_eye_sphere" name="bifocal_right_eye_sphere"><span>To add Multiple Seperate with '|' </span>
						</div>
						<div>
							<label for="bifocal_right_eye_cylinder">Right Eye Cylinder</label>
							<input type="text" id="bifocal_right_eye_cylinder" name="bifocal_right_eye_cylinder"><span>To add Multiple Seperate with '|' </span>
						</div>
						<div>
							<label for="bifocal_left_eye_sphere">Left Eye Sphere</label>
							<input type="text" id="bifocal_left_eye_sphere" name="bifocal_left_eye_sphere"><span>To add Multiple Seperate with '|' </span>
						</div>
						<div>
							<label for="bifocal_left_eye_cylinder">Left Eye Cylinder</label>
							<input type="text" id="bifocal_left_eye_cylinder" name="bifocal_left_eye_cylinder"><span>To add Multiple Seperate with '|' </span>
						</div>
					</div>
					
					
					<h2>Single PD</h2>
					<div class="grid_auto_fit">
						<div>
							<label for="bifocal_single_pd">Single PD</label>
							<input type="text" id="bifocal_single_pd" name="bifocal_single_pd"><span>To add Multiple Seperate with '|' </span>
						</div>
					</div>
					<h2>Two PD Numbers</h2>
					
					<div class="grid_auto_fit">
						<div class="">
							<label for="bifocal_right_pd">Right PD</label>
							<input type="text" id="bifocal_right_pd" name="bifocal_right_pd"><span>To add Multiple Seperate with '|'</span>
						</div>
						<div class="">
							<label for="bifocal_left_pd">Left PD</label>
							<input type="text" id="bifocal_left_pd" name="bifocal_left_pd"><span>To add Multiple Seperate with '|'</span>
						</div>
					</div>
					
					
					<h2>ADD</h2>
					
					<div class="grid_auto_fit">
						<div>
							<label for="bifocal_right_add">Right ADD</label>
							<input type="text" id="bifocal_right_add" name="bifocal_right_add"><span>To add Multiple Seperate with '|' </span>
						</div>
						<div>
							<label for="bifocal_left_add">Left ADD</label>
							<input type="text" id="bifocal_left_add" name="bifocal_left_add"><span>To add Multiple Seperate with '|' </span>
						</div>
					</div>

					<h3><u>Progressive</u></h3>
					<div class="grid_auto_fit">
						<div>
							<label for="progressive_right_eye_sphere">Right Eye Sphere</label>
							<input type="text" id="progressive_right_eye_sphere" name="progressive_right_eye_sphere"><span>To add Multiple Seperate with '|' </span>
						</div>
						<div>
							<label for="progressive_right_eye_cylinder">Right Eye Cylinder</label>
							<input type="text" id="progressive_right_eye_cylinder" name="progressive_right_eye_cylinder"><span>To add Multiple Seperate with '|' </span>
						</div>
						<div>
							<label for="progressive_left_eye_sphere">Left Eye Sphere</label>
							<input type="text" id="progressive_left_eye_sphere" name="progressive_left_eye_sphere"><span>To add Multiple Seperate with '|' </span>
						</div>
						<div>
							<label for="progressive_left_eye_cylinder">Left Eye Cylinder</label>
							<input type="text" id="progressive_left_eye_cylinder" name="progressive_left_eye_cylinder"><span>To add Multiple Seperate with '|'</span>
						</div>
					</div>
					
					<h2>Single PD</h2>
					
					<div class="grid_auto_fit">
						<div class="">
							<label for="progressive_single_pd">Single PD</label>
							<input type="text" id="progressive_single_pd" name="progressive_single_pd"><span>To add Multiple Seperate with '|'</span>
						</div>
					</div>
					
					<h2>Two PD Numbers</h2>
					
					<div class="grid_auto_fit">
						<div class="">
							<label for="progressive_right_pd">Right PD</label>
							<input type="text" id="progressive_right_pd" name="progressive_right_pd"><span>To add Multiple Seperate with '|'</span>
						</div>
						<div class="">
							<label for="progressive_left_pd">Left PD</label>
							<input type="text" id="progressive_left_pd" name="progressive_left_pd"><span>To add Multiple Seperate with '|'</span>
						</div>
					</div>
					
					<h2>ADD</h2>
					
					<div class="grid_auto_fit">
						<div class="">
							<label for="progressive_right_add">Right ADD</label>
							<input type="text" id="progressive_right_add" name="progressive_right_add"><span>To add Multiple Seperate with '|'</span>
						</div>
						<div class="">
							<label for="progressive_left_add">Left ADD</label>
							<input type="text" id="progressive_left_add" name="progressive_left_add"><span>To add Multiple Seperate with '|'</span>
						</div>
					</div>
					 

					<h3><u>Premium Progressive</u></h3>
					<div class="grid_auto_fit">
					
						<div class="">
							<label for="premium_right_eye_sphere">Right Eye Sphere</label>
							<input type="text" id="premium_right_eye_sphere" name="premium_right_eye_sphere"><span>To add Multiple Seperate with '|'</span>
						</div>
						
						<div class="">
							<label for="premium_right_eye_cylinder">Right Eye Cylinder</label>
							<input type="text" id="premium_right_eye_cylinder" name="premium_right_eye_cylinder"><span>To add Multiple Seperate with '|'</span>
						</div>
						
						<div class="">
							<label for="premium_left_eye_sphere">Left Eye Sphere</label>
							<input type="text" id="premium_left_eye_sphere" name="premium_left_eye_sphere"><span>To add Multiple Seperate with '|'</span>
						</div>
						
						<div class="">
							<label for="premium_left_eye_cylinder">Left Eye Cylinder</label>
							<input type="text" id="premium_left_eye_cylinder" name="premium_left_eye_cylinder"><span>To add Multiple Seperate with '|'</span>
						</div>
						
					</div>
					
					<h2>Single PD</h2>
					
					<div class="grid_auto_fit">
						<div class="">
							<label for="premium_single_pd">Single PD</label>
							<input type="text" id="premium_single_pd" name="premium_single_pd"><span>To add Multiple Seperate with '|'</span>
						</div>
					</div>
					
					<h2>Two PD Numbers</h2>
					
					<div class="grid_auto_fit">
						<div class="">
							<label for="premium_right_pd">Right PD</label>
							<input type="text" id="premium_right_pd" name="premium_right_pd"><span>To add Multiple Seperate with '|'</span>
						</div>
						<div class="">
							<label for="premium_left_pd">Left PD</label>
							<input type="text" id="premium_left_pd" name="premium_left_pd"><span>To add Multiple Seperate with '|'</span>
						</div>
					</div>
					
					<h2>ADD</h2>
					
					<div class="grid_auto_fit">
						<div class="">
							<label for="premium_right_add">Right ADD</label>
							<input type="text" id="premium_right_add" name="premium_right_add"><span>To add Multiple Seperate with '|' </span>
						</div>
						<div class="">
							<label for="premium_left_add">Left ADD</label>
							<input type="text" id="premium_left_add" name="premium_left_add"><span>To add Multiple Seperate with '|' </span>
						</div>
					</div>
					
				</form>
				 
				<form id="additional_price_c_data_form" method="POST">
					<h1>Additional Price (Don't Use Currency Symbol "<?php echo get_woocommerce_currency_symbol(); ?>")</h1>
					<h3><u>Additional Prices</u></h3>
					
					<div class="grid_auto_fit eyeglass">
						<div class="">
							<label for="bifocal_additional_price">Additional Price for Bifocal</label>
							<input type="text" id="bifocal_additional_price" name="bifocal_additional_price">  
						</div>
						<div class="">
							<label for="progressive_additional_price">Additional Price for Progressive</label>
							<input type="text" id="progressive_additional_price" name="progressive_additional_price"> 
						</div>
						<div class="">
							<label for="premium_additional_price">Additional Price for Premium</label>
							<input type="text" id="premium_additional_price" name="premium_additional_price"> 
						</div>
					</div>

					<h3 class="eyeglass"><u>Clear Lenses</u></h3>
					
					<div class="grid_auto_fit eyeglass">
						<div class="">
							<label for="basic_lenses_additional_price">Additional Price for Basic Lenses</label>
							<input type="text" id="basic_lenses_additional_price" name="basic_lenses_additional_price"> 
						</div>
						
						<div class="">
							<label for="most_popular_lenses_additional_price">Additional Price for Most Popular Lenses</label>
							<input type="text" id="most_popular_lenses_additional_price" name="most_popular_lenses_additional_price"> 
						</div>
						
						<div class="">
							<label for="advanced_lenses_additional_price">Additional Price for Advanced Lenses</label>
							<input type="text" id="advanced_lenses_additional_price" name="advanced_lenses_additional_price"> 
						</div>
						
					</div>

					<h3 class="eyeglass"><u>Blue Light Blocking Lenses</u></h3>
					
					<div class="grid_auto_fit eyeglass">
						
						<div class="">
							<label for="ebdblue_15_additional_price">Additional Price for EBDBlue 1.5</label>
							<input type="text" id="ebdblue_15_additional_price" name="ebdblue_15_additional_price"> 
						</div>
						
						<div class="">
							<label for="ebdblue_16_additional_price">Additional Price for EBDBlue 1.6</label>
							<input type="text" id="ebdblue_16_additional_price" name="ebdblue_16_additional_price"><br>
						</div>
						
						<div class="">
							<label for="ebdblue_167_additional_price">Additional Price for EBDBlue 1.67</label>
							<input type="text" id="ebdblue_167_additional_price" name="ebdblue_167_additional_price"><br>
						</div>
						<div class="">
							<label for="ebdblue_174_additional_price">Additional Price for EBDBlue 1.74</label>
							<input type="text" id="ebdblue_174_additional_price" name="ebdblue_174_additional_price"><br>
						</div>
						
					</div>

					<h3><u>Sun Lenses</u></h3>
					
					<div class="grid_auto_fit">
						
						<div class="">
							<label for="basic_tint_additional_price">Additional Price for Basic Tint</label>
							<input type="text" id="basic_tint_additional_price" name="basic_tint_additional_price"> <br>
						</div>
						
						<div class="">
							<label for="gradient_tint_lenses_additional_price">Additional Price for Gradient Tint</label>
							<input type="text" id="gradient_tint_lenses_additional_price" name="gradient_tint_lenses_additional_price"><br>
						</div>
						
						<div class="">
							<label for="mirrored_tint_additional_price">Additional Price for Mirrored Tint</label>
							<input type="text" id="mirrored_tint_additional_price" name="mirrored_tint_additional_price"><br>
						</div>
						
					</div>
					
					
					<h3><u>Polarized</u></h3>
					
					<div class="grid_auto_fit">
						
						<div class="">
							<label for="polarized_basic_tint_additional_price">Additional Price for Polarized Basic Tint</label>
							<input type="text" id="polarized_basic_tint_additional_price" name="polarized_basic_tint_additional_price"><br>
						</div>
						<div class="">
							<label for="polarized_mirrored_tint_additional_price">Additional Price for Polarized Mirrored Tint</label>
							<input type="text" id="polarized_mirrored_tint_additional_price" name="polarized_mirrored_tint_additional_price"><br>
						</div>
						
					</div>

					<h3 class="eyeglass"><u>Light Adjusting</u></h3>
					
					<div class="grid_auto_fit eyeglass">
						
						<div class="">
							<label for="photochromic_additional_price">Additional Price for Photochromic</label>
							<input type="text" id="photochromic_additional_price" name="photochromic_additional_price"> <br>
						</div>
						
						<div class="">
								<label for="trasitions_Signature_additional_price">Additional Price for Transitions Signature</label>
						<input type="text" id="trasitions_Signature_additional_price" name="trasitions_Signature_additional_price"><br>
						</div>
						
						<div class="">
							<label for="transitions_xtrative_additional_price">Additional Price for Transitions XTRActive</label>
							<input type="text" id="transitions_xtrative_additional_price" name="transitions_xtrative_additional_price"><br>
						</div>
					</div>

					<h3 class="eyeglass"><u>Customize Lenses</u></h3>
					<div class="grid_auto_fit eyeglass" >
						<div class="">
							<label for="customize_index_15_additional_price">Additional Price for 1.5 INDEX LENS</label>
							<input type="text" id="customize_index_15_additional_price" name="customize_index_15_additional_price"> <br>
						</div>
						
						<div class="">
							<label for="customize_index_157_additional_price">Additional Price for 1.56 INDEX LENS</label>
							<input type="text" id="customize_index_157_additional_price" name="customize_index_157_additional_price"><br>
						</div>
						
<!--
						<div class="">
							<label for="customize_index_159_additional_price">Additional Price for 1.59 INDEX LENS</label>
							<input type="text" id="customize_index_159_additional_price" name="customize_index_159_additional_price"><br>
						</div>
-->
						
						<div class="">
							<label for="customize_index_16_additional_price">Additional Price for 1.6 INDEX LENS</label>
							<input type="text" id="customize_index_16_additional_price" name="customize_index_16_additional_price"> <br>
						</div>
						<div class="">
							<label for="customize_index_167_additional_price">Additional Price for 1.67 INDEX LENS</label>
							<input type="text" id="customize_index_167_additional_price" name="customize_index_167_additional_price"><br>
						</div>
						<div class="">
							<label for="customize_index_174_additional_price">Additional Price for 1.74 INDEX LENS</label>
							<input type="text" id="customize_index_174_additional_price" name="customize_index_174_additional_price"><br>
						</div>
					</div>
				</form>
				<br>
				<form id="color_tints_c_data_form" method="POST">
					<h1>Sun Lens Color Tints</h1>
					<h3><u>Basic Lens Tint Colours</u></h3>
					
					<div class="grid_auto_fit">
						<div class="">
							<label for="basic_lens_tint_colours">Tint Colors</label>
							<input type="text" id="basic_lens_tint_colours" name="basic_lens_tint_colours"><span>To add Multiple Seperate with '|' </span>
						</div>
					</div>
					
					
					<h3><u>Gradient Lens Tint Colours</u></h3>
					
					<div class="grid_auto_fit">
						<div class="">
							<label for="gradient_lens_tint_colours">Tint Colors</label>
							<input type="text" id="gradient_lens_tint_colours" name="gradient_lens_tint_colours"><span>To add Multiple Seperate with '|'</span>
						</div>
					</div>


					<h3><u>Mirrored Lens Tint Colours</u></h3>
					
					<div class="grid_auto_fit">
						<div class="">
							<label for="mirrored_lens_tint_colours">Tint Colors</label>
							<input type="text" id="mirrored_lens_tint_colours" name="mirrored_lens_tint_colours"><span>To add Multiple Seperate with '|'</span>
						</div>
					</div>

					<h3><u>Polarized Lens Tint Colours</u></h3>
					
					<div class="grid_auto_fit">
						<div class="">
							<label for="polarized_basic_lens_tint_colours">Polarized Basic Tint Colors</label>
							<input type="text" id="polarized_basic_lens_tint_colours" name="polarized_basic_lens_tint_colours"><span>To add Multiple Seperate with '|'</span>
						</div>
						<div class="">
							<label for="polarized_mirrored_lens_tint_colours">Polarized Mirrored Tint Colors</label>
							<input type="text" id="polarized_mirrored_lens_tint_colours" name="polarized_mirrored_lens_tint_colours"><span>To add Multiple Seperate with '|'</span>
						</div>
					</div>

					<h1 class="eyeglass">Light Adjusting Color Tints</h1>
					<h3 class="eyeglass"><u>PhotoChromic Tint Colours</u></h3>
					
					<div class="grid_auto_fit eyeglass">
						<div class="">
							<label for="photochromic_tint_colours">Tint Colors</label>
							<input type="text" id="photochromic_tint_colours" name="photochromic_tint_colours"><span>To add Multiple Seperate with '|' </span>
						</div>
					</div>

					<h3 class="eyeglass"><u>Transitions Signature Tint Colours</u></h3>
					<div class="grid_auto_fit eyeglass">
						<div class="">
							<label for="transitions_signature_tint_colours">Tint Colors</label>
							<input type="text" id="transitions_signature_tint_colours" name="transitions_signature_tint_colours"><span>To add Multiple Seperate with '|' </span>
						</div>
					</div>
					
					<h3 class="eyeglass"><u>Transitions XTRActive Tint Colours</u></h3>
					
					<div class="grid_auto_fit eyeglass">
						<div class="">
							<label for="transitions_xtractive_tint_colours">Tint Colors</label>
							<input type="text" id="transitions_xtractive_tint_colours" name="transitions_xtractive_tint_colours"><span>To add Multiple Seperate with '|'</span>
						</div>
					</div>

					<br>
					<button id="save_custom_data" class="button button-primary">Save All</button>
				</form>
			</div>
		</div>
		<div class="lds-roller-holder">
			<div class="lds-roller">
				<div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div>
			</div>
		</div>
		<script>
			jQuery(document).ready(function(){
				jQuery("#save_custom_data").click(function(e){
					jQuery(".lds-roller-holder").css("display","flex");
					e.preventDefault();
					prod_id = jQuery("#product_id").val();
					product_type = jQuery("#product_type").val();
					FormDataDistance = jQuery('#distance_c_data_form').serialize();
					FormDataReading = jQuery('#reading_c_data_form').serialize();
					FormDataMultifocal = jQuery('#multifocal_c_data_form').serialize();
					FormDataAdditionalPrice = jQuery('#additional_price_c_data_form').serialize();
					FormDataTintColours = jQuery('#color_tints_c_data_form').serialize();
					jQuery.ajax({
						url: "<?php echo admin_url( 'admin-ajax.php' ); ?>",
						type: "POST",
						data: {
							action : "woocommerce_advanced_lens_custom_data",
							prod_id : prod_id,
							product_type : product_type,
							DistanceData : FormDataDistance,
							ReadingData : FormDataReading,
							MultifocalData : FormDataMultifocal,
							AdditionalPriceData : FormDataAdditionalPrice,
							TintColoursData : FormDataTintColours,
						},
						success : function( response ){
							console.log(response);
							jQuery(".lds-roller-holder").css("display","none");
						}  
					});
				});
			});
		</script>
		<?php
	}
	
}
