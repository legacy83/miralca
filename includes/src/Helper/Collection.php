<?php

namespace Miralca\Helper;

/**
 * Class Collection
 *
 * @package Miralca\Helper
 */
final class Collection implements \IteratorAggregate
{
    /**
     * @var \IteratorAggregate
     */
    private $delegate;

    /**
     * Collection constructor.
     *
     * @param \IteratorAggregate $delegate
     */
    private function __construct( \IteratorAggregate $delegate )
    {
        $this->delegate = $delegate;
    }

    /**
     * @inheritDoc
     */
    public function getIterator()
    {
        return $this->delegate->getIterator();
    }

    /**
     * @param \IteratorAggregate $delegate
     *
     * @return Collection
     */
    public static function wrap( \IteratorAggregate $delegate )
    {
        return new Collection( $delegate );
    }

    /**
     * @param callable $callback
     */
    public function each( callable $callback )
    {
        foreach ( $this as $key => $value ) {
            call_user_func( $callback, $value, $key );
        }
    }
}
