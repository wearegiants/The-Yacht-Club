<?php if (get_field('frequently_asked_questions')):?>
<h3 class="section-title">You have questions, we have answers...</h3>
<br>
<div class="accordion">
  <div class="fs-row">
    <div class="fs-cell fs-lg-12 fs-md-6 fs-sm-3">
      <ul id="faq-accordion">
        <?php while ( have_rows('frequently_asked_questions') ) : the_row(); ?>
        <li class="item active">
          <a href="#tab" class="title"><?php the_sub_field('question'); ?></a>
          <div><?php the_sub_field('answer'); ?></div>
        </li>
        <?php endwhile; ?>
      </ul>
    </div>
  </div>
</div>
<?php endif; ?>