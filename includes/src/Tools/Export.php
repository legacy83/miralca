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
        add_action( 'miralca/admin/tools', [ $this, 'render' ] );
    }

    public function render()
    {
        $pluckLayoutPatterns = new PluckPatterns();
        $pluckSectionPatterns = new PluckPatterns();

        $layoutTemplatesQuery = new LayoutTemplates();
        $layoutTemplatesQuery->execute( $pluckLayoutPatterns );

        $sectionTemplatesQuery = new SectionTemplates();
        $sectionTemplatesQuery->execute( $pluckSectionPatterns );

        print view( 'tools/export' )->render( [
            'layoutPatterns' => $pluckLayoutPatterns,
            'sectionPatterns' => $pluckSectionPatterns,
        ] );
    }
}
