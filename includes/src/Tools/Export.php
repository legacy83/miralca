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

            $layoutPatterns = new PluckPatterns();
            $sectionPatterns = new PluckPatterns();

            $layoutTemplates = new LayoutTemplates();
            $layoutTemplates->execute( $layoutPatterns );

            $sectionTemplates = new SectionTemplates();
            $sectionTemplates->execute( $sectionPatterns );

            print vsprintf( '<h2>%1$s</h2><p>%2$s</p>', [
                __( 'Export', 'miralca' ),
                __( 'Use the content above to import current post types into a different WordPress site.', 'miralca' ),
            ] );

            if ( !empty( $layoutPatterns->getPatterns() ) ) {
                print vsprintf( '<div style="padding: 20px; border: 1px solid #000; margin-bottom: 1em; white-space: nowrap; overflow-y: scroll">%1$s</div>', [
                    highlight_string( json_encode( $layoutPatterns->getPatterns(), JSON_PRETTY_PRINT ), true ),
                ] );
            }

            print vsprintf( '<h2>%1$s</h2><p>%2$s</p>', [
                __( 'Export', 'miralca' ),
                __( 'Use the content above to import current post types into a different WordPress site.', 'miralca' ),
            ] );

            if ( !empty( $sectionPatterns->getPatterns() ) ) {
                print vsprintf( '<div style="padding: 20px; border: 1px solid #000; margin-bottom: 1em; white-space: nowrap; overflow-y: scroll">%1$s</div>', [
                    highlight_string( json_encode( $sectionPatterns->getPatterns(), JSON_PRETTY_PRINT ), true ),
                ] );
            }

        } );
    }
}
