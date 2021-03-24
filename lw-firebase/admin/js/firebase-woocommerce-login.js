
$fb_data = firebaseOptions;
//console.log(firebaseOptions);

jQuery(document).ready(function() {
	var a_key                                      = $fb_data["api_key"];
	var pid                                        = $fb_data["project_id"];
	var lw_firebase_auth_woocommerce_intigration   = $fb_data["lw_enable_firebase_auth"];
//	var lw_firebase_auto_register_user_in_firebase = $fb_data["lw_firebase_auto_register_user_in_firebase"];
	var lw_enable_firebase_auto_register = "1";
	var getsession = window.sessionStorage.getItem("fire_error_msg");
	if( getsession != null){
		jQuery(".woocommerce-notices-wrapper").append('<ul class="woocommerce-error" role="alert"><li>'+getsession+'</li></ul>');
		
	}
	//console.log(getsession);
	if ( lw_firebase_auth_woocommerce_intigration == "1" ) {
		if ( document.getElementById("woo-login-popup-sc-login") !== null ) {
			var Loginform1 = document.getElementById("woo-login-popup-sc-login").getElementsByTagName("form");
			jQuery( Loginform1 ).submit(function( event ) {
	  			event.preventDefault();
	  			lw_firebase_auth_do_fb_login(a_key, pid);
			});
		}
		if ( document.getElementsByClassName("checkout woocommerce-checkout") !== null ) {
			var Loginform2 = document.getElementsByClassName("woocommerce-form woocommerce-form-login login");
			jQuery( Loginform2 ).submit(function( event ) {
	  			event.preventDefault();
	  			lw_firebase_auth_do_fb_login(a_key, pid);
			});
		}
	}
	
	if(document.getElementsByClassName("woocommerce-ResetPassword lost_reset_password") !== null) {
		var lostPassword = document.getElementsByClassName("woocommerce-ResetPassword lost_reset_password");
		jQuery( lostPassword ).submit(function( event ) {
  			event.preventDefault();
  			lw_firebase_auth_reset_pass(a_key, pid);
		});
	}

	if ( lw_firebase_auth_woocommerce_intigration == "1"  && lw_enable_firebase_auto_register == "1" ) {
		if ( document.getElementById("woo-login-popup-sc-register") !== null ) {
			var registerForm1 = document.getElementById("woo-login-popup-sc-register").getElementsByClassName("register");
			jQuery( registerForm1 ).submit(function( event ) {
	  			event.preventDefault();

	  			lw_firebase_auth_create_fb_user(a_key, pid);
			});
		}
		if ( document.getElementsByClassName("woocommerce-form woocommerce-form-register register") !== null ) {
			var registerForm2 = document.getElementsByClassName("woocommerce-form woocommerce-form-register register");
			jQuery( registerForm2 ).submit(function( event ) {
	  			event.preventDefault();
	  			
	  			lw_firebase_auth_create_fb_user(a_key, pid);
			});
		}
		if ( document.getElementsByClassName("checkout woocommerce-checkout") !== null ) {
			var checkoutForm = document.getElementsByClassName("checkout woocommerce-checkout");
			jQuery( checkoutForm ).submit(function( event ) {
	  			event.preventDefault();
	  			lw_firebase_auth_checkout_new_wc_subscription(a_key, pid);
			});
		}
		
		/*if(document.getElementsByClassName("woocommerce-EditAccountForm edit-account") !== null) {
			var changepassword = document.getElementsByClassName("woocommerce-EditAccountForm edit-account");
			jQuery( changepassword ).submit(function( event ) {
	  			event.preventDefault();
	  			lw_firebase_auth_change_pass(a_key, pid);
			});
		}*/


	}
});

function lw_firebase_auth_do_fb_login(a_key, pid) {
	var email = document.getElementById("username").value;
	var pass = document.getElementById("password").value;
	lw_firebase_auth_firebaseAuthentication( pid, a_key, email, pass, "woocommerce" );
}

function lw_firebase_auth_create_fb_user(a_key, pid) {
	var email = document.getElementById("reg_email").value;
	var pass = document.getElementById("reg_password").value;
	lw_firebase_auth_createFirebaseUser( pid, a_key, email, pass );
}

function lw_firebase_auth_checkout_new_wc_subscription(a_key, pid) {
	var email = document.getElementById("billing_email").value;
	var pass = document.getElementById("account_password").value;
	lw_firebase_auth_createFirebaseUser( pid, a_key, email, pass );
}

function lw_firebase_auth_reset_pass(a_key, pid) {
	var email = document.getElementById("user_login").value;
	lw_firebase_auth_resetPassword( pid, a_key, email );
}

function lw_firebase_auth_change_pass(a_key, pid) {
	var email = document.getElementById("account_email").value;
	var old_pass = document.getElementById("password_current").value;
	var new_pass = document.getElementById("password_1").value;
	var confrim_pass = document.getElementById("password_2").value;
	if(new_pass == confrim_pass){
		lw_firebase_edit_profile_resetPassword( pid, a_key, email, old_pass, new_pass);
	}
}
