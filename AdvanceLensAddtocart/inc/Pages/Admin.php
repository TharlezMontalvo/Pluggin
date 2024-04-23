<?php 
/**
 * @package  WooCommemrce Advanced Lens
 */
namespace Inc\Pages;

use Inc\Base\BaseController;

/**
* 
*/
class Admin extends BaseController{

	public function register() 
	{
		add_action( 'woocommerce_after_order_itemmeta', array($this,'twf_user_custom_meta_customized_display'),10, 3 );
	}
	
	function twf_user_custom_meta_customized_display( $item_id, $item, $product ){

		global $wpdb;

		$all_meta_data['twf_user_custom_datas'] = wc_get_order_item_meta( $item_id, 'twf_custom_data', true);

		if(!empty($all_meta_data)) {
		
			if(!empty($all_meta_data['twf_user_custom_datas']))
			{
				$values['twf_user_custom_datas'] = $all_meta_data['twf_user_custom_datas'];
				//You can have you own logic here.
				?>
				<div class="container" style="max-width: 100%;">
					<p class="pointer js-btn-item-view">
						<strong>Lens:</strong>
						<?php echo $values['twf_user_custom_datas']['usage'];?>	<i class="icon-arrow-down"></i>
					</p>
					<div class="sc-item-prescription">
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
				<script>
					jQuery(document).ready(function(){
						jQuery(".js-btn-item-view").click(function(){
							jQuery(".sc-item-prescription").slideToggle();
						});
					});
				</script>
			<?php
			}
		}
	}
	
}
