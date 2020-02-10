<!-- Includes stylesheets, jquery and scripts into project. -->
<?php
  function _themename_assets(){
    // ('unique-name-for-stylesheet', 'source which is appended path for the file', array() of dependencies, version, media = 'all' for all media queries )
    wp_enqueue_style('_themename-stylesheet', get_template_directory_uri().
    '/dist/assets/css/bundle.css', array(), '1.0.0', 'all');
    // jquery is enqueued this way bc it is included in the wordpress core (Can also be added as an array of dependencies in scripts below).
    wp_enqueue_script('jquery');
    // enqueueing scripts is same arguements except for final. It's a boolean that determins where the script is going to go. True is declaring yes put it in the footer.
    wp_enqueue_script('_themename-scripts', get_template_directory_uri().
    '/dist/assets/js/bundle.js', array(), '1.0.0', true);
  }
  // adds action into hook args('action_name', 'function_name')
  add_action('wp_enqueue_scripts', '_themename_assets');

// First function is for the main page and the one bellow is for the wp admin page
  function _themename_admin_assets(){
    wp_enqueue_style('_themename-admin-stylesheet', get_template_directory_uri().
    '/dist/assets/css/admin.css', array(), '1.0.0', 'all');
    wp_enqueue_script('_themename-admin-scripts', get_template_directory_uri().
    '/dist/assets/js/admin.js', array(), '1.0.0', true);
  }
  add_action('admin_enqueue_scripts', '_themename_admin_assets');

  function _themename_customize_preview_js(){
    wp_enqueue_script('_themename-customize-preview', get_template_directory_uri().
    '/dist/assets/js/customize-preview.js', array('customize-preview', 'jquery'), '1.0.0', true);
  }

  add_action('customize_preview_init', '_themename_customize_preview_js');

?>
