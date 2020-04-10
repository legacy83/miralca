<?php

namespace Miralca\Query;

/**
 * Class SectionTemplates
 *
 * @package Miralca\Query
 */
class SectionTemplates
{
    public function execute( callable $callback )
    {
        $query = new \WP_Query( [
            'post_type' => 'miralca_section',
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
