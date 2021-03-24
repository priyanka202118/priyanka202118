<?php


function lw_firebase_auth_register_ui() {
	update_option ( 'lw_firebase_authentication_new_registration', 'true' );
	$current_user = wp_get_current_user();
	?>
		<form name="f" method="post" action="">
			<input type="hidden" name="option" value="lw_firebase_authentication_register_customer" />
			<div class="" style="width:100%">
				<div class="lw_table_layout">
					<h3 style="margin-top: 0px;">Register with miniOrange<small style="font-size: x-small;"> [OPTIONAL]</small></h3>
					<p style="font-size:14px;"><strong style="font-weight: 600;">Why should I register? </strong></p>
	                    <div id="help_register_desc" style="background: aliceblue; padding: 10px 10px 10px 10px; border-radius: 10px;font-size: 12px;">
	                        You should register so that in case you need help, we can help you with step by step instructions.
	                        <b>You will also need a miniOrange account to upgrade to the premium version of the plugins.</b> We do not store any information except the email that you will use to register with us.
	                    </div>
                    </p>
					<table class="lw_settings_table">
						<tr>
							<td><strong><font color="#FF0000">*</font>Email:</strong></td>
							<td><input class="lw_table_textbox3" type="email" name="email"
								required placeholder="person@example.com"
								value="<?php echo get_option('lw_firebase_authentication_admin_email');?>" />
							</td>
						</tr>
						<tr class="hidden">
							<td><b><font color="#FF0000">*</font>Website/Company Name:</b></td>
							<td><input class="" type="text" name="company"
							required placeholder="Enter website or company name"
							value="<?php echo $_SERVER['SERVER_NAME']; ?>"/></td>
						</tr>
						<tr  class="hidden">
							<td><b>&nbsp;&nbsp;First Name:</b></td>
							<td><input class="" type="text" name="fname"
							placeholder="Enter first name" value="<?php echo $current_user->user_firstname;?>" /></td>
						</tr>
						<tr class="hidden">
							<td><b>&nbsp;&nbsp;Last Name:</b></td>
							<td><input class="" type="text" name="lname"
							placeholder="Enter last name" value="<?php echo $current_user->user_lastname;?>" /></td>
						</tr>

						<tr  class="hidden">
							<td><b>&nbsp;&nbsp;Phone number :</b></td>
							 <td><input class="" type="text" name="phone" pattern="[\+]?([0-9]{1,4})?\s?([0-9]{7,12})?" id="phone" title="Phone with country code eg. +1xxxxxxxxxx" placeholder="Phone with country code eg. +1xxxxxxxxxx" value="<?php echo get_option('lw_firebase_authentication_admin_phone');?>" />
							 This is an optional field. We will contact you only if you need support.</td>
							</tr>
						</tr>
						<tr  class="hidden">
							<td></td>
							<td>We will call only if you need support.</td>
						</tr>
						<tr>
							<td><strong><font color="#FF0000">*</font>Password:</strong></td>
							<td><input class="lw_table_textbox3" required type="password"
								name="password" placeholder="Choose your password (Min. length 8)" /></td>
						</tr>
						<tr>
							<td><strong><font color="#FF0000">*</font>Confirm Password:</strong></td>
							<td><input class="lw_table_textbox3" required type="password"
								name="confirmPassword" placeholder="Confirm your password" /></td>
						</tr>
						<tr>
							<td>&nbsp;&nbsp;</td>
							<td>&nbsp;&nbsp;</td>
						</tr>
						<tr>
							<td>&nbsp;&nbsp;</td>
							<td><input type="submit" name="submit" value="Register" class="button button-primary button-large" style="margin-right: 15%;"/><input  type="button" name="lw_firebase_authentication_goto_login" id="lw_firebase_authentication_goto_login" value="Already have an account?" class="button button-primary button-large" /></td>
						</tr>
					</table>
					<!-- <div style="width: 50%; margin:auto;">
							<br><input type="submit" name="submit" value="Register" class="button button-primary button-large" style="margin-right: 15%;"/>
                            <input  type="button" name="lw_firebase_authentication_goto_login" id="lw_firebase_authentication_goto_login" value="Already have an account?" class="button button-primary button-large" /><br>
					</div> -->
					<br>
				</div>
			</div>
		</form>
			<form name="f1" method="post" action="" id="lw_firebase_authentication_goto_login_form">
            <?php wp_nonce_field("lw_firebase_authentication_goto_login_form", "lw_firebase_authentication_goto_login_form_field");?>
                <input type="hidden" name="option" value="lw_firebase_authentication_goto_login"/>
            </form>
            <script>
            	jQuery("#phone").intlTelInput();
                jQuery('#lw_firebase_authentication_goto_login').click(function () {
                    jQuery('#lw_firebase_authentication_goto_login_form').submit();
                } );
            </script>
		<?php
}

function lw_firenase_auth_show_customer_info() {
	?>
	<div class="lw_table_layout">
		<h6 style="margin-top: 0px;">Thank you for registering with miniOrange.</h6><br>

		<table border="1"
		   style="background-color:#FFFFFF; border:1px solid #CCCCCC; border-collapse: collapse; padding:0px 0px 0px 10px; margin:2px; width:85%">
			<tr>
				<td style="width:45%; padding: 10px;">miniOrange Account Email</td>
				<td style="width:55%; padding: 10px;"><?php echo get_option( 'lw_firebase_authentication_admin_email' ); ?></td>
			</tr>
			<tr>
				<td style="width:45%; padding: 10px;">Customer ID</td>
				<td style="width:55%; padding: 10px;"><?php echo get_option( 'lw_firebase_authentication_admin_customer_key' ) ?></td>
			</tr>
		</table>
		<br /><br />

		<table>
			<tr>
			<td>
			<form name="f1" method="post" action="" id="lw_firebase_authentication_goto_login_form">
				<input type="hidden" value="change_lwfirebase" name="option"/>
				<input type="submit" value="Change Email Address" class="button button-primary button-large"/>
			</form>
			</td><td>
			<!-- <a href="<?php //echo add_query_arg( array( 'tab' => 'licensing' ), htmlentities( $_SERVER['REQUEST_URI'] ) ); ?>"><input type="button" class="button button-primary button-large" value="Check Licensing Plans"/></a> -->
			</td>
			</tr>
		</table>
		<br>
	</div>

	<?php
}