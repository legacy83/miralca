<?php

namespace Miralca\Local;

/**
 * Class PostTypes
 *
 * @package Miralca\Local
 */
class PostTypes implements \IteratorAggregate
{
    private $localFile;

    /**
     * PostTypes constructor.
     */
    public function __construct()
    {
        $this->localFile = vsprintf( '%s/PostTypes.local.json', [
            untrailingslashit( plugin_dir_path( __FILE__ ) ),
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
