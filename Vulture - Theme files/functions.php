<?php 
add_action( 'after_setup_theme', 'vulture_load_theme_textdomain' );
function vulture_load_theme_textdomain() {
    load_theme_textdomain( 'vulture', get_template_directory() . '/languages' );
}
// Connect to stylesheet and javascript files

function loadfiles()
{
    //stylesheet  
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css',false,'1.1','all');
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . 'https://fonts.googleapis.com/css?family=Montserrat|Poppins:100,400,500,600,700&display=swap',false,'1.1','all');
    wp_enqueue_style( 'mainstyle', get_template_directory_uri() . '/css/main.css',false,'1.1','all');
    wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css',false,'1.1','all');
    wp_enqueue_style( 'owl', get_template_directory_uri() . '/css/owl.theme.default.min.css',false,'1.1','all');
    wp_enqueue_style( 'carousel', get_template_directory_uri() . '/css/owl.carousel.min.css',false,'1.1','all');
    wp_enqueue_style( 'responsive', get_template_directory_uri() . '/css/responsive.css',false,'1.1','all');
    // javascript
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery.min.js', array ( 'jquery' ), 1.1, true);
    wp_enqueue_script( 'popper', get_template_directory_uri() . '/js/popper.min.js', array (), 1.1, true);
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array (), 1.1, true);
    wp_enqueue_script( 'carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array (), 1.1, true);
    $darkmode = ot_get_option('darkmode', false);
    $selection_color = ot_get_option('selection_color', false);
    $selection_background = ot_get_option('selection_background', false);
    $main_color = ot_get_option('main_color', false);
    $link_color = ot_get_option('link_color', false);
    $link_hover_color = ot_get_option('link_hover_color', false);
    $sidebar_link_color = ot_get_option('sidebar_link_color', false);
    $sidebar_link_hover_color = ot_get_option('sidebar_link_hover_color', false);
    $buttons_color = ot_get_option('buttons_color', false);
    $buttons_background_color = ot_get_option('buttons_background_color', false);
    $buttons_hover_color = ot_get_option('buttons_hover_color', false);
    $buttons_hover_background_color = ot_get_option('buttons_hover_background_color', false);

    ($darkmode == "off") OR wp_enqueue_style( 'darkmode', get_template_directory_uri() . '/css/dark.css',false,'1.1','all');

    wp_register_style( 'vulture-style-inline', false );
    wp_enqueue_style( 'vulture-style-inline' );
    wp_add_inline_style( 'vulture-style-inline', "::selection { color: $selection_color !important; background: $selection_background !important; }
    .bsta a:hover, .sidenav a:hover, .infoarc a:hover, .datepublish a, .logged-in-as a, .breadcb a { color: $main_color !important; }
    .a-tags a:hover { background: $main_color !important; }
    blockquote {border-left: 5px solid $main_color;}
    .rpwwt-widget a , .wdg-sidebar a { color: $sidebar_link_color !important; }
    .rpwwt-widget a:hover , .wdg-sidebar a:hover { color: $sidebar_link_hover_color !important; }
    .maincontent a , .comment-reply-link , .comment-reply-title a { color: $link_color !important; }
    .maincontent a:hover , .comment-reply-link:hover , .comment-reply-title a:hover { color: $link_hover_color !important; }
    .sendbutton, .btn-abt, .backtohome, .wpcf7-form-control.wpcf7-submit , .current, .page-numbers:hover { color: $buttons_color !important; background: $buttons_background_color !important; }
    .sendbutton:hover, .btn-abt:hover, .backtohome:hover, .wpcf7-form-control.wpcf7-submit:hover { color: $buttons_hover_color !important; background: $buttons_hover_background_color !important; }"
    );

}
add_action( 'wp_enqueue_scripts', 'loadfiles' );
// Support theme
add_theme_support( 'post-thumbnails' );
add_theme_support( 'automatic-feed-links' );
// Navigation Menu
function register_my_menus() {
    register_nav_menus(
      array(
        'Main-menu' => __( 'Main Menu', 'vulture' ),
       )
     );
   }
   add_action( 'init', 'register_my_menus' );
