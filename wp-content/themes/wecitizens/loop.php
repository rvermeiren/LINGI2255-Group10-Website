<!--LOOP.PHP - LOOP.PHP - LOOP.PHP - LOOP.PHP - LOOP.PHP-->
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