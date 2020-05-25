<?php get_header() ?>

<div class="container">
    <div class="row mbox">
        <!-- Main section -->
        <div class="col-12 col-lg-9">
            <section class="sec-article">
                <div class="row">
                    <div class="col-12">
                        <div class="headingpage">
                            <h2><?php wp_title( '' ); ?></h2>
                        </div>
                    </div>

                    <?php if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) : the_post();  ?>
                    <div class="col-12 col-sm-6 col-md-4">
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

                    <!-- pagination -->
                    <div class="col-12">
                        <div class="pagenumber">
                            <?php the_posts_pagination(); ?>
                        </div>
                    </div>

                    <?php else : ?>
                    <p><?php _e('Sorry, no posts matched your criteria.', 'vulture'); ?></p>
                    <?php endif; ?>

                </div>
            </section>
        </div>
        <!--Sidebar Section-->
        <?php get_sidebar() ?>
    </div>
</div>

<?php get_footer() ?>