<?php

namespace Miralca\Local;

/**
 * Class FieldGroups
 *
 * @package Miralca\Local
 */
class FieldGroups implements \IteratorAggregate
{
    private $localFile;

    /**
     * FieldGroups constructor.
     */
    public function __construct()
    {
        $this->localFile = vsprintf( '%s/FieldGroups.local.json', [
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
