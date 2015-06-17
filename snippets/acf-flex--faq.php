<div class="content frame faq">

<?php if(get_sub_field('minisite_rules_title')): ?>
<div class="title bit-1">
  <h3><?php the_sub_field('minisite_rules_title'); ?></h3>
</div>
<?php endif; ?>

<?php if(get_sub_field('minisite_rules_desc')): ?>
<div class="description bit-1">
  <p><?php the_sub_field('minisite_rules_desc'); ?></p>
</div>
<?php endif; ?>

<div class="description bit-1">
  <?php while( have_rows('minisite_rules') ): the_row(); ?>
  <div class="item">
    <h4><?php the_sub_field('minisite_rules--question'); ?></h4>
    <p><?php the_sub_field('minisite_rules--answer'); ?></p>
  </div><!-- FAQ Item -->
  
  <?php endwhile; ?>
</div>

</div><!-- Content -->