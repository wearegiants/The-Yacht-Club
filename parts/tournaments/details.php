<?php if (get_field('tournament_details')):?>
<div id="details">
  <?php while ( have_rows('tournament_details') ) : the_row(); ?>
  <div class="item">
    <span class="title"><?php the_sub_field('header'); ?></span>
    <?php the_sub_field('body'); ?>
  </div>
  <?php endwhile; ?>
</div>
<?php endif; ?>