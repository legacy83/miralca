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

        print vsprintf( '<h1>%1$s</h1><p>%2$s</p>', [
            __( 'Tools', 'miralca' ),
//            __( 'If you are wanting to migrate registered post types or taxonomies from this site to another, that will also use Custom Post Type UI, use the import and export functionality. If you are moving away from Custom Post Type UI, use the information in the "Get Code" tab.', 'miralca' ),
//            __( 'If you are wanting to migrate layouts and sections from this site to another, that will also use Custom Post Type UI, use the import and export functionality. If you are moving away from Custom Post Type UI, use the information in the "Get Code" tab.', 'miralca' ),
//            __( 'All of the selectable code snippets below are useful if you wish to migrate away from Custom Post Type UI and retain your existing registered post types or taxonomies.', 'miralca' ),
            __( 'All of the selectable code snippets below are useful if you are wanting to migrate layouts and sections from this site to another.', 'miralca' ),

//            __( 'Suspendisse sodales ipsum non justo imperdiet, ut lacinia erat cursus. Vestibulum dictum nisi ligula, in dictum justo pulvinar quis.', 'miralca' ),
        ] );

        do_action( 'miralca/admin/tools' );

        print '</div>';
    }
}
