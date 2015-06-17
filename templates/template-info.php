<?php while ( have_rows('registration_information') ) : the_row();  ?>
<section class="component register-info" id="section-<?php echo $i; ?>">
	<div class="frame">
		<div class="content main bit-66"><?php the_sub_field('registration_description'); ?></div>
		<div class="content sidebar bit-3"><?php the_sub_field('registration_sidebar'); ?></div>
	</div>
</section>
<?php endwhile; ?>