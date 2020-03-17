<?php if(have_posts()) { ?>
  <!-- When searching for a catergory or key word, loops through which posts to display and gets the template or displays a no content message -->
  <!-- Coding the loop allows us to get info like title() content() from the global variable $post without having to reference an ID  -->
  <?php while(have_posts()) { ?>
    <!--  Calling the global variable the post allows us to access a particular post with template tags-->
    <?php the_post(); ?>
    <!-- Template tags that start with "the" echo the results as opposed to "get" which simply returns the output -->
    <?php get_template_part('template-parts/post/content', get_post_format()); ?>
    <?php
      if(get_theme_mod( '_themename_display_author_info', true )){
        get_template_part('template-parts/single/author');
      }
    ?>
    <?php get_template_part( 'template-parts/single/navigation'); ?>
    <?php
      if(comments_open() || get_comments_number()){
        comments_template();
      }
    ?>
  <?php } ?>
<?php } else { ?>
  <?php get_template_part('template-parts/post/content', 'none'); ?>
<?php } ?>
