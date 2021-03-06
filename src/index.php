<?php get_header(); ?>

<div class="container">
<?php
// https://developer.wordpress.org/themes/basics/the-loop/#what-the-loop-can-display
if (have_posts()) { ?>
  <div><h1 class="title">Plog</h1></div>
  <?php while (have_posts()) { ?>
    <?php the_post(); ?>
    <a class="section" href="<?php the_permalink(); ?>" alt="<?php the_title(); ?>">
      <div class="section box">
        <h1 class="title block"><?php the_title(); ?></h1>
        <div class="content"><?php the_content(); ?></div>
      </div>
    </a>
  <?php }
} else {
  _e('No more plog.', 'sadpugs');
}
?>

</div>

<?php get_footer(); ?>
