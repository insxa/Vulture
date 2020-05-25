<?php get_header() ?>


<!--content-->
<div id="post-<?php the_ID(); ?>" <?php post_class( 'container' ); ?>>
    <div class="row">
        <div class="col-12">

            <div class="post-row">
                <!--Breadcrumb-->
                <?php 
                 if ( ot_get_option('show_breadcrumb') != "off" ) { ?>
                <div class="breadcb">
                    <?php get_breadcrumb(); ?>
                </div>
                <?php } ?>
                <div class="a-title">
                    <h1><?php the_title(); ?></h1>
                </div>
                <div class="a-author">
                    <div class="info-p">
                        <?php 
                        if ( ot_get_option('show_post_date') != "off" ) { ?>
                        <span class="datepublish"><?php echo get_the_date('F j, Y'); ?> _ <?php } ?>
                            <?php the_category(' , '); ?></span>
                    </div>
                </div>
                <div class="p-img">
                    <?php the_post_thumbnail( 'full' ); ?>
                </div>

                <article class="maincontent">
                    <?php 
            if ( have_posts() ) {
                while ( have_posts() ) {
                    the_post(); 
                    the_content();
                }
            }
        ?>
                </article>
                <div class="datapost">

                    <div class="shareicons" id="ishare">
                        <?php 
                if ( ot_get_option('show_share_buttons') != "off" ) { ?>
                        <?php wcr_share_buttons(); ?>
                        <?php } ?>
                    </div>
                    <div class="a-tags">
                        <?php the_tags(' ' , ' '); ?>
                    </div>
                </div>

                <?php 
                if ( ot_get_option('show_author_box') != "off" ) { ?>
                <div class="row postauther aboutauthor">
                    <div class="col-12 col-xl-1">
                    <?php 
                        echo get_avatar( get_the_author_meta( 'ID' ), 60 ); 
                    ?>
                    </div>
                    <div class="col-12 col-xl-10">
                    <div class="info-a">
                        <span class="nameauthor"><?php the_author(); ?></span><br>
                        <span class="de-me"><?php echo get_the_author_meta('description'); ?></span>
                    </div>
                    </div>
                </div>
                <?php } ?>

                <?php 
                if ( ot_get_option('show_related_posts') != "off" ) { ?>
                <div class="postmo">
                    <?php
                        $tags = wp_get_post_tags($post->ID);
                        if ($tags) {
                        echo '<h2>' . __("Related Posts", 'vulture') . '</h2>';
                        $first_tag = $tags[0]->term_id;
                        $args=array(
                        'tag__in' => array($first_tag),
                        'post__not_in' => array($post->ID),
                        'posts_per_page'=>3,
                        'ignore_sticky_posts'=>1
                        );
                    ?>
                    <div class="rltpost row">
                        <?php
                    $my_query = new WP_Query($args);
                    if( $my_query->have_posts() ) {
                    while ($my_query->have_posts()) : $my_query->the_post(); ?>
                        <div class="col-12 col-sm-6 col-lg-4">
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
                        <?php
          endwhile;
          }
          wp_reset_query();
          }
        ?>
                </div><?php } ?>

                <div class="cm">
                    <div class="usercm">
                        <div class="ucm">
                            <?php comments_template(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer() ?>