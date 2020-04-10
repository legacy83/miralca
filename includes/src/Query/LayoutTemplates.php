<?php

namespace Miralca\Query;

/**
 * Class LayoutTemplates
 *
 * @package Miralca\Query
 */
class LayoutTemplates
{
    public function execute( callable $callback )
    {
        $query = new \WP_Query( [
            'post_type' => 'miralca_layout',
            'number_posts' => -1,
            'orderby' => 'title',
            'order' => 'ASC',
        ] );

        if ( $query->have_posts() ) {

            while ( $query->have_posts() ) {

                $query->the_post();

                call_user_func( $callback, get_post() );

            }

            wp_reset_postdata();

        }
    }
}
