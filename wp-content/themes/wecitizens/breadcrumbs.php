<div id="breadcrumbs">
	<?php if (!is_front_page()) { ?>
		<?php if (ICL_LANGUAGE_CODE == 'fr') : ?><?php echo '<a href="'.get_option('home').'">Accueil</a> » '; ?><?php endif; ?>
		<?php if (ICL_LANGUAGE_CODE != 'fr') : ?><?php echo '<a href="'.get_option('home').'">Home</a> » '; ?><?php endif; ?>
		<?php if (is_day()) { ?>
			<?php _e('Articles postés le') ?> <?php the_time('F jS, Y'); ?>
		<?php } elseif (is_month()) { ?>
			<?php _e('Articles postés en') ?> <?php the_time('F, Y'); ?>
		<?php } elseif (is_year()) { ?>
			<?php _e('Articles postés en') ?> <?php the_time('Y'); ?>
		<?php } elseif (is_search()) { ?>
			<?php _e('Recherche pour') ?> <?php the_search_query() ?>
		<?php } elseif (is_404()) { ?>
			<?php _e('Page not found') ?>
		<?php } elseif (is_single()) { ?>
			<?php $category = get_the_category();
			if (!empty($category)) { 
				$catlink = get_category_link( $category[0]->cat_ID );
				echo ('<a href="'.$catlink.'">'.$category[0]->cat_name.'</a> » '.get_the_title());
			}; ?>
		<?php } elseif (is_category()) { ?>
			<?php single_cat_title(); ?> <span><a href="<?php echo get_category_feed_link($cat, ''); ?>" title="<?php get_cat_name($cat); ?>"><?php get_cat_name($cat); ?></a></span>
		<?php } elseif (is_page()) { ?>
			<?php if($post->post_parent == is_page('0')) { ?>
				<?php $parent_title = get_the_title($post->post_parent); ?>
				<?php echo '<a href="'.get_permalink($post->post_parent).'">'.$parent_title.'</a> » '; ?>
			<?php } wp_title(''); ?>
		<?php } ?>
	<?php } ?>

</div>