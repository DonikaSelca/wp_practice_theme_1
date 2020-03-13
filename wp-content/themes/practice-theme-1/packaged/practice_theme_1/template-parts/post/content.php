<article <?php post_class('c-post u-margin-bottom-20') ?>>
  <!-- Template for displaying a post  -->
  <!-- * Mandatory: When giving a class to a post, list post_class (gives pre-set classes to post and takes other classes we want as arguement. -->
  <div class="c-post__inner">
    <?php if(get_the_post_thumbnail() !== ''){ ?>
      <div class="c-post__thumbnail">
        <?php the_post_thumbnail('large');?>
      </div>
    <?php }?>

    <header class="c-post__header">
      <?php if(is_single()){ ?>
        <h1 class="c-post__single-title">
          <!--  The_title() is different from the_title_attribute in the the second is cleaned up to fit attribute criteria.
        Both display the title but attributes don't allow all characters (like quotes)-->
          <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"> <?php the_title() ?> </a>
        </h1>
      <?php } else {?>
        <h2 class="c-post__title">
          <!--  The_title() is different from the_title_attribute in the the second is cleaned up to fit attribute criteria.
        Both display the title but attributes don't allow all characters (like quotes)-->
          <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"> <?php the_title() ?> </a>
        </h2>
      <?php } ?>
      <div class="c-post__meta">
        <?php practice_theme_1_post_meta(); ?>
      </div>
    </header>

    <?php if(is_single()){ ?>
      <div class="c-post__contentt">
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
      <footer class="c-post__footer">
        <?php
          if(has_category()) {
            echo '<div class="c-post__cats">';
            /* translators: used between categories */
            $cats_list = get_the_category_list(esc_html__( ', ', 'practice_theme_1' ));
            /* translators: %s is the categories list */
            printf(esc_html__('Posted in %s', 'practice_theme_1'), $cats_list);
            echo '</div>';
          }
          if(has_tag()){
            echo '<div class="c-post__tags">';
            $tags_list = get_the_tag_list( '<ul><li>','</li><li>', '</li></ul>');
            echo $tags_list;
            echo '</div>';
          }
        ?>
      </footer>
    <?php } ?>
    <?php if(!is_single()){practice_theme_1_readMore_link();} ?>
  </div>
</article>
