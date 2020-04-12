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
        if ( !empty( trim( $template->post_content ) ) ) {

            array_push( $this->patterns, [
                'pattern_name' => $this->patternName( $template ),
                'pattern_properties' => [
                    'title' => wp_strip_all_tags( $template->post_title ),
                    'content' => $this->patternContent( $template ),
                ],
            ] );
            
        }
    }

    private function patternName( \WP_Post $template )
    {
        return sanitize_key( vsprintf( '%1$s_%2$s', [
            $template->post_type,
            $template->post_name
        ] ) );
    }

    private function patternContent( \WP_Post $template )
    {
        return array_reduce( parse_blocks( $template->post_content ), function ( string $content, array $block ) {

            if ( 'acf/miralca-elements' === $block[ 'blockName' ] ) {

                $blockData = $block[ 'attrs' ][ 'data' ];
                $blockDataSize = intval( $blockData[ 'chosen_elements' ] );

                foreach ( range( 0, $blockDataSize - 1 ) as $index ) {

                    $id = intval( $blockData[ "chosen_elements_{$index}_element" ] );
                    $content = $content . trim( get_post( $id )->post_content );

                }

            }

            return $content;

        }, '' );
    }

    public function getPatterns(): array
    {
        return $this->patterns;
    }
}
