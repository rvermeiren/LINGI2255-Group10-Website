<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * This contains the navbar, the language selector, the social link, and the banner.
 * Contains the opening of the #content div.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Scratchpad
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<link rel="icon" type="image/png" href="wp-content/themes/wecitizens_new/images/icon16.png">
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'scratchpad' ); ?></a>

	<!-- HEADER VISIBLE -->
	<header id="masthead" class="site-header" role="banner">

		<!-- MENU (FR/NL/EN) -->
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<div class="wrap">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'scratchpad' ); ?></button>
				<!-- displaying the good menu for language -->
				<?php if (ICL_LANGUAGE_CODE == 'fr') wp_nav_menu( array('theme_location' => 'primary', 'menu' => 'Top_FR', 'menu_id' => 'primary-menu' )); ?>
				<?php if (ICL_LANGUAGE_CODE == 'en') wp_nav_menu( array('theme_location' => 'primary', 'menu' => 'Top_EN', 'menu_id' => 'primary-menu' )); ?>
				<?php if (ICL_LANGUAGE_CODE == 'nl') wp_nav_menu( array('theme_location' => 'primary', 'menu' => 'Top_DE', 'menu_id' => 'primary-menu' )); ?>
			</div><!-- .wrap -->
		</nav><!-- #site-navigation -->

		<!-- BANNER -->
		<div class="site-branding">
			<div class="wrap">
				<div class="header-container">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<?php if (ICL_LANGUAGE_CODE == 'fr') echo '<img src="'.esc_url( get_site_url() ).'/wp-content/themes/wecitizens_new/images/header-fr.jpg" width="100%" height="auto">'; ?>
						<?php if (ICL_LANGUAGE_CODE == 'en') echo '<img src="'.esc_url( get_site_url() ).'/wp-content/themes/wecitizens_new/images/header-en.jpg" width="100%" height="auto">'; ?>
						<?php if (ICL_LANGUAGE_CODE == 'nl') echo '<img src="'.esc_url( get_site_url() ).'/wp-content/themes/wecitizens_new/images/header-nl.jpg" width="100%" height="auto">'; ?>
					</a>
					<!-- SOCIAL LINK -->
					<div id="social-icons">
						<a target="_blank" href="https://twitter.com/NousCitoyensBE">
							<img src="<?php echo esc_url( get_site_url() ); ?>/wp-content/themes/wecitizens_new/images/Twitter_Logo_Blue/Twitter_Logo_Blue.png" width="30px" height="auto">
						</a>
						<a target="_blank" href="https://www.facebook.com/wecitizens.be">
							<img src="<?php echo esc_url( get_site_url() ); ?>/wp-content/themes/wecitizens_new/images/fb_icon/FB-logo-50.png" width="30px" height="auto">
						</a>
					</div>
					<!-- LANGUAGES SELECTOR -->
					<nav id="languages">
						<ul>
						<?php
						if (function_exists('icl_get_languages')) {
						    $languages = icl_get_languages('skip_missing=0');
						    if (1 < count($languages)) {
						        foreach ($languages as $l) {
						            echo '<li><a href="' . $l['url'] . '">'. $l['language_code'] .'</a></li>';
						        }
						    }
						}
						?>
						</ul>
					</nav>
				</div><!-- </div>--><!-- .header-image -->
			</div><!-- .wrap -->
		</div><!-- .site-branding -->
	</header><!-- #masthead -->
	<div id="content" class="site-content">
		<div class="wrap">
