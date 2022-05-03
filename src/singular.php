<?php get_header(); ?>

<div class="container is-align-self-flex-start">
<?php
if (have_posts()) { 
  while (have_posts()) { ?>
    <?php the_post(); ?>
  <article class="section">
    
    <div class="level">
      <div class="level-left"><h1 class="title block"><?php the_title(); ?></h1></div>
      <div class="level-right">
        <div class="level-item">✍️ <?php the_author(); ?></div>
        <div class="level-item">🗓 <?php the_date(); ?></div>
      </div>
    </div>
    <div class="content"><?php the_content(); ?></div>
  </a>
  <?php }
} ?>

</div>

<?php get_footer(); ?>
