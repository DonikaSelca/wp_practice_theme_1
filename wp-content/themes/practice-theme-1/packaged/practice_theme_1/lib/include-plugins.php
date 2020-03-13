<?php
  require_once get_template_directory() . '/lib/class-tgm-plugin-activation.php';
  // require_once get_template_directory() . '/lib/class-tgm-plugin-activation.php';

  add_action( 'tgmpa_register', 'practice_theme_1_register_required_plugins');

  function practice_theme_1_register_required_plugins(){
    $plugins = array(
      array(
        'name' => 'practice_theme_1 metaboxes',
        'slug' => 'practice_theme_1-metaboxes',
        'source' => get_template_directory_uri() . '/lib/plugins/practice_theme_1-metaboxes.zip',
        'required' => true,
        'version' => '1.0.0',
        'force-activation' => false,
        'force-deactivation' => false
      ),
      array(
        'name' => 'practice_theme_1 shortcodes',
        'slug' => 'practice_theme_1-shortcodes',
        'source' => get_template_directory_uri() . '/lib/plugins/practice_theme_1-shortcodes.zip',
        'required' => true,
        'version' => '1.0.0',
        'force-activation' => false,
        'force-deactivation' => false
      )
    );

    $config = array(

    );

    tgmpa($plugins, $config);
  }
?>
