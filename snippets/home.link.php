<div id="post-<?php the_ID(); ?>" class="trythis item <?php if( get_field('home_nav_wide')){echo "eight";}else{echo "four";}?> columns <?php
$posttags = wp_get_post_terms( get_the_ID() , 'post_tag' , 'fields=names' );
if( $posttags ) echo implode( ' ' , $posttags );
?>">
	<div class="meta">
		<h2><a href="<? the_field( "home_nav_link" ); ?>"><?php the_title(); ?></a></h2>
		<?php the_content(); ?>
	</div>
	<?php
	if ( in_category( 'featured' )) {?>
	<div class="pazazz"></div>
	<?}?>
	<a href="<? the_field( "home_nav_link" ); ?>">
	<?php if ( has_post_thumbnail() ) { the_post_thumbnail('large', array('class' => 'thumbnail')); } ?>
	</a>
</div>
