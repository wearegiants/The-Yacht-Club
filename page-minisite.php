<?php Themewrangler::setup_page();get_header('event' /***Template Name: MiniSite */); ?>

<?php include('snippets/headernav.php'); ?>

<article id="promo">
<?php the_post(); ?>

<header>

<div class="meta">
  <div class="frame"><h1 class="entry-title"><?php the_content(); ?></h1></div>
</div>

<?php if( get_field('header_slideshow_overlay') ){ echo "<div class='slider_overlay'></div>"; }?>

<?php $images = get_field('header_slideshow'); if( $images ): ?>
<div id="minisiteSlider" class="royalSlider rsMinW">
<?php foreach( $images as $image ): ?>
<img class="rsImg" src="<?php echo $image['sizes']['minisite-slider']; ?>" alt="<?php echo $image['alt']; ?>" />
<?php endforeach; ?>
</div>
<?php endif;?><!-- Mini Site Slider -->

</header>

<?php include('snippets/acf-flex-fields.php'); ?>

<div class="content frame">

<div class="description bit-1">
  <?php the_field('promo_page_description'); ?>
</div>

<?php $images = get_field('promo_photo_gallery'); if( $images ): ?>
<div id="photogallery" class="bit-3">
<?php foreach( $images as $image ): ?>
  <figure class="image">
    <img src="<?php echo $image['sizes']['minisite-slider']; ?>" alt="<?php echo $image['alt']; ?>" />
    <figcaption><?php echo $image['alt']; ?></figcaption>
  </figure>
<?php endforeach; ?>
</div>
<?php endif;?><!-- Photo Gallery -->

</div><!-- Content -->

<?php if(get_field('promo_secondary_page_description')): ?>
<div class="content frame secondary-desc">

<div class="description bit-1">
<?php the_field('promo_secondary_page_description'); ?>
</div>
<?php endif; ?>

<?php

if( have_rows('frequently_asked_questions') ): ?>

  <div class="accordion page-section">

    <h3>Frequently Asked Questions</h3>
    <ul id="faq-accordion">

    <?php while ( have_rows('frequently_asked_questions') ) : the_row(); ?>

      <li class="item active">
        <a href="#tab" class="title"><?php the_sub_field('question'); ?></a>
        <div><?php the_sub_field('answer'); ?></div>
      </li>

    <?php endwhile;?>

    </ul>
  </div>

<?php endif; ?>

</div><!-- Content -->

<?php $images = get_field('footer_slideshow'); if( $images ): ?>
<div id="footerSlider" class="royalSlider rsMinW">
<?php foreach( $images as $image ): ?>
<img class="rsImg" src="<?php echo $image['sizes']['minisite-slider']; ?>" alt="<?php echo $image['alt']; ?>" />
<?php endforeach; ?>
</div>
<?php endif;?><!-- Mini Site Slider -->





</article>

<?php get_footer(); ?>

