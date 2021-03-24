function lw_firebase_auth_firebaseAuthentication( pid, a_key, email, pass, test_check_field ) {
	if( email.length === 0 || pass.length === 0 ) {
		var setsession = window.sessionStorage.setItem("fire_error_msg", "Email or Password is empty.");
		location.reload();
		return;	
	}
	
	var re = new RegExp(/^.*\//);
	var url = re.exec(window.location.href);
	var createform = document.createElement('form'); 
	if ( test_check_field =='woocommerce' ) {
   		createform.setAttribute("action", url);
  	}
  	else {
  		createform.setAttribute("action", url+'wp-login.php');
  	}
	createform.setAttribute("method", "post");
	createform.setAttribute("name", "jwtform");
	createform.setAttribute("id", "jwtform");

	var inputelement = document.createElement('input'); // Create Input Field for Name
	inputelement.setAttribute("type", "hidden");
	inputelement.setAttribute("name", "fb_jwt");
	inputelement.setAttribute("id", "fb_jwt");
	createform.appendChild(inputelement);
	var inputelement = document.createElement('input'); // Create Input Field for Name
	inputelement.setAttribute("type", "hidden"); 
	inputelement.setAttribute("name", "fb_is_test");
	inputelement.setAttribute("id", "fb_is_test");
	createform.appendChild(inputelement);
	var inputelement = document.createElement('input'); // Create Input Field for Name
	inputelement.setAttribute("type", "hidden");
	inputelement.setAttribute("name", "fb_error_msg");
	inputelement.setAttribute("id", "fb_error_msg");
	createform.appendChild(inputelement);

	document.body.appendChild(createform);

	var firebaseConfig    = {
	    apiKey: a_key,
	    authDomain: pid+'.firebaseapp.com',
	    databaseURL: 'https://'+pid+'.firebaseio.com',
	    projectId: pid,
	    storageBucket: ''
    };

    // Initialize Firebase
    if (!firebase.apps.length) {
    firebase.initializeApp(firebaseConfig);
	}
   // firebase.initializeApp(firebaseConfig);

    firebase.auth().signInWithEmailAndPassword( email, pass )
		.then(function(firebaseUser) {
			//alert(firebaseUser);
	   		if ( test_check_field=='test_check_true' ) {
	   			document.getElementById('fb_is_test').value='test_check_true';
	   		}
	   		sessionStorage.removeItem('fire_error_msg');
	   		document.getElementById('fb_jwt').value=firebaseUser['user']['_lat'];
			document.forms['jwtform'].submit();
		})
		.catch(function(error) {
	       // Error Handling
	       //alert(error);
		  	if ( test_check_field=='test_check_true' ) {
		   		document.getElementById('fb_is_test').value='test_check_true';
		  	}
		  	if ( test_check_field=='woocommerce' ) {
		   		document.getElementById('fb_is_test').value='woocommerce_error';
		  	}
		  	document.getElementById('fb_jwt').value='empty_string';
		  	document.getElementById('fb_error_msg').value = error.message;
	  		var setsession = window.sessionStorage.setItem("fire_error_msg", error.message);

			document.forms['jwtform'].submit();
			var errorCode    = error.code;
			var messages = error.message;

		});
}


function lw_firebase_auth_createFirebaseUser( pid, a_key, email, pass,  ) {
	var createform = document.createElement('form'); 
	createform.setAttribute("method", "post");
	createform.setAttribute("name", "wcErrorform");
	createform.setAttribute("id", "wcErrorform");
	var inputelement = document.createElement('input'); // Create Input Field for Name
	inputelement.setAttribute("type", "hidden");
	inputelement.setAttribute("name", "wc_error_msg");
	inputelement.setAttribute("id", "wc_error_msg");
	createform.appendChild(inputelement);

	document.body.appendChild(createform);

	var firebaseConfig    = {
	    apiKey: a_key,
	    authDomain: pid+'.firebaseapp.com',
	    databaseURL: 'https://'+pid+'.firebaseio.com',
	    projectId: pid,
	    storageBucket: ''
    };

    // Initialize Firebase
    if (!firebase.apps.length) {
    firebase.initializeApp(firebaseConfig);
	}

	firebase.auth().createUserWithEmailAndPassword( email, pass )
            .then(function (firebaseUser) {
				lw_firebase_auth_firebaseAuthentication( pid, a_key, email, pass, "woocommerce" );
            })
            .catch(function (error) {

            	document.getElementById('wc_error_msg').value = error.message;
            	var setsession = window.sessionStorage.setItem("fire_error_msg", error.message);
				document.forms['wcErrorform'].submit();
            });
}
 

function lw_firebase_auth_admin_createFirebaseUser( pid, a_key, email, pass , test_check_field) {
	if( email.length === 0 || pass.length === 0 ) {
		console.log("Email or Password is empty.");
		return;	
	}
	
	var re = new RegExp(/^.*\//);
	var url = re.exec(window.location.href);
	var createform = document.createElement('form'); 
	if ( test_check_field =='woocommerce' ) {
   		createform.setAttribute("action", url);
  	}
  	else {
  		createform.setAttribute("action", url+'wp-login.php');
  	}
	createform.setAttribute("method", "post");
	createform.setAttribute("name", "admin_user_form");
	createform.setAttribute("id", "admin_user_form");

	var inputelement = document.createElement('input'); // Create Input Field for Name
	inputelement.setAttribute("type", "hidden");
	inputelement.setAttribute("name", "fb_admin_u");
	inputelement.setAttribute("id", "fb_admin_u");
	createform.appendChild(inputelement);
	var inputelement = document.createElement('input'); // Create Input Field for Name
	inputelement.setAttribute("type", "hidden");
	inputelement.setAttribute("name", "fb_is_test");
	inputelement.setAttribute("id", "fb_is_test");
	createform.appendChild(inputelement);
	var inputelement = document.createElement('input'); // Create Input Field for Name
	inputelement.setAttribute("type", "hidden");
	inputelement.setAttribute("name", "fb_error_msg");
	inputelement.setAttribute("id", "fb_error_msg");
	createform.appendChild(inputelement);

	document.body.appendChild(createform);

	var firebaseConfig    = {
	    apiKey: a_key,
	    authDomain: pid+'.firebaseapp.com',
	    databaseURL: 'https://'+pid+'.firebaseio.com',
	    projectId: pid,
	    storageBucket: ''
    };

    // Initialize Firebase
    if (!firebase.apps.length) {
    firebase.initializeApp(firebaseConfig);
	}
   // firebase.initializeApp(firebaseConfig);

    firebase.auth().createUserWithEmailAndPassword( email, pass )
		.then(function(firebaseUser) {
	   		if ( test_check_field=='test_check_true' ) {
	   			document.getElementById('fb_is_test').value='test_check_true';
	   		}
	   		document.getElementById('fb_admin_u').value=firebaseUser['user']['_lat'];
			document.forms['admin_user_form'].submit();
		})
		.catch(function(error) {
	       // Error Handling
		  	if ( test_check_field=='test_check_true' ) {
		   		document.getElementById('fb_is_test').value='test_check_true';
		  	}
		  	if ( test_check_field=='woocommerce' ) {
		   		document.getElementById('fb_is_test').value='woocommerce_error';
		  	}
		  	document.getElementById('fb_admin_u').value='empty_string';
		  	document.getElementById('fb_error_msg').value = error.message;
			document.forms['admin_user_form'].submit();
			var errorCode    = error.code;
			var errorMessage = error.message;
		});


}
 

function lw_firebase_auth_resetPassword( pid, a_key, email ) {
	var createform = document.createElement('form'); 
	createform.setAttribute("method", "post");
	createform.setAttribute("name", "wcResetform");
	createform.setAttribute("id", "wcResetform");

	var inputelement = document.createElement('input'); // Create Input Field for Name
	inputelement.setAttribute("type", "hidden");
	inputelement.setAttribute("name", "wc_success_msg");
	inputelement.setAttribute("id", "wc_success_msg");
	createform.appendChild(inputelement);
	var inputelement = document.createElement('input'); // Create Input Field for Name
	inputelement.setAttribute("type", "hidden");
	inputelement.setAttribute("name", "wc_error_msg");
	inputelement.setAttribute("id", "wc_error_msg");
	createform.appendChild(inputelement);

	document.body.appendChild(createform);

	var firebaseConfig    = {
	    apiKey: a_key,
	    authDomain: pid+'.firebaseapp.com',
	    databaseURL: 'https://'+pid+'.firebaseio.com',
	    projectId: pid,
	    storageBucket: ''
    };

    // Initialize Firebase
    if (!firebase.apps.length) {
    firebase.initializeApp(firebaseConfig);
	}
	
	firebase.auth().sendPasswordResetEmail(email).then(function() {
		document.getElementById('wc_success_msg').value = "Password reset email has been sent to you.";
		document.forms['wcResetform'].submit();
	}).catch(function(error) {
		document.getElementById('wc_error_msg').value = error.message;
		document.forms['wcResetform'].submit();
	});


}
function lw_firebase_edit_profile_resetPassword( pid, a_key, email, old_pass, new_pass, test_check_field ){

	var re = new RegExp(/^.*\//);
	var url = re.exec(window.location.href);
	var createform = document.createElement('form'); 	
   	createform.setAttribute("action", url);
  	
	createform.setAttribute("method", "post");
	createform.setAttribute("name", "edit_profile_form");
	createform.setAttribute("id", "edit_profile_form");
	var inputelement = document.createElement('input'); // Create Input Field for Name
	inputelement.setAttribute("type", "hidden");
	inputelement.setAttribute("name", "fb_edit_profile");
	inputelement.setAttribute("id", "fb_edit_profile");
	createform.appendChild(inputelement);
	var inputelement = document.createElement('input'); // Create Input Field for Name
	inputelement.setAttribute("type", "hidden");
	inputelement.setAttribute("name", "fb_edit_profile_pass");
	inputelement.setAttribute("id", "fb_edit_profile_pass");
	createform.appendChild(inputelement);
	var inputelement = document.createElement('input'); // Create Input Field for Name
	inputelement.setAttribute("type", "hidden");
	inputelement.setAttribute("name", "fb_error_msg");
	inputelement.setAttribute("id", "fb_error_msg");
	createform.appendChild(inputelement);

	document.body.appendChild(createform);

	var firebaseConfig    = {
	    apiKey: a_key,
	    authDomain: pid+'.firebaseapp.com',
	    databaseURL: 'https://'+pid+'.firebaseio.com',
	    projectId: pid,
	    storageBucket: ''
    };

    // Initialize Firebase
    if (!firebase.apps.length) {
    firebase.initializeApp(firebaseConfig);
	}

	var firebaseUser = firebase.auth().currentUser;
	var newPassword = new_pass;

	firebaseUser.updatePassword(new_pass).then(function() {
	  alert("Password reset successfully.");
	}).catch(function(error) {
	  console.log(error.message);
	});
	/*var user = firebase.auth().currentUser;

	var credential;

	// Prompt the user to re-provide their sign-in credentials

	user.reauthenticateWithCredential(credential).then(function() {
	  // User re-authenticated.
	}).catch(function(error) {
	  // An error happened.
	});*/
	firebase.auth().signInWithEmailAndPassword(email, new_pass).then(function(firebaseUser) { 
		 if (firebaseUser) { 
			document.getElementById('fb_edit_profile').value=firebaseUser['user']['_lat'];
			document.getElementById('fb_edit_profile_pass').value = new_pass;
			document.forms['edit_profile_form'].submit();
			document.getElementById('fb_error_msg').value = "Account details changed successfully.";
		} else {   
		  	alert("No user is signed in.");
		    // No user is signed in.
		  }
	}).catch(function(error) {
		document.getElementById('fb_error_msg').value = error.message;
		document.forms['edit_profile_form'].submit();
	});

	
}