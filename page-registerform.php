<?php Themewrangler::setup_page(
  '415-styles|not default|not grid|not layout|not royalslider|not rs-default|not rs-min|not mailchimp|not accordion|not layout-update|not main.min',
  '415-scripts|not smartajax|not plugins|not superfish|not easing|not isotope|not fitvids|not magnific|not scripts|not royalslider'
);get_header('415' /***Template Name: Registration Form */); ?>



<div class="banner banner--register" style="background-image:url('<?php $image = get_field('background_image'); if( !empty($image) ): ?><?php echo $image['url']; ?><?php endif; ?>');">
  <div class="fs-row">
    <div class="fs-cell fs-lg-11 fs-md-6 fs-sm-3 fs-centered">
      <h1 class="title"><?php the_title(); ?></h1>
      <div class="dates"><?php the_field('season_dates'); ?></div>
    </div>
  </div>
</div>

<hr class="invisible">

<div id="event--content" class="fs-row">
  <div class="fs-cell fs-lg-11 fs-md-6 fs-sm-3 fs-centered">
    <div class="fs-row">
      <div class="fs-cell fs-lg-4 fs-md-2 fs-sm-3">
        <?php while (have_posts()) : the_post(); ?>
          <?php the_content(); ?>
        <?php endwhile; ?>
      </div>
      <div class="fs-cell fs-lg-7 fs-md-4 fs-sm-3 fs-right">
        <?php 
          $shortcode = get_field('gravity_form_shortcode');
          echo do_shortcode( $shortcode );
        ?>
      </div>
    </div>
  </div>
</div>

<?php get_footer('415'); ?>
