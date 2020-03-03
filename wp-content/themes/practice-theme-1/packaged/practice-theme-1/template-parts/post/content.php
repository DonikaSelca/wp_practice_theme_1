<article <?php post_class('c-post u-margin-bottom-20') ?>>
  <!-- Template for displaying a post  -->
  <!-- * Mandatory: When giving a class to a post, list post_class (gives pre-set classes to post and takes other classes we want as arguement. -->
  <h2 class="c-post__title">
    <!--  The_title() is different from the_title_attribute in the the second is cleaned up to fit attribute criteria.
  Both display the title but attributes don't allow all characters (like quotes)-->
    <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"> <?php the_title() ?> </a>
  </h2>
  <div class="c-post__meta">
    <?php practice-theme-1_post_meta(); ?>
  </div>
  <div class="c-post__excerpt">
    <?php the_excerpt(); ?>
    <?php practice-theme-1_readMore_link(); ?>
    <?php echo practice-theme-1_delete_post(); ?>
  </div>
</article>