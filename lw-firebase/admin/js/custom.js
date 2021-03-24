jQuery(document).ready(function() {
	jQuery("#lw_enable_firebase_auth").click(function() {
            jQuery("#lw_enable_firebase_auth_form").submit();
  });

 // jQuery('[data-toggle="tooltip"]').tooltip();

  //jQuery("#lw_firebase_auth_contact_us_phone").intlTelInput();
});

/*function lw_firebase_auth_contact_us_valid_query(f) {
    !(/^[a-zA-Z?,.\(\)\/@ 0-9]*$/).test(f.value) ? f.value = f.value.replace(
        /[^a-zA-Z?,.\(\)\/@ 0-9]/, '') : null;
}*/

function showAlert() {
  if ( jQuery('#project_id').val() != "" && jQuery('#api_key').val() != "" ) {
    jQuery("#lw_firebase_auth_test_config_button").prop('disabled', false);
    if ( jQuery("#lw_firebase_auth_success_container").find("div#lw_firebase_auth_success_alert").length == 0 ) {
      jQuery("#lw_firebase_auth_success_container").append("<div class='alert alert-success alert-dismissable' id='lw_firebase_auth_success_alert' data-fade='3000'> <button type='button' class='close' data-dismiss='alert'  aria-hidden='true'>&times;</button> Configurations saved successfully.</div>");
    }
    jQuery("#lw_firebase_auth_success_container").css("display", "");
  }
  else {
    jQuery("#lw_firebase_auth_test_config_button").prop('disabled', false);
    if ( jQuery("#lw_firebase_auth_error_container").find("div#lw_firebase_auth_error_alert").length == 0 ) {
      jQuery("#lw_firebase_auth_error_container").append("<div class='alert alert-danger alert-dismissable' id='lw_firebase_auth_error_alert' data-fade='3000'> <button type='button' class='close' data-dismiss='alert'  aria-hidden='true'>&times;</button> Please enter required fields.</div>");
    }
    jQuery("#lw_firebase_auth_error_container").css("display", "");
  }
  
}