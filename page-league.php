<?php get_header(/***Template Name: League */); ?>

<article id="content">

<?php the_post(); ?>

<div id="post-<?php the_ID(); ?>" <?php post_class('league'); ?>>
	
	<div class="meta <?php if ( '' != get_the_post_thumbnail()){}else {?>fifteen columns offset-by-one<?}?>">
		<div class="share one columns alpha">
			<span>Share This:</span>
			<a target="blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?> " class="share fb">FB</a>
			<a target="blank" href="https://twitter.com/share" class="share tw">Tweet</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
		</div>
		<h1 class="entry-title league fourteen columns omega"><?php the_title(); ?></h1>
	</div>
	
	<div class="entry-content fifteen columns offset-by-one">
		<?php include 'snippets/acf-gallery.php' ?>
		<?php the_content(); ?>
	</div>
	
</div>

<script>
	$(function(){
	    $('body').addClass('green');
	});
</script>

</article>

<?php get_footer(); ?>

