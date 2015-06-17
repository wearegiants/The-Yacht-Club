<nav id="main-nav">
<div class="frame">

<?php 

if ( is_page( array( 'DETROIT' ))) {
  
  wp_nav_menu( array('theme_location' => 'detroit-menu', 'container' => false, 'walker' => new clean_nav() ) );
  wp_nav_menu( array('theme_location' => 'detroit-social-menu', 'container' => false, 'walker' => new clean_nav() ) );
  
} else {
  wp_nav_menu( array('theme_location' => 'main-menu', 'container' => false, 'walker' => new clean_nav() ) );
  wp_nav_menu( array('theme_location' => 'social-menu', 'container' => false, 'walker' => new clean_nav() ) );
}

?>

</div>
</nav><!-- Main Nav -->
