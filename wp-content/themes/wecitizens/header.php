<!DOCTYPE html>
<html>
<head <?php language_attributes(); ?>>
<meta charset="<?php bloginfo('charset'); ?>">
<title><?php wp_title('|',true,'right'); ?><?php bloginfo('name'); ?></title>
<meta name="description" content="Association citoyenne réunissant des électeurs et des contribuables.">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css">
<link href="<?php bloginfo('template_url'); ?>/custom/magic-member.css" rel="stylesheet" type="text/css" media="screen" />
<link href="<?php bloginfo('template_url'); ?>/zoombox/zoombox.css" rel="stylesheet" type="text/css" media="screen" />
<link href="http://fonts.googleapis.com/css?family=Tangerine" rel="stylesheet" type="text/css">
  
<link href="http://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet" type="text/css">

  <link href="http://fonts.googleapis.com/css?family=Rock+Salt" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Architects+Daughter" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Calligraffitti" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Marck+Script" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Bad+Script" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Reenie+Beanie" rel="stylesheet" type="text/css">

  
<!-- JQUERY -->
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.pack.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/zoombox/zoombox.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/custom.js"></script>
<!--[if lt IE 9]><script src="<?php bloginfo('template_url'); ?>/js/html5-ie.js"></script><![endif]-->
		
<?php wp_head(); ?>
</head>

<body>
<div class="wrap">
<?php if (ICL_LANGUAGE_CODE == 'fr') echo '<header class="fr" role="banner">'; ?>
<?php if (ICL_LANGUAGE_CODE == 'en') echo '<header class="en" role="banner">'; ?>
<?php if (ICL_LANGUAGE_CODE == 'nl') echo '<header class="nl" role="banner">'; ?>
  <div id="branding">
<h1><a><?php bloginfo('name'); ?></a></h1>
<!--<h2 class="description"><?php bloginfo('description'); ?></h2>-->
</div>
<nav id="main-bar" role="navigation">
<!--<?php include(TEMPLATEPATH. '/breadcrumbs.php'); ?>-->
<?php if (ICL_LANGUAGE_CODE == 'fr') wp_nav_menu( array('container' => false, 'theme_location' => 'headermenu', 'menu' => 'Top_FR', 'menu_id' => 'menu' )); ?>
<?php if (ICL_LANGUAGE_CODE == 'en') wp_nav_menu( array('container' => false, 'theme_location' => 'headermenu', 'menu' => 'Top_EN', 'menu_id' => 'menu' )); ?>
<?php if (ICL_LANGUAGE_CODE == 'nl') wp_nav_menu( array('container' => false, 'theme_location' => 'headermenu', 'menu' => 'Top_DE', 'menu_id' => 'menu' )); ?>
</nav>
<?php if (ICL_LANGUAGE_CODE == 'fr') : ?>
<a href="/fr/"><div class="logolink"><span style="color: white">.</span></div></a>   
<?php endif; ?>  
<?php if (ICL_LANGUAGE_CODE == 'nl') : ?>
<a href="/nl/"><div class="logolink"><span style="color: white">.</span></div></a>   
<?php endif; ?>   
<?php if (ICL_LANGUAGE_CODE == 'en') : ?>
<a href="/"><div class="logolink"><span style="color: white">.</span></div></a>   
<?php endif; ?>   
  
  
<nav id="languages">  
<ul>
  <?php if (ICL_LANGUAGE_CODE == 'fr') : ?>
		<li><a href="<?php print get_permalink(11); ?>"><span class="headerlink">FAQ</span></a></li>
		<li><a href="<?php print get_permalink(20); ?>"><span class="headerlink">Contact</span></a></li>
		<?php if (is_user_logged_in()) : ?>
			<li><a href="/profile"><span class="headerlink">Profile</span></a></li>
			<li><a href="/wp-login.php?action=logout"><span class="headerlink">Logout</span></a></li>
		<?php else: ?>
			<li><a href="<?php print get_permalink(278); ?>"><span class="headerlink">Inscription</span></a></li>
			<li><a href="<?php print get_permalink(9364); ?>"><span class="headerlink">Login</span></a></li>
		<?php endif; ?>   
  <?php endif; ?>   
  <?php if (ICL_LANGUAGE_CODE == 'nl') : ?>
		<li><a href="<?php print get_permalink(9469); ?>"><span class="headerlink">FAQ</span></a></li>
		<li><a href="<?php print get_permalink(255); ?>"><span class="headerlink">Contact</span></a></li>
		<?php if (is_user_logged_in()) : ?>
			<li><a href="/profile"><span class="headerlink">Profile</span></a></li>
			<li><a href="/wp-login.php?action=logout"><span class="headerlink">Logout</span></a></li>
		<?php else: ?>
			<li><a href="<?php print get_permalink(281); ?>"><span class="headerlink">Inschrijving</span></a></li>
			<li><a href="<?php print get_permalink(9653); ?>"><span class="headerlink">Login</span></a></li>
		<?php endif; ?>   
  <?php endif; ?>   
<!--  <?php if (ICL_LANGUAGE_CODE == 'en') : ?>
  <li><a href="/?page_id=234"><span class="headerlink">Contact</span></a></li>
  <li><a href="/?page_id=98"><span class="headerlink">Connection</span></a></li>
  <li><a href="/?page_id=98"><span class="headerlink">Login</span></a></li>
  <?php endif; ?>  --> 
 
<?php
if (function_exists('icl_get_languages')) {
    $languages = icl_get_languages('skip_missing=0');
    if (1 < count($languages)) {
        foreach ($languages as $l) {        
            echo '<li><a href="' . $l['url'] . '"><img src="' . $l['country_flag_url'] . '" alt="' . $l['language_code'] . '" /></a></li>';     
        }
    }
}
?>
<!--
<li><a href="<?php echo site_url(); ?>"><img src="<?php echo plugins_url(); ?>/sitepress-multilingual-cms/res/flags/en.png" /></a></li>
<li><a href="<?php echo site_url(); ?>/fr/"><img src="<?php echo plugins_url(); ?>/sitepress-multilingual-cms/res/flags/fr.png" /></a></li>
<li><a href="<?php echo site_url(); ?>/nl/"><img src="<?php echo plugins_url(); ?>/sitepress-multilingual-cms/res/flags/nl.png" /></a></li>
-->
</ul>
</nav>
    <!--<div style="position: absolute; margin: 0.25em 2em 3.75em 2em; width: 86%; border: 1em yellow solid; background: white; opacity: 0.95; padding: 0.5em; text-align: center; line-height: 1.2em; font-size: 1.6em"><strong>
      <p>We are currently updating the email plugin. So we are not able to automatically unsubscribe you.</p>
      <p>Do not hesitate to <a href="mailto:info@wecitizens.be?subject=unsubscribe">contact us</a> and we will do it manually. We apologize for the inconvenience.</p></strong></div> --> 
  
</header>