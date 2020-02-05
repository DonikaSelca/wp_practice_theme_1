<!-- Navigation-->
<!-- Mega menu comes specifically from CSS -->
<!-- When styling menus always use > symbol (styles direct child just in case you have children of an dropdown or submenu that have different styles.)
      Also when styling submenus always use absolute positioning so they appear as block when menu is open -->
 <!-- Register different menu names and locations  -->
<?php
  function _themename_registration_menus() {
    // Registers nav menus with an array of locations.
    register_nav_menus(array(
      'main-menu' => esc_html__('Main Menu'),
      'footer-menu' => esc_html__('Footer Menu')
    ));
  }
  // Hook into init function of wp_object using function (missing priority and number of args)
  add_action('init', '_themename_registration_menus', '_themename_registration_menus');

  // Filters childen of a dropdown menu to establish attributes
  // $atts - an array attributes for the link (Check below for other arg definitions)
  function _themename_aria_hasdropdown($atts, $item, $args){
    if($args->theme_location == 'main-menu') {
      if(in_array('menu-item-has-children', $item->classes)) {
        // 'aria-haspopup' references whether a menu is expandable. Adds this attribute to link.
        $atts['aria-haspopup'] = 'true';
        // 'aria-expanded' references whether a menu is open. Set to false by default bc menu starts closed.
        $atts['aria-expanded'] = 'false';
      }
    }
    return $atts;
  }
  // If the function you're hooking into the filter or action has arguments, they must be listed.
  add_filter('nav_menu_link_attributes', '_themename_aria_hasdropdown', 10, 3);

  // Turns icon into button that creates spans with different classes for screen readers. Spans are hidden by screen reader text class descriptors in CSS
  function _themename_submenu_button($dir = 'down', $title){
    $button = '<button class="menu-button">';
    // Adds the title to the button and whether to show/hide title for screen readers and classes for JS to toggle.
    $button .= '<span class="u-screen-reader-text menu-button-show">' . sprintf(esc_html__('Show %s submenu', '_themename'), $title) . '</span>';
    // By default menu is closed so we add 'aria-hiiden=true' so the first span of text shows. JS will toggle this class.
    $button .= '<span aria-hidden="true" class="u-screen-reader-text menu-button-hide">' . sprintf(esc_html__('Hide %s submenu', '_themename'), $title) . '</span>';
    // Concatonates correct $dir to icon
    $button .= '<i class="fa fa-angle-' . $dir .'" aria-hidden="true"></i>';
    $button .= '</button>';
    return $button;
  }

  // Filters through if menu has children and delinates which title and button icon to display based on depth
  // Title is navigation title we need to filter
  // Item is post object (contains info like ID etc...)
  // Args refers to args given in wp_nav_menu in header.php
  // Depth starts at 0 and refers to how far down a level menu we are. 1 layer = 0, 2 layers = 1, etc..
  function _themename_dropdown_icon($title, $item, $args, $depth) {
    if($args->theme_location == 'main-menu') {
      // checks if item has an array of classes called 'menu-item-has-children'
      if(in_array('menu-item-has-children', $item->classes)) {
        // if depth is 0 (first menu level) show down, else more than 0 show right
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
