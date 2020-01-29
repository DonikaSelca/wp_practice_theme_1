<!-- Navigation-->

 <!-- Register different menu names and locations  -->
<?php
  function _themename_registration_menus() {
    register_nav_menus(array(
      'main-menu' => esc_html__('Main Menu'),
      'footer-menu' => esc_html__('Footer Menu')
    ));
  }
  // Hook into init function of wp_object using function (missing priority and number of args)
  add_action('init', '_themename_registration_menus', '_themename_registration_menus');

// Filters childen of a dropdown menu to establish attributes
  function _themename_aria_hasdropdown($atts, $item, $args){
    if($args->theme_location == 'main-menu') {
      if(in_array('menu-item-has-children', $item->classes)) {
        $atts['aria-haspopup'] = 'true';
        $atts['aria-expanded'] = 'false';
      }
    }
    return $atts;
  }
  add_filter('nav_menu_link_attributes', '_themename_aria_hasdropdown', 10, 3);

// Turns icon into button that creates spans with different classes for screen readers. Spans are hidden by screen reader text class descriptors in CSS
  function _themename_submenu_button($dir = 'down', $title){
    $button = '<button class="menu-button">';
    $button .= '<span class="u-screen-reader-text menu-button-show">' . sprintf(esc_html__('Show %s submenu', '_themename'), $title) . '</span>';
    $button .= '<span aria-hidden="true" class="u-screen-reader-text menu-button-hide">' . sprintf(esc_html__('Hide %s submenu', '_themename'), $title) . '</span>';
    $button .= '<i class="fa fa-angle-' . $dir .'" aria-hidden="true"></i>';
    $button .= '</button>';
    return $button;
  }

// Filters through if menu has children and delinates which title and button icon to display based on depth
  function _themename_dropdown_icon($title, $item, $args, $depth) {
    if($args->theme_location == 'main-menu') {
      if(in_array('menu-item-has-children', $item->classes)) {
        if($depth == 0) {
          $title .= _themename_submenu_button('down', $title);
        } else {
          $title .= _themename_submenu_button('right', $title);
        }
      }
    }
    return $title;
  }
add_filter( 'nav_menu_item_title', '_themename_dropdown_icon', 10, 4 );

?>
