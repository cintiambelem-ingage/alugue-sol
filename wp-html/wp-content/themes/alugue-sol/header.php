<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <nav id="mainNav" class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
      <a class="navbar-brand" href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
              data-bs-target="#navMenu" aria-controls="navMenu" aria-expanded="false">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div id="navMenu" class="collapse navbar-collapse">
        <?php
          wp_nav_menu([
            'theme_location' => 'primary',
            'container'      => false,
            'menu_class'     => 'navbar-nav ms-auto',
            'fallback_cb'    => false,
            'depth'          => 1,
            'link_before'    => '',
            'link_after'     => '',
          ]);
        ?>
      </div>
    </div>
  </nav>
  <main>

  <!-- header.php -->
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <!-- meta, wp_head(), etc -->
</head>
  <main>

