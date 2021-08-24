<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password,
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
} ?>

<div id="comments" class="comments-area">

	<h3 class="comment-title">
		<?php echo get_comments_number( ); 
			if( get_comments_number( ) == 1 ) : ?>
				comment
			<?php endif;
			if( get_comments_number( ) != 1) : ?>
				comments
			<?php endif; ?>
			on 
		"<?php echo get_the_title( ); ?>" 
	</h3>

	<?php 
		comment_form();

		if( have_comments(  ) ):
	?>

	<?php if( get_comment_pages_count( ) > 1 && get_option( 'page_comments' ) ): ?>

<nav id="comment-nav-top" class="comment__navigation" role="navigation">
	<div>
		<?php echo previous_comments_link( ); ?>
	</div>
	<div>
		<?php echo next_comments_link( ); ?>
	</div>
</nav>

<?php endif; ?>

	<ol class="comment-list">
		
		<?php 
			$args = array( 
				'style' => 'ol',
				'avatar_size' => 64,
				'reverse_top_level' => true
			);
			wp_list_comments( $args ) 
		?>

	</ol>

		<?php if(!comments_open( ) && get_comments_number( )): ?>
			<p> class="comments--hidden"><?php esc_html_e( 'Comments are closed.', 'jwentling7-v2' ) ?></p>
		<?php endif; ?>	

	<?php endif; ?>

</div><!-- #comments -->
