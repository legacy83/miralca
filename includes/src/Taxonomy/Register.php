<?php

namespace Miralca\Taxonomy;

use Dalen\Contracts\BootstrapInterface;
use Dalen\Contracts\DI\ServiceProviderInterface;
use Dalen\DI\ServiceProviderTrait;
use Miralca\Helper\Collection;
use Miralca\Local\Taxonomies;

/**
 * Class Register
 *
 * @package Miralca\Taxonomy
 */
class Register implements BootstrapInterface, ServiceProviderInterface
{
    use ServiceProviderTrait;

    /**
     * @inheritdoc
     */
    public function __bootstrap(): void
    {
        add_action( 'init', [ $this, 'registerTaxonomy' ] );
    }

    public function registerTaxonomy()
    {
        $taxonomies = Collection::wrap( new Taxonomies() );
        $taxonomies->each( function ( array $taxonomy, string $name ) {

            register_taxonomy(
                sanitize_key( $name ),
                $taxonomy[ 'object_types' ],
                apply_filters( 'miralca/taxonomy/args', [
                    'label' => $taxonomy[ 'label' ],
                    'labels' => apply_filters( 'miralca/taxonomy/labels', $taxonomy[ 'labels' ], $taxonomy[ 'name' ] ),
                    'public' => filter_var( $taxonomy[ 'public' ], FILTER_VALIDATE_BOOLEAN ),
                    'hierarchical' => filter_var( $taxonomy[ 'hierarchical' ], FILTER_VALIDATE_BOOLEAN ),
                    'show_in_menu' => filter_var( $taxonomy[ 'show_in_menu' ], FILTER_VALIDATE_BOOLEAN ),
                    'show_admin_column' => filter_var( $taxonomy[ 'show_admin_column' ], FILTER_VALIDATE_BOOLEAN ),
                    'show_in_rest' => filter_var( $taxonomy[ 'show_in_rest' ], FILTER_VALIDATE_BOOLEAN ),
                ], $taxonomy[ 'name' ] )
            );

        } );
    }
}
