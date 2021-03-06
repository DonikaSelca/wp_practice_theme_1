<?php
  // <!-- after_setup_theme is used to add features that are not supported by default in WP. -->
  function _themename_theme_support(){
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-list', 'comment-form', 'gallery', 'caption'));
    add_theme_support( 'customize-selective-refresh-widgets');
    add_theme_support( 'custom-logo', array(
      'height' => 200,
      'width' => 600,
      'flex-height' => true,
      'flex-width' => true,
    ));
    add_theme_support('post-formats', array(
      'aside',
      'image',
      'video',
      'quote',
      'link',
      'gallery',
      'audio'
    ));
    add_theme_support('editor-styles');
    add_editor_style('dist/assets/css/editor.css');
  }
add_action('after_setup_theme', '_themename_theme_support');
?>
