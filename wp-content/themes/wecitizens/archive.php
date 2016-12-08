<?php get_header(); ?>
<section class="content">
<aside class="left">
<nav role="navigation"><?php include (TEMPLATEPATH . '/primary-sidebar.php'); ?></nav>
</aside>
<section class="main page">
	<?php $postType = get_post_type( $post->ID ); ?>
	<?php if( $postType != "download" ) : ?>
		<?php include(TEMPLATEPATH. '/includes/templates/breadcrumbs.php'); ?>
	<?php endif; ?>
	
	<?php
		rewind_posts();
		if (have_posts()) {
			while (have_posts()) : the_post();
			global $post;
				include(TEMPLATEPATH. '/includes/templates/loop.php');
			$postcount++;
			endwhile;

		} else { 
			include(TEMPLATEPATH. '/includes/templates/not-found.php'); 
		}
	?>
	
	<?php if (function_exists('wp_pagenavi')) wp_pagenavi(); else { ?>
		<div class="pagination">
		    <div class="newer"><?php previous_posts_link(__('Newer Entries', 'themejunkie')) ?></div>
		    <div class="older"><?php next_posts_link(__('Older Entries', 'themejunkie')) ?></div>
		    <div class="clear"></div>
		</div><!--end .pagination-->				    
	<?php } ?>
</section>
<?php get_sidebar(); ?>
</section>
<?php get_footer(); ?>