// breadcrumb 
function get_breadcrumb() {
  echo '<a href="'.home_url().'" rel="nofollow">Home</a>';
  if (is_category() || is_single()) {
      echo " / ";
      the_category(' / ');
          if (is_single()) {
              echo " / ";
              the_title();
          }
  } elseif (is_page()) {
      echo " / ";
      echo the_title();
  } elseif (is_search()) {
      echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;" . __("Search Results for... ", 'vulture');
      echo '"<em>';
      echo the_search_query();
      echo '</em>"';
  }
}
// post search 
function wpse_11826_search_by_title( $search, $wp_query ) {
  if ( ! empty( $search ) && ! empty( $wp_query->query_vars['search_terms'] ) ) {
      global $wpdb;

      $q = $wp_query->query_vars;
      $n = ! empty( $q['exact'] ) ? '' : '%';

      $search = array();

      foreach ( ( array ) $q['search_terms'] as $term )
          $search[] = $wpdb->prepare( "$wpdb->posts.post_title LIKE %s", $n . $wpdb->esc_like( $term ) . $n );

      if ( ! is_user_logged_in() )
          $search[] = "$wpdb->posts.post_password = ''";

      $search = ' AND ' . implode( ' AND ', $search );
  }
  return $search;
}
add_filter( 'posts_search', 'wpse_11826_search_by_title', 10, 2 );
//sidebar and widgets
function widgetregister() {
	register_sidebar( array(
		'name'          => __('Main Sidebar', 'vulture'),
		'id'            => 'leftsidebar',
		'before_widget' => '<section class="wdg-sidebar">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5>
        <span>',
		'after_title'   => '</span>
        </h5>
        <hr>',
    ) );
}
add_action( 'widgets_init', 'widgetregister' );
//Activates Theme Mode
// Loads OptionTree
// Required: include OptionTree.
require( trailingslashit( get_template_directory() ) . 'option-tree/ot-loader.php' );
require( trailingslashit( get_template_directory() ) . 'inc/theme-options.php' );
add_filter( 'ot_theme_mode', '__return_true' );
add_filter( 'ot_show_docs', '__return_false' );
add_filter( 'ot_show_options_ui', '__return_false' );
add_filter( 'ot_show_new_layout', '__return_false' );

// Social media share buttons
function wcr_share_buttons() {
    $url = urlencode(get_the_permalink());
    $title = urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8'));
    $media = urlencode(get_the_post_thumbnail_url(get_the_ID(), 'full'));
    include( locate_template('share-template.php', false, false) );
}
// title tag and align-wide support
add_theme_support( 'title-tag' );
add_theme_support( 'align-wide' );
// tgm
require_once get_template_directory() . '/inc/tgm/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'Vulture_register_required_plugins' );
function Vulture_register_required_plugins() {

	$plugins = array(

		array(
			'name'      => __('Recent Posts Widget With Thumbnails', 'vulture'),
			'slug'      => 'recent-posts-widget-with-thumbnails',
			'required'  => true,
        ),
        array(
			'name'      => __('One Click Demo Import', 'vulture'),
			'slug'      => 'one-click-demo-import',
			'required'  => true,
		),
		array(
			'name'      => __('WP Google Fonts', 'vulture'),
			'slug'      => 'wp-google-fonts',
			'required'  => false,
		),
		array(
			'name'      => __('Default featured image', 'vulture'),
			'slug'      => 'default-featured-image',
			'required'  => false,
		),
		array(
			'name'      => __('Contact Form 7', 'vulture'),
			'slug'      => 'contact-form-7',
			'required'  => false,
		),

	);

	$config = array(
		'id'           => 'Vulture',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',

	);

	tgmpa( $plugins, $config );
}
add_filter( 'wp_title', 'wpdocs_hack_wp_title_for_home' );

/*Import content data*/
function ocdi_import_files() {
	return array(

		array(
			'import_file_name'           => 'Import all data of vulture',
			'import_file_url'            => 'https://evincode.com/vulture/import/content.xml',
			'import_widget_file_url'     => 'https://evincode.com/vulture/import/widget.wie',
			'import_preview_image_url'   => 'https://evincode.com/vulture/import/Untitled-1.png',
			'import_notice'              => __( 'Please waiting for a few minutes, do not close the window or refresh the page until the data is imported.', 'vulture' ),
		),
        );
    }
    add_filter( 'pt-ocdi/import_files', 'ocdi_import_files' );
    function ocdi_after_import_setup() {
	// Assign menus to their locations.
	$main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
			'Main-menu' => $main_menu->term_id, // replace 'main-menu' here with the menu location identifier from register_nav_menu() function
		)
	);

	// Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title( 'Home' );
	$blog_page_id  = get_page_by_title( 'Blog' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'ocdi_after_import_setup' );
    
/**
 * Customize the title for the home page, if one is not set.
 */
function wpdocs_hack_wp_title_for_home( $title )
{
  if ( empty( $title ) && ( is_home() || is_front_page() ) ) {
    $title = __( 'Home', 'textdomain' ) . ' | ' . get_bloginfo( 'description' );
  }
  return $title;
}
//comments list function
function advanced_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment; ?>

    <div class="singlecm aboutauthor row">
        <?php echo get_avatar( $comment, 61 ); ?>
        <div class="info-a col-10">
            <span class="nameauthor"><?php echo get_comment_author_link(); ?><span class="cmdate"> in
                    <?php echo sprintf('%1$s', get_comment_date('j F Y'));?></span></span>
            <br>
            <span class="de-me">
                <?php comment_text(); ?>
                <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
            </span><br></div>
    </div>
    <?php if ($comment->comment_approved == '0') : ?>
    <p>
        <em><?php __("Your comment is awaiting management approval.", 'vulture');?></em><br />
    </p>
    <?php endif;
}
