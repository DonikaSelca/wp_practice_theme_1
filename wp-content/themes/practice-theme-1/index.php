<?php get_header(); ?>
  My First Theme

  <?php if(have_posts()) { ?>
    <?php while(have_posts()) { ?>
      <?php the_post(); ?>
        <h2>
          <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"> <?php the_title() ?> </a>
        </h2>
        <div>
          <?php firstTheme_post_meta(); ?>
        </div>
        <div>
          <?php the_excerpt(); ?>
          <?php firstTheme_readMore_link(); ?>
        </div>
    <?php } ?>
    <?php the_posts_pagination() ?>
  <?php } else { ?>
    <p>Sorry, there are no posts that match your criteria.</p>
  <?php } ?>

<?php get_footer(); ?>
