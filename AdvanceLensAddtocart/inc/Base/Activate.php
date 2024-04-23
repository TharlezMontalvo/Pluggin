<?php
/**
 * @package  WooCommemrce Advanced Lens
 */
namespace Inc\Base;

class Activate
{
	public static function activate() {
		
		/*Actions to be performed when plugin is activated.*/

		global $wpdb;

		if ( ! function_exists( 'is_plugin_active_for_network' ) ) {
			include_once( ABSPATH . '/wp-admin/includes/plugin.php' );
		}

		if ( ! current_user_can( 'activate_plugins' ) ) {
			// Deactivate the plugin.
			deactivate_plugins( plugin_basename( __FILE__ ) );

			$error_message = __( 'You do not have proper authorization to activate a plugin!', 'woo-solo-api' );
			die( esc_html( $error_message ) );
		}

		if ( ! class_exists( 'WooCommerce' ) ) {
			// Deactivate the plugin.
			deactivate_plugins( plugin_basename( __FILE__ ) );
			// Throw an error in the WordPress admin console.
			$error_message = __( 'This plugin requires ', 'woo-solo-api' ) . '<a href="' . esc_url( 'https://wordpress.org/plugins/woocommerce/' ) . '">WooCommerce</a>' . __( ' plugin to be active!', 'woo-solo-api' );
			die( wp_kses_post( $error_message ) );
		}

		$tables_name = array("adv_lens_distance_custom_data"=>$wpdb->prefix . 'adv_lens_distance_custom_data',"adv_lens_reading_custom_data"=>$wpdb->prefix . 'adv_lens_reading_custom_data',"adv_lens_multifocal_custom_data"=>$wpdb->prefix . 'adv_lens_multifocal_custom_data',"adv_lens_additional_price_custom_data"=>$wpdb->prefix . 'adv_lens_additional_price_custom_data',"adv_lens_tint_colour_custom_data"=>$wpdb->prefix . 'adv_lens_tint_colour_custom_data');
		foreach ($tables_name as $key => $table_name) {
			if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
				//table not in database. Create new table
				$charset_collate = $wpdb->get_charset_collate();
				$sql = "CREATE TABLE $table_name (
					id MEDIUMINT(9) NOT NULL AUTO_INCREMENT,
					product_id BIGINT(11) NOT NULL,
					sub_type VARCHAR(255) NOT NULL,
					data LONGTEXT NOT NULL,
					UNIQUE KEY id (id)
				) $charset_collate;";  

				if(!function_exists('dbDelta')) {
					require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
				}
				dbDelta( $sql );
			}
		}
		$advproductstable = $wpdb->prefix."adv_lens_products";
		if($wpdb->get_var("SHOW TABLES LIKE '$advproductstable'") != $advproductstable){
			$charset_collate = $wpdb->get_charset_collate();
			$sqlpr = "CREATE TABLE $advproductstable (
				id MEDIUMINT(9) NOT NULL AUTO_INCREMENT,
				product_id BIGINT(11) NOT NULL,
				product_type VARCHAR(255) NOT NULL,
				UNIQUE KEY id (id)
			) $charset_collate;";
			if(!function_exists('dbDelta')) {
				require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			}
			dbDelta( $sqlpr );  
		}
		$advproductsampledata = $wpdb->prefix."adv_lens_sample_data";
		if($wpdb->get_var("SHOW TABLES LIKE '$advproductsampledata'") != $advproductsampledata){
			$charset_collate = $wpdb->get_charset_collate();
			$sqlsd = "CREATE TABLE $advproductsampledata (
				sub_type VARCHAR(255) NOT NULL,
				data LONGTEXT NOT NULL
			) $charset_collate;";
			if(!function_exists('dbDelta')) {
				require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			}
			
			dbDelta( $sqlsd );  
			
			$sqlins = "INSERT INTO $advproductsampledata (sub_type, data) VALUES ('Distance', 'a:7:{s:25:\"distance_right_eye_sphere\";s:885:\"-16.00 | -15.75 | -15.50 | -15.25 | -15.00 | -14.75 | -14.50 | -14.25 | -14.00 | -13.75 | -13.50 | -13.25 | -13.00 | -12.75 | -12.50 | -12.25 | -12.00 | -11.75 | -11.50 | -11.25 | -11.00 | -10.75 | -10.50 | -10.25 | -10.00 | -9.75 | -9.50 | -9.25 | -9.00 | -8.75 | -8.50 | -8.25 | -8.00 | -7.75 | -7.50 | -7.25 | -7.00 | -6.75 | -6.50 | -6.25 | -6.00 | -5.75 | -5.50 | -5.25 | -5.00 | -4.75 | -4.50 | -4.25 | -4.00 | -3.75 | -3.50 | -3.25 | -3.00 | -2.75 | -2.50 | -2.25 | -2.00 | -1.75 | -1.50 | -1.25 | -1.00 | -0.75 | -0.50 | -0.25 | 0.00 | 0.25 | 0.50 | 0.75 | 1.00 | 1.25 | 1.50 | 1.75 | 2.00 | 2.25 | 2.50 | 2.75 | 3.00 | 3.25 | 3.50 | 3.75 | 4.00 | 4.25 | 4.50| 4.75 | 5.00 | 5.25 | 5.50 | 5.75 | 6.00 | 6.25 | 6.50 | 6.75 | 7.00 | 7.25 | 7.50 | 7.75 | 8.00 | 8.25 | 8.50 | 8.75 | 9.00 | 9.25 | 9.50 | 9.75 | 10.00 | 10.25 | 10.50 | 10.75 | 11.00 | 11.25 | 11.50 | 11.75 | 12.00\";s:27:\"distance_right_eye_cylinder\";s:365:\" -6.00 | -5.75 | -5.50 | -5.25 | -5.00 | -4.75 | -4.50 | -4.25 | -4.00 | -3.75 | -3.50 | -3.25 | -3.00 | -2.75 | -2.50 | -2.25 | -2.00 | -1.75 | -1.50 | -1.25 | -1.00 | -0.75 | -0.50 | -0.25 | 0.00 | 0.25 | 0.50 | 0.75 | 1.00 | 1.25 | 1.50 | 1.75 | 2.00 | 2.25 | 2.50 | 2.75 | 3.00 | 3.25 | 3.50 | 3.75 | 4.00 | 4.25 | 4.50| 4.75 | 5.00 | 5.25 | 5.50 | 5.75 | 6.00 \";s:24:\"distance_left_eye_sphere\";s:885:\"-16.00 | -15.75 | -15.50 | -15.25 | -15.00 | -14.75 | -14.50 | -14.25 | -14.00 | -13.75 | -13.50 | -13.25 | -13.00 | -12.75 | -12.50 | -12.25 | -12.00 | -11.75 | -11.50 | -11.25 | -11.00 | -10.75 | -10.50 | -10.25 | -10.00 | -9.75 | -9.50 | -9.25 | -9.00 | -8.75 | -8.50 | -8.25 | -8.00 | -7.75 | -7.50 | -7.25 | -7.00 | -6.75 | -6.50 | -6.25 | -6.00 | -5.75 | -5.50 | -5.25 | -5.00 | -4.75 | -4.50 | -4.25 | -4.00 | -3.75 | -3.50 | -3.25 | -3.00 | -2.75 | -2.50 | -2.25 | -2.00 | -1.75 | -1.50 | -1.25 | -1.00 | -0.75 | -0.50 | -0.25 | 0.00 | 0.25 | 0.50 | 0.75 | 1.00 | 1.25 | 1.50 | 1.75 | 2.00 | 2.25 | 2.50 | 2.75 | 3.00 | 3.25 | 3.50 | 3.75 | 4.00 | 4.25 | 4.50| 4.75 | 5.00 | 5.25 | 5.50 | 5.75 | 6.00 | 6.25 | 6.50 | 6.75 | 7.00 | 7.25 | 7.50 | 7.75 | 8.00 | 8.25 | 8.50 | 8.75 | 9.00 | 9.25 | 9.50 | 9.75 | 10.00 | 10.25 | 10.50 | 10.75 | 11.00 | 11.25 | 11.50 | 11.75 | 12.00\";s:26:\"distance_left_eye_cylinder\";s:365:\" -6.00 | -5.75 | -5.50 | -5.25 | -5.00 | -4.75 | -4.50 | -4.25 | -4.00 | -3.75 | -3.50 | -3.25 | -3.00 | -2.75 | -2.50 | -2.25 | -2.00 | -1.75 | -1.50 | -1.25 | -1.00 | -0.75 | -0.50 | -0.25 | 0.00 | 0.25 | 0.50 | 0.75 | 1.00 | 1.25 | 1.50 | 1.75 | 2.00 | 2.25 | 2.50 | 2.75 | 3.00 | 3.25 | 3.50 | 3.75 | 4.00 | 4.25 | 4.50| 4.75 | 5.00 | 5.25 | 5.50 | 5.75 | 6.00 \";s:18:\"distance_single_pd\";s:242:\"46.0 | 47.0 | 48.0 | 49.0 | 50.0 | 51.0 | 52.0 | 53.0 | 54.0 | 55.0 | 56.0 | 57.0 | 58.0 | 59.0 | 60.0 | 61.0 | 62.0 | 63.0 | 64.0 | 65.0 | 66.0 | 67.0 | 68.0 | 69.0 | 70.0 | 71.0 | 72.0 | 73.0 | 74.0 | 75.0 | 76.0 | 77.0 | 78.0 | 79.0 | 80.0\";s:17:\"distance_right_pd\";s:277:\"23.00 | 23.50 | 24.00 | 24.50 | 25.00 | 25.50 | 26.00 | 26.50 | 27.00 | 27.50 | 28.00 | 28.50 | 29.00 | 29.50 | 30.00 | 30.50 | 31.00 | 31.50 | 32.00 | 32.50 | 33.00 | 33.50 | 34.00 | 34.50 | 35.00 | 35.50 | 36.00 | 36.50 | 37.00 | 37.50 | 38.00 | 38.50 | 39.00 | 39.50 | 40.00\";s:16:\"distance_left_pd\";s:245:\"25.00 | 25.50 | 26.00 | 26.50 | 27.00 | 27.50 | 28.00 | 28.50 | 29.00 | 29.50 | 30.00 | 30.50 | 31.00 | 31.50 | 32.00 | 32.50 | 33.00 | 33.50 | 34.00 | 34.50 | 35.00 | 35.50 | 36.00 | 36.50 | 37.00 | 37.50 | 38.00 | 38.50 | 39.00 | 39.50 | 40.00\";}'),('Readers', 'a:9:{s:24:\"readers_right_eye_sphere\";s:885:\"-16.00 | -15.75 | -15.50 | -15.25 | -15.00 | -14.75 | -14.50 | -14.25 | -14.00 | -13.75 | -13.50 | -13.25 | -13.00 | -12.75 | -12.50 | -12.25 | -12.00 | -11.75 | -11.50 | -11.25 | -11.00 | -10.75 | -10.50 | -10.25 | -10.00 | -9.75 | -9.50 | -9.25 | -9.00 | -8.75 | -8.50 | -8.25 | -8.00 | -7.75 | -7.50 | -7.25 | -7.00 | -6.75 | -6.50 | -6.25 | -6.00 | -5.75 | -5.50 | -5.25 | -5.00 | -4.75 | -4.50 | -4.25 | -4.00 | -3.75 | -3.50 | -3.25 | -3.00 | -2.75 | -2.50 | -2.25 | -2.00 | -1.75 | -1.50 | -1.25 | -1.00 | -0.75 | -0.50 | -0.25 | 0.00 | 0.25 | 0.50 | 0.75 | 1.00 | 1.25 | 1.50 | 1.75 | 2.00 | 2.25 | 2.50 | 2.75 | 3.00 | 3.25 | 3.50 | 3.75 | 4.00 | 4.25 | 4.50| 4.75 | 5.00 | 5.25 | 5.50 | 5.75 | 6.00 | 6.25 | 6.50 | 6.75 | 7.00 | 7.25 | 7.50 | 7.75 | 8.00 | 8.25 | 8.50 | 8.75 | 9.00 | 9.25 | 9.50 | 9.75 | 10.00 | 10.25 | 10.50 | 10.75 | 11.00 | 11.25 | 11.50 | 11.75 | 12.00\";s:26:\"readers_right_eye_cylinder\";s:365:\" -6.00 | -5.75 | -5.50 | -5.25 | -5.00 | -4.75 | -4.50 | -4.25 | -4.00 | -3.75 | -3.50 | -3.25 | -3.00 | -2.75 | -2.50 | -2.25 | -2.00 | -1.75 | -1.50 | -1.25 | -1.00 | -0.75 | -0.50 | -0.25 | 0.00 | 0.25 | 0.50 | 0.75 | 1.00 | 1.25 | 1.50 | 1.75 | 2.00 | 2.25 | 2.50 | 2.75 | 3.00 | 3.25 | 3.50 | 3.75 | 4.00 | 4.25 | 4.50| 4.75 | 5.00 | 5.25 | 5.50 | 5.75 | 6.00 \";s:23:\"readers_left_eye_sphere\";s:885:\"-16.00 | -15.75 | -15.50 | -15.25 | -15.00 | -14.75 | -14.50 | -14.25 | -14.00 | -13.75 | -13.50 | -13.25 | -13.00 | -12.75 | -12.50 | -12.25 | -12.00 | -11.75 | -11.50 | -11.25 | -11.00 | -10.75 | -10.50 | -10.25 | -10.00 | -9.75 | -9.50 | -9.25 | -9.00 | -8.75 | -8.50 | -8.25 | -8.00 | -7.75 | -7.50 | -7.25 | -7.00 | -6.75 | -6.50 | -6.25 | -6.00 | -5.75 | -5.50 | -5.25 | -5.00 | -4.75 | -4.50 | -4.25 | -4.00 | -3.75 | -3.50 | -3.25 | -3.00 | -2.75 | -2.50 | -2.25 | -2.00 | -1.75 | -1.50 | -1.25 | -1.00 | -0.75 | -0.50 | -0.25 | 0.00 | 0.25 | 0.50 | 0.75 | 1.00 | 1.25 | 1.50 | 1.75 | 2.00 | 2.25 | 2.50 | 2.75 | 3.00 | 3.25 | 3.50 | 3.75 | 4.00 | 4.25 | 4.50| 4.75 | 5.00 | 5.25 | 5.50 | 5.75 | 6.00 | 6.25 | 6.50 | 6.75 | 7.00 | 7.25 | 7.50 | 7.75 | 8.00 | 8.25 | 8.50 | 8.75 | 9.00 | 9.25 | 9.50 | 9.75 | 10.00 | 10.25 | 10.50 | 10.75 | 11.00 | 11.25 | 11.50 | 11.75 | 12.00\";s:25:\"readers_left_eye_cylinder\";s:365:\" -6.00 | -5.75 | -5.50 | -5.25 | -5.00 | -4.75 | -4.50 | -4.25 | -4.00 | -3.75 | -3.50 | -3.25 | -3.00 | -2.75 | -2.50 | -2.25 | -2.00 | -1.75 | -1.50 | -1.25 | -1.00 | -0.75 | -0.50 | -0.25 | 0.00 | 0.25 | 0.50 | 0.75 | 1.00 | 1.25 | 1.50 | 1.75 | 2.00 | 2.25 | 2.50 | 2.75 | 3.00 | 3.25 | 3.50 | 3.75 | 4.00 | 4.25 | 4.50| 4.75 | 5.00 | 5.25 | 5.50 | 5.75 | 6.00 \";s:17:\"readers_single_pd\";s:242:\"46.0 | 47.0 | 48.0 | 49.0 | 50.0 | 51.0 | 52.0 | 53.0 | 54.0 | 55.0 | 56.0 | 57.0 | 58.0 | 59.0 | 60.0 | 61.0 | 62.0 | 63.0 | 64.0 | 65.0 | 66.0 | 67.0 | 68.0 | 69.0 | 70.0 | 71.0 | 72.0 | 73.0 | 74.0 | 75.0 | 76.0 | 77.0 | 78.0 | 79.0 | 80.0\";s:16:\"readers_right_pd\";s:277:\"23.00 | 23.50 | 24.00 | 24.50 | 25.00 | 25.50 | 26.00 | 26.50 | 27.00 | 27.50 | 28.00 | 28.50 | 29.00 | 29.50 | 30.00 | 30.50 | 31.00 | 31.50 | 32.00 | 32.50 | 33.00 | 33.50 | 34.00 | 34.50 | 35.00 | 35.50 | 36.00 | 36.50 | 37.00 | 37.50 | 38.00 | 38.50 | 39.00 | 39.50 | 40.00\";s:15:\"readers_left_pd\";s:245:\"25.00 | 25.50 | 26.00 | 26.50 | 27.00 | 27.50 | 28.00 | 28.50 | 29.00 | 29.50 | 30.00 | 30.50 | 31.00 | 31.50 | 32.00 | 32.50 | 33.00 | 33.50 | 34.00 | 34.50 | 35.00 | 35.50 | 36.00 | 36.50 | 37.00 | 37.50 | 38.00 | 38.50 | 39.00 | 39.50 | 40.00\";s:17:\"readers_right_add\";s:81:\"0.75 | 1.00 | 1.25 | 1.50 | 1.75 | 2.00 | 2.25 | 2.50 | 2.75 | 3.00 | 3.25 | 3.50\";s:16:\"readers_left_add\";s:81:\"0.75 | 1.00 | 1.25 | 1.50 | 1.75 | 2.00 | 2.25 | 2.50 | 2.75 | 3.00 | 3.25 | 3.50\";}'),('Intermediate', 'a:9:{s:29:\"intermediate_right_eye_sphere\";s:885:\"-16.00 | -15.75 | -15.50 | -15.25 | -15.00 | -14.75 | -14.50 | -14.25 | -14.00 | -13.75 | -13.50 | -13.25 | -13.00 | -12.75 | -12.50 | -12.25 | -12.00 | -11.75 | -11.50 | -11.25 | -11.00 | -10.75 | -10.50 | -10.25 | -10.00 | -9.75 | -9.50 | -9.25 | -9.00 | -8.75 | -8.50 | -8.25 | -8.00 | -7.75 | -7.50 | -7.25 | -7.00 | -6.75 | -6.50 | -6.25 | -6.00 | -5.75 | -5.50 | -5.25 | -5.00 | -4.75 | -4.50 | -4.25 | -4.00 | -3.75 | -3.50 | -3.25 | -3.00 | -2.75 | -2.50 | -2.25 | -2.00 | -1.75 | -1.50 | -1.25 | -1.00 | -0.75 | -0.50 | -0.25 | 0.00 | 0.25 | 0.50 | 0.75 | 1.00 | 1.25 | 1.50 | 1.75 | 2.00 | 2.25 | 2.50 | 2.75 | 3.00 | 3.25 | 3.50 | 3.75 | 4.00 | 4.25 | 4.50| 4.75 | 5.00 | 5.25 | 5.50 | 5.75 | 6.00 | 6.25 | 6.50 | 6.75 | 7.00 | 7.25 | 7.50 | 7.75 | 8.00 | 8.25 | 8.50 | 8.75 | 9.00 | 9.25 | 9.50 | 9.75 | 10.00 | 10.25 | 10.50 | 10.75 | 11.00 | 11.25 | 11.50 | 11.75 | 12.00\";s:31:\"intermediate_right_eye_cylinder\";s:365:\" -6.00 | -5.75 | -5.50 | -5.25 | -5.00 | -4.75 | -4.50 | -4.25 | -4.00 | -3.75 | -3.50 | -3.25 | -3.00 | -2.75 | -2.50 | -2.25 | -2.00 | -1.75 | -1.50 | -1.25 | -1.00 | -0.75 | -0.50 | -0.25 | 0.00 | 0.25 | 0.50 | 0.75 | 1.00 | 1.25 | 1.50 | 1.75 | 2.00 | 2.25 | 2.50 | 2.75 | 3.00 | 3.25 | 3.50 | 3.75 | 4.00 | 4.25 | 4.50| 4.75 | 5.00 | 5.25 | 5.50 | 5.75 | 6.00 \";s:28:\"intermediate_left_eye_sphere\";s:885:\"-16.00 | -15.75 | -15.50 | -15.25 | -15.00 | -14.75 | -14.50 | -14.25 | -14.00 | -13.75 | -13.50 | -13.25 | -13.00 | -12.75 | -12.50 | -12.25 | -12.00 | -11.75 | -11.50 | -11.25 | -11.00 | -10.75 | -10.50 | -10.25 | -10.00 | -9.75 | -9.50 | -9.25 | -9.00 | -8.75 | -8.50 | -8.25 | -8.00 | -7.75 | -7.50 | -7.25 | -7.00 | -6.75 | -6.50 | -6.25 | -6.00 | -5.75 | -5.50 | -5.25 | -5.00 | -4.75 | -4.50 | -4.25 | -4.00 | -3.75 | -3.50 | -3.25 | -3.00 | -2.75 | -2.50 | -2.25 | -2.00 | -1.75 | -1.50 | -1.25 | -1.00 | -0.75 | -0.50 | -0.25 | 0.00 | 0.25 | 0.50 | 0.75 | 1.00 | 1.25 | 1.50 | 1.75 | 2.00 | 2.25 | 2.50 | 2.75 | 3.00 | 3.25 | 3.50 | 3.75 | 4.00 | 4.25 | 4.50| 4.75 | 5.00 | 5.25 | 5.50 | 5.75 | 6.00 | 6.25 | 6.50 | 6.75 | 7.00 | 7.25 | 7.50 | 7.75 | 8.00 | 8.25 | 8.50 | 8.75 | 9.00 | 9.25 | 9.50 | 9.75 | 10.00 | 10.25 | 10.50 | 10.75 | 11.00 | 11.25 | 11.50 | 11.75 | 12.00\";s:30:\"intermediate_left_eye_cylinder\";s:365:\" -6.00 | -5.75 | -5.50 | -5.25 | -5.00 | -4.75 | -4.50 | -4.25 | -4.00 | -3.75 | -3.50 | -3.25 | -3.00 | -2.75 | -2.50 | -2.25 | -2.00 | -1.75 | -1.50 | -1.25 | -1.00 | -0.75 | -0.50 | -0.25 | 0.00 | 0.25 | 0.50 | 0.75 | 1.00 | 1.25 | 1.50 | 1.75 | 2.00 | 2.25 | 2.50 | 2.75 | 3.00 | 3.25 | 3.50 | 3.75 | 4.00 | 4.25 | 4.50| 4.75 | 5.00 | 5.25 | 5.50 | 5.75 | 6.00 \";s:22:\"intermediate_single_pd\";s:243:\"46.0 | 47.0 | 48.0 | 49.0 | 50.0 | 51.0 | 52.0 | 53.0 | 54.0 | 55.0 | 56.0 | 57.0 | 58.0 | 59.0 | 60.0 | 61.0 | 62.0 | 63.0 | 64.0 | 65.0 | 66.0 | 67.0 | 68.0 | 69.0 | 70.0 | 71.0 | 72.0 | 73.0 | 74.0 | 75.0 | 76.0 | 77.0 | 78.0 | 79.0 | 80.0 \";s:21:\"intermediate_right_pd\";s:277:\"23.00 | 23.50 | 24.00 | 24.50 | 25.00 | 25.50 | 26.00 | 26.50 | 27.00 | 27.50 | 28.00 | 28.50 | 29.00 | 29.50 | 30.00 | 30.50 | 31.00 | 31.50 | 32.00 | 32.50 | 33.00 | 33.50 | 34.00 | 34.50 | 35.00 | 35.50 | 36.00 | 36.50 | 37.00 | 37.50 | 38.00 | 38.50 | 39.00 | 39.50 | 40.00\";s:20:\"intermediate_left_pd\";s:245:\"25.00 | 25.50 | 26.00 | 26.50 | 27.00 | 27.50 | 28.00 | 28.50 | 29.00 | 29.50 | 30.00 | 30.50 | 31.00 | 31.50 | 32.00 | 32.50 | 33.00 | 33.50 | 34.00 | 34.50 | 35.00 | 35.50 | 36.00 | 36.50 | 37.00 | 37.50 | 38.00 | 38.50 | 39.00 | 39.50 | 40.00\";s:22:\"intermediate_right_add\";s:81:\"0.75 | 1.00 | 1.25 | 1.50 | 1.75 | 2.00 | 2.25 | 2.50 | 2.75 | 3.00 | 3.25 | 3.50\";s:21:\"intermediate_left_add\";s:81:\"0.75 | 1.00 | 1.25 | 1.50 | 1.75 | 2.00 | 2.25 | 2.50 | 2.75 | 3.00 | 3.25 | 3.50\";}'),('Bifocal', 'a:9:{s:24:\"bifocal_right_eye_sphere\";s:885:\"-16.00 | -15.75 | -15.50 | -15.25 | -15.00 | -14.75 | -14.50 | -14.25 | -14.00 | -13.75 | -13.50 | -13.25 | -13.00 | -12.75 | -12.50 | -12.25 | -12.00 | -11.75 | -11.50 | -11.25 | -11.00 | -10.75 | -10.50 | -10.25 | -10.00 | -9.75 | -9.50 | -9.25 | -9.00 | -8.75 | -8.50 | -8.25 | -8.00 | -7.75 | -7.50 | -7.25 | -7.00 | -6.75 | -6.50 | -6.25 | -6.00 | -5.75 | -5.50 | -5.25 | -5.00 | -4.75 | -4.50 | -4.25 | -4.00 | -3.75 | -3.50 | -3.25 | -3.00 | -2.75 | -2.50 | -2.25 | -2.00 | -1.75 | -1.50 | -1.25 | -1.00 | -0.75 | -0.50 | -0.25 | 0.00 | 0.25 | 0.50 | 0.75 | 1.00 | 1.25 | 1.50 | 1.75 | 2.00 | 2.25 | 2.50 | 2.75 | 3.00 | 3.25 | 3.50 | 3.75 | 4.00 | 4.25 | 4.50| 4.75 | 5.00 | 5.25 | 5.50 | 5.75 | 6.00 | 6.25 | 6.50 | 6.75 | 7.00 | 7.25 | 7.50 | 7.75 | 8.00 | 8.25 | 8.50 | 8.75 | 9.00 | 9.25 | 9.50 | 9.75 | 10.00 | 10.25 | 10.50 | 10.75 | 11.00 | 11.25 | 11.50 | 11.75 | 12.00\";s:26:\"bifocal_right_eye_cylinder\";s:365:\" -6.00 | -5.75 | -5.50 | -5.25 | -5.00 | -4.75 | -4.50 | -4.25 | -4.00 | -3.75 | -3.50 | -3.25 | -3.00 | -2.75 | -2.50 | -2.25 | -2.00 | -1.75 | -1.50 | -1.25 | -1.00 | -0.75 | -0.50 | -0.25 | 0.00 | 0.25 | 0.50 | 0.75 | 1.00 | 1.25 | 1.50 | 1.75 | 2.00 | 2.25 | 2.50 | 2.75 | 3.00 | 3.25 | 3.50 | 3.75 | 4.00 | 4.25 | 4.50| 4.75 | 5.00 | 5.25 | 5.50 | 5.75 | 6.00 \";s:23:\"bifocal_left_eye_sphere\";s:885:\"-16.00 | -15.75 | -15.50 | -15.25 | -15.00 | -14.75 | -14.50 | -14.25 | -14.00 | -13.75 | -13.50 | -13.25 | -13.00 | -12.75 | -12.50 | -12.25 | -12.00 | -11.75 | -11.50 | -11.25 | -11.00 | -10.75 | -10.50 | -10.25 | -10.00 | -9.75 | -9.50 | -9.25 | -9.00 | -8.75 | -8.50 | -8.25 | -8.00 | -7.75 | -7.50 | -7.25 | -7.00 | -6.75 | -6.50 | -6.25 | -6.00 | -5.75 | -5.50 | -5.25 | -5.00 | -4.75 | -4.50 | -4.25 | -4.00 | -3.75 | -3.50 | -3.25 | -3.00 | -2.75 | -2.50 | -2.25 | -2.00 | -1.75 | -1.50 | -1.25 | -1.00 | -0.75 | -0.50 | -0.25 | 0.00 | 0.25 | 0.50 | 0.75 | 1.00 | 1.25 | 1.50 | 1.75 | 2.00 | 2.25 | 2.50 | 2.75 | 3.00 | 3.25 | 3.50 | 3.75 | 4.00 | 4.25 | 4.50| 4.75 | 5.00 | 5.25 | 5.50 | 5.75 | 6.00 | 6.25 | 6.50 | 6.75 | 7.00 | 7.25 | 7.50 | 7.75 | 8.00 | 8.25 | 8.50 | 8.75 | 9.00 | 9.25 | 9.50 | 9.75 | 10.00 | 10.25 | 10.50 | 10.75 | 11.00 | 11.25 | 11.50 | 11.75 | 12.00\";s:25:\"bifocal_left_eye_cylinder\";s:365:\" -6.00 | -5.75 | -5.50 | -5.25 | -5.00 | -4.75 | -4.50 | -4.25 | -4.00 | -3.75 | -3.50 | -3.25 | -3.00 | -2.75 | -2.50 | -2.25 | -2.00 | -1.75 | -1.50 | -1.25 | -1.00 | -0.75 | -0.50 | -0.25 | 0.00 | 0.25 | 0.50 | 0.75 | 1.00 | 1.25 | 1.50 | 1.75 | 2.00 | 2.25 | 2.50 | 2.75 | 3.00 | 3.25 | 3.50 | 3.75 | 4.00 | 4.25 | 4.50| 4.75 | 5.00 | 5.25 | 5.50 | 5.75 | 6.00 \";s:17:\"bifocal_single_pd\";s:242:\"46.0 | 47.0 | 48.0 | 49.0 | 50.0 | 51.0 | 52.0 | 53.0 | 54.0 | 55.0 | 56.0 | 57.0 | 58.0 | 59.0 | 60.0 | 61.0 | 62.0 | 63.0 | 64.0 | 65.0 | 66.0 | 67.0 | 68.0 | 69.0 | 70.0 | 71.0 | 72.0 | 73.0 | 74.0 | 75.0 | 76.0 | 77.0 | 78.0 | 79.0 | 80.0\";s:16:\"bifocal_right_pd\";s:278:\"23.00 | 23.50 | 24.00 | 24.50 | 25.00 | 25.50 | 26.00 | 26.50 | 27.00 | 27.50 | 28.00 | 28.50 | 29.00 | 29.50 | 30.00 | 30.50 | 31.00 | 31.50 | 32.00 | 32.50 | 33.00 | 33.50 | 34.00 | 34.50 | 35.00 | 35.50 | 36.00 | 36.50 | 37.00 | 37.50 | 38.00 | 38.50 | 39.00 | 39.50 | 40.00 \";s:15:\"bifocal_left_pd\";s:1303:\"25.00 | 25.50 | 26.00 | 26.50 | 27.00 | 27.50 | 28.00 | 28.50 | 29.00 | 29.50 | 30.00 | 30.50 | 31.00 | 31.50 | 32.00 | 32.50 | 33.00 | 33.50 | 34.00 | 34.50 | 35.00 | 35.50 | 36.00 | 36.50 | 37.00 | 37.50 | 38.00 | 38.50 | 39.00 | 39.50 | 40.00 | -23.00 | -22.50 | -22.00 | -21.50 | -21.00 | -20.50 | -20.00 | -19.50 | -19.00 | -18.50 | -18.00 | -17.50 | -17.00 | -16.50 | -16.00 | -15.50 | -15.00 | -14.50 | -14.00 | -13.50 | -13.00 | -12.50 | -12.00 | -11.50 | -11.00 | -10.50 | -10.00 | -09.50 | -09.00 | -08.50 | -08.00 | -07.50 | -07.00 | -06.50 | -06.00 | -05.50 | -05.00 | -04.50 | -04.00 | -03.50 | -03.00 | -02.50 | -02.00 | -01.50 | -01.00 | -00.50 | 0 | 00.50 | 01.00 | 01.50 | 02.00 | 02.50 | 03.00 | 0350 | 04.00 | 04.50 | 05.00 | 05.50 | 06.00 | 06.50 | 07.00 | 07.50 | 08.00 | 08.50 | 09.00 | 09.50 | 10.00 | 10.50 | 11.00 | 11.50 | 12.00 | 12.50 | 13.00 | 13.50 | 14.00 | 14.50 | 15.00 | 15.50 | 16.00 | 16.50 | 17.00 | 17.50 | 18.00 | 18.50 | 19.00 | 19.50 | 20.00 | 20.50 | 21.00 | 21.50 | 22.00 | 22.50 | 23.00 | 23.50 | 24.00 | 24.50 | 25.00 | 25.50 | 26.00 | 26.50 | 27.00 | 27.50 | 28.00 | 28.50 | 29.00 | 29.50 | 30.00 | 30.50 | 31.00 | 31.50 | 32.00 | 32.50 | 33.00 | 33.50 | 34.00 | 34.50 | 35.00 | 35.50 | 36.00 | 36.50 | 37.00 | 37.50 | 38.00 | 38.50 | 39.00 | 39.50 | 40.00 \";s:17:\"bifocal_right_add\";s:81:\"0.75 | 1.00 | 1.25 | 1.50 | 1.75 | 2.00 | 2.25 | 2.50 | 2.75 | 3.00 | 3.25 | 3.50\";s:16:\"bifocal_left_add\";s:81:\"0.75 | 1.00 | 1.25 | 1.50 | 1.75 | 2.00 | 2.25 | 2.50 | 2.75 | 3.00 | 3.25 | 3.50\";}'),('Progressive', 'a:9:{s:28:\"progressive_right_eye_sphere\";s:885:\"-16.00 | -15.75 | -15.50 | -15.25 | -15.00 | -14.75 | -14.50 | -14.25 | -14.00 | -13.75 | -13.50 | -13.25 | -13.00 | -12.75 | -12.50 | -12.25 | -12.00 | -11.75 | -11.50 | -11.25 | -11.00 | -10.75 | -10.50 | -10.25 | -10.00 | -9.75 | -9.50 | -9.25 | -9.00 | -8.75 | -8.50 | -8.25 | -8.00 | -7.75 | -7.50 | -7.25 | -7.00 | -6.75 | -6.50 | -6.25 | -6.00 | -5.75 | -5.50 | -5.25 | -5.00 | -4.75 | -4.50 | -4.25 | -4.00 | -3.75 | -3.50 | -3.25 | -3.00 | -2.75 | -2.50 | -2.25 | -2.00 | -1.75 | -1.50 | -1.25 | -1.00 | -0.75 | -0.50 | -0.25 | 0.00 | 0.25 | 0.50 | 0.75 | 1.00 | 1.25 | 1.50 | 1.75 | 2.00 | 2.25 | 2.50 | 2.75 | 3.00 | 3.25 | 3.50 | 3.75 | 4.00 | 4.25 | 4.50| 4.75 | 5.00 | 5.25 | 5.50 | 5.75 | 6.00 | 6.25 | 6.50 | 6.75 | 7.00 | 7.25 | 7.50 | 7.75 | 8.00 | 8.25 | 8.50 | 8.75 | 9.00 | 9.25 | 9.50 | 9.75 | 10.00 | 10.25 | 10.50 | 10.75 | 11.00 | 11.25 | 11.50 | 11.75 | 12.00\";s:30:\"progressive_right_eye_cylinder\";s:365:\" -6.00 | -5.75 | -5.50 | -5.25 | -5.00 | -4.75 | -4.50 | -4.25 | -4.00 | -3.75 | -3.50 | -3.25 | -3.00 | -2.75 | -2.50 | -2.25 | -2.00 | -1.75 | -1.50 | -1.25 | -1.00 | -0.75 | -0.50 | -0.25 | 0.00 | 0.25 | 0.50 | 0.75 | 1.00 | 1.25 | 1.50 | 1.75 | 2.00 | 2.25 | 2.50 | 2.75 | 3.00 | 3.25 | 3.50 | 3.75 | 4.00 | 4.25 | 4.50| 4.75 | 5.00 | 5.25 | 5.50 | 5.75 | 6.00 \";s:27:\"progressive_left_eye_sphere\";s:885:\"-16.00 | -15.75 | -15.50 | -15.25 | -15.00 | -14.75 | -14.50 | -14.25 | -14.00 | -13.75 | -13.50 | -13.25 | -13.00 | -12.75 | -12.50 | -12.25 | -12.00 | -11.75 | -11.50 | -11.25 | -11.00 | -10.75 | -10.50 | -10.25 | -10.00 | -9.75 | -9.50 | -9.25 | -9.00 | -8.75 | -8.50 | -8.25 | -8.00 | -7.75 | -7.50 | -7.25 | -7.00 | -6.75 | -6.50 | -6.25 | -6.00 | -5.75 | -5.50 | -5.25 | -5.00 | -4.75 | -4.50 | -4.25 | -4.00 | -3.75 | -3.50 | -3.25 | -3.00 | -2.75 | -2.50 | -2.25 | -2.00 | -1.75 | -1.50 | -1.25 | -1.00 | -0.75 | -0.50 | -0.25 | 0.00 | 0.25 | 0.50 | 0.75 | 1.00 | 1.25 | 1.50 | 1.75 | 2.00 | 2.25 | 2.50 | 2.75 | 3.00 | 3.25 | 3.50 | 3.75 | 4.00 | 4.25 | 4.50| 4.75 | 5.00 | 5.25 | 5.50 | 5.75 | 6.00 | 6.25 | 6.50 | 6.75 | 7.00 | 7.25 | 7.50 | 7.75 | 8.00 | 8.25 | 8.50 | 8.75 | 9.00 | 9.25 | 9.50 | 9.75 | 10.00 | 10.25 | 10.50 | 10.75 | 11.00 | 11.25 | 11.50 | 11.75 | 12.00\";s:29:\"progressive_left_eye_cylinder\";s:365:\" -6.00 | -5.75 | -5.50 | -5.25 | -5.00 | -4.75 | -4.50 | -4.25 | -4.00 | -3.75 | -3.50 | -3.25 | -3.00 | -2.75 | -2.50 | -2.25 | -2.00 | -1.75 | -1.50 | -1.25 | -1.00 | -0.75 | -0.50 | -0.25 | 0.00 | 0.25 | 0.50 | 0.75 | 1.00 | 1.25 | 1.50 | 1.75 | 2.00 | 2.25 | 2.50 | 2.75 | 3.00 | 3.25 | 3.50 | 3.75 | 4.00 | 4.25 | 4.50| 4.75 | 5.00 | 5.25 | 5.50 | 5.75 | 6.00 \";s:21:\"progressive_single_pd\";s:242:\"46.0 | 47.0 | 48.0 | 49.0 | 50.0 | 51.0 | 52.0 | 53.0 | 54.0 | 55.0 | 56.0 | 57.0 | 58.0 | 59.0 | 60.0 | 61.0 | 62.0 | 63.0 | 64.0 | 65.0 | 66.0 | 67.0 | 68.0 | 69.0 | 70.0 | 71.0 | 72.0 | 73.0 | 74.0 | 75.0 | 76.0 | 77.0 | 78.0 | 79.0 | 80.0\";s:20:\"progressive_right_pd\";s:278:\"23.00 | 23.50 | 24.00 | 24.50 | 25.00 | 25.50 | 26.00 | 26.50 | 27.00 | 27.50 | 28.00 | 28.50 | 29.00 | 29.50 | 30.00 | 30.50 | 31.00 | 31.50 | 32.00 | 32.50 | 33.00 | 33.50 | 34.00 | 34.50 | 35.00 | 35.50 | 36.00 | 36.50 | 37.00 | 37.50 | 38.00 | 38.50 | 39.00 | 39.50 | 40.00 \";s:19:\"progressive_left_pd\";s:246:\"25.00 | 25.50 | 26.00 | 26.50 | 27.00 | 27.50 | 28.00 | 28.50 | 29.00 | 29.50 | 30.00 | 30.50 | 31.00 | 31.50 | 32.00 | 32.50 | 33.00 | 33.50 | 34.00 | 34.50 | 35.00 | 35.50 | 36.00 | 36.50 | 37.00 | 37.50 | 38.00 | 38.50 | 39.00 | 39.50 | 40.00 \";s:21:\"progressive_right_add\";s:81:\"0.75 | 1.00 | 1.25 | 1.50 | 1.75 | 2.00 | 2.25 | 2.50 | 2.75 | 3.00 | 3.25 | 3.50\";s:20:\"progressive_left_add\";s:81:\"0.75 | 1.00 | 1.25 | 1.50 | 1.75 | 2.00 | 2.25 | 2.50 | 2.75 | 3.00 | 3.25 | 3.50\";}'),('Premium', 'a:9:{s:24:\"premium_right_eye_sphere\";s:885:\"-16.00 | -15.75 | -15.50 | -15.25 | -15.00 | -14.75 | -14.50 | -14.25 | -14.00 | -13.75 | -13.50 | -13.25 | -13.00 | -12.75 | -12.50 | -12.25 | -12.00 | -11.75 | -11.50 | -11.25 | -11.00 | -10.75 | -10.50 | -10.25 | -10.00 | -9.75 | -9.50 | -9.25 | -9.00 | -8.75 | -8.50 | -8.25 | -8.00 | -7.75 | -7.50 | -7.25 | -7.00 | -6.75 | -6.50 | -6.25 | -6.00 | -5.75 | -5.50 | -5.25 | -5.00 | -4.75 | -4.50 | -4.25 | -4.00 | -3.75 | -3.50 | -3.25 | -3.00 | -2.75 | -2.50 | -2.25 | -2.00 | -1.75 | -1.50 | -1.25 | -1.00 | -0.75 | -0.50 | -0.25 | 0.00 | 0.25 | 0.50 | 0.75 | 1.00 | 1.25 | 1.50 | 1.75 | 2.00 | 2.25 | 2.50 | 2.75 | 3.00 | 3.25 | 3.50 | 3.75 | 4.00 | 4.25 | 4.50| 4.75 | 5.00 | 5.25 | 5.50 | 5.75 | 6.00 | 6.25 | 6.50 | 6.75 | 7.00 | 7.25 | 7.50 | 7.75 | 8.00 | 8.25 | 8.50 | 8.75 | 9.00 | 9.25 | 9.50 | 9.75 | 10.00 | 10.25 | 10.50 | 10.75 | 11.00 | 11.25 | 11.50 | 11.75 | 12.00\";s:26:\"premium_right_eye_cylinder\";s:365:\" -6.00 | -5.75 | -5.50 | -5.25 | -5.00 | -4.75 | -4.50 | -4.25 | -4.00 | -3.75 | -3.50 | -3.25 | -3.00 | -2.75 | -2.50 | -2.25 | -2.00 | -1.75 | -1.50 | -1.25 | -1.00 | -0.75 | -0.50 | -0.25 | 0.00 | 0.25 | 0.50 | 0.75 | 1.00 | 1.25 | 1.50 | 1.75 | 2.00 | 2.25 | 2.50 | 2.75 | 3.00 | 3.25 | 3.50 | 3.75 | 4.00 | 4.25 | 4.50| 4.75 | 5.00 | 5.25 | 5.50 | 5.75 | 6.00 \";s:23:\"premium_left_eye_sphere\";s:885:\"-16.00 | -15.75 | -15.50 | -15.25 | -15.00 | -14.75 | -14.50 | -14.25 | -14.00 | -13.75 | -13.50 | -13.25 | -13.00 | -12.75 | -12.50 | -12.25 | -12.00 | -11.75 | -11.50 | -11.25 | -11.00 | -10.75 | -10.50 | -10.25 | -10.00 | -9.75 | -9.50 | -9.25 | -9.00 | -8.75 | -8.50 | -8.25 | -8.00 | -7.75 | -7.50 | -7.25 | -7.00 | -6.75 | -6.50 | -6.25 | -6.00 | -5.75 | -5.50 | -5.25 | -5.00 | -4.75 | -4.50 | -4.25 | -4.00 | -3.75 | -3.50 | -3.25 | -3.00 | -2.75 | -2.50 | -2.25 | -2.00 | -1.75 | -1.50 | -1.25 | -1.00 | -0.75 | -0.50 | -0.25 | 0.00 | 0.25 | 0.50 | 0.75 | 1.00 | 1.25 | 1.50 | 1.75 | 2.00 | 2.25 | 2.50 | 2.75 | 3.00 | 3.25 | 3.50 | 3.75 | 4.00 | 4.25 | 4.50| 4.75 | 5.00 | 5.25 | 5.50 | 5.75 | 6.00 | 6.25 | 6.50 | 6.75 | 7.00 | 7.25 | 7.50 | 7.75 | 8.00 | 8.25 | 8.50 | 8.75 | 9.00 | 9.25 | 9.50 | 9.75 | 10.00 | 10.25 | 10.50 | 10.75 | 11.00 | 11.25 | 11.50 | 11.75 | 12.00\";s:25:\"premium_left_eye_cylinder\";s:365:\" -6.00 | -5.75 | -5.50 | -5.25 | -5.00 | -4.75 | -4.50 | -4.25 | -4.00 | -3.75 | -3.50 | -3.25 | -3.00 | -2.75 | -2.50 | -2.25 | -2.00 | -1.75 | -1.50 | -1.25 | -1.00 | -0.75 | -0.50 | -0.25 | 0.00 | 0.25 | 0.50 | 0.75 | 1.00 | 1.25 | 1.50 | 1.75 | 2.00 | 2.25 | 2.50 | 2.75 | 3.00 | 3.25 | 3.50 | 3.75 | 4.00 | 4.25 | 4.50| 4.75 | 5.00 | 5.25 | 5.50 | 5.75 | 6.00 \";s:17:\"premium_single_pd\";s:242:\"46.0 | 47.0 | 48.0 | 49.0 | 50.0 | 51.0 | 52.0 | 53.0 | 54.0 | 55.0 | 56.0 | 57.0 | 58.0 | 59.0 | 60.0 | 61.0 | 62.0 | 63.0 | 64.0 | 65.0 | 66.0 | 67.0 | 68.0 | 69.0 | 70.0 | 71.0 | 72.0 | 73.0 | 74.0 | 75.0 | 76.0 | 77.0 | 78.0 | 79.0 | 80.0\";s:16:\"premium_right_pd\";s:278:\"23.00 | 23.50 | 24.00 | 24.50 | 25.00 | 25.50 | 26.00 | 26.50 | 27.00 | 27.50 | 28.00 | 28.50 | 29.00 | 29.50 | 30.00 | 30.50 | 31.00 | 31.50 | 32.00 | 32.50 | 33.00 | 33.50 | 34.00 | 34.50 | 35.00 | 35.50 | 36.00 | 36.50 | 37.00 | 37.50 | 38.00 | 38.50 | 39.00 | 39.50 | 40.00 \";s:15:\"premium_left_pd\";s:246:\"25.00 | 25.50 | 26.00 | 26.50 | 27.00 | 27.50 | 28.00 | 28.50 | 29.00 | 29.50 | 30.00 | 30.50 | 31.00 | 31.50 | 32.00 | 32.50 | 33.00 | 33.50 | 34.00 | 34.50 | 35.00 | 35.50 | 36.00 | 36.50 | 37.00 | 37.50 | 38.00 | 38.50 | 39.00 | 39.50 | 40.00 \";s:17:\"premium_right_add\";s:81:\"0.75 | 1.00 | 1.25 | 1.50 | 1.75 | 2.00 | 2.25 | 2.50 | 2.75 | 3.00 | 3.25 | 3.50\";s:16:\"premium_left_add\";s:81:\"0.75 | 1.00 | 1.25 | 1.50 | 1.75 | 2.00 | 2.25 | 2.50 | 2.75 | 3.00 | 3.25 | 3.50\";}'),('Usage','a:3:{s:24:\"bifocal_additional_price\";s:2:\"90\";s:28:\"progressive_additional_price\";s:3:\"100\";s:24:\"premium_additional_price\";s:3:\"250\";}'),('Clear','a:3:{s:29:\"basic_lenses_additional_price\";s:2:\"50\";s:36:\"most_popular_lenses_additional_price\";s:2:\"90\";s:32:\"advanced_lenses_additional_price\";s:2:\"90\";}'),('BlueLight','a:4:{s:27:\"ebdblue_15_additional_price\";s:3:\"220\";s:27:\"ebdblue_16_additional_price\";s:3:\"280\";s:28:\"ebdblue_167_additional_price\";s:3:\"500\";s:28:\"ebdblue_174_additional_price\";s:3:\"650\";}'),('SunLens','a:5:{s:27:\"basic_tint_additional_price\";s:3:\"110\";s:37:\"gradient_tint_lenses_additional_price\";s:3:\"110\";s:30:\"mirrored_tint_additional_price\";s:3:\"280\";s:37:\"polarized_basic_tint_additional_price\";s:3:\"280\";s:40:\"polarized_mirrored_tint_additional_price\";s:3:\"380\";}'),('LightAdjusting','a:3:{s:29:\"photochromic_additional_price\";s:3:\"140\";s:37:\"trasitions_Signature_additional_price\";s:3:\"280\";s:37:\"transitions_xtrative_additional_price\";s:3:\"900\";}'),('CustomizeLens','a:6:{s:35:\"customize_index_15_additional_price\";s:3:\"320\";s:36:\"customize_index_157_additional_price\";s:3:\"280\";s:36:\"customize_index_159_additional_price\";s:3:\"380\";s:35:\"customize_index_16_additional_price\";s:3:\"450\";s:36:\"customize_index_167_additional_price\";s:3:\"550\";s:36:\"customize_index_174_additional_price\";s:3:\"600\";}'),
('SunLensColour','a:5:{s:23:\"basic_lens_tint_colours\";s:31:\"Gris | Marron | Azul | Amarillo\";s:26:\"gradient_lens_tint_colours\";s:31:\"Gris | Marron | Azul | Amarillo\";s:26:\"mirrored_lens_tint_colours\";s:32:\"Azul | Amarillo | Naranja | Gris\";s:33:\"polarized_basic_lens_tint_colours\";s:40:\"Azul | Amarillo | Naranja | Gris | Verde\";s:36:\"polarized_mirrored_lens_tint_colours\";s:40:\"Azul | Amarillo | Naranja | Gris | Verde\";}'),('LightAdjustingLensColour','a:3:{s:25:\"photochromic_tint_colours\";s:13:\"Gris | Marron\";s:34:\"transitions_signature_tint_colours\";s:13:\"Gris | Marron\";s:34:\"transitions_xtractive_tint_colours\";s:26:\"Signature gen8 | Xtractive\";}');";
			
			$wpdb->query($sqlins);
		}
	}
}