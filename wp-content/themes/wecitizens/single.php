
<?php get_header(); ?>
<section class="content">
<aside class="left">
<nav role="navigation"><?php include (TEMPLATEPATH . '/primary-sidebar.php'); ?></nav>
</aside>
<div class="main single">
		<?php while (have_posts()) : the_post(); ?>
			<div class="post">
				<h1 class="post-title"><?php if (ICL_LANGUAGE_CODE == 'fr') : ?>Article<?php endif; ?><?php if (ICL_LANGUAGE_CODE == 'nl') : ?>Artikel<?php endif; ?> - <?php the_title(); ?></h1>
     <table class="narration">
      <tr>
        <td class="narrationparagraph"><p style="margin-top:-1.5em;"><small><?php if (ICL_LANGUAGE_CODE == 'fr') : ?>Posté le <?php the_date(); ?> dans <?php the_category(', '); ?>.<?php endif; ?><?php if (ICL_LANGUAGE_CODE == 'nl') : ?>Geplaatst op <?php the_date(); ?> in <?php the_category(', '); ?>.<?php endif; ?></small></p>
          <!--<p class="post-info"></p>-->
        </td>
      </tr>       
      <tr>
        <td class="narrationparagraph"><?php the_content(); ?>
        </td>
      </tr>  
      <tr>
        <td class="narrationparagraph"><?php comments_template(); ?>

        </td>
      </tr>               
     </table>       
			</div>
		<?php endwhile; ?>
</div>
<?php get_sidebar(); ?>
</section>
<?php include (TEMPLATEPATH . '/FooterPDLP.php'); ?>
<?php get_footer(); ?>
