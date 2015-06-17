<?php
  $thumb_id = get_post_thumbnail_id();
  $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'header-bg', true);
  $thumb_url = $thumb_url_array[0];
?>

<div class="page-header" data-speed="1.25" style="background-image:url(<?php echo $thumb_url; ?>);">
  <div class="row">
    <div class="desktop-12">
      <h1 class="title"><?php the_title(); ?></h1>
    </div>
  </div>
</div>
