<?php
  $content = apply_filters( 'the_content', get_the_content());
  $audio = get_media_embedded_in_content( $content, array('audio', 'iframe'));
?>

<article <?php post_class('c-post u-margin-bottom-20') ?>>
  <!-- Template for displaying a post  -->
  <!-- * Mandatory: When giving a class to a post, list post_class (gives pre-set classes to post and takes other classes we want as arguement. -->
  <div class="c-post__inner">
    <?php if(get_the_post_thumbnail() !== '' && (empty($audio) || is_single())) { ?>
      <div class="c-post__thumbnail">
        <?php the_post_thumbnail('large'); ?>
      </div>
    <?php }?>
    <?php if(!is_single() && !empty($audio)) { ?>
      <div class="c-post__audio">
        <?php echo $audio[0]; ?>
      </div>
    <?php } ?>

    <?php get_template_part('template-parts/post/header');?>
    <?php if(is_single()){ ?>
      <div class="c-post__content">
        <?php
          the_content();
          wp_link_pages();
        ?>
      </div>
    <?php } else {?>
      <div class="c-post__excerpt">
        <?php the_excerpt();?>
      </div>
    <?php } ?>
    <?php if(is_single()){ ?>
      <?php get_template_part('template-parts/post/footer'); ?>
    <?php } ?>
    <?php if(!is_single()){_themename_readMore_link();} ?>
  </div>
</article>
