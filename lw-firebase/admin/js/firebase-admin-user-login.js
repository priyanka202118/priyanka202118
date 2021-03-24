
$fb_data = firebaseOptions ;

jQuery(document).ready(function() {

	var a_key                                      = $fb_data["apiKey"];
	var pid                                        = $fb_data["projectId"];
	var lw_firebase_auth_woocommerce_intigration   = $fb_data["lw_enable_firebase_auth"];
	var admin_login = "admin_user";

//	var lw_firebase_auto_register_user_in_firebase = $fb_data["lw_firebase_auto_register_user_in_firebase"];
	var lw_enable_firebase_auto_register ="1";
	


	if ( lw_firebase_auth_woocommerce_intigration == "1"  && lw_enable_firebase_auto_register == "1" ) {
		
		if ( document.getElementById("createuser") !== null ) {
			var registerForm2 = document.getElementById("createuser");
			jQuery( registerForm2 ).submit(function( event ) {
	  			
	  			event.preventDefault();	  			
	  			lw_firebase_auth_create_admin_user(a_key, pid,admin_login);

			});
		}
		

	}
});

function lw_firebase_auth_do_admin_login(a_key, pid) {
	var email            = document.getElementById("username").value;
	var pass             = document.getElementById("password").value;
	lw_firebase_auth_firebaseAuthentication( pid, a_key, email, pass, "woocommerce" );
}

function lw_firebase_auth_create_admin_user(a_key, pid, admin_login) {
	var email            = document.getElementById("email").value;
	var pass             = document.getElementById("pass1").value;
	lw_firebase_auth_admin_createFirebaseUser( pid, a_key, email, pass,admin_login);
}


/*
function lw_firebase_auth_reset_pass(a_key, pid) {
	var email            = document.getElementById("user_login").value;
	lw_firebase_auth_resetPassword( pid, a_key, email );
}*/