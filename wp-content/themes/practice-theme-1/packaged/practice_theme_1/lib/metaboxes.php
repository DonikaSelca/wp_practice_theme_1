<?php
  function practice_theme_1_add_meta_box(){
    add_meta_box(
      'practice_theme_1_post_metabox',
      esc_html__( 'Post Settings', 'practice_theme_1'),
      'practice_theme_1_post_metabox_html',
      'post',
      'normal',
      'default');
  }
  add_action('add_meta_boxes', 'practice_theme_1_add_meta_box');

  function practice_theme_1_post_metabox_html($post){
    $subtitle = get_post_meta( $post->ID, '_practice_theme_1_post_subtitle', true);
    $layout = get_post_meta( $post->ID, '_practice_theme_1_post_layout', true);
    wp_nonce_field( 'practice_theme_1_update_post_metabox', 'practice_theme_1_update_post_nonce');
?>
  <p>
    <label for="practice_theme_1_post_metabox_html"><?php esc_html_e('Subtitle', 'practice_theme_1');?></label>
    <br/>
    <input class="widefat" type="text" name="practice_theme_1_post_subtitle_field" id="practice_theme_1_post_metabox_html" value="<?php echo esc_attr($subtitle);?>"/>
  </p>
  <p>
    <label for="practice_theme_1_post_layout_field"><?php esc_html_e( 'Layout', 'practice_theme_1');?></label>
    <select name="practice_theme_1_post_layout_field" id="practice_theme_1_post_layout_field" class="widefat">
      <option <?php selected( $layout, 'full');?> value="full"><?php esc_html_e( 'Full Width', 'practice_theme_1');?></option>
      <option <?php selected( $layout, 'sidebar');?> value="sidebar"><?php esc_html_e( 'Post With Sidebar', 'practice_theme_1');?></option>
    </select>
  </p>
<?php
  }

  function practice_theme_1_save_post_metabox($post_id, $post){
    $edit_cap = get_post_type_object( $post->post_type)->cap->edit_post;
    if(!current_user_can( $edit_cap, $post_id )){
      return;
    }
    if(!isset($_POST['practice_theme_1_update_post_nonce']) || !wp_verify_nonce( $_POST['practice_theme_1_update_post_nonce'], 'practice_theme_1_update_post_metabox')){
      return;
    }
    if(array_key_exists('practice_theme_1_post_subtitle_field', $_POST)){
      update_post_meta(
        $post_id,
        '_practice_theme_1_post_subtitle',
        sanitize_text_field($_POST['practice_theme_1_post_subtitle_field'])
      );
    }
    if(array_key_exists('practice_theme_1_post_layout_field', $_POST)){
      update_post_meta(
        $post_id,
        '_practice_theme_1_post_layout',
        sanitize_text_field($_POST['practice_theme_1_post_layout_field'])
      );
    }
  }
  add_action('save_post', 'practice_theme_1_save_post_metabox', 10, 2);
?>
