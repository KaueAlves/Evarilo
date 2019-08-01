<?php
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area espaco">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
	?>
		<h2 class="comments-title">
			<?php
			$comments_number = get_comments_number();
			if ( '1' === $comments_number ) {
				/* translators: %s: post title */
				printf( _x( 'One Resposta to &ldquo;%s&rdquo;', 'comments title', 'horizon' ), get_the_title() );
			} else {
				printf(
					/* translators: 1: number of comments, 2: post title */
					_nx(
						'%1$s Resposta to &ldquo;%2$s&rdquo;',
						'%1$s Respostas para &ldquo;%2$s&rdquo;',
						$comments_number,
						'comments title',
						'horizon'
					),
					number_format_i18n( $comments_number ),
					get_the_title()
				);
			}
			?>
		</h2>

		<ol class="comment-list">
			<?php
				wp_list_comments(
					array(
						'avatar_size' => 100,
						'style'       => 'ol',
						'short_ping'  => true,
						'reply_text'  => __( 'Responder', 'horizon' ),
					)
				);
			?>
		</ol>

		<?php
		the_comments_pagination(
			array(
				'prev_text' => __( '<i class="fa fa-chevron-left"></i>', 'textdomain' ),
				'next_text' => __( '<i class="fa fa-chevron-right"></i>', 'textdomain' ),
			)
		);

	endif; // Check for have_comments().

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>

		<p class="no-comments"><?php _e( 'Comments are closed.', 'horizon' ); ?></p>
	<?php
	endif;

	$args = array(
		'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( '', 'noun' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
	);
	comment_form($args);
	?>

</div><!-- #comments -->
