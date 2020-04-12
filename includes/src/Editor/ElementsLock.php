<?php

namespace Miralca\Editor;

use Dalen\Contracts\BootstrapInterface;
use Dalen\Contracts\DI\ServiceProviderInterface;
use Dalen\DI\ServiceProviderTrait;

/**
 * Class ElementsLock
 *
 * @package Miralca\Editor
 */
class ElementsLock implements BootstrapInterface, ServiceProviderInterface
{
    use ServiceProviderTrait;

    /**
     * @inheritdoc
     */
    public function __bootstrap(): void
    {
        add_action( 'init', [ $this, 'templateLock' ], 12 );
    }

    public function templateLock()
    {
        foreach ( [ 'miralca_layout', 'miralca_section' ] as $type ) {

            $postTypeObject = get_post_type_object( $type );
            $postTypeObject->template_lock = 'all';
            $postTypeObject->template = [
                [ 'acf/miralca-elements' ],
            ];

        }
    }
}
