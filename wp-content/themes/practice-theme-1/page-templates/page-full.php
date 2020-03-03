<?php
/*
Template Name: Full Width Page
*/
get_header(); ?>
<!-- Displays main content and deliniates screen width if there is a sidebar active -->
  <div class="o-container u-margin-bottom-40">
    <div class="o-row">
      <!--  Theme should adapt to fill space... following checks if there is a sidebar active and adapts div to fit width of screen. -->
      <div class="o-row__column o-row__column--span-12 o-row__column--span-12@medium">
        <main role="main">
        <?php get_template_part('loop', 'page');?>
        </main>
      </div>
    </div>
  </div>
<?php get_footer(); ?>
