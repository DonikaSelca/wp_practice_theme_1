<?php
  $inline_styles_selectors = array(
    'a' => array(
      'color' => '_themename_accent_color'
    ),
    ':focus' => array(
      'outline-color' => '_themename_accent_color'
    ),
    '.c-post.sticky' => array(
      'border-left-color' => '_themename_accent_color'
    ),
    'button, input[type=submit], .header-nav .menu > .menu-item:not(.mega) .sub-menu .menu-item:hover > a' => array(
      'background-color' => '_themename_accent_color'
    ),
    '.header-nav .menu > .menu-item.mega > .sub-menu > .menu-item > .sub-menu a:hover' => array(
      'color' => '_themename_accent_color'
    ),
    '.header-nav .menu > .menu-item.mega .sub-menu .menu-item > a:hover' => array(
      'color' => '_themename_accent_color'
    ),
    '.navigation.pagination .nav-links a:hover' => array(
      'background-color' => '_themename_accent_color'
    ),
    '::selection' => array(
      'background-color' => '_themename_accent_color'
    ),
    'button.c-search-form__button:hover' => array(
      'background-color' => '_themename_accent_color'
    ),
    'a:active' => array(
      'color' => '_themename_accent_color'
    ),
    '.c-post.format-link .c-post__excerpt p' => array(
      'background-color' => '_themename_accent_color'
    ),
    '.c-post.format-quote blockquote' => array(
      'background-color' => '_themename_accent_color'
    )
  );

  $inline_styles = "";

  foreach ($inline_styles_selectors as $selector => $props) {
    $inline_styles .= "{$selector} {";
      foreach ($props as $prop => $value) {
        $inline_styles .= "{$prop}: " . sanitize_hex_color(get_theme_mod($value, '#20ddae')) . ";";
      }
    $inline_styles .= "}";
  }
?>
