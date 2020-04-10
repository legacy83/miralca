<?php

namespace Miralca\Tools;

use Dalen\Contracts\BootstrapInterface;
use Dalen\Contracts\DI\ServiceProviderInterface;
use Dalen\DI\ServiceProviderTrait;
use Miralca\Query\LayoutTemplates;
use Miralca\Query\SectionTemplates;

/**
 * Class Export
 *
 * @package Miralca\Tools
 */
class Export implements BootstrapInterface, ServiceProviderInterface
{
    use ServiceProviderTrait;

    /**
     * @inheritdoc
     */
    public function __bootstrap(): void
    {
        add_action( 'miralca/admin/tools', function () {

            print vsprintf( '<h2>%1$s</h2><p>%2$s</p>', [
                __( 'Export', 'miralca' ),
                __( 'Use the content above to import current post types into a different WordPress site.', 'miralca' ),
            ] );

            $layoutTemplates = new LayoutTemplates();
            $layoutTemplates->execute( function ( \WP_Post $template ) {
                print vsprintf( '<div>%1$s</div>', [
                    $template->post_name,
                ] );
            } );

            $sectionTemplates = new SectionTemplates();
            $sectionTemplates->execute( function ( \WP_Post $template ) {
                print vsprintf( '<div>%1$s</div>', [
                    $template->post_name,
                ] );
            } );

        } );
    }
}
