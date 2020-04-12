<?php

namespace Miralca\Model;

/**
 * Class Pattern
 *
 * @package Miralca\Model
 */
class Pattern
{
    /**
     * @var \WP_Post
     */
    private $template;

    /**
     * @var array[]
     */
    private $blocks;

    /**
     * Pattern constructor.
     *
     * @param \WP_Post $template
     */
    public function __construct( \WP_Post $template )
    {
        $this->template = $template;
        $this->blocks = parse_blocks( $template->post_content );
    }

    public function toArray()
    {
        return [
            'pattern_name' => $this->name(),
            'pattern_properties' => [
                'title' => $this->title(),
                'content' => $this->content(),
            ],
        ];
    }

    private function name()
    {
        return sanitize_key( vsprintf( '%1$s_%2$s', [
            $this->template->post_type,
            $this->template->post_name
        ] ) );
    }

    private function title()
    {
        return wp_strip_all_tags( $this->template->post_title );
    }

    private function content()
    {
        return array_reduce( $this->blocks, function ( string $content, array $block ) {

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
}
