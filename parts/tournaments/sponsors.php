<?php $titleSponsor = get_field('special_sponsors'); ?>
<?php if ($titleSponsor): ?>
<h3 class="section-title"><?php the_field('title_sponsor_title'); ?></h3>
<div class="section-description"><?php the_field('title_sponsor_description'); ?></div>
<div class="title-sponsor-section"><?php the_field('title_sponsor'); ?></div>
<?php endif; ?>

<?php $sponsorTitle = get_field('sponsor_title_primary'); ?>

<h3 class="section-title"><?php 
  if ($sponsorTitle) { 
    echo $sponsorTitle; 
  } else { 
    echo 'Sponsor'; 
  };
  ?></h3>
<div class="section-description"><?php the_field('sponsor_description'); ?></div>

<?php $images = get_field('sponsors'); if( $images ): ?>
<div class="fs-row">
<?php foreach( $images as $image ): ?>

<figure class="fs-cell fs-lg-4 fs-md-2 fs-sm-half">
  <a href="<?php echo $image['caption']; ?>">
    <img class="img-responsive" src="<?php echo $image['sizes']['landscape-640']; ?>" alt="<?php echo $image['alt']; ?>" />
  </a>
</figure>

<?php endforeach; ?>
</div>
<?php endif; ?>


<?php $images = get_field('sponsors_copy'); if( $images ): ?>
<h3 class="section-title"><?php the_field('sponsor_title'); ?></h3>
<div class="section-description"><?php the_field('sponsor_description_copy'); ?></div>

<div class="fs-row">
<?php foreach( $images as $image ): ?>

<figure class="fs-cell fs-lg-4 fs-md-2 fs-sm-half">
  <a href="<?php echo $image['caption']; ?>">
    <img class="img-responsive" src="<?php echo $image['sizes']['landscape-640']; ?>" alt="<?php echo $image['alt']; ?>" />
  </a>
</figure>

<?php endforeach; ?>
</div>
<?php endif; ?>