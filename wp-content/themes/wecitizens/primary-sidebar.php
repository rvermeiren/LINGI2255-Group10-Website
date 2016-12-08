<!--
<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar(2)) : ?><?php endif; ?>

<?php if (ICL_LANGUAGE_CODE != 'en') : ?>
<section class="widget">
<a href="https://www.facebook.com/wecitizens.be" style="color: #3b5998;"><img src="/wp-content/themes/wecitizens/images/facebook-icon.jpg" style="vertical-align: middle;">
<?php if (ICL_LANGUAGE_CODE == 'fr') echo 'Suivez-nous sur Facebook'; ?>
<?php if (ICL_LANGUAGE_CODE == 'nl') echo 'Volg ons op Facebook'; ?>
</a>
</section>
<?php endif; ?>
-->
<!-- Affiche les citations de maniere aleatoire -->
<!--
<?php icl_register_string("Wordpress", "Members reviews", "Members reviews"); ?>
<?php if (ICL_LANGUAGE_CODE != 'en') : ?>
<section class="widget">
<h1><?php echo icl_t("Wordpress", "Members reviews", "Members reviews"); ?></h1>
  <div id="quotes">
<?php $args = array('post_type' => 'quote', 'posts_per_page' => 10); ?>
<?php $quotes = new WP_Query($args); ?>
<?php while ($quotes->have_posts() ) : $quotes->the_post(); global $post; ?>
<?php $name = get_post_meta($post->ID, 'quote_meta_box_name', true); ?>
<?php $avatar = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID, array(60,60))); ?>
<?php $content = get_the_content(); ?>
<?php if(get_post_meta($post->ID, 'quote_meta_box_function', true)) { $function = get_post_meta($post->ID, 'quote_meta_box_function', true ); } ?>
<?php echo '<div class="textItem">'; ?>
<?php echo '<p>&laquo; ' . $content . ' &raquo;</p>'; ?>
<?php echo '<img src="' . $avatar[0] . '" width="60" height="60" />'; ?>
<?php echo '<strong>' . $name . '</strong>'; ?><?php if(isset($function)) : echo '<br />' . $function; endif; ?>
<?php echo '</div>'; ?>
<?php endwhile; ?>
</div>
</section>
<?php endif; ?>
-->