<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://miniorange.com
 * @since      1.0.0
 *
 * @package    Firebase_Authentication
 * @subpackage Firebase_Authentication/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Firebase_Authentication
 * @subpackage Firebase_Authentication/includes
 */
class lw_Firebase_Authentication_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		do_action( 'clear_os_cache' ); 
		delete_option( 'host_name' );
		delete_option(' lw_firebase_authentication_lv' );
		delete_option(' lw_firebase_authentication_lk' );
		delete_option( 'lw_firebase_authentication_new_registration' );
		delete_option( 'lw_firebase_authentication_admin_phone' );
		delete_option( 'lw_firebase_authentication_verify_customer' );
		delete_option( 'lw_firebase_authentication_admin_customer_key' );
		delete_option( 'lw_firebase_authentication_admin_api_key' );
		delete_option( 'lw_firebase_authentication_new_customer' );
		delete_option( 'lw_firebase_authentication_customer_token' );
		delete_option( 'lw_firebase_auth_message' );
		delete_option( 'lw_firebase_authentication_registration_status' );
		delete_option( 'lw_firebase_authentication_current_plugin_version' );
	}

}
