    <div class="row">
    <div class="col-12">
        <div class="copyright-text">
            <?php 
                 if ( ot_get_option('showsocial') != "off" ) { ?>
            <ul class="mysocial">
                <?php
                    $linkedin = ot_get_option( 'linkedin' , false );
                    if ( $linkedin !== false ) { ?>
                <li><a href="<?php echo $linkedin ?>">
                        <ion-icon name="logo-linkedin"></ion-icon>
                    </a></li> <?php } ?>
                <?php
                    $github = ot_get_option( 'github' , false );
                    if ( $github !== false ) { ?>
                <li><a href="<?php echo $github ?>">
                        <ion-icon name="logo-github"></ion-icon>
                    </a></li> <?php } ?>
                <?php
                    $dribbble = ot_get_option( 'dribbble' , false );
                    if ( $dribbble !== false ) { ?>
                <li><a href="<?php echo $dribbble ?>">
                        <ion-icon name="logo-dribbble"></ion-icon>
                    </a></li> <?php } ?>
                <?php
                    $twitter = ot_get_option( 'twitter' , false );
                    if ( $twitter !== false ) { ?>
                <li><a href="<?php echo $twitter ?>">
                        <ion-icon name="logo-twitter"></ion-icon>
                    </a></li> <?php } ?>

                <?php
                    $instagram = ot_get_option( 'instagram' , false );
                    if ( $instagram !== false ) { ?>
                <li><a href="<?php echo $instagram ?>">
                <ion-icon name="logo-instagram"></ion-icon>
                    </a></li> <?php } ?>
                
                <?php
                    $facebook = ot_get_option( 'facebook' , false );
                    if ( $facebook !== false ) { ?>
                <li><a href="<?php echo $facebook ?>">
                        <ion-icon name="logo-facebook"></ion-icon>
                    </a></li> <?php } ?>

                    <?php
                    $youtube = ot_get_option( 'youtube' , false );
                    if ( $youtube !== false ) { ?>
                <li><a href="<?php echo $youtube ?>">
                        <ion-icon name="logo-youtube"></ion-icon>
                    </a></li> <?php } ?>

                    
                    <?php
                    $pinterest = ot_get_option( 'pinterest' , false );
                    if ( $pinterest !== false ) { ?>
                <li><a href="<?php echo $pinterest ?>">
                <ion-icon name="logo-pinterest"></ion-icon>
                    </a></li> <?php } ?>

                    <?php
                    $rss = ot_get_option( 'rss' , false );
                    if ( $rss !== false ) { ?>
                <li><a href="<?php echo $rss ?>">
                <ion-icon name="logo-rss"></ion-icon>
                    </a></li> <?php } ?>

                    <?php
                    $wordpress = ot_get_option( 'wordpress' , false );
                    if ( $wordpress !== false ) { ?>
                <li><a href="<?php echo $wordpress ?>">
                <ion-icon name="logo-wordpress"></ion-icon>
                    </a></li> <?php } ?>

            </ul>
            <?php } ?>
            <?php
                            $copyright = ot_get_option( 'copyright' , false );
                            if ( $copyright !== false ) {
                               echo ot_get_option( 'copyright' , false );;
                        } ?>
        </div>
    </div>
</div>
</div>
</div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->


<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>
<?php wp_footer(); ?>
</body>

</html>