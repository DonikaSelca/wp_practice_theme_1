<?php
  require_once('lib/customize.php');
  require_once('lib/helpers.php');
  require_once('lib/enqueue-assets.php');
  require_once('lib/sidebars.php');
  require_once('lib/theme-support.php');
  require_once('lib/navigation.php');
  require_once('lib/include-plugins.php');
  require_once('lib/comment-callback.php');

  function practice_theme_1_icon($atts){
    extract(shortcode_atts([
      'icon' => ''
    ], $atts));
    return '<i class="' . esc_attr($icon) . '" aria-hidden ></i>';
  }

  add_shortcode('practice_theme_1_icon', 'practice_theme_1_icon');

  function practice_theme_1_handle_delete_post() {
    if(isset($_GET['action']) && $_GET['action'] === 'practice_theme_1_delete_post'){
      if(!isset($_GET['nonce']) || !wp_verify_nonce( $_GET['nonce'], 'practice_theme_1_delete_post_' . $_GET['post'])) {
      // if(!isset($_GET['nonce']) || !wp_verify_nonce( $_GET['nonce'], 'practice_theme_1_delete_post_' . $_GET['post'] ) ) {
        return;
      }
      $post_id = isset($_GET['post']) ? $_GET['post'] : null;
      $post = get_post((int)$post_id);
      if(empty($post)){
        return;
      }
      if(!current_user_can( 'delete_post', $post_id )) {
        return;
      }
      wp_trash_post($post_id);
      wp_safe_redirect( home_url());
      die;
    }
  }

  add_action( 'init', 'practice_theme_1_handle_delete_post');
  // <!-- Template tags are functions that pull files or data from the database -->
  // <!-- Action hooks allow us to modify any functions including global variables -->
  // <!-- Filer hooks only allow us to get some input, modify it and return it -->
?>
