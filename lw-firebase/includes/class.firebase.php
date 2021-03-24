<?php
class Firebase {
    private static $initiated = false;
    private static $options;

    public static function init() {
        if (!self::$initiated) {
            self::init_hooks();
        }
    }

    public static function init_hooks() {
        self::$initiated = true;
        self::$options = get_option("firebase_credentials");

       // add_action('wp_enqueue_scripts', array('Firebase', 'load_firebase_js'));
     //   add_action( 'wp_footer', 'footer_load_firebase_js' );

    }

     public static function load_firebase_js() {

        wp_enqueue_style('firebase', plugin_dir_url(dirname(__FILE__)) . 'css/firebase.css');

        wp_enqueue_script('firebase_app', 'https://www.gstatic.com/firebasejs/7.18.0/firebase-app.js', '0.7.0', true);

        wp_enqueue_script('firebase_auth', 'https://www.gstatic.com/firebasejs/7.18.0/firebase-auth.js', '0.7.0', true);
        wp_enqueue_script('firebase_database', 'https://www.gstatic.com/firebasejs/7.18.0/firebase-database.js', '0.7.0', true);
        wp_enqueue_script('firebase_firestore', 'https://www.gstatic.com/firebasejs/7.18.0/firebase-firestore.js', '0.7.0', true);

        wp_enqueue_script('firebase', plugin_dir_url(dirname(__FILE__)) . 'js/firebase.js', array('jquery'), true);
         /*wp_enqueue_script('firebase_login', plugin_dir_url(dirname(__FILE__)) . 'admin/js/firebase-woocommerce-login.js', array('jquery'), true);
         wp_enqueue_script('firebase_auth_main_script', plugin_dir_url(dirname(__FILE__)) . 'admin/js/firebase-auth-main-script.js', array('jquery'), true);*/

        wp_localize_script('firebase', 'firebaseOptions', array(
            'apiKey' => get_option("lw_firebase_auth_api_key"),
          //  'authDomain' => self::$options['auth_domain'],
            'databaseURL' =>get_option("lw_firebase_database_url"),
            'projectId' => get_option("lw_firebase_auth_project_id"),
            'lw_enable_firebase_auth' => get_option("lw_enable_firebase_auth"),
        )
        ); 
    }
      
}
?>
