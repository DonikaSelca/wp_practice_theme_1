<!DOCTYPE html>
<html <?php language_attributes() ?> >
<!-- Adds language attributes, charset and title(wp_head) dynamically -->
  <head>
    <meta charset="<?php bloginfo('charset')?>;">
    <?php wp_head() ?>
  <!-- *Mandatory: Body class is same as post_class (adds pre-populated CSS classes) -->
  <body <?php body_class(); ?>>
    <a class="u-skip-link" href="#content"><?php esc_attr_e('Skip to Content', 'practice-theme-1'); ?></a>
<!--  Displays header with logo, name, search form and navigation menu -->
    <header role="banner" class="u-margin-bottom-40">
      <div class="c-header">
        <div class="o-container u-flex u-align-justify u-align-middle">
          <div class="c-header__logo">
            <?php if(has_custom_logo()){
              the_custom_logo();
            } else { ?>
            <a class="c-header__blogname" href="<?php echo esc_url(home_url('/'));?>"><?php esc_html(bloginfo('name')); ?></a>
          <?php } ?>
          </div>
          <!-- get_search_form takes as arg a boolean of whether to echo so we give it value of true. -->
          <!-- Also generates html for search form but first looks for template file called seachform.php -->
          <?php get_search_form(true); ?>
        </div>
      </div>
      <div class="c-navigation">
        <div class="o-container">
          <nav class="header-nav" role="navigation" aria-label="<?php esc_html_e('Main-Navigation', 'practice-theme-1') ?>">
            <?php
              // Grabs the nav menu from theme location at the key we gave it in navigation.php
              wp_nav_menu(array('theme_location' => 'main-menu'))?>
          </nav>
        </div>
      </div>
    </header>

<!-- For accessability: connects to <a> before beader that allows a screen reader to skip header links straight to main content -->
    <div id="content">
