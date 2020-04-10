<?php

namespace Miralca\Admin;

/**
 * Class Tools
 *
 * @package Miralca\Admin
 */
class ToolsRender
{
    public function __invoke()
    {
        print '<div class="wrap">';

        print vsprintf( ' <h1>%1$s</h1><p>%2$s</p>', [
            __( 'Tools', 'miralca' ),
            __( 'Suspendisse sodales ipsum non justo imperdiet, ut lacinia erat cursus. Vestibulum dictum nisi ligula, in dictum justo pulvinar quis.', 'miralca' ),
        ] );

        do_action( 'miralca/admin/tools' );

        print '</div>';
    }
}
