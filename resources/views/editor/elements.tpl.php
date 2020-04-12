<?php if ( !have_rows( 'chosen_elements' ) ) : ?>

    <?= vsprintf( '<div class="chosen-elements-is-empty">%s</div>', [
        __( 'Reorder, reuse and combine elements to build unique content.', 'miralca' ),
    ] ); ?>

<?php endif; ?>

<?php while ( have_rows( 'chosen_elements' ) ): the_row(); ?>

    <?php $element = get_sub_field( 'element' ); ?>

    <?php if ( is_a( $element, \WP_Post::class ) ): ?>

        <?= strval( $element->post_content ); ?>

    <?php endif; ?>

<?php endwhile; ?>
