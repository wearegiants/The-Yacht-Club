<h3 class="section-title">Photo Gallery</h3>
<div class="section-description"><?php the_field('gallery_description'); ?></div>

<?php $images = get_field('gallery'); if( $images ): ?>
<div class="fs-row">
<?php foreach( $images as $image ): ?>

<figure class="fs-cell fs-lg-3 fs-md-2 fs-sm-half">
  <a class="popup" href="<?php echo $image['url']; ?>">
    <img class="img-responsive" src="<?php echo $image['sizes']['square-320']; ?>" alt="<?php echo $image['alt']; ?>" />
  </a>
</figure>

<?php endforeach; ?>
</div>
<?php endif; ?>