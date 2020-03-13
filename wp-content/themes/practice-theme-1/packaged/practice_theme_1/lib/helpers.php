<?php
// Function that dispays the date and author of a post (the helpers are compartmentalized pieces of the entire post)
  function practice_theme_1_post_meta() {
    // Translators: %s: Post Date
    printf(
      esc_html__('Posted on %s ', 'practice_theme_1'),
// Time tag allows for any format bc it's read by humans but datetime tag is read by computers and needs specific format
      '<a href="'. esc_url(get_permalink()).'"><time datetime="'. esc_attr(get_the_date('c')).'">'
      // Get the date template tag doesn't get format bc it's chosen by user in wp-admin - hardcoding would force user to display it one way
      .esc_html(get_the_date()).'</time></a>'
    );
    // Translators: %s: Post Author
    printf(
      esc_html__('By %s ', 'practice_theme_1'),
      '<a href="'.esc_url(get_author_posts_url(get_the_author_meta('ID'))).'">'.esc_html(get_the_author()).'</a>'
    );
  }

// Function that displays the permalink(posts page) and title as a link to read more
  function practice_theme_1_readMore_link() {
    echo '<a class="c-post__readmore" href="'.esc_url(get_the_permalink()).'" title="'.the_title_attribute(['echo'=> false]).'">';
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

  function practice_theme_1_delete_post() {
    $url = add_query_arg([
      'action' => 'practice_theme_1_delete_post',
      'post' => get_the_ID(),
      'nonce' => wp_create_nonce('practice_theme_1_delete_post_' . get_the_ID())
    ],
    home_url());
    if(current_user_can( 'delete_post', get_the_ID())) {
      return "<a href='" . esc_url($url) . "'>" . esc_html__('Delete Post', 'practice_theme_1') . "</a>";
    }
  }

  function practice_theme_1_meta($id, $key, $default) {
    $value = get_post_meta($id, $key, true);
    if(!$value && $default) {
      return $default;
    }
    return $value;
  }
// <!--  Internationalization and Localization -->
// <!--  esc_ : the_permalink is already escaped by WP ...esc escapes any potentially harmful code by barring user from injecting code-->
// <!--  __ translates stings and returns value (doesn't allow variables but can be wrapped in a printf function)
//       _e will translate sting and echo it (doesn't allow variables but also can be wrapped in printf)
// <!-   printf prints a formateed string so we are allowed to insert variables into a string
//         variable is represented by % and the type of placeholder. ie %s for string variable or %d for digits.
//         printf will echo itself. The second arguement to printf is the dynamic element being replaced with % -->
// <!--  sprintf does the same as printf but does not echo -->
// <!--  esc_html_e escapes and translates html ... should be used bc translators can also inject scripts in code. -->
// <!--  esc_html__ escapes html and translates however doesn't echo and doesn't allow variables -->
// <!--  wp_kses escapes html and also allows for html thats been declared as a second argument within an array to act as exceptions for translated strings
//          ie ['span' => ['class'=>[]]] The array contains keys of html tags to allow, each with it's own array of allowed attributes. -->
?>
