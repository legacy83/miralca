<?php

namespace Miralca\Editor;

use Dalen\Contracts\BootstrapInterface;
use Dalen\Contracts\DI\ServiceProviderInterface;
use Dalen\DI\ServiceProviderTrait;

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

        add_action( 'acf/init', new ElementsBlock() );

        add_action( 'init', function () {

            foreach ( [ 'miralca_layout', 'miralca_section' ] as $type ) {

                $postTypeObject = get_post_type_object( $type );
                $postTypeObject->template_lock = 'all';
                $postTypeObject->template = [
                    [ 'acf/miralca-elements' ],
                ];

            }

        }, 12 );

    }
}
