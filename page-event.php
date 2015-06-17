<?php Themewrangler::setup_page();get_header('event' /***Template Name: Event */); ?>

<article id="event">
<?php the_post(); ?>

<header style="background-image: url(<?php the_field('event_header_image'); ?>);">
   <div class="frame">
	   <h1 class="bit-1 entry-title"><?php the_title(); ?></h1>
	</div>
</header>

<div class="frame" id="content">

<?php if(get_field('event_detail')): ?>
<?php if(get_field('location_info')){ ?>
<div class="bit-66 padded" id="event-main">
<?php } else { ?>
<div class="bit-1" id="event-main">
<? } ?>
<?php while(has_sub_field('event_detail')): ?>
<section class="text">

	<div class="component">
		<h3><?php the_sub_field('event_detail_title'); ?></h3>
		<p><?php the_sub_field('event_detail_description'); ?></p>
	</div>
	
	<?php $images = get_sub_field('event_detail_gallery_images');
	if( $images ): ?>
	<section class="photos normal">
	<?php foreach( $images as $image ): ?>
		<a href="<?php echo $image['sizes']['large']; ?>" class="lb">
			<img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
			<span><?php echo $image['description']; ?></span>
		</a>
	<?php endforeach; ?>
	</section>
	<?php endif;?>
	
</section>
<?php endwhile; ?>
</div>
<?php endif; ?>

<?php if(get_field('location_info')): ?>
<div class="bit-3" id="event-sidebar">
<?php while(has_sub_field('location_info')): ?>
<div class="location bit-1">

	<h3><?php the_sub_field('location_title'); ?></h3>
	<div class="content"><?php the_sub_field('location_content'); ?></div>
		
</div>
<?php endwhile; ?>
</div>
<?php endif; ?>
</div><!-- Frame -->

<?php $images = get_field('event_gallery');
if( $images ): ?>
<section class="photos">
<?php foreach( $images as $image ): ?>
<a href="<?php echo $image['sizes']['large']; ?>" class="lb">
	<img src="<?php echo $image['sizes']['square-320']; ?>" alt="<?php echo $image['alt']; ?>" />
</a>
<?php endforeach; ?>
</section>
<?php endif;?>

</section>

</article>

<?php get_footer(); ?>

