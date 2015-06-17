<?php get_header(); ?>
<article id="content">
<?php the_post(); ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="meta <?php if ( '' != get_the_post_thumbnail()){}else {?>twelve columns offset-by-one<?}?>">
		<h1 class="entry-title">
			<?php if ( has_post_thumbnail() ) { the_post_thumbnail('medium', array('class' => 'thumbnail one column')); } ?>
			<?php 
			if ( '' != get_the_post_thumbnail() ) {
				the_title();
			} else {
			    the_title();
			}?>
		</h1>
	</div>
	
	<div class="entry-content twelve columns offset-by-one">
	<?php the_content(); ?>
	<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'blankslate' ) . '&after=</div>') ?>
	<?php edit_post_link( __( 'Edit', 'blankslate' ), '<div class="edit-link">', '</div>' ) ?>
	</div>
	
</div>

<script>
	$(function(){
	    $('body').addClass('green');
	});
</script>

</article>
<?php get_footer(); ?>
