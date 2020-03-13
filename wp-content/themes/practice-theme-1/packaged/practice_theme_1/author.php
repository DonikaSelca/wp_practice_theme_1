<?php get_header(); ?>
<!-- Displays author page - Also establishes main content width depending on whether there is a primary sidebar active -->
<?php
  $author_id = get_query_var('author');
  $author_posts = count_user_posts($author);
  $author_display = get_the_author_meta('display_name', $author);
  $author_description = get_the_author_meta( 'user_description', $author );
  $author_website = get_the_author_meta('user_url', $author);
?>
  <div class="o-container u-margin-bottom-40">
    <div class="o-row">
      <div class="o-row__column o-row__column--span-12 o-row__column--span-4@medium">
        <header>
          <?php echo get_avatar($author, 128); ?>
          <h1 class="u-margin-top-20"><b><?php echo esc_html($author_display) ?></b></h1>
          <div class="c-post-author__info">
            <?php
              printf(esc_html(_n( '%s post', '%s posts', $author_posts,'practice_theme_1')), number_format_i18n($author_posts));
            ?>
            <br />
            <?php if($author_website){ ?>
              <a target="_blank" href="<?php echo esc_url($author_website); ?>"><?php echo esc_html($author_website) ?></a>
            <?php } ?>
          </div>
          <p class="c-post-author__desc"><?php echo esc_html($author_description)?></p>
        </header>
      </div>
      <div class="o-row__column o-row__column--span-12 o-row__column--span-8@medium">
        <main role="main">
          <!--  get_template_part first arg is slug(path of the file to display)
          Second arg is 'name' that compartmentalizes your file. (Developers modifying your theme can create and modify specific loop files like archive vs index instead of the whole loop) ie 'template-parts/post/content', 'none'
          *Child theme friendly (looks for loop.php in child theme and if it doesn't find it falls back on parent theme.)-->
          <?php get_template_part('loop', 'author'); ?>
        </main>
      </div>
    </div>
  </div>
<?php get_footer(); ?>
