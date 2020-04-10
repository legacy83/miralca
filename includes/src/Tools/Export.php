<?php

namespace Miralca\Tools;

use Dalen\Contracts\BootstrapInterface;
use Dalen\Contracts\DI\ServiceProviderInterface;
use Dalen\DI\ServiceProviderTrait;
use Miralca\Query\LayoutTemplates;
use Miralca\Query\SectionTemplates;

/**
 * Class Export
 *
 * @package Miralca\Tools
 */
class Export implements BootstrapInterface, ServiceProviderInterface
{
    use ServiceProviderTrait;

    /**
     * @inheritdoc
     */
    public function __bootstrap(): void
    {
        add_action( 'miralca/admin/tools', function () {

            print vsprintf( '<h2>%1$s</h2><p>%2$s</p>', [
                __( 'Export', 'miralca' ),
                __( 'Use the content above to import current post types into a different WordPress site.', 'miralca' ),
            ] );

            echo '<div style="padding: 20px; border: 1px solid #000; margin-bottom: 1em; white-space: wrap">';

            $layoutTemplates = new LayoutTemplates();
            $layoutTemplates->execute( function ( \WP_Post $template ) {

                $pattern = [
                    'pattern_name' => sprintf( 'miralca/layout/%1$s', sanitize_key( $template->post_name ) ),
                    'pattern_properties' => [
                        'title' => wp_strip_all_tags( $template->post_title ),
                        'content' => '',
                    ],
                ];

                $blocks = parse_blocks( $template->post_content );
                foreach ( $blocks as $block ) {

                    if ( 'acf/miralca-elements' === $block[ 'blockName' ] ) {

                        $chosenElements = intval( $block[ 'attrs' ][ 'data' ][ 'chosen_elements' ] );
                        foreach ( range( 0, $chosenElements - 1 ) as $index ) {

                            $elementId = intval( $block[ 'attrs' ][ 'data' ][ "chosen_elements_{$index}_element" ] );
                            $elementPost = get_post( $elementId );

                            $pattern[ 'pattern_properties' ][ 'content' ] .= trim( $elementPost->post_content );

                        }

                    }

                }

                print htmlspecialchars( json_encode( $pattern, JSON_PRETTY_PRINT ) );

            } );

            echo '</div>';

            $sectionTemplates = new SectionTemplates();
            $sectionTemplates->execute( function ( \WP_Post $template ) {
                print vsprintf( '<div>%1$s</div>', [
                    $template->post_name,
                ] );
            } );

        } );
    }
}
