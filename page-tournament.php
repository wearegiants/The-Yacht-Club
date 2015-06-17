<?php Themewrangler::setup_page();get_header('event' /***Template Name: Tournament */); ?>


<style>	
	#minisite .component a,
	#minisite .component a:visited {
		color: <?php the_field('main_color');?>!important;
	}
	
	#minisite .component h1 {
		color: <?php the_field('main_color');?>!important;
	}
	
	#minisite .component h2,
	#minisite .component h3,
	#minisite .component h4,
	#minisite .component h5,
	#minisite .component h6,
	#minisite .component h7 {
		color: <?php the_field('secondary_color');?>!important;
	}
	
	.component .frame {
		color: <?php the_field('secondary_color');?>;
	}
	
	#minisite #photos .overlay {
		background: <?php the_field('main_color');?>;
	}
</style>

<article id="minisite">
<?php the_post(); ?>

	<section id="splash" class="fullscreen" style="background-image: url('<?php the_field('key_art'); ?>');">
		<div class="absolute">
		<div class="table">
		<div class="cell">
			<div class="frame">
				<div class="meta bit-1">
					<div class="logo"></div>
					<?php the_content(); ?>
				</div>
			</div>
		</div>
		</div>
		</div>
	</section>
	
	<?php if(get_field('page_component')): $i = 0; ?>
	<?php while(has_sub_field('page_component')): $i++; ?>
	
	<!-- Small Text Block -->
	<?php if(get_sub_field('component_type') == "small-textblock") {?>
	<section class="component" id="section-<?php echo $i; ?>">
	<div class="frame">
	<?php the_sub_field('component_description'); ?>
	</div>
	</section>
	<?}?>
	
	<!-- Image Gallery -->
	<?php if(get_sub_field('component_type') == "photogallery") {?>
	<?php $images = get_sub_field('component_photo_gallery');
	if( $images ): ?>
	<section id="photos" class="component">
	<?php foreach( $images as $image ): ?>
	<a href="<?php echo $image['sizes']['large']; ?>" class="lb bit-10">
		<span class="overlay absolute"></span>
		<img src="<?php echo $image['sizes']['square-320']; ?>" alt="<?php echo $image['alt']; ?>" />
	</a>
	<?php endforeach; ?>
	<div class="frame">
		<div class="caption">
			<p><?php the_sub_field('component_photo_caption'); ?></p>
		</div>
	</div>
	</section>
	<?php endif;?>
	<?}?>
	
	<!-- Sponsors -->
	<?php if(get_sub_field('component_type') == "sponsor-block") {?>
	<?php $images = get_sub_field('component_sponsors');
	if( $images ): ?>
	<section id="sponsors" class="component frame">
	<h2>Thank you to our supporters:</h2>
	<?php foreach( $images as $image ): ?>
	<div class="bit-4">
		<div class="table"><div class="cell">
			<a href="<?php echo $image['caption']; ?>" target="blank">
			<img src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>" />
		</a>
		</div></div>
	</div>
	<?php endforeach; ?>
	</section>
	<?php endif;?>
	<?}?>
	
	<!-- Full Screen Dealio -->
	<?php if(get_sub_field('component_type') == "fullscreen-textblock") {?>
	<section class="component fullscreen photo" style="height: 470px ;background-image: url('<?php the_sub_field('component_background_image'); ?>');">
		<div class="absolute">
		<div class="table">
		<div class="cell">
			<div class="frame">
			<?php the_sub_field('component_description'); ?>
			</div>
		</div>
		</div>
		</div>
	</section>
	<?}?>
		
	<?php if(get_sub_field('component_type') == "registration-info"){ include('templates/template-info.php'); }?>			
	
	<?php endwhile; ?>
	<?php endif; ?>

</article>

<script>
$(function () {
	
	var divs = $('#splash .frame');
	var wh = $(window).height();
	
	//$('.fullscreen').css('height', 770);
	
	$(window).on('scroll', function() {
	   var st = $(this).scrollTop();
	   divs.css({ 'opacity' : (1 - st/(wh/1.3)) });
	});
	
	$('#photos').magnificPopup({
		delegate: 'a.lb',
		type: 'image',
		closeOnContentClick: false,
		closeBtnInside: false,
		mainClass: 'mfp-with-zoom mfp-img-mobile',
		image: {
			verticalFit: true,
		},
		gallery: {
			enabled: true
		},
		zoom: {
			enabled: true,
			duration: 300, // don't foget to change the duration also in CSS
			opener: function (element) {
				return element.find('img');
			}
		}

	});
});
</script>
<style>footer{display: none;}</style>
<?php get_footer(); ?>

