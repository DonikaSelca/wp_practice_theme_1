<?php
  $prev_post = get_previous_post();
  $next_post = get_next_post();
?>

<?php if($prev_post || $next_post) { ?>
  <nav class="c-post-navigation" role="navigation">
    <h2 class="u-screen-reader-text"><?php esc_attr_e( 'Post Navigation', '_themename') ?></h2>
      <div class="c-post-navigation__links">
        <?php if($prev_post) { ?>
          <div class="c-post-navigation__post c-post-navigation__post--prev">
            <a class="c-post-navigation__link" href="<?php the_permalink($prev_post->ID) ?>">
              <?php if(has_post_thumbnail($prev_post->ID)) { ?>
                <div class="c-post-navigation__thumbnail">
                  <?php echo get_the_post_thumbnail($prev_post->ID, 'thumbnail'); ?>
                </div>
              <?php } ?>
              <div class="c-post-navigation__content">
                <span class="c-post-navigation__subtitle">
                  <?php esc_html_e('Previous Post', '_themename'); ?>
                </span>
                <span class="c-post-navigation__title">
                  <?php echo esc_html(get_the_title($prev_post->ID)); ?>
                </span>
              </div>
            </a>
          </div>
        <?php } ?>
        <?php if($next_post) { ?>
          <div class="c-post-navigation__post c-post-navigation__post--next">
            <a class="c-post-navigation__link" href="<?php the_permalink($next_post->ID) ?>">
              <?php if(has_post_thumbnail($next_post->ID)) { ?>
                <div class="c-post-navigation__thumbnail">
                  <?php echo get_the_post_thumbnail($next_post->ID, 'thumbnail'); ?>
                </div>
              <?php } ?>
              <div class="c-post-navigation__content">
                <span class="c-post-navigation__subtitle">
                  <?php esc_html_e('Next Post', '_themename'); ?>
                </span>
                <span class="c-post-navigation__title">
                  <?php echo esc_html(get_the_title($next_post->ID)); ?>
                </span>
              </div>
            </a>
          </div>
        <?php } ?>
      </div>
  </nav>
<?php } ?>
