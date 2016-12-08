<?php get_header(); ?>
<section class="content">
<aside class="left">
<nav role="navigation"><?php include (TEMPLATEPATH . '/primary-sidebar.php'); ?></nav>
</aside>
<section class="main page">
	<div class="error-message">
		<h1><?php _e('Page not found') ?></h1>
		<p><?php _e('The requested page could not be found.'); ?></p>
	</div>
</section>
<?php get_sidebar(); ?>
</section>
<?php get_footer(); ?>