<?php

// https://developer.wordpress.org/themes/basics/including-css-javascript/#stylesheets
wp_enqueue_style('style', get_stylesheet_uri());

// Add specific CSS class by filter.

add_filter('body_class', function($classes) {
  return array_merge($classes, array(
    'hero',
    'is-fullheight',
    'has-text-dark',
  ));
});

?>
