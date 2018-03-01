<?php 

/******************************************************************************************
Login Screen
******************************************************************************************/
function my_custom_login_logo() {
    echo '<style type="text/css">
        h1 a { background-image:url('.get_bloginfo('template_directory').'/img/logo-js_sullivan.png) !important; }
        body.login {background-color: #000 !important; }
        .login #backtoblog a:hover,.login #nav a:hover,.login label{color:#fff;}
        .login #nav a,.login #backtoblog a{color:#f0f0f0;}
        .login form{ background:none; box-shadow:none; border:solid 1px #fff;}
        .login h1 a {width: 253px;background-size: 253px;background-position: center center;}
        .wp-core-ui .button-primary {background-color: transparent; border-color:#fff; color:#fff;box-shadow:none;text-shadow:none;font-family:sans-serif;border-radius:0;}
        .wp-core-ui .button-primary:hover {background-color: transparent; border-color:#fff;color:#000; }
        input:-webkit-autofill, textarea:-webkit-autofill, select:-webkit-autofill {background-color: #fbfbfb !important;}
    </style>';
}

add_action('login_head', 'my_custom_login_logo');

?>