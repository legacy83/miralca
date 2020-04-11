<?php

namespace Miralca\Editor;

/**
 * Class ElementsBlock
 *
 * @package Miralca\Editor
 */
class ElementsBlock
{
    public function __invoke()
    {
        if ( function_exists( 'acf_register_block_type' ) ) {

            acf_register_block_type( [
                'name' => 'miralca-elements',
                'title' => __( 'Elements' ),
                'description' => __( 'Display chosen elements.' ),
                'render_callback' => new ElementsRender(),
                'category' => 'layout',
                'post_types' => [ 'miralca_layout', 'miralca_section' ],
                'icon' => 'layout',
                'enqueue_style' => plugins_url( 'resources/assets/css/elements.css', MIRALCA_PLUGIN_FILE ),
                'supports' => [
                    'align' => false,
                ],
            ] );

        }
    }
}
