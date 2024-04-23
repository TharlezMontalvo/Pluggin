<?php 
/**
 * @package  WooCommemrce Advanced Lens
 */
namespace Inc\Base;

use Inc\Base\BaseController;

/**
* 
*/
class Enqueue extends BaseController
{
	public function register() {
		add_action('wp_enqueue_scripts', array($this,'enqueue'));
		add_action('admin_enqueue_scripts', array($this,'admin_enqueue'));
	}
	
	function enqueue() {
	// enqueue all our scripts
		wp_enqueue_style( 'custom_data_jquery_steps_css', plugin_dir_url( __FILE__ ) . '../../assets/css/jquery.steps.css' );
		wp_enqueue_style( 'custom_data_main_css', plugin_dir_url( __FILE__ ) . '../../assets/css/main.css' );
		wp_enqueue_style( 'custom_data_jquery_steps_css', plugin_dir_url( __FILE__ ) . '../../assets/css/jquery.mCustomScrollbar.css' );
		wp_enqueue_script('custom_data_jquery_js', plugin_dir_url( __FILE__ ) . '../../assets/lib/jquery-1.9.1.min.js' );
		wp_enqueue_script('custom_data_jquery_steps_js', plugin_dir_url( __FILE__ ) . '../../assets/lib/jquery.steps.js' );
		wp_enqueue_script('custom_data_jquery_slider_form', plugin_dir_url( __FILE__ ) . '../../assets/js/slider-form.js' );
		
		if(get_post_type() == 'product'){
			wp_enqueue_script('product_jquery_js', plugin_dir_url( __FILE__ ) . '../../assets/js/product_jquery.js' );
			wp_enqueue_script('product_scrollbar_js', plugin_dir_url( __FILE__ ) . '../../assets/js/jquery.mCustomScrollbar.concat.min.js' );
		}
	}

	function admin_enqueue(){
		wp_enqueue_style( 'custom_data_main_css', plugin_dir_url( __FILE__ ) . '../../assets/css/admin.css' );
	}
}
