<?php
/*
Template Name: Archives
Particular template for archives displaying
*/
get_header(); ?>
	<div id="primary" class="archives-container">
		<main id="main" class="site-main" role="main">
			<div class="archives-uc">
				<?php
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', 'page' );
				endwhile; // End of the loop.
				?>

				<h1 class="entry-title"><?php the_title(); ?></h1>

				<?php get_search_form(); ?>

				<?php if (ICL_LANGUAGE_CODE == 'fr') echo  "<h2>Archives par mois:</h2>"; ?>
				<?php if (ICL_LANGUAGE_CODE == 'nl') echo  "<h2>Archief per maand:</h2>"; ?>
				<?php if (ICL_LANGUAGE_CODE == 'en') echo  "<h2>Archives by Month:</h2>"; ?>
				<ul>
					<?php wp_get_archives('type=monthly'); ?>
				</ul>

				<?php if (ICL_LANGUAGE_CODE == 'fr') echo "<h2>Archives par sujet:</h2>";?>
				<?php if (ICL_LANGUAGE_CODE == 'nl') echo "<h2>Archief op onderwerp:</h2>";?>
				<?php if (ICL_LANGUAGE_CODE == 'en') echo "<h2>Archives by Subject:</h2>";?>
				<ul>
					 <?php wp_list_categories(); ?>
				</ul>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
