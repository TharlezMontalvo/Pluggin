<?php
/*
Plugin Name: Advanced Lens Woocommerce 2.0
Description: Wordpress EYE Glasses and Lenses Prescription Woocommerce Plugin builds your Eye Glasses and Lenses Website quickly and easily. It features popular Prescription, Select Lenses and their Addons.
Version: 2.0
Author: Softprodigy
*/


	# Plugin activation hook
	// Require once the Composer Autoload
	if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
		require_once dirname( __FILE__ ) . '/vendor/autoload.php';
	}
	
	/**
	 * The code that runs during plugin activation
	 */
	function activate_advanced_lens_plugin() {
		Inc\Base\Activate::activate();
	}
	register_activation_hook( __FILE__, 'activate_advanced_lens_plugin' );

	/**
	 * The code that runs during plugin deactivation
	 */
	function deactivate_advanced_lens_plugin() {
		Inc\Base\Deactivate::deactivate();
	}
	register_deactivation_hook( __FILE__, 'deactivate_advanced_lens_plugin' );
	
	/**
	 * The code that runs during plugin deactivation
	 */
	function uninstall_advanced_lens_plugin() {
		Inc\Base\Uninstall::uninstall();
	}
	register_uninstall_hook(__FILE__, 'uninstall_advanced_lens_plugin');
	
	
	/**
	 * Initialize all the core classes of the plugin
	 */
	if ( class_exists( 'Inc\\Init' ) ) {
		Inc\Init::register_services();
	}

