<?php 

function lw_firebase_auth_verify_password_ui() {
		?>
		<form name="f" method="post" action="">
			<input type="hidden" name="option" value="lw_firebase_authentication_verify_customer" />
			<div class="lw_firebase_auth_card" style="width:100%">
				<!-- <div id="toggle1" class="lw_panel_toggle"> -->
					<h3>Login with miniOrange</h3>
				<!-- </div> -->
				<p style="font-size: 12px; font-weight: 550;">It seems you already have an account with miniOrange. Please enter your miniOrange email and password.<br/> <a href="#lw_firebase_authentication_forgot_password_link">Click here if you forgot your password?</a>
				</p>

				<table class="lw_settings_table">
					<tr>
						<td><strong><font color="#FF0000">*</font>Email:</strong></td>
						<td><input class="lw_table_textbox3" type="email" name="email"
							required placeholder="person@example.com"
							value="<?php echo get_option('lw_firebase_authentication_admin_email');?>" /></td>
					</tr>
					<tr>
						<td><strong><font color="#FF0000">*</font>Password:</strong></td>
						<td><input class="lw_table_textbox3" required type="password"
							name="password" placeholder="Choose your password" /></td>
					</tr>
					<tr>
						<td>&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;&nbsp;</td>
						<td><input type="submit" name="submit" value="Login"
							class="button button-primary button-large" /><input type="button" name="back-button" id="lw_firebase_authentication_back_button" onclick="document.getElementById('lw_firebase_authentication_change_email_form').submit();" value="Back" class="button button-primary button-large" style="margin-left: 20%;" /></td>
					</tr>
				</table>
				<br>
				<!-- <div style="margin-bottom: 20px;">
					<div style="width: 50%; margin:0 auto;">
					<input type="submit" name="submit" value="Login"
						class="button button-primary button-large" />

					<input type="button" name="back-button" id="lw_firebase_authentication_back_button" onclick="document.getElementById('lw_firebase_authentication_change_email_form').submit();" value="Back" class="button button-primary button-large" style="margin-left: 20%;" /></div></div> -->
			</div>
		</form>
					
		<form id="lw_firebase_authentication_change_email_form" method="post" action="">
			<input type="hidden" name="option" value="lw_firebase_authentication_change_email" />
		</form>

		<!-- <form name="f" method="post" action="" id="lw_firebase_authentication_forgotpassword_form">
			<input type="hidden" name="option" value="lw_firebase_authentication_forgot_password_form_option"/>
		</form> -->
		<script>
			jQuery("a[href=\"#lw_firebase_authentication_forgot_password_link\"]").click(function(){
				window.open('https://login.xecurify.com/moas/idp/resetpassword');
				//jQuery("#lw_firebase_authentication_forgotpassword_form").submit();
			});
		</script>
		<?php
	}