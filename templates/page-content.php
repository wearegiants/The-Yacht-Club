<?php while (have_posts()) : the_post(); ?>
<div class="page-content">
  <div class="row">
    <?php the_content(); ?>
  </div>
</div>
<?php endwhile; ?>