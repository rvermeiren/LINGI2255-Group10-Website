<?php
// FUNCTION.PHP
// This file containt the function specific of this child of Scratchpad.
// The Scratpad funtion are imported and can be reimplemented in this file


add_filter('comments_open', 'wpc_comments_closed', 10, 2);

// remove commment from the website
function wpc_comments_closed( $open, $post_id ) {
// $post = get_post( $post_id );
// if ('post' == $post->post_type)
$open = false;
return $open;
}

// functions used to edit login logo on wordpress login page
function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/logo-132.png);
            padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'We Citizens login page';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );


?>
