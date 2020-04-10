<?php

namespace Miralca\Editor;

/**
 * Class GetFieldGroups
 *
 * @package Miralca\Editor
 */
class GetFieldGroups implements \IteratorAggregate
{
    private $localFile;

    /**
     * GetPostTypes constructor.
     */
    public function __construct()
    {
        $this->localFile = vsprintf( '%sGetFieldGroups.local.json', [
            trailingslashit( plugin_dir_path( __FILE__ ) ),
        ] );
    }

    /**
     * @inheritDoc
     */
    public function getIterator()
    {
        $contents = file_get_contents( $this->localFile );
        $contents = json_decode( $contents, true );

        return new \ArrayIterator( $contents );
    }
}
