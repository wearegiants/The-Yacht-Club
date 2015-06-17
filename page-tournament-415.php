<?php Themewrangler::setup_page(
  '415-styles|not default|not grid|not layout|not royalslider|not rs-default|not rs-min|not mailchimp|not accordion|not layout-update|not main.min',
  '415-scripts|not smartajax|not plugins|not superfish|not easing|not isotope|not fitvids|not magnific|not scripts|not royalslider'
);get_header('415' /***Template Name: Tournament 4/15 */); ?>

<?php
  $image = get_field('hero_image');
  if( !empty($image) ):
  $url = $image['url'];
  $title = $image['title'];
  $alt = $image['alt'];
  $caption = $image['caption'];
  $size = 'hero';
  $thumb = $image['sizes'][ $size ];
  $width = $image['sizes'][ $size . '-width' ];
  $height = $image['sizes'][ $size . '-height' ];
  endif;
?>

<div id="tournament--hero" class="banner <?php if( $image ):?>overlayed<?php endif; ?>" style="background-image:url(<?php echo $thumb; ?>);">
  <div class="fs-row">
    <div class="fs-cell fs-lg-11 fs-md-6 fs-sm-3 fs-centered">
      <h1 class="title"><?php the_field('tournament_name'); ?></h1>
      <div class="dates"><?php the_field('tournament_date'); ?></div>
      <div class="buttons">
        <?php the_field('tournament_buttons'); ?>
      </div>
    </div>
  </div>

</div>

<?php if( have_rows('nav_links') ): ?>
<div id="tournament--nav" class="page-subnav">
  <div class="fs-row">
    <div class="fs-cell fs-lg-11 fs-md-6 fs-sm-3 fs-centered">
      <nav class="navigation">
        <a class="btn btn-link register" href="<?php the_field('register_link'); ?>" target="blank">Register</a>
        <?php while ( have_rows('nav_links') ) : the_row(); ?>
        <a class="btn btn-link" href="<?php the_sub_field('link_link'); ?>"><?php the_sub_field('link_name'); ?></a>
        <?php endwhile; ?>
      </nav>
    </div>
  </div>
</div>
<?php endif; ?>

<div id="tournament--desc" class="description-section">
  <div class="fs-row">
    <div class="fs-cell fs-lg-11 fs-md-6 fs-sm-3 fs-centered">
      <div class="fs-row">
        <div class="fs-cell fs-lg-7 fs-md-4 fs-sm-3">
          <?php the_field('description'); ?>
        </div>
        <div class="fs-cell fs-lg-4 fs-md-2 fs-sm-3 fs-right">
          <?php include locate_template('parts/tournaments/details.php' ); ?>
        </div>
      </div>
    </div>
  </div>
</div>

<hr class="invisible">

<div id="tournament--faq" class="faq-section tourney-section">
  <div class="fs-row">
    <div class="fs-cell fs-lg-11 fs-md-6 fs-sm-3 fs-centered">
      <?php include locate_template('parts/tournaments/faq.php' ); ?>
    </div>
  </div>
</div><!-- FAQ -->

<?php $sponsors = get_field( "sponsors" ); $special = get_field( "special_sponsors" ); if(  $sponsors || $special ): ?>
<div id="tournament--sponsors" class="sponsors-section tourney-section">
  <div class="fs-row">
    <div class="fs-cell fs-lg-11 fs-md-6 fs-sm-3 fs-centered">
      <?php include locate_template('parts/tournaments/sponsors.php' ); ?>
    </div>
  </div>
</div>
<?php endif; ?>

<?php $value = get_field( "gallery" ); if(  $value ): ?>
<div id="tournament--gallery" class="gallery-section tourney-section">
  <div class="fs-row">
    <div class="fs-cell fs-lg-11 fs-md-6 fs-sm-3 fs-centered">
      <?php include locate_template('parts/tournaments/gallery.php' ); ?>
    </div>
  </div>
</div>
<?php endif; ?>

<div id="tournament--about" class="about-section tourney-section">
  <div class="fs-row">
    <div class="fs-cell fs-lg-11 fs-md-6 fs-sm-3 fs-centered">
      <?php include locate_template('parts/tournaments/about.php' ); ?>
    </div>
  </div>
</div>

<?php get_footer('415'); ?>
