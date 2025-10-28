<?php

/**
 * The Header template for the theme
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <!-- Main Header -->
  <header class="site-header">
    <div class="barofradness"></div>
    <div class="container header-inner">

      <!-- Left: Menu -->
      <nav class="main-nav">
        <?php
        wp_nav_menu(array(
          'theme_location' => 'primary-menu',
          'menu_class'     => 'main-menu',
          'container'      => false,
        ));
        ?>
      </nav>

      <!-- Center: Logo -->
      <div class="site-logo">
        <?php
        $header_logo = get_field('header_logo', 'option');
        if ($header_logo): ?>
          <a href="<?php echo home_url(); ?>">
            <img src="<?php echo esc_url($header_logo['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" />
          </a>
        <?php else: ?>
          <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
        <?php endif; ?>
      </div>

      <!-- Right: Buttons -->
      <div class="header-buttons">
        <?php
        $login_text = get_field('login_button_text', 'option') ?: 'Login';
        $login_url  = get_field('login_button_url', 'option');
        $get_started_text = get_field('get_started_button_text', 'option') ?: 'Get Started';
        $get_started_url  = get_field('get_started_button_url', 'option');
        ?>

        <?php if ($login_url): ?>
          <a href="<?php echo esc_url($login_url); ?>" class="btn btn-login">
            <?php echo esc_html($login_text); ?>
          </a>
        <?php endif; ?>

        <?php if ($get_started_text): ?>
          <button class="open-contact-modal btn btn-get-started">
            <?php echo esc_html($get_started_text); ?>
          </button>
        <?php endif; ?>

      </div>

    </div>
  </header>