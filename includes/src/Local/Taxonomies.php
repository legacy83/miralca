<?php

namespace Miralca\Local;

/**
 * Class Taxonomies
 *
 * @package Miralca\Local
 */
class Taxonomies implements \IteratorAggregate
{
    private $localFile;

    /**
     * GetPostTypes constructor.
     */
    public function __construct()
    {
        $this->localFile = vsprintf( '%s/Taxonomies.local.json', [
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
