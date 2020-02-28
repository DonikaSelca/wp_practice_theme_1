<form role="search" method="get" class="c-search-form" action="<?php echo esc_url(home_url('/')) ?>">
  <!-- Search form that's screen reader ready -->
    <label class="c-search-form__label">
        <span class="screen-reader-text"><?php echo esc_html_x('Search for:','label','practice-theme-1') ?></span>
        <!-- Bc we use 's' for name WP knows and will display the search page template and filter the post against the search query
        the value attribute populates the placeholder with what was searched for -->
        <input type="search" class="c-search-form__field" placeholder="<?php echo esc_attr_x('Search &hellip;','placeholder','practice-theme-1') ?>" value="<?php echo esc_attr(get_search_query()) ?>" name="s"/>
    </label>
    <button class="c-search-form__button" type="submit"><span class="u-screen-reader-text"><?php echo esc_html_x('Search','submit button','practice-theme-1'); ?></span><i class="fas fa-search" aria-hidden="true"></i></button>
</form>
