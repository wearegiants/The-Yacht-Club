<div class="content frame sponsors">

<?php if(get_sub_field('sponsor_section_description')): ?>
<div class="title bit-1">
  <?php the_sub_field('sponsor_section_description'); ?>
</div>
<?php endif; ?>

<?php $sponsorimages = get_sub_field('sponsors_images'); if( $sponsorimages ): ?>

<?php foreach( $sponsorimages as $sponsorimage ): ?>
<div class="sponsor bit-4">
	<a href="<?php echo $sponsorimage['caption']; ?>" target="blank"><img class="img-responsive" src="<?php echo $sponsorimage['url']; ?>"></a>
</div>
<?php endforeach; ?>

<?php endif; ?>

</div><!-- Content -->



