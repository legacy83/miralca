<?php

namespace Miralca\Editor;

/**
 * Class ElementsRender
 *
 * @package Miralca\Editor
 */
class ElementsRender
{
    public function __invoke( $block, $content = '', $isPreview = false, $postId = 0 )
    {

        if ( !have_rows( 'chosen_elements' ) ) {

            print vsprintf( "<div style='color: #999; border: 1px solid #999; padding: 15px'>%s</div>", [
                __( 'Reorder, reuse and combine elements to build unique content.', 'miralca' ),
            ] );

        }

        while ( have_rows( 'chosen_elements' ) ) {

            the_row();

            $element = get_sub_field( 'element' );

            if ( is_a( $element, \WP_Post::class ) ) {
                print strval( $element->post_content );
            }

        }

    }
}
