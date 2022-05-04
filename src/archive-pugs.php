<?php get_header(); ?>

<div class="container">
  <div class="has-text-centered	block">
    <h1 class="title"><?php echo __('Pugs', 'sadpugs') ?></h1>
  </div>
  <div class="section tabs is-centered">
    <ul>
      <?php 
      $positions = get_terms( array(
        'taxonomy' => 'pug_positions',
        'hide_empty' => false,
      ));
      ?>
      <?php foreach ($positions as $position) { ?>
        <li><a href="/pugs/positions/<?php echo $position->slug; ?>"><?php echo $position->name; ?></a></li>
      <?php } ?>
    </ul>
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
