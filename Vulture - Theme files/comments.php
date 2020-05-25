<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>
<h2 class="comments-title">
    <?php
                printf( _nx( 'One Comment', '%1$s Comments', get_comments_number(), 'comments title', 'vulture' ),
                    number_format_i18n( get_comments_number() ), '' );
            ?>
</h2>
<?php if ( have_comments() ) : ?>
<?php wp_list_comments('type=comment&avatar_size=80&callback=advanced_comment'); ?>
<?php
      // Are there comments to navigate through?
      if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
    ?>
<nav class="navigation comment-navigation" role="navigation">
    <h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'vulture' ); ?></h1>
    <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'vulture' ) ); ?></div>
    <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'vulture' ) ); ?></div>
</nav><!-- .comment-navigation -->
<?php endif; // Check for comment navigation ?>
<?php endif; // have_comments() ?>




<?php if ( comments_open()) : ?>
<?php
  $args = array(
  'class_form'           => 'sendyourcm',
  'id_submit'         => 'submit',
  'class_submit'         => 'sendbutton',
  'title_reply'       => "",
  'title_reply_to'    => __( 'Post Reply to %s', 'vulture' ),
  'cancel_reply_link' => __( 'Cancel reply', 'vulture' ),
  'label_submit'      => __( 'Post Comment', 'vulture' ),

  'comment_field' =>  '<textarea id="comment" placeholder="Your Comment" name="comment" cols="58" rows="3" aria-required="true">' .'</textarea>',

  'must_log_in' => 'You Should login to send comment',

  'logged_in_as' => '<p class="logged-in-as">' .
    sprintf(
    __( 'You are logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Sign out of this account">Logout?</a>', 'vulture'),
      admin_url( 'profile.php' ),
      $user_identity,
      wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
    ) . '</p>',

  'comment_notes_before' => '',

  'comment_notes_after' => '',

  'fields' => apply_filters( 'comment_form_default_fields', array(

    'author' =>'<input id="author" type="text" name="author" class="datacm namecm" placeholder="Name" value="' . esc_attr( $commenter['comment_author'] ) .'"/>',

    'email' =>'<input id="email" name="email" type="email" class="datacm" placeholder="Email" value="' . esc_attr(  $commenter['comment_author_email'] ) .'" size="30"/>',

    )
  ),
);

comment_form( $args, get_the_ID() );
?>

<?php endif; ?>