<?php get_header() ?>

<div class="container">
    <div class="row mbox">
        <!-- Main section -->
        <div class="col-12 col-lg-9">
            <section class="sec-article">
                <div class="row">
                    <div class="col-12">
                        <div class="headingpage">
                            <h2><?php single_tag_title( '' ); ?></h2>
                        </div>
                    </div>

                    <?php if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) : the_post();  ?>
                    <div class="col-12 col-sm-6 col-md-4">
                        <a href="<?php the_permalink() ?>">
                            <div class="articlebox">
                                <header>
                                    <figure>
                                        <img src="<?php the_post_thumbnail(); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                                    </figure>
                                </header>
                                <div class="scboxa">
                                    <a href="<?php the_permalink() ?>">
                                        <h3>
                                            <?php the_title(); ?>
                                        </h3>
                                    </a>

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
                            </div>
                        </a>
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