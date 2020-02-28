<?php
// <!-- Includes stylesheets, jquery and scripts into project. -->
  function practice-theme-1_assets(){
    // ('unique-name-for-stylesheet', 'source which is appended path for the file', array() of dependencies, version, media = 'all' for all media queries )
    wp_enqueue_style('practice-theme-1-stylesheet', get_template_directory_uri().
    '/dist/assets/css/bundle.css', array(), '1.0.0', 'all');
    include(get_template_directory() . '/lib/inline-css.php');
    wp_add_inline_style('practice-theme-1-stylesheet', $inline_styles);
    // jquery is enqueued this way bc it is included in the wordpress core (Can also be added as an array of dependencies in scripts below).
    wp_enqueue_script('jquery');
    // enqueueing scripts is same arguements except for final. It's a boolean that determins where the script is going to go. True is declaring yes put it in the footer.
    wp_enqueue_script('practice-theme-1-scripts', get_template_directory_uri().
    '/dist/assets/js/bundle.js', array(), '1.0.0', true);
  }
  // adds action into hook args('action_name', 'function_name')
  add_action('wp_enqueue_scripts', 'practice-theme-1_assets');

// First function is for the main page and the one bellow is for the wp admin page
  function practice-theme-1_admin_assets(){
    wp_enqueue_style('practice-theme-1-admin-stylesheet', get_template_directory_uri().
    '/dist/assets/css/admin.css', array(), '1.0.0', 'all');
    wp_enqueue_script('practice-theme-1-admin-scripts', get_template_directory_uri().
    '/dist/assets/js/admin.js', array(), '1.0.0', true);
  }
  add_action('admin_enqueue_scripts', 'practice-theme-1_admin_assets');

  function practice-theme-1_customize_preview_js(){
    wp_enqueue_script('practice-theme-1-customize-preview', get_template_directory_uri().
    '/dist/assets/js/customize-preview.js', array('customize-preview', 'jquery'), '1.0.0', true);
    include(get_template_directory() . '/lib/inline-css.php');
    wp_localize_script( 'practice-theme-1-customize-preview', 'practice-theme-1', array('inline-css' => $inline_styles_selectors));
  }

  add_action('customize_preview_init', 'practice-theme-1_customize_preview_js');
?>
