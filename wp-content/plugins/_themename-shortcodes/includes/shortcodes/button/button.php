<?php
  function _themename_button($atts = [], $content = null, $tag = ''){
    extract(shortcode_atts([
      'color' => 'red',
      'text' => 'Button'
    ], $atts, $tag));
    return '<button class="_themename_button style="background-color: ' . esc_attr($color) . '">' . do_shortcode($content) . '</button>';
  }

  function _themename_icon($atts){
    extract(shortcode_atts([
      'icon' => ''
    ], $atts));
    return '<i class="' . esc_attr($icon) . '" aria-hidden ></i>';
  }

  add_shortcode('_themename_icon', '_themename_icon');
  add_shortcode('_themename_button', '_themename_button');

?>
