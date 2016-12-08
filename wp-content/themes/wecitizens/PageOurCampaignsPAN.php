<?php /* Template Name: PageOurCampaignsPAN */ ?>

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
<section class="main page">
<!--PageOurCampaignsPAN.php - PageOurCampaignsPAN.php - PageOurCampaignsPAN.php  - PageOurCampaignsPAN.php -->
<!--TOGGLE BUTTON
<div class="togglebutton"><a href="/?page_id=8303">
<div class="togglebuttonleft">Actualités</div></a>
<div class="togglebuttonright"><span class="togglebutton">Liste des campagnes</span></div>
</div>
<table class="narration">
<tbody>
<tr>
<th class="narrationheader">
<h2>Les campagnes en cours</h2>
</th>
</tr>
<tr>
<td class="narration">
<ul class="narration">

  <?php if (have_posts()) : ?>
<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts("tag=campagnes-en-cours-fr&paged=$paged"); ?>
<?php while (have_posts()) : the_post(); ?>
	<li class="narration">
			<article class="post">
				<h2 class="post-title" style="margin-left: 0em"><a href="<?php the_permalink(); ?>" style="font-style: "><?php the_title(); ?></a></h2>
			</article>
<p class="content"><?php the_category(', '); ?></p></li>
		<?php endwhile; ?>
	<?php endif; ?>





</ul>
</td>
</tr>
</tbody>
</table>
<table class="narration">
<tbody>
<tr>
<th class="narrationheader">
<h2>Les campagnes que vous pouvez promouvoir</h2>
</th>
</tr>
<tr>
<td class="narration">
<ul class="narration">
<?php if (have_posts()) : ?>
<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts("tag=campagnes-a-promouvoir-fr&paged=$paged"); ?>
<?php while (have_posts()) : the_post(); ?>
	<li class="narration">
			<article class="post">
				<h2 class="post-title" style="margin-left: 0em"><a href="<?php the_permalink(); ?>" style="font-style: "><?php the_title(); ?></a></h2>
			</article>
<p class="content"><?php the_category(', '); ?></p></li>
		<?php endwhile; ?>
	<?php endif; ?>
</ul>
</td>
</tr>
</tbody>
</table>
<table class="narration">
<tbody>
<tr>
<th class="narrationheader">
<h2>Les campagnes possibles</h2>
</th>
</tr>
<tr>
<td class="narration">
<ul class="narration">



<?php if (have_posts()) : ?>
<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts("category_name=campagnes-possibles&paged=$paged"); ?>
<?php while (have_posts()) : the_post(); ?>
	<li class="narration">
			<article class="post">
				<h2 class="post-title" style="margin-left: 0em"><a href="<?php the_permalink(); ?>" style="font-style: "><?php the_title(); ?></a></h2>
			</article>
<p class="content"><?php the_category(', '); ?></p></li>
		<?php endwhile; ?>
	<?php endif; ?>




  </ul>
</td>
</tr>
</tbody>
</table>
<table class="narration">
<tbody>
<tr>
<th class="narrationheader">
<h2>Et maintenant, que faire?</h2>
</th>
</tr>
<tr>
<td class="narration">
<ul class="narration">
	<li class="narration">
<h3 class="narration">N'hésitez pas à nous <a title="Contact" href="/?page_id=20">proposez une campagne</a>.</h3>
</li>
	<li class="narration">
<h3 class="narration">Vous pouvez promouvoir une campagne existante</h3>
<p class="narrationdetails"><small>Cliquez sur la campagne qui vous intéresse et appuyez sur le bouton "like". </small></p>
</li>
	<li class="narration">
<h3 class="narration">Vous pouvez <a title="Cotisation &amp; dons" href="/?page_id=35">soutenir financièrement</a> une campagne existante</h3>
<p class="narrationdetails"><small>Faites un don et spécifiez-nous à quelle campagne est destinée le don.</small></p>
</li>
</ul>
</td>
</tr>
</tbody>
</table>
-->
</section>
<?php get_sidebar(); ?>
</section>
<?php include (TEMPLATEPATH . '/FooterPAN.php'); ?>
<?php get_footer(); ?>
