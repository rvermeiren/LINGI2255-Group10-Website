<!--HOME.PHP - HOME.PHP - HOME.PHP - HOME.PHP - HOME.PHP-->
<?php get_header(); ?>
<section class="content">
	<aside class="left">
		<nav role="navigation"><?php include (TEMPLATEPATH . '/primary-sidebar.php'); ?></nav>
	</aside>
</section>
<section class="main page"><article class="post"><h1 class="post-title"><?php if (ICL_LANGUAGE_CODE == 'fr') : ?>Nos campagnes<?php endif; ?><?php if (ICL_LANGUAGE_CODE == 'nl') : ?>Onze campagnes<?php endif; ?></h1></article>
<!----------------Togglebutton------------------>
<div class="togglebutton"><span class="togglebuttonright"><span class="togglebutton"><?php if (ICL_LANGUAGE_CODE == 'fr') : ?>Actualités<?php endif; ?><?php if (ICL_LANGUAGE_CODE == 'nl') : ?>Nieuws<?php endif; ?></span></span><?php if (ICL_LANGUAGE_CODE == 'fr') : ?><a class="togglebuttonleft" href="/?page_id=8618">Liste des campagnes</a><?php endif; ?><?php if (ICL_LANGUAGE_CODE == 'nl') : ?><a class="togglebuttonleft" href="/?page_id=9443">Campagnelijst</a><?php endif; ?>
</div>
<div style="color: white; margin-bottom: 1em; font-size: 1em">.</div> 
<!----------------Posts------------------>  
  <?php while (have_posts()) : the_post(); ?>
  <article class="post" role="article">
		<table class="narration">
      <tr>
	      <th class="narrationheader">
    			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        </th>
      </tr>
      <tr>
        <td class="narrationparagraph"><p style="margin-top:-1.5em;"><small><?php if (ICL_LANGUAGE_CODE == 'fr') : ?>Posté le <?php the_date(); ?> dans <?php the_category(', '); ?>.<?php endif; ?><?php if (ICL_LANGUAGE_CODE == 'nl') : ?>          
          Geplaatst op <?php the_date(); ?> in <?php the_category(', '); ?>.<?php endif; ?></small></p>
          <!--<p class="post-info"></p>-->
        </td>
      </tr>       
      <tr>
        <td class="narrationparagraph"><?php the_content(); ?>
        </td>
      </tr>  
     </table> 
		</article>
	<?php endwhile; ?>
  <?php get_sidebar(); ?>

<?php include (TEMPLATEPATH . '/FooterPAN.php'); ?>
<?php get_footer(); ?>
</section>  