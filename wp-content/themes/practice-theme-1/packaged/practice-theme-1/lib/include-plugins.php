<?php
  require_once get_template_directory() . '/lib/class-tgm-plugin-activation.php';
  // require_once get_template_directory() . '/lib/class-tgm-plugin-activation.php';


  function practice-theme-1_register_required_plugins(){
    $plugins = array(
      array(
        'name' => 'practice-theme-1 metaboxes',
        'slug' => 'practice-theme-1-metaboxes',
        'source' => get_template_directory_uri() . 'lib/plugins/practice-theme-1-metaboxes.zip',
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
  add_action( 'tgmpa_register', 'practice-theme-1_register_required_plugins');
?>
