<?php

namespace Miralca\Editor;

use Dalen\Contracts\BootstrapInterface;
use Dalen\Contracts\DI\ServiceProviderInterface;
use Dalen\DI\ServiceProviderTrait;
use Miralca\Helper\Collection;

/**
 * Class FieldGroups
 *
 * @package Miralca\Editor
 */
class FieldGroups implements BootstrapInterface, ServiceProviderInterface
{
    use ServiceProviderTrait;

    /**
     * @inheritdoc
     */
    public function __bootstrap(): void
    {
        add_action( 'acf/init', [ $this, 'addFieldGroups' ] );
    }

    public function addFieldGroups()
    {
        $fieldGroups = Collection::wrap( new \Miralca\Local\FieldGroups() );
        $fieldGroups->each( function ( array $fieldGroup ) {

            acf_add_local_field_group( [
                'key' => $fieldGroup[ 'key' ],
                'title' => $fieldGroup[ 'title' ],
                'fields' => $fieldGroup[ 'fields' ],
                'location' => $fieldGroup[ 'location' ],
                'menu_order' => $fieldGroup[ 'menu_order' ],
                'position' => $fieldGroup[ 'position' ],
                'style' => $fieldGroup[ 'style' ],
                'label_placement' => $fieldGroup[ 'label_placement' ],
                'instruction_placement' => $fieldGroup[ 'instruction_placement' ],
                'hide_on_screen' => $fieldGroup[ 'hide_on_screen' ],
                'active' => $fieldGroup[ 'active' ],
                'description' => $fieldGroup[ 'description' ],
            ] );

        } );
    }
}
