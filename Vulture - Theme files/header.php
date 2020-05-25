<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php wp_title(''); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class() ?>>

    <!-- Header -->
    <header class="hindex">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-2">
                    <div class="logosction">
                    <?php if (ot_get_option('darkmode') !="off") { ?>
                        <?php
                            $light_header_logo = ot_get_option( 'light_header_logo' , false );
                            if ( $light_header_logo !== false ) { ?>
                        <a href="<?php echo get_home_url(); ?>">
                            <img src="<?php echo ot_get_option( 'light_header_logo' , false ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                        </a>
                        <?php }else { ?>
                            <h1><?php bloginfo( 'name' ); ?></h1>
                        <?php } ?>
                        <?php }else {
                            $logo = ot_get_option( 'logo' , false );
                            if ( $logo !== false ) { ?>
                        <a href="<?php echo get_home_url(); ?>">
                            <img src="<?php echo ot_get_option( 'logo' , false ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                        </a>
                        <?php }else { ?>
                            <h1><?php bloginfo( 'name' ); ?></h1>
                       <?php } ?>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-2">
                    <div class="headericons him">

                        <div class="menucontact">
                            <div id="mySidenav" class="sidenav">
                                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

                                <!-- Menu php code -->
                                <?php wp_nav_menu( array( 'theme_location' => 'Main-menu' ) ); ?>
                                <?php 
                                if ( ot_get_option('showsearch') != "off" ) { ?>
                                <div class="searchinsidenav">
                                    <?php get_search_form(); ?>
                                </div>
                                <?php } ?>
                            </div>

                            <span onclick="openNav()">
                                <ion-icon name="ios-menu" class="iconmenu"></ion-icon>
                            </span>

                            <div id="main">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>