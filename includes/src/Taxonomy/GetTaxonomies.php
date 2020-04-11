<?php

namespace Miralca\Taxonomy;

/**
 * Class GetTaxonomies
 *
 * @package Miralca\Taxonomy
 */
class GetTaxonomies implements \IteratorAggregate
{
    private $localFile;

    /**
     * GetPostTypes constructor.
     */
    public function __construct()
    {
        $this->localFile = vsprintf( '%sGetTaxonomies.local.json', [
            plugin_dir_path( __FILE__ ),
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
