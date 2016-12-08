<?php get_header(); ?>
<section class="content">
<aside class="left">
<nav role="navigation"><?php include (TEMPLATEPATH . '/primary-sidebar.php'); ?></nav>
</aside>
<section class="main page">

	<?php 
	$count = $wp_query->found_posts;
	if ($count > 0) : $title = '<p>' .$count.' résultat(s) pour la recherche'; else : $title = 'Aucun résultat pour la recherche'; endif;
	$title .= '<span class="terms_search"> <strong>'. get_search_query() .'</strong></span></p>';
	?>
	<h2><?php echo $title; ?></h2>
	
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<article class="article_found" id="post-<?php the_ID(); ?>">
				<h3><a href="<?php the_permalink(); ?>" title="Lire l'article <?php the_title(); ?>"><?php the_title(); ?></a></h3>
				<p class="the_excerpt">
					<?php echo mb_substr( strip_tags( get_the_content() ), 0, 200, "UTF-8" ).'[...]'; ?>
				</p>
   
				<footer>
					<a href="<?php the_permalink(); ?>">
					<?php
					$permalink = get_permalink();
					// si le permalien fait plus de 60 caractères de long on le coupe
					if( strlen($permalink) > 50 ) : echo mb_substr( $permalink, 0, 50, "UTF-8" ) . '&hellip;';
					//sinon on l'affiche simplement
					else : echo $permalink;
					endif;
					?>
					</a>
					<time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('l d F'); ?></time>
				</footer>
			</article>
		<?php endwhile; ?>	

		<ul class="pagination">
			<li class="prev_link"><?php previous_posts_link('&laquo; Résultats précédents') ?></li>
			<li class="nex_link"><?php next_posts_link('Résultats suivants &raquo;','') ?></li>
		</ul>
	<?php else : ?>
		<p>Navré mais votre recherche semble infructueuse.</p>
	<?php endif; ?>
	
</section>
<?php get_sidebar(); ?>
</section>
<?php get_footer(); ?>