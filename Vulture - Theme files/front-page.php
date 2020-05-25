<?php get_header() ?>

<!-- Section about me -->
<div class="container">
    <?php 
   if ( ot_get_option('showabout') != "off" ) { ?>
    <div class="row mabu">
        <div class="col-12 col-md-5">
            <div class="imageme">

                <?php
                    $bigimg = ot_get_option( 'bigimg' , false );
                    if ( $bigimg !== false ) { ?>

                <img src="<?php echo ot_get_option( 'bigimg' , false ); ?>"
                    alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                <?php } ?>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="txtabt">
                <?php
                $big_title_text = ot_get_option( 'big_title_text' , false );
                if ( $big_title_text !== false ) { ?>
                <h1><?php echo ot_get_option( 'big_title_text' , false ); ?></h1>
                <?php } ?>
                <?php
                $description = ot_get_option( 'description' , false );
                if ( $description !== false ) { ?>
                <p><?php echo ot_get_option( 'description' , false ); ?></p>
                <?php } ?>
                <?php
                $linkbtn = ot_get_option( 'linkbtn' , false );
                if ( $linkbtn !== false ) { ?>
                <a class="btn-abt" href="<?php echo ot_get_option( 'linkbtn' , false ); ?>">
                    <?php
                $textbtn = ot_get_option( 'textbtn' , false );
                if ( $textbtn !== false ) { ?>

                    <?php echo ot_get_option( 'textbtn' , false ); ?>
                    <?php } ?>

                </a>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php } ?>

    <div class="row">
        <!-- Main section -->
        <div class="col-12 mbox">
            <?php 
                 if ( ot_get_option('showposts') != "off" ) { ?>
            <section class="sec-article">
                <div class="row">
                    <div class="col-6 col-sm-7">
                        <div class="headingpage">
                            <?php
                $titleposts_section = ot_get_option( 'titleposts_section' , false );
                if ( $titleposts_section !== false ) { ?>
                            <h2><?php echo ot_get_option( 'titleposts_section' , false ); ?></h2>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-6 col-sm-5">
                        <div class="scmenu">
                            <ul>
                                <?php
                $custom_url_link = ot_get_option( 'custom_url_link' , false );
                if ( $custom_url_link !== false ) { ?>
                                <li><a href="<?php echo ot_get_option( 'custom_url_link' , false ); ?>">
                                        <ion-icon name="arrow-dropleft"></ion-icon>
                                        <?php 
                                        $custom_link_text = ot_get_option( 'custom_link_text' , false );
                                        if ( $custom_link_text !== false ) { ?>
                                        <?php echo ot_get_option( 'custom_link_text' , false ); ?>
                                        <?php } ?>

                                    </a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                    $args = array(
                        'post_type' => 'post',
                        'post_status'=>'publish',
                        'posts_per_page'=> get_option('posts_per_page'),
                        'paged' => $paged,
                        'orderby' => 'date',
                        'order' => 'DESC' 
                        );

                $wp_query=new WP_Query($args);
                while ( have_posts() ) : the_post(); ?>
                    <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                        <div class="articlebox">
                            <a href="<?php the_permalink() ?>">
                                <?php                                
                                if ( has_post_thumbnail() ) { ?>
                                <header class="hdpost">
                                    <figure>
                                        <img src="<?php the_post_thumbnail(); ?>"
                                            alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                                    </figure>
                                </header>
                                <div class="scboxa">
                                    <h3>
                                        <?php the_title(); ?>
                                    </h3>
                                    <?php    }
                                else { ?>
                                    <div class="scboxa">
                                        <h3>
                                            <?php the_title(); ?>
                                        </h3>
                                        <p>
                                        <?php the_excerpt(); ?>
                                        </p>
                                        <?php    }        
                            ?>


                                        <div class="infoarc">
                                            <?php 
                      $category = get_the_category();

                      if ( $category[0] ) {
                          echo '<span class="catepost"><a href="' . get_category_link( $category[0]->term_id ) . '">' . $category[0]->cat_name . '</a></span>';
                      }
                      
                      
                      ?></span>
                                            <span class="datepost"><?php the_time('j F Y'); ?></span>
                                            <span class="clearbox"></span>
                                        </div>
                                    </div>
                            </a>

                        </div>
                    </div>
                    <?php endwhile; ?>
                    <!-- pagination
                    <div class="col-12">
                        <div class="pagenumber">
                            <?php the_posts_pagination(); ?>
                        </div>
                    </div> -->
                </div>
            </section>
            <?php } ?>
            <?php 
                $custom_html = ot_get_option( 'custom_html' , false );
                if ( $custom_html !== false ) {
                    echo ot_get_option( 'custom_html' , false );;
                  } ?>

            <?php get_footer() ?>