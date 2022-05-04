<?php get_header(); ?>

<div class="container columns is-align-self-flex-start is-centered">
<?php
if (have_posts()) { 
  while (have_posts()) { ?>
    <?php the_post(); ?>
  <article class="section column is-half-desktop">
    <h1 class="block title has-text-centered"><?php the_title(); ?></h1>
    <div class="card">
      <div class="card-image">
        <figure class="image is-square">
          <img src="<?php the_post_thumbnail(200); ?>" alt="<?php the_title(); ?>">
        </figure>
      </div>
      <div class="card-footer">
        <div class="card-footer-item">
          <div class="tags">
            <?php
            $positions = get_the_terms($post->ID, 'pug_positions');
            foreach ($positions as $position) {
                $tag_class = "";
                switch ($position->slug) {
                  case 'technical':
                    $tag_class = 'is-info';
                    break;
                  case 'design':
                    $tag_class = 'is-danger';
                    break;
                  case 'operation':
                    $tag_class = 'is-warning';
                    break;
                  case 'business':
                    $tag_class = 'is-success';
                    break;
                  default:
                    $tag_class = 'is-primary';
                    break;
                }
              ?>
              <span class="tag <?php echo $tag_class; ?>"><?php echo $position->name ?></span>
            <?php } ?>
          </div>
        </div>
      </div>
      <?php 
      $sadness = get_post_meta($post->ID, 'sadness', true);
      if ($sadness) { ?>
        <div class="card-footer">
          <div class="card-footer-item">
            <div class="has-text-weight-bold">Sadness</div>
          </div>
          <div class="card-footer-item">
            <div class="is-italic"><?php echo $sadness; ?></div>
          </div>
        </div>
      <?php } ?>
    </div>
    <div class="content"><?php the_content(); ?></div>
  </a>
  <?php }
} ?>

</div>

<?php get_footer(); ?>
