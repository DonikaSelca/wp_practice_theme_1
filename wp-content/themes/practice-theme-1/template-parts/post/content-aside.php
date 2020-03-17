<article <?php post_class('c-post u-margin-bottom-20') ?>>
  <!-- Template for displaying a post  -->
  <!-- * Mandatory: When giving a class to a post, list post_class (gives pre-set classes to post and takes other classes we want as arguement. -->
  <div class="c-post__inner">
    <div class="c-post__content">
      <?php the_content(); ?>
    </div>

    <div class="c-post__meta">
      <?php _themename_post_meta(); ?>
    </div>

    <?php if(is_single()){ ?>
      <?php get_template_part('template-parts/post/footer'); ?>
    <?php } ?>
  </div>
</article>
