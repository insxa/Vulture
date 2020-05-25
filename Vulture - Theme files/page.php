<?php
/**
 * The template for displaying all pages
 */

get_header(); ?>


<div class="fullimage">
    <?php the_post_thumbnail( 'full' ); ?>
    <h1><?php the_title(); ?></h1>
</div>
<div class="container">
    <div class="row pagecn">
        <div class="col-12">
            <?php 
            if ( have_posts() ) {
                while ( have_posts() ) {
                    the_post(); 

                    the_content();
                }
            }
        ?>
        </div>
    </div>
    <div class="post-row row">
        <div class="col-12">
            <?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/page/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

        </div>
    </div>
</div>

<?php
get_footer();