<?php

namespace Miralca\Editor;

/**
 * Class ElementsRender
 *
 * @package Miralca\Editor
 */
class ElementsRender
{
    public function __invoke( $block, $content = '', $isPreview = false, $postId = 0 )
    {
        print vsprintf( "<div style='color: #999; border: 1px solid #999; padding: 15px'>%s</div>", [
            __( 'Reorder, reuse and combine elements to build unique content.', 'miralca' ),
        ] );
    }
}
