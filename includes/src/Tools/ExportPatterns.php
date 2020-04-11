<?php

namespace Miralca\Tools;

use Dalen\Contracts\BootstrapInterface;
use Dalen\Contracts\DI\ServiceProviderInterface;
use Dalen\DI\ServiceProviderTrait;
use Miralca\Query\LayoutTemplates;
use Miralca\Query\SectionTemplates;
use function Miralca\view;

/**
 * Class ExportPatterns
 *
 * @package Miralca\Tools
 */
class ExportPatterns implements BootstrapInterface, ServiceProviderInterface
{
    use ServiceProviderTrait;

    /**
     * @inheritdoc
     */
    public function __bootstrap(): void
    {
        add_action( 'miralca/admin/tools', function () {

            print view( 'tools/export' )->render( [
                'layoutPatterns' => $this->layoutPatterns( new PluckPatterns() ),
                'sectionPatterns' => $this->sectionPatterns( new PluckPatterns() ),
            ] );

        } );
    }

    private function layoutPatterns( PluckPatterns $patterns )
    {
        $layoutTemplates = new LayoutTemplates();
        $layoutTemplates->execute( $patterns );

        return $patterns;
    }

    private function sectionPatterns( PluckPatterns $patterns )
    {
        $layoutTemplates = new SectionTemplates();
        $layoutTemplates->execute( $patterns );

        return $patterns;
    }
}
