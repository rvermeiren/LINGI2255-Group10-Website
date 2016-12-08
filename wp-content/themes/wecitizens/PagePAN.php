<?php /* Template Name: PagePAN */ ?>

<?php get_header(); ?>
<?php
	
	if ($post->ID == 24 and ICL_LANGUAGE_CODE == 'fr')
  {
  	//print "<a href='http://vote.wecitizens.be'><img src='http://www.wecitizens.be/wp-content/uploads/2014/07/SP_IMU_WECITIZENS_FR.jpg' alt='' /></a>";
  }
?>
  
<!-- Affiche la bannière en dessous du menu dans les 3 langues-->
<!-- 
<?php if (ICL_LANGUAGE_CODE == 'fr') : ?><a href="http://testelections2014.sudinfo.be/"><img src="http://directory.wecitizens.be/images/vaa-banner-horizontal-fr.png" style="border: 1px solid black; width: 95%; height: auto;"></a><?php endif; ?>
<?php if (ICL_LANGUAGE_CODE == 'nl') : ?><a href="http://vote.wecitizens.be"><img src="http://directory.wecitizens.be/images/SP_LEADER_WECITIZENS_NL.jpg"></a><?php endif; ?>
<?php if (ICL_LANGUAGE_CODE == 'en') : ?><a href="http://vote.wecitizens.be"><img src="http://directory.wecitizens.be/images/SP_LEADER_WECITIZENS_EN.jpg"></a><?php endif; ?>
</div>
-->
<section class="content">
<aside class="left">
<nav role="navigation"><?php include (TEMPLATEPATH . '/primary-sidebar.php'); ?></nav>
</aside>
<section class="main page"><!--PAGEPAN.php - PAGEPAN.php - PAGEPAN.php - PAGEPAN.php-->
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<article class="post">
				<h1 class="post-title"><?php the_title(); ?></h1>
				<div class="post-content">
					<?php the_content(); ?>
				</div>
			</article>
		<?php endwhile; ?>
	<?php endif; ?>
</section>
<?php get_sidebar(); ?>
</section>
<?php include (TEMPLATEPATH . '/FooterPAN.php'); ?>
<?php get_footer(); ?>