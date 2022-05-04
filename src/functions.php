<?php

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

// Add specific CSS class by filter.

add_filter('body_class', function($classes) {
  return array_merge($classes, array(
    'hero',
    'is-fullheight',
    'has-text-dark',
  ));
});

add_theme_support( 'menus' );

function register_menus() {
  register_nav_menus(
    array(
      'header-menu' => __('Header Menu'),
    )
  );
}
add_action('init', 'register_menus');

function add_header_menu_classes($classes, $item, $args) {
  if ('header-menu' === $args->theme_location) {
    $classes[] = 'navbar-item';
  }

  return $classes;
}
add_filter('nav_menu_css_class', 'add_header_menu_classes', 10, 4);

add_theme_support('post-thumbnails');

function add_custom_post_type() {
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
      'supports'              => array('title', 'editor', 'thumbnail'),
      'taxonomies'            => array('pug_positions')
    )
  );
}
add_action('init', 'add_custom_post_type');
?>
