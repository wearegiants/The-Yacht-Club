<?php get_header(/***Template Name: Splash*/); ?>

<article id="content">

<nav id="nav" class="option-set fiftee columns offset-by-one" data-option-key="filter">
	<span>Sort by: </span>
	<a href="#filter" id="allBtn" data-option-value="*" class="selected">All</a>
	<a href="#filter" data-option-value=".Dodgeball">Dodgeball</a>
	<a href="#filter" data-option-value=".events">Events</a>
	<a href="#filter" data-option-value=".ERYC">ERYC'ish</a>
</nav>

<div class="isotope">

<?php the_post(); ?>

<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array( 'post_type' => 'home-nav', 'posts_per_page' => 20, 'paged' => $paged );
$wp_query = new WP_Query($args);
while ( have_posts() ) : the_post(); ?>
<?php include 'snippets/home.link.php'; ?>
<?php endwhile; ?>

<?php next_posts_link( '&larr; Older posts' ); ?>
<?php previous_posts_link( 'Newer posts &rarr;' ); ?>

</div>

<script>
	$(function(){
	    $('body').removeClass('green');
	});
</script>

</article>

<?php get_footer(); ?>