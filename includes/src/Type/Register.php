<?php

namespace Miralca\Type;

use Dalen\Contracts\BootstrapInterface;
use Dalen\Contracts\DI\ServiceProviderInterface;
use Dalen\DI\ServiceProviderTrait;

/**
 * Class Element
 *
 * @package Miralca\Type
 */
class Register implements BootstrapInterface, ServiceProviderInterface
{
    use ServiceProviderTrait;

    /**
     * @inheritdoc
     */
    public function __bootstrap(): void
    {
        add_action( 'init', function () {

            $getPostTypes = new GetPostTypes();

            foreach ( $getPostTypes as $postType ) {

                $showInMenu = strval( trim( $postType[ 'show_in_menu_string' ] ) );

                $showInMenu = empty( $showInMenu ) ?
                    filter_var( $postType[ 'show_in_menu' ], FILTER_VALIDATE_BOOLEAN ) :
                    $showInMenu;

                register_post_type(
                    $postType[ 'name' ],
                    apply_filters( 'miralca/type/args', [
                        'label' => $postType[ 'label' ],
                        'labels' => apply_filters( 'miralca/type/labels', $postType[ 'labels' ], $postType[ 'name' ] ),
                        'description' => $postType[ 'description' ],
                        'public' => filter_var( $postType[ 'public' ], FILTER_VALIDATE_BOOLEAN ),
                        'show_in_rest' => filter_var( $postType[ 'show_in_rest' ], FILTER_VALIDATE_BOOLEAN ),
                        'show_in_menu' => $showInMenu,
                        'menu_icon' => $postType[ 'menu_icon' ],
                        'supports' => $postType[ 'supports' ],
                    ], $postType[ 'name' ] )
                );

            }

        } );
    }
}
