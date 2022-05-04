<?php

if ( ! function_exists( 'sadpugs_theme_setup' ) ) {
	function sadpugs_theme_setup() {

    if (!is_admin()) {
      // https://developer.wordpress.org/themes/basics/including-css-javascript/#stylesheets
      wp_enqueue_style('style', get_stylesheet_uri());
  
      // https://developer.wordpress.org/reference/functions/wp_enqueue_script/
      wp_enqueue_script(
        'menu',
        get_template_directory_uri() . '/assets/js/menu.js',
        array('jquery'),
        wp_get_theme()->get( 'Version' ),
        true
      );
    }

    // Add specific CSS class by filter.
    add_filter('body_class', function($classes) {
      return array_merge($classes, array(
        'hero',
        'is-fullheight',
        'has-text-dark',
      ));
    });

    add_theme_support('post-thumbnails');
    add_theme_support('menus');

    register_nav_menus(
      array(
        'header-menu' => __('Header Menu'),
      )
    );

    // https://developer.wordpress.org/reference/functions/register_taxonomy/
    register_taxonomy(
      'pug_positions',
      array('pugs'),
      array(
        'labels'       => array(
          'name'          => __( 'Pug Positions', 'sadpugs' ),
          'singular_name' => __( 'Pug Position', 'sadpugs' ),
        ),
        'public'          => true,
        'hierarchical' => false,
        'rewrite'      => array('slug' => 'pugs/positions', 'with_front' => false)
      )
    );

    // https://developer.wordpress.org/reference/functions/register_post_type/
    register_post_type('pugs',
      array(
        'labels'                => array(
          'name'          => __( 'Pugs', 'sadpugs' ),
          'singular_name' => __( 'Pug', 'sadpugs' ),
        ),
        'menu_icon'             => 'dashicons-pets',
        'public'                => true,
        'has_archive'           => true,
        'supports'              => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'taxonomies'            => array('pug_positions')
      )
    );
	}
}
add_action('after_setup_theme', 'sadpugs_theme_setup');

function add_header_menu_classes($classes, $item, $args) {
  if ('header-menu' === $args->theme_location) {
    $classes[] = 'navbar-item';
  }

  return $classes;
}
add_filter('nav_menu_css_class', 'add_header_menu_classes', 10, 4);

// Limit the posts per page to 9
function set_posts_per_page($query) {
  global $wp_the_query;

  if (!is_admin() && $query === $wp_the_query && $query->is_archive()) {
    $query->set('posts_per_page', 9);
  }

  return $query;
}
add_action('pre_get_posts', 'set_posts_per_page');
?>
