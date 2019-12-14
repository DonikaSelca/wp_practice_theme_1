<?php
  function firstTheme_post_meta() {
    // Translators: %s: Post Date
    printf(
      esc_html__('Posted on %s ', 'practice_theme_1'),
      '<a href="'. esc_url(get_permalink()).'"><time datetime="'. esc_attr(get_the_date('c')).'">'
      .esc_html(get_the_date()).'</time></a>'
    );
    // Translators: %s: Post Author
    printf(
      esc_html__('By %s ', 'practice_theme_1'),
      '<a href="'.esc_url(get_author_posts_url(get_the_author_meta('ID'))).'">'.esc_html(get_the_author()).'</a>'
    );
  }

  function firstTheme_readMore_link() {
    echo '<a href="'.esc_url(get_the_permalink()).'" title="'.the_title_attribute(['echo'=> false]).'">';
    // Translators: %s: Post Title
    printf(
      wp_kses(
        __('Read More <span class="u-screen-reader-text"> About %s</span>', 'practice_theme_1'),
        [
          'span'=> [
            'class'=>[]
          ]
        ]
      ),
      get_the_title()
    );
    echo '</a>';
  }
?>
