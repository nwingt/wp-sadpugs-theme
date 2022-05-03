<?php 
get_header();

// https://developer.wordpress.org/themes/basics/the-loop/#what-the-loop-can-display
if (have_posts()) { ?>
  <div><h1 class="title">Plog</h1></div>
  <?php while (have_posts()) { ?>
    <?php the_post(); ?>
    <article>
      <h1><?php the_title(); ?></h1>
      <div><?php the_content(); ?></div>
    </article>
  <?php }
} else {
  _e('No more plog.', 'sadpugs');
}

get_footer();
?>
