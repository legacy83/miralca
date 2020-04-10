<?php

namespace Miralca\Tools;

/**
 * Class PluckPatterns
 *
 * @package Miralca\Tools
 */
class PluckPatterns
{
    private $patterns = [];

    public function __invoke( \WP_Post $template )
    {

        $elementContent = '';

        if ( empty( trim( $template->post_content ) ) ) {
            return;
        }

        foreach ( parse_blocks( $template->post_content ) as $block ) {

            if ( 'acf/miralca-elements' === $block[ 'blockName' ] ) {

                $blockData = $block[ 'attrs' ][ 'data' ];
                $blockDataSize = intval( $blockData[ 'chosen_elements' ] );

                foreach ( range( 0, $blockDataSize - 1 ) as $index ) {

                    $elementId = intval( $blockData[ "chosen_elements_{$index}_element" ] );
                    $elementContent = trim( get_post( $elementId )->post_content );

                }

            }

        }

        array_push( $this->patterns, [
            'pattern_name' => sprintf( 'miralca/layout/%1$s', sanitize_key( $template->post_name ) ),
            'pattern_properties' => [
                'title' => wp_strip_all_tags( $template->post_title ),
                'content' => $elementContent,
            ],
        ] );

    }

    public function getPatterns(): array
    {
        return $this->patterns;
    }
}
