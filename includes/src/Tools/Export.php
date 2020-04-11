<?php

namespace Miralca\Tools;

use Dalen\Contracts\BootstrapInterface;
use Dalen\Contracts\DI\ServiceProviderInterface;
use Dalen\DI\ServiceProviderTrait;
use Miralca\Query\LayoutTemplates;
use Miralca\Query\SectionTemplates;
use function Miralca\view;

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
            $layoutTemplates = new LayoutTemplates();
            $layoutTemplates->execute( $layoutPatterns );

            $sectionPatterns = new PluckPatterns();
            $sectionTemplates = new SectionTemplates();
            $sectionTemplates->execute( $sectionPatterns );

            print view( 'tools/export' )->render( [
                'layoutPatterns' => $layoutPatterns,
                'sectionPatterns' => $sectionPatterns,
            ] );

        } );
    }
}
