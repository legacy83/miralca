<?php

namespace Miralca\Tools;

use Miralca\Model\Pattern;

/**
 * Class PluckPatterns
 *
 * @package Miralca\Tools
 */
class PluckPatterns implements \IteratorAggregate
{
    private $patterns = [];

    public function __invoke( \WP_Post $template )
    {
        if ( !empty( trim( $template->post_content ) ) ) {

            $pattern = new Pattern( $template );
            array_push( $this->patterns, $pattern->toArray() );

        }
    }

    /**
     * @inheritDoc
     */
    public function getIterator()
    {
        return new \ArrayIterator( $this->patterns );
    }
}
