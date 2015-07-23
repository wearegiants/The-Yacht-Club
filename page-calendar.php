<?php Themewrangler::setup_page(
  '415-styles|not default|not grid|not layout|not royalslider|not rs-default|not rs-min|not mailchimp|not accordion|not layout-update|not main.min',
  '415-scripts|not smartajax|not plugins|not superfish|not easing|not isotope|not fitvids|not magnific|not scripts|not royalslider'
);get_header('415' /***Template Name: Calendar */); ?>

<div class="fs-row">
<div class="fs-cell fs-full-all">
<?php the_post(); ?>
<?php the_content(); ?>
</div>
</div>

<?php get_footer('415'); ?>
