<?php

/**
 * Fired when the plugin is uninstalled.
 *
*/
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) )
	exit;

delete_option( 'lw_firebase_auth_project_id' );
delete_option( 'lw_firebase_auth_api_key' );
delete_option( 'lw_enable_firebase_auth' );
delete_option( 'lw_firebase_auth_disable_wordpress_login' );
delete_option( 'lw_firebase_auth_enable_admin_wp_login' );
delete_option( 'lw_firebase_auth_api_key' );
delete_option( 'lw_firebase_auth_kid1' );
delete_option( 'lw_firebase_auth_cert1' );
delete_option( 'lw_firebase_auth_kid2' );
delete_option( 'lw_firebase_auth_cert2' );
delete_option( 'lw_firebase_auth_woocommerce_intigration' );
//delete_option( 'lw_firebase_auto_register_user_in_firebase' );
delete_option( 'lw_enable_firebase_auto_register' );
delete_option( 'lw_firebase_auth_buddypress_intigration' );
delete_option( 'host_name' );
?>