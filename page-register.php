<?php get_header(/***Template Name: Register */); ?>

<article id="content">

<div class="hentry fifteen columns offset-by-one">

<?php the_post(); ?>

<?php the_content(); ?>

<?php
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$loop = new WP_Query(array('post_type' => 'page',
		'paged'            => $paged,
		'posts_per_page'   => -1,
		'post_parent'      => 407,
		'order'            => 'ASC',
		'orderby'          => 'title',
		'caller_get_posts' => 1,
		'meta_query'       => array(
			array(
				'key'      => 'register_hide',
				'value'    => '1',
				'compare'  => '!='
			)
		)
	));
?>
<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
<div class="register">
	<div class="thumbnail three columns alpha">
		<?php if ( has_post_thumbnail() ) { the_post_thumbnail('medium', array('class' => 'thumbnail')); } ?>
	</div>
	<div class="meta eleven columns alpha omega">
		<?php if (get_field( "register_link" )): ?>
		<h2><a href="<?php the_field( "register_link" ); ?>" target="blank"><?php the_title(); ?></a></h2>
		<a class="button" href="<?php the_field( "register_link" ); ?>" target="blank">Click Here to Register</a>
		<span class="date">Starts on <?php the_field( "start_date" ); ?></span>
		<?php else: ?>
		<h2><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h2>
		<a class="button" href="<?php the_permalink(); ?>">Click Here to Register</a>
		<span class="date"><?php the_field('season_dates'); ?></span>
		<?php endif; ?>
	</div>
</div>
<?php endwhile; ?>

<script>
	$(function(){
	    $('body').addClass('green');
	});
</script>
</div>
</article>

<?php get_footer(); ?>