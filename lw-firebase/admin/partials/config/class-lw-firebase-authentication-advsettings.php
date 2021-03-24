<?php


class lw_Firebase_Authentication_Admin_AdvSettings {
	
	public static function lw_firebase_authentication_advsettings() {
	?>

	<div class="row">
		<div class="col-md-12">
			<div class="lw_firebase_auth_card" style="width:100%">
				<form name="integration_form" id="lw_firebase_auth_integration"  method="post" style="margin-bottom: 10px;">
					
					<input type="hidden" name="option" value="lw_firebase_auth_integration" style="margin-top: 0px; margin-bottom: 0px;">
					<div style="display: inline-block;"><h3 style="margin: 15px 0;">Login & Registeration Form Integration</h3></div>&nbsp;<small style="color: #FF0000"><a href="admin.php?page=lw_firebase_authentication&tab=licensing_plans">[PREMIUM]</a></small>
					<table class="lw_settings_table" style="width: 95%;">
					<tr><td>Select below if you want to allow users to login using firebase credentials with third party or custom login/registration page.</td></tr>
					<tr><td></td></tr><tr><td></td></tr>
					<tr><td>
					<input type="checkbox" name = "lw_firebase_auth_woocommerce_intigration" id = "lw_firebase_auth_woocommerce_intigration" value= "1" onclick="lw_firebase_auth_manageWCDiv();" disabled>
						<img src="<?php echo dirname(plugin_dir_url( __FILE__ ));?>/../images/woocommerce-circle.png" width="50px">&nbsp;&nbsp;WooCommerce
						</td></tr><tr><td>
					<input type="checkbox" name = "lw_firebase_auth_buddypress_intigration"value="1" disabled>
						<img src="<?php echo dirname(plugin_dir_url( __FILE__ ));?>/../images/buddypress.png" width="50px">&nbsp;&nbsp;BuddyPress
				    	</td></tr>
			    	</table>
			    	<input type="submit" style="text-align:center; font-size: 14px; font-weight: 400; margin-top: 10px;" class="btn btn-primary" name="integration_settings" value=" Save Settings" id = "lw_auth_integration_save_settings_button" disabled><br>
			    </form>
			</div>
		</div>
	</div>
	
	<?php
	}
}