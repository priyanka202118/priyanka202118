<?php


class lw_Firebase_Authentication_Admin_Account {

	public static function verify_password() { 
		lw_firebase_auth_verify_password_ui(); 	
	}

	public static function register() {
		if(!lw_firebase_authentication_is_customer_registered()){
			lw_firebase_auth_register_ui();
		} else {
			lw_firenase_auth_show_customer_info();
		}
	}
}