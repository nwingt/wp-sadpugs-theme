<?php get_header(); ?>

<div class="container">
  <div class="has-text-centered	block">
    <h1 class="title"><?php echo get_queried_object()->name; ?> Pugs</h1>
  </div>
  <ul class="columns is-flex-wrap-wrap">
    <?php
    if (have_posts()) {
      while (have_posts()) {
        the_post();
        get_template_part('template-parts/post/pug-thumbnail');
      }
    } else {
      _e('Sorry, no pugs matched your criteria.', 'sadpugs');
    }
    ?>
  </ul>
</div>

<?php get_footer(); ?>
