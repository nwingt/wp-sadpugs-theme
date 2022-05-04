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
  <div>
    <?php
    if (have_posts()) { ?>
      <ul class="columns is-flex-wrap-wrap">
      <?php 
      while (have_posts()) {
        the_post();
        get_template_part('template-parts/post/pug-thumbnail');
      }
      ?>
      </ul>
      <div class="tags is-justify-content-center">
        <?php if (get_previous_posts_link()) { ?>
          <div class="tag"><?php previous_posts_link('Previous Page'); ?></a> 
        <?php } ?>
        <?php if (get_next_posts_link()) { ?>
          <div class="tag"><?php next_posts_link('Next Page'); ?></a>
        <?php } ?>
      </div>
      <?php
    } else {
      _e('Sorry, no pugs matched your criteria.', 'sadpugs');
    }
    ?>
  </div>
</div>

<?php get_footer(); ?>
