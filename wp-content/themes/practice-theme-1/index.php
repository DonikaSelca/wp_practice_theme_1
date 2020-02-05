<!-- Displays main content and deliniates screen width if there is a sidebar active -->
<?php get_header(); ?>
  <div class="o-container u-margin-bottom-40">
    <div class="o-row">
      <!--  Theme should adapt to fill space... following checks if there is a sidebar active and adapts div to fit width of screen. -->
      <div class="o-row__column o-row__column--span-12 o-row__column--span-<?php echo is_active_sidebar( 'primary-sidebar' ) ? '8' : '12'; ?>@medium">
        <main role="main">
          <?php get_template_part('loop'); ?>
        </main>
      </div>
      <?php if(is_active_sidebar('primary-sidebar')) { ?>
        <div class="o-row__column o-row__column--span-12 o-row__column--span-4@medium">
          <!--  Fetches template file called sidebar.php -->
          <?php get_sidebar(); ?>
        </div>
      <?php } ?>
    </div>
  </div>
<?php get_footer(); ?>
