<?php

$images = get_field('photo_gallery');

if( $images ): ?>
<div id="slider" class="royalSlider rs-default">
<?php foreach( $images as $image ): ?>
<div>
	<img class="rsImg" src="<?php echo $image['url']; ?>">
</div>
<?php endforeach; ?>
</div>
<?php endif; ?>
