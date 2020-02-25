<?php
// <!--  Sets the footer sidebar layout. Explode comma seperates numbers. Loops through the columns
// and sets the widget to active if a sidebar exists-->
// <!-- Template files create the markup for your site ie get footer is template file but get post is template tag-->
// <!-- template files are php file in the root folder of your project, the hierarchy of WP decides which to display -->
$footer_layout = sanitize_text_field(get_theme_mod('_themename_footer_layout', '3,3,3,3'));
$footer_layout = preg_replace('/\s+/', '', $footer_layout);
//   $columns = explode(',', $footer_layout);
//   $footer_bg = _themename_sanitize_footer_bg(get_theme_mod('_themename_footer_bg', 'dark'));
//   // Presets $widget_active to false, loops through columns and sets variable to true if sidebar active
//   $widget_active = false;
//   foreach($columns as $i => $column){
//     if(is_active_sidebar('footer-sidebar-' . ($i + 1))){
//       $widget_active = true;
//     }
//   }
//
$columns = explode(',', $footer_layout);
$footer_bg = _themename_sanitize_footer_bg(get_theme_mod( '_themename_footer_bg', 'dark' ));
$widget_active = false;
foreach ($columns as $i => $column) {
    if( is_active_sidebar( 'footer-sidebar-' . ($i + 1) )) {
        $widget_active = true;
    }
}
?>
<!-- Checks if widget_active is true and displays the sidebar dynamically at it's index + 1 -->
<?php if($widget_active){ ?>
  <div class="c-footer c-footer--<?php echo $footer_bg ?>">
    <div class="o-container">
      <div class="o-row">
        <?php foreach($columns as $i => $column){ ?>
          <div class="o-row__column o-row__column--span-12 o-row__column--span-<?php echo $column ?>@medium">
            <?php if(is_active_sidebar('footer-sidebar-' . ($i + 1)){
              dynamic_sidebar('footer-sidebar-' . ($i + 1))
            }) ?>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
<?php } ?>
