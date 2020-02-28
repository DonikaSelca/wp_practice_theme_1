<?php get_header(); ?>
<?php
  $layout = _themename_meta( get_the_ID(), '__themename_post_layout', 'full');
  $sidebar = is_active_sidebar('primary-sidebar');
  if($layout === 'sidebar' && !$sidebar) {
    $layout = 'full';
  }
?>
<!-- Displays main content and deliniates screen width if there is a sidebar active -->
  <div class="o-container u-margin-bottom-40 o-single-post-<?php echo $layout;?>">
    <div class="o-row">
      <!--  Theme should adapt to fill space... following checks if there is a sidebar active and adapts div to fit width of screen. -->
      <div class="o-row__column o-row__column--span-12 o-row__column--span-<?php echo $layout === 'sidebar' ? '8' : '12' ?>@medium">
        <main role="main">
          <?php if(have_posts()) { ?>
            <!-- When searching for a catergory or key word, loops through which posts to display and gets the template or displays a no content message -->
            <!-- Coding the loop allows us to get info like title() content() from the global variable $post without having to reference an ID  -->
            <?php while(have_posts()) { ?>
              <!--  Calling the global variable the post allows us to access a particular post with template tags-->
              <?php the_post(); ?>
              <!-- Template tags that start with "the" echo the results as opposed to "get" which simply returns the output -->
              <?php get_template_part('template-parts/post/content'); ?>
            <?php } ?>
          <?php } else { ?>
            <?php get_template_part('template-parts/post/content', 'none'); ?>
          <?php } ?>
        </main>
      </div>
      <?php if($layout === 'sidebar'){ ?>
        <div class="o-row__column o-row__column--span-12 o-row__column--span-4@medium">
          <!--  Fetches template file called sidebar.php -->
          <?php get_sidebar(); ?>
        </div>
      <?php } ?>
    </div>
  </div>
<?php get_footer(); ?>
