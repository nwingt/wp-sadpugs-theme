<li class="column section is-one-third">
  <a href="<?php the_permalink(); ?>" alt="<?php the_title(); ?>">
    <div class="card">
      <div class="card-image">
        <figure class="image is-square">
          <img src="<?php the_post_thumbnail(200); ?>" alt="<?php the_title(); ?>">
        </figure>
      </div>
      <div class="card-content">
        <h2 class="title block"><?php the_title(); ?></h1>
      </div>
    </div>
  </a>
</li>
