<?php if(have_posts()) { ?>
  <!-- When searching for a catergory or key word, loops through which posts to display and gets the template or displays a no content message -->
  <!-- Coding the loop allows us to get info like title() content() from the global variable $post without having to reference an ID  -->
  <?php while(have_posts()) { ?>
    <!--  Calling the global variable the post allows us to access a particular post with template tags-->
    <?php the_post(); ?>
    <!-- Template tags that start with "the" echo the results as opposed to "get" which simply returns the output -->
    <?php get_template_part('template-parts/post/content'); ?>
  <?php } ?>
  <?php the_posts_pagination() ?>
  <!--  Below is the action hook for the function we created that allows other developers to modify and insert some code here. -->
  <?php do_action('_themename_after_pagination'); ?>
<?php } else { ?>
  <?php get_template_part('template-parts/post/content', 'none'); ?>
<?php } ?>
