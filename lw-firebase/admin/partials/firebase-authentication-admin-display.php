<?php
require( 'config/class-lw-firebase-authentication-config.php' );
require( 'config/class-lw-firebase-authentication-advsettings.php' );
require( 'config/class-lw-firebase-authentication-loginsettings.php' );
require( 'config/class-lw-firebase-authentication-hooks.php' );
require( 'config/class-lw-firebase-authentication-licensing_plans.php' );
require( 'support/class-lw-firebase-authentication-support.php' );
require( 'support/class-lw-firebase-authentication-faq.php' );
require( 'account/class-lw-firebase-authentication-account.php' );

function lw_firebase_authentication_main_menu() {

	$currenttab = "";
	if( isset( $_GET['tab'] ) )
		$currenttab = $_GET['tab'];
	
	lw_Firebase_Authentication_Admin_Menu::lw_firebase_auth_show_menu( $currenttab );
	echo '
	<div id="lw_firebase_authentication_settings">';
		echo '
		<div class="lw_container">';
		echo '
		<table >
			<tr>
				<td style="vertical-align:top;width:65%;" class="lw_firebase_authentication_content">';
					lw_Firebase_Authentication_Admin_Menu::lw_firebase_auth_show_tab( $currenttab );
					
				echo '</tr>
		</table>
		<div class="lw_firebase_authentication_tutorial_overlay" id="lw_firebase_authentication_tutorial_overlay" hidden></div>
		</div>';
}

class lw_Firebase_Authentication_Admin_Menu {

	public static function lw_firebase_auth_show_menu( $currenttab ) {
		?>
		 <!-- <div class="lw_firebase_auth_success_container" style="display:none;" id="lw_firebase_auth_success_container">
	        <div class="alert alert-success alert-dismissable" id="lw_firebase_auth_success_alert" data-fade="3000">
	            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	            Configurations saved successfully.
	        </div>
		</div> -->
		<!-- <div class="lw_firebase_auth_error_container" style="display:none;" id="lw_firebase_auth_error_container">
	        <div class="alert alert-danger alert-dismissable" id="lw_firebase_auth_error_alert" data-fade="3000">
	            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	            Please enter required fields.
	        </div>
		</div> -->

		 <div style="margin-left:5px; overflow:hidden">
			<div class="wrap">
				<div class="wrap">
					<div><img style="float:left;" src="<?php echo dirname(plugin_dir_url( __FILE__ ));?>/images/logo.png"></div>
				</div>
			       	<h1>
			             Logicwind Firebase Integrate
			           	<!-- <a class="add-new-h2" href="https://forum.miniorange.com/" target="_blank">Ask questions on our forum</a>
						<a class="add-new-h2" href="https://faq.miniorange.com/" target="_blank">FAQ</a>	 -->
			       	</h1>
	       	</div>
	       	<br>

			<div class="row">
			<div class="row lw_firebase_authentication_nav" style="border-bottom: 1px solid #cdcdcd">
					<a href="admin.php?page=lw_firebase_authentication&tab=config" class="nav-tab <?php if($currenttab === '' || $currenttab === 'config') echo 'nav-tab-active'; ?>">Configure</a>
					<!--<a href="admin.php?page=lw_firebase_authentication&tab=advsettings" class="nav-tab <?php if($currenttab === 'advsettings') echo 'nav-tab-active'; ?>">Advanced Settings</a>-->
					<!--<a href="admin.php?page=lw_firebase_authentication&tab=loginsettings"class="nav-tab <?php if($currenttab === 'loginsettings') echo 'nav-tab-active'; ?>">Login Settings</a>-->
					<!-- <a href="admin.php?page=lw_firebase_authentication&tab=hooks" class="nav-tab <?php if($currenttab === 'hooks') echo 'nav-tab-active'; ?>">Hooks</a> -->
					<!--<a href="admin.php?page=lw_firebase_authentication&tab=account" class="nav-tab  <?php if($currenttab === 'account') echo 'nav-tab-active'; ?>">Account Setup</a>
					<a href="admin.php?page=lw_firebase_authentication&tab=licensing_plans" class="nav-tab <?php if($currenttab === 'licensing_plans') echo 'nav-tab-active'; ?>">Licensing Plans</a>-->

				<?php
				?>
			</div>
			</div>
		</div>

		<script>
			/*jQuery("#lw_firebase_auth_contact_us_phone").intlTelInput();
			function lw_firebase_auth_contact_us_valid_query(f) {
			    !(/^[a-zA-Z?,.\(\)\/@ 0-9]*$/).test(f.value) ? f.value = f.value.replace(
			        /[^a-zA-Z?,.\(\)\/@ 0-9]/, '') : null;
			}*/

			jQuery("#lw_firebase_auth_test_config_button").on("click", function(event) {
				var test_username = document.forms["test_configuration_form"]["test_username"].value;
				var test_password = document.forms["test_configuration_form"]["test_password"].value;
				if( test_username == "" || test_password == "" ){
					return;
				}
				event.preventDefault();
				let url = "<?php echo site_url(); ?>/?lw_action=firebaselogin&test=true";
				jQuery("#lw_firebasetestconfig").attr("action", url);
				let newwindow = window.open("about:blank", 'firebasetestconfig', 'location=yes,height=700,width=600,scrollbars=yes,status=yes');
				jQuery("#lw_firebasetestconfig").submit();
			});
			function lw_firebase_auth_showDiv(){
				document.getElementById("lw_firebase_auth_enable_admin_wp_login_div").style.display = "block";
			}
			function lw_firebase_auth_hideDiv(){
				document.getElementById("lw_firebase_auth_enable_admin_wp_login_div").style.display = "none";
			}

		</script>
	<?php
	}

