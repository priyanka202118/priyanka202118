<?php

class lw_Firebase_Authentication_Admin_Config {
	
	public static function lw_firebase_authentication_config() {
	?>
	<!-- <div id="lw_firebase_authentication_support_layout" class="lw_firebase_authentication_support_layout"> -->
	<div class="row">
			<div class="col-md-12" >
				<div>
					<div class="lw_table_layout" style="padding-top: 0px;">
						<form action="" method="post" id="lw_enable_firebase_auth_form">
							<?php wp_nonce_field('lw_firebase_auth_enable_form','lw_firebase_auth_enable_field'); ?>
							<!-- <div style="display:inline"><div style="display:inline-block;padding:0px 10px 10px 0px"><strong>Enable Firebase Authentication:</strong></div> -->
								<div style="display:inline-block; margin-top: 0"><label class="lw_firebase_auth_switch">
									<input value="1" name="lw_enable_firebase_auth" type="checkbox" id="lw_enable_firebase_auth" <?php  echo get_option('lw_enable_firebase_auth') ? 'checked' : '' ?>>
									<span class="lw_firebase_auth_slider round"></span>
									<input type="hidden" name="option" value="lw_enable_firebase_auth">
									</label>
								</div>
								<div style="display:inline"><div style="display:inline-block;padding:0px 10px 10px 0px"><h3>Enable Firebase Authentication</h3></div>
							
							</div>
						</form>
						<form action="" method="post" id="lw_firebase_auth_form" style="margin-top: 0px;">
							<?php wp_nonce_field('lw_firebase_auth_config_form','lw_firebase_auth_config_field'); ?>
						<table class="lw_settings_table">	
							
							<tr><td colspan="2">
							<div style="padding:5px;"></div>
							<div style="<?php if(get_option('lw_firebase_auth_disable_wordpress_login') == 1) echo "display: block";else echo "display: none";?>"id="lw_firebase_auth_enable_admin_wp_login_div">
								<p>Enabling Firebase login will restrict logins with only Firebase credentials and won't allow WP login. <b>Please enable this only after you have successfully tested your configuration</b> as the default WordPress login will stop working.
								</p><div style="margin-bottom: 15px;">
								<input type="checkbox" id="lw_firebase_auth_enable_admin_wp_login" name="lw_firebase_auth_enable_admin_wp_login" value="1" <?php checked((esc_attr(get_option('lw_firebase_auth_enable_admin_wp_login')) === false) || (esc_attr(get_option('lw_firebase_auth_enable_admin_wp_login')) == 1));?> /> Allow Administrators to use WordPress login<div class="lw-firebase-auth-tooltip">&#x1F6C8;<div class="lw-firebase-auth-tooltip-text lw-tt-right">Selecting this option will only allow Wordpress Administrators to log in.</div> </div></div>	
							</div></td></tr>
							</table>
							<div style="margin-top: 10px;">
							<font color="#FF0000">*</font><strong>Project Id</strong></div><div style="margin-top: 10px;">
							<input type="text" id="project_id" name="projectid" value= "<?php echo get_option( 'lw_firebase_auth_project_id' ); ?>" placeholder="Enter Project Id.." required="" style = "width:80%;"></div><br>
							<font color="#FF0000">*</font><strong>API Key</strong><br>
							<input style = "width:80%;" type="text" id="api_key" name="apikey" value="<?php echo get_option( 'lw_firebase_auth_api_key' ); ?>" placeholder="Enter your API Key.." required="">
							<!--<i class="fa fa-eye" id="show_button" onclick="passwordShowButton('api_key', this.id)" style="margin-left: -30px; cursor: pointer; "></i>-->
							<br><br>
							<font color="#FF0000">*</font><strong>Database Url</strong><br>
							<input style = "width:80%;" type="text" id="databaseURL" name="database_url" value="<?php echo get_option( 'lw_firebase_database_url' ); ?>" placeholder="Enter your Database URL" required="">
							<br>
							<span style="color: #8c8f94;font-size: 12px;">Note:  Database Url example https://YOUR-PROJECT-ID.firebaseio.com</span>
							<br>

							<input type="submit" class="button button-primary button-large" style="margin-top: 10px; width:140px;" name="verify_user" value=" Save Configuration" id = "lw_auth_configure_button">
						</form>
					</div>
				</div>
				<div>
					<div class="lw_table_layout" id ="test_authentication" style="width:100%" >
						<h3 style="margin: 0px;">Test Authentication</h3>
						<form name="test_configuration_form" id="lw_firebasetestconfig"  method="post" target="firebasetestconfig" style="margin-top: 0px;">
							<?php wp_nonce_field('lw_firebase_auth_test_config_form','lw_firebase_auth_test_config_field'); ?>
							
							<input type="hidden" name="option" value="lw_firebase_auth_test_configuration">
							<table class="lw_settings_table" >
							<tr><td>
							<strong>Username</strong></td><td><input type="text" id="test_username" name="test_username" value="" placeholder="Username"  required="" class="lw_table_short_textbox" style="width:40%;"></td></tr> <tr><td></td></tr><tr><td>
							<strong>Password</strong></td><td><input type="password" id="test_password" name="test_password" value="" placeholder="Password" required="" class="lw_table_short_textbox" style="width:40%;">
							<i class="fa fa-eye" id="show_button1" onclick="passwordShowButton('test_password', this.id)" style="margin-left: -30px; cursor: pointer; "></i>
							</td></tr><br></table>
							<input type="hidden" id="test_check_field" name="test_check_field" value="test_check_true">
							<br>
							<input type="submit" id="lw_firebase_auth_test_config_button" name="test_configuration" value="Test Authentication" <?php if( ! get_option( 'lw_firebase_auth_project_id' ) && ! get_option( 'lw_firebase_auth_api_key' ) ) echo 'disabled class="btn btn-primary" style="font-size: 14px; font-weight: 400;"'; else echo 'class="button button-primary button-large"' ?> >
						</form>
					</div>
				</div>
				
		</div>
	</div>
	<script>

	function passwordShowButton(id1, id2){
		var field = document.getElementById(id1);
		var show_button = document.getElementById(id2);
		if(field.type == "password"){
			field.type = "text";
			show_button.className = "fa fa-eye-slash";
		}
		else{
			field.type = "password";
			show_button.className = "fa fa-eye";
		}
	}
		
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
}