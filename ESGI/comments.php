<?php
if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php if ( have_comments() ) : ?>
        <h3 class="comments-title">
            <?php
            $comment_count = get_comments_number();
            if ( '1' === $comment_count ) {
                printf(
                    esc_html__( 'Comments (1)' )
                );
            } else {
                printf(
                    esc_html(
                        _nx(
                            'Comments (%1$s)',
                            'Comments (%1$s)',
                            $comment_count,
                            'comments title',
                            'textdomain'
                        )
                    ),
                    number_format_i18n( $comment_count )
                );
            }
            ?>
        </h3>

        <ul class="comment-list">
            <?php
            wp_list_comments(
                array(
                    'style'      => 'ul',
                    'short_ping' => true,
                    'callback'   => 'esgi_comment',
                )
            );
            ?>
        </ul>

        <?php the_comments_navigation(); ?>

    <?php endif; ?>

    <?php
    if ( ! comments_open() ) :
        ?>
        <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'textdomain' ); ?></p>
        <?php
    endif;

    // Custom comment form
    comment_form(
        array(
            'fields' => array(
                'author' => '<p class="comment-form-author"><input id="author" name="author" type="text" size="30" placeholder="' . __( 'Full name', 'domainreference' ) . '" required /></p>',
            ),
            'comment_field' => '',
            'submit_button' => '<p class="form-submit"><input name="%1$s" type="submit" id="%2$s" class="%3$s" value="Submit" /></p>',
            'title_reply'   => __( 'Leave a reply' ),
            'comment_notes_before' => '',
            'comment_notes_after'  => '',
            'fields' => apply_filters( 'comment_form_default_fields', array(
                'author' => '<p class="comment-form-author"><input id="author" name="author" type="text" size="30" placeholder="' . __( 'Full name', 'domainreference' ) . '" required /></p>',
                'comment_field' => '<p class="comment-comment"><textarea id="comment" name="comment" cols="45" rows="8" placeholder="' . __( 'Message', 'domainreference' ) . '" required></textarea></p>',
            )),
        )
    );
    ?>

</div>
