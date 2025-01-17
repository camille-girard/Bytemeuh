<form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
    <label>
        <span class="screen-reader-text"><?php echo _x('Search for:', 'label'); ?></span>
        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Type something to search...', 'placeholder'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
        <i class="fa fa-search search-icon"></i>
    </label>
</form>
