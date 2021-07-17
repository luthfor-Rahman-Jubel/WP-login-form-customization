<?php
/*
Plugin Name: Login Form Customization 
Plugin URI: https://github.com/luthfor-Rahman-Jubel
Description: Customized Login form with logo 
Version: 1.0.0
Author: Jubel Ahmed
Author URI: https://github.com/luthfor-Rahman-Jubel
License: GPLv2 or later
Text Domain: lfc
Domain Path: /languages
 */

function lfc_login_page(){
    wp_enqueue_style('custom-login-css', plugin_dir_url(__FILE__). '/assets/css/style.css' );
    wp_enqueue_script('custom-login-js', plugin_dir_url(__FILE__). '/assets/js/script.js', array('jquery'), true);
    ?>
    <style type="text/css">
     #login h1 a, .login h1 a {
        background-image: url(<?php echo plugin_dir_url(__FILE__).'/assets/img/wp-logo.png' ?>);
		height:165px;
		width:250px;
		background-size: 180px 165px;
		background-repeat: no-repeat;
        padding-bottom: 30px;
        }
    </style>
    <?php  
}

add_action('login_enqueue_scripts','lfc_login_page' );
function lfc_change_login_text(){
    add_filter('gettext', function($translated_text, $text_to_translate, $text_domain){
       if('Username or Email Address' == $translated_text){
           $translated_text = __('Your Login Key','lfc');
       }elseif ('Password'== $text_to_translate) {
            $translated_text = __('Pass Key','lfc');
       }
       return $translated_text;

    }, 10, 3);
}
add_action('login_head', 'lfc_change_login_text');

 add_filter('login_headerurl', function(){
    return home_url();
 });




