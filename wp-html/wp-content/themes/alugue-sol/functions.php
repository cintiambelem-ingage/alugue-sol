<?php
add_action('after_setup_theme', function(){
  // Suporte a título dinâmico e thumbnails
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');

  // Registrar menu
  register_nav_menu('primary', 'Menu Principal');
});

add_action('wp_enqueue_scripts', function(){
  // Bootstrap (via CDN)
  wp_enqueue_style(
    'bootstrap-css',
    'https://cdn.jsdelivr.net/npm/bootstrap@5.4.0/dist/css/bootstrap.min.css',
    [],
    '5.4.0'
  );
  // Seu CSS compilado (style.css ou main.css)
  wp_enqueue_style(
    'theme-style',
    get_stylesheet_uri(),
    ['bootstrap-css']
  );

  // Bootstrap JS Bundle
  wp_enqueue_script(
    'bootstrap-js',
    'https://cdn.jsdelivr.net/npm/bootstrap@5.4.0/dist/js/bootstrap.bundle.min.js',
    [],
    '5.4.0',
    true
  );
  // Seu JS custom (por exemplo em assets/js/main.js)
  wp_enqueue_script(
    'theme-main',
    get_template_directory_uri() . '/assets/js/main.js',
    ['bootstrap-js'],
    null,
    true
  );
});

// Allow SVG uploads
function allow_svg_uploads( $mimes ) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'allow_svg_uploads' );

