<form class="f-search" method="get" action="<?php echo home_url( '/' ); ?>">
        <input type="text" class="in-search" name="s" value="<?php echo get_search_query() ?>" placeholder="<?php echo esc_attr_x('search...','placeholder','vulture' );?>">
        <button type="submit" class="btn-search" name="button"><ion-icon name="ios-search"></ion-icon></button>
</form>