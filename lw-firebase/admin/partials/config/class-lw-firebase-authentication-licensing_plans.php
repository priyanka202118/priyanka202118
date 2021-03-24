<?php
	
	class lw_Firebase_Authentication_Admin_Licensing_Plans {
	
		public static function lw_firebase_authentication_licensing_plans(){
			?>
			<style>
				.buy_button {
				    color: #ffffff;
				    background: radial-gradient(circle, #563d7c, #452c6b);
				    border-color: #563d7c;
				}
				.buy_button:hover {
					color: #ffffff;
					background: radial-gradient(circle, #452c6b, #563d7c);
				}

			</style>
			<!-- Important JSForms -->
	        <input type="hidden" value="<?php echo lw_firebase_authentication_is_customer_registered();?>" id="lw_customer_registered">
	        <form style="display:none;" id="loginform"
	              action="<?php echo get_option( 'host_name' ) . '/moas/login'; ?>"
	              target="_blank" method="post">
	            <input type="email" name="username" value="<?php echo get_option( 'lw_firebase_authentication_admin_email' ); ?>"/>
	            <input type="text" name="redirectUrl"
	                   value="<?php echo get_option( 'host_name' ) . '/moas/initializepayment'; ?>"/>
	            <input type="text" name="requestOrigin" id="requestOrigin"/>
	        </form>
	        <form style="display:none;" id="viewlicensekeys"
	              action="<?php echo get_option( 'host_name' ) . '/moas/login'; ?>"
	              target="_blank" method="post">
	            <input type="email" name="username" value="<?php echo get_option( 'lw_firebase_authentication_admin_email' ); ?>"/>
	            <input type="text" name="redirectUrl"
	                   value="<?php echo get_option( 'host_name' ) . '/moas/viewlicensekeys'; ?>"/>
	        </form>
	        <!-- End Important JSForms -->
			<div class="row" style="width: 100%; margin: 0 auto;">
				<div class="col-1 moct-align-center"></div>
				<div class="col_4 moct-align-center">
					<div class="moc-licensing-plan card-body" style="background-color: white">
					    <div class="moc-licensing-plan-header">
					        <div class="moc-licensing-plan-name"><h2>Premium</h2></div>
					    </div><br>
					    <div class="moc-licensing-plan-price"><sup>$</sup>149<sup>*</sup></div>
					    <h3>[WooCommerce Integration]</h3>
					    <!-- <a class="btn btn-block btn-info text-uppercase moc-lp-buy-btn" href="mailto:info@xecurify.com" target="_blank">Contact Us</a> -->
					    <button class="btn btn-block btn-info text-uppercase moc-lp-buy-btn" onclick="upgradeform('wp_oauth_firebase_authentication_premium_plan')">Buy Now</button>
					    <br>
					    <div class="moc-licensing-plan-feature-list">
					        <ul>
					        	<li>Allow login with Firebase and WordPress</li>
					        	<li>Attribute mapping</li>
					            <li>Auto register users in Firebase as well as WordPress</li>
					            <li>Login & Registeration Form Integration (WooCommerce, BuddyPress)</li>
					            <li>Custom redirect URL after Login and Logout</li>
					            <li>WP hooks to integrate your Custom/Third party Login and Registration forms</li>
					        </ul>
					    </div>
					</div>
				</div>
				<div class="col_1 moct-align-center"></div>
				<div class="col_4 moct-align-center">
					<div class="moc-licensing-plan card-body" style="background-color: white">
					    <div class="moc-licensing-plan-header">
					        <div class="moc-licensing-plan-name"><h2>Enterprise</h2></div>
					    </div><br>
					    <div class="moc-licensing-plan-price"><sup>$</sup>249<sup>*</sup></div>
					    <h3>[Firebase Social Login]</h3>
					    <!-- <a class="btn btn-block btn-purple text-uppercase moc-lp-buy-btn" href="mailto:info@xecurify.com" target="_blank">Contact Us</a> -->
					    <button class="btn btn-block buy_button text-uppercase moc-lp-buy-btn" onclick="upgradeform('wp_oauth_firebase_authentication_enterprise_plan')">Buy Now</button>
					    <br>
					    <div class="moc-licensing-plan-feature-list">
					        <ul>
					        	<li>Allow login with Firebase and WordPress</li>
					        	<li>Attribute mapping</li>
					            <li>Auto register users in Firebase as well as WordPress</li>
					            <li>Login & Registeration Form Integration (WooCommerce, BuddyPress)</li>
					            <li>Custom redirect URL after Login and Logout</li>
					            <li>WP hooks to integrate Custom/Third party Login/Registration forms, to read Firebase token, login event and extend plugin functionality</li>
					            <li>Shortcodes to add Firebase Login and Registration Form</li>
					            <li>Firebase Authentication methods <br>Google, Facebook, Github, Twitter, Microsoft, Yahoo, Apple</li>
					            <li>Shortcode to add Firebase Social Login buttons</li>
					            <li>*Phone Authentication (Passwordless login using Firebase OTP verification)</li>
					        </ul>
					    </div>
					</div>
				</div>
				<div style="margin: 20px;"><b style="color: red">*</b><strong>For the Phone Authentication method (Passwordless login using Firebase OTP verification), additional cost required to customize the login flow according to your forms and requirements. You can contact us at oauthsupport@xecurify.com.</strong></div>
				<div style="margin: 0 20px;"><b style="color: red">*</b><strong>Cost applicable for one instance only. Licenses are perpetual and the Support Plan includes 12 months of maintenance (support and version updates). You can renew maintenance after 12 months at 50% of the current license cost.</strong></div>
				<div style="margin: 20px;"><p>miniOrange does not store or transfer any data which is coming from Firebase to the WordPress. All the data remains within your premises / server. We do not provide the developer license for our paid plugins and the source code is protected. It is strictly prohibited to make any changes in the code without having written permission from miniOrange. There are hooks provided in the plugin which can be used by the developers to extend the plugin's functionality.</p></div>
				<div style="margin: 0 20px;"><p>At miniOrange, we want to ensure you are 100% happy with your purchase. If the premium plugin you purchased is not working as advertised and you've attempted to resolve any issues with our support team, which couldn't get resolved. We will refund the whole amount within 10 days of the purchase. Please email us at oauthsupport@xecurify.com for any queries regarding the return policy.</p></div>

			</div>
			<!-- End Licensing Table -->
	        <a id="mobacktoaccountsetup" style="display:none;" href="<?php echo add_query_arg( array( 'tab' => 'account' ), htmlentities( $_SERVER['REQUEST_URI'] ) ); ?>">Back</a>
	        <!-- JSForms Controllers -->
			<script>
				function upgradeform(planType) {
		                if(planType === "") {
		                    location.href = "https://wordpress.org/plugins/firebase-authentication/";
		                    return;
		                } else {
		                    jQuery('#requestOrigin').val(planType);
		                    if(jQuery('#lw_customer_registered').val()==1)
		                        jQuery('#loginform').submit();
		                    else{
		                        location.href = jQuery('#mobacktoaccountsetup').attr('href');
		                    }
		                }

		            }
			</script>
			<?php
		}
	}