<?php

namespace Miralca\Editor;

use Dalen\Contracts\BootstrapInterface;
use Dalen\Contracts\DI\ServiceProviderInterface;
use Dalen\DI\ServiceProviderTrait;
use function Miralca\view;

/**
 * Class Elements
 *
 * @package Miralca\Editor
 */
class Elements implements BootstrapInterface, ServiceProviderInterface
{
    use ServiceProviderTrait;

    /**
     * @inheritdoc
     */
    public function __bootstrap(): void
    {
        add_action( 'acf/init', [ $this, 'registerBlockType' ] );
    }

    public function registerBlockType()
    {
        if ( function_exists( 'acf_register_block_type' ) ) {

            acf_register_block_type( [
                'name' => 'miralca-elements',
                'title' => __( 'Elements' ),
                'description' => __( 'Display chosen elements.' ),
                'render_callback' => [ $this, 'blockTypeRender' ],
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

    public function blockTypeRender( $block, $content = '', $isPreview = false, $postId = 0 )
    {
        print view( 'editor/elements' )->render( [
            'block' => $block,
            'content' => $content,
            'isPreview' => $isPreview,
            'postId' => $postId,
        ] );
    }
}
