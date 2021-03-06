<?php
// Builds the primary sidebar option on the wp admin page and establishes what it will look like on front end. (Displayed by code in template file sidebar.php)
  function practice_theme_1_sidebar_widgets(){
    register_sidebar(array(
      'id' => 'primary-sidebar',
      'name' => esc_html__('Primary Sidebar', 'practice_theme_1'),
      'description' => esc_html__('This sidebar appears on the blog posts page', 'practice_theme_1'),
      'before_widget' => '<section id="%1$s" class="c-sidebar-widget u-margin-bottom-20 %2$s">',
      'after_widget' => '</section>',
      'before_title' => '<h5>',
      'after_title' => '</h5>'
    ));
  }

  // Explodes the footer layout into array of comma serperated columns (Any increment up to 12) and creates an alternating color choice of footer background
  $footer_layout = sanitize_text_field(get_theme_mod('practice_theme_1_footer_layout', '3,3,3,3'));
  $footer_layout = preg_replace('/\s+/', '', $footer_layout);
  // Explode takes as args: separator and string
  $columns = explode(',', $footer_layout);
  $footer_bg = practice_theme_1_sanitize_footer_bg(get_theme_mod( 'practice_theme_1_footer_bg', 'dark' ));
  $widget_theme = '';
  if($footer_bg == 'light'){
    $widget_theme = 'c-footer-widget--dark';
  } else {
    $widget_theme = 'c-footer-widget--light';
  }

  // Builds the footer sidebar, determines appearance and pulls $widget_theme from above.
  foreach($columns as $i => $column){
    register_sidebar(array(
      // Id must be unique so we append the index of the sidebar.
      'id' => 'footer-sidebar-' . ($i + 1),
      // The second arg of sprintf is what is replacing the modulus (%) (in this case the index bc it represents a particular column.)
      'name' => sprintf(esc_html__('Footer Widget Column %s', 'practice_theme_1'), $i + 1),
      'description' => esc_html__('Footer Widgets', 'practice_theme_1'),
      // The placeholders are for classes prepopulated by WP. Appending the $widget_theme variable applies class based on $footer_bg.
      'before_widget' => '<section id="%1$s" class="c-footer-widget' . $widget_theme . '%2$s">',
      'after_widget' => '</section>',
      'before_title' => '<h5>',
      'after_title' => '</h5>'
    ));
  }
  // When widgets initializes, we need to run this function
  add_action('widgets_init', 'practice_theme_1_sidebar_widgets');
?>
