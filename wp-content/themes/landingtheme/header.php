<?php

/**

 * The header for our theme.

 *

 * This is the template that displays all of the <head> section and everything up until <div id="content">

 *

 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials

 *

 * @package mysite

 */
//setlocale(LC_TIME, "de-DE");
$loginid = get_current_user_id();

$current_user = wp_get_current_user();

//print_r($current_user);
global $post;
$post_slug = $post->post_name;
?>

<!doctype html>

<html>

<head>

<meta charset="<?php bloginfo( 'charset' ); ?>">

<meta name="viewport" content="width=device-width, initial-scale=1">
<META HTTP-EQUIV="content-type" CONTENT="text/html; charset=utf-8">
<link rel="profile" href="http://gmpg.org/xfn/11">

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<?php $pid=get_the_ID(); ?>

<body <?php if($pid==2){ echo 'class="homepage"'; }else{echo 'class="innerpage '.$post_slug.'"';} ?>>

<header class="header_wrapper">
    <div class="head">
        <div class="container-h">
            <div class="nav_block">
                <div class="row">
                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6 p-0">
                        <a href="<?php echo site_url(); ?>" class="logo_a d-none d-md-none d-lg-block">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" width="70"height="70" alt="Brand logo">
                        </a>
                    </div>
                    <div class="col-xxl-9 col-xl-9 col-lg-9 col-md-9 col-sm-6 col-6 h-100 p-0">
						
						
                        <div class="nav_menus">
                        <?php 
						wp_nav_menu( array('theme_location' => 'primary','container' => '','walker'  => new Roots_Nav_Walker_Custom(),'items_wrap' => '<ul id="top-menu" class="top-menu">%3$s</ul>'));
	 							?> 
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>    
</header>