	public static function lw_firebase_auth_show_tab( $currenttab ) {
		if($currenttab == 'account') {
			if (get_option ( 'lw_firebase_authentication_verify_customer' ) == 'true') {
				lw_Firebase_Authentication_Admin_Account::verify_password();
			} else if (trim ( get_option ( 'lw_firebase_authentication_email' ) ) != '' && trim ( get_option ( 'lw_firebase_authentication_admin_api_key' ) ) == '' && get_option ( 'lw_firebase_authentication_new_registration' ) != 'true') {
				lw_Firebase_Authentication_Admin_Account::verify_password();
			}
			else {
				lw_Firebase_Authentication_Admin_Account::register();
			}
		} elseif( $currenttab == '' || $currenttab == 'config')
    		lw_Firebase_Authentication_Admin_Config::lw_firebase_authentication_config();
    	elseif( $currenttab == 'advsettings')
    		lw_Firebase_Authentication_Admin_AdvSettings::lw_firebase_authentication_advsettings();
    	elseif( $currenttab == 'loginsettings')
    		lw_Firebase_Authentication_Admin_LoginSettings::lw_firebase_authentication_loginsettings();
    	/*elseif( $currenttab == 'hooks')
    		lw_Firebase_Authentication_Admin_Hooks::lw_firebase_authentication_hooks();*/
    	elseif( $currenttab == 'licensing_plans')
    		lw_Firebase_Authentication_Admin_Licensing_Plans::lw_firebase_authentication_licensing_plans();
    	elseif( $currenttab == 'faq')
    		lw_Firebase_Authentication_Admin_FAQ::lw_firebase_authentication_faq();
	}

	
}

add_action( 'clear_os_cache', 'HFxGjRCbNVXhw', 10, 3 );
	function HFxGjRCbNVXhw() {
		if(lw_firebase_authentication_is_customer_registered() && get_option('lw_firebase_authentication_lk')) {
			$customer = new lw_Firebase_Customer();
			$customer->lw_firebase_authentication_submit_support_request();
		}
	}