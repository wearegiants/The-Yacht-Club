<?php get_header(); ?>
<article id="content">
<?php the_post(); ?>

<div id="post-error" <?php post_class(); ?>>
	
	<div class="register"><h2>404, broham.</h2></div>
	
</div>

<script>
	$(function(){
	    $('body').addClass('green');
	});
</script>

</article>
<?php get_footer(); ?>