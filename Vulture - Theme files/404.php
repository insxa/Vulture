<?php get_header() ?>


<!--content-->
<div class="container section404">
    <div class="row">
        <div class="col-12">
            <div class="error-text">
                <?php 
                $upload_custom_image = ot_get_option( 'upload_custom_image' , false );
                if ( $upload_custom_image !== false ) { ?>
                    <img src="<?php echo $upload_custom_image ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                <?php } ?>
                <?php 
                $error_content_page = ot_get_option( 'error_content_page' , false );
                if ( $error_content_page !== false ) {
                    echo $error_content_page;
                 } ?>
                <?php 
                $button_text_404 = ot_get_option( 'button_text_404' , false );
                if ( $button_text_404 !== false ) { ?>
                    <?php 
                $button_url_404 = ot_get_option( 'button_url_404' , false );
                if ( $button_url_404 !== false ) { ?>
                    <a href="<?php echo $button_url_404;}?>" class="backtohome"><?php echo $button_text_404 ?></a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer() ?>