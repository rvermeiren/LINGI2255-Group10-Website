
<!--CATEGORY.PHP -  CATEGORY.PHP -  CATEGORY.PHP -  CATEGORY.PHP-->
<!--PAGEPAN.php - PAGEPAN.php - PAGEPAN.php - PAGEPAN.php-->
<?php get_header(); ?>

<section class="main page">
		<article class="post">

<!--<div class="phptemplate">
  <section class="">
  <section class="main page">    
	<article class="post">-->
              
              
              <h1 class="post-title"><strong>Campagne - </strong><?php single_cat_title(); ?></h1></article>

<table class="narration">
<tbody>
<tr>
<td class="narration">
<ul class="narration">
	<li class="narration">
    
<?php if (ICL_LANGUAGE_CODE == 'fr') : ?>
<h3 class="narration">"Likez" cette campagne pour la promouvoir. <iframe src="//www.facebook.com/plugins/like.php?href=<?php echo urlencode(get_permalink($post->ID)); ?>&amp;width&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;share=false&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:21px;" allowTransparency="true"></iframe></h3>
<p class="narrationdetails"><small>Vous n'avez pas de compte Facebook? <a title="Soutenir une campagne" href="mailto:info@WeCitizens.be?subject=Soutenir une campagne">Ecrivez-vous!</a></small>
</p></li>
	<li class="narration">
<h3 class="narration">Vous pouvez <a title="Cotisation &amp; dons" href="/?page_id=35">soutenir financièrement</a> cette campagne</h3>
<p class="narrationdetails"><small>Faites un don et spécifiez-nous à quelle campagne est destinée le don.</small></p><?php endif; ?>
<?php if (ICL_LANGUAGE_CODE == 'nl') : ?>
<h3 class="narration">"Like" deze campagne om ze te promoten.  <iframe src="//www.facebook.com/plugins/like.php?href=<?php echo urlencode(get_permalink($post->ID)); ?>&amp;width&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;share=false&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:21px;" allowTransparency="true"></iframe></h3>
<p class="narrationdetails"><small>Hebt u geen Facebook-account?  <a title="Soutenir une campagne" href="mailto:info@WeCitizens.be?subject=Een campagne promoten">Schrijf u in!</a></small>
</p></li>
	<li class="narration">
<h3 class="narration">U kunt deze campagne <a title="Cotisation &amp; dons" href="/?page_id=8398">financieel steunen</a></h3>
<p class="narrationdetails"><small>Doe een gift en zeg ons voor welke campagne die bestemd is.</small></p><?php endif; ?>     
</li>  
</ul>
</td>
</tr>
</tbody>
</table>    
    
    
    
    <div style="margin-top: -1.5em">.</div>
    <?php get_template_part('loop'); ?>
<?php get_sidebar(); ?>
<?php include (TEMPLATEPATH . '/FooterPDLP.php'); ?>
<?php get_footer(); ?>