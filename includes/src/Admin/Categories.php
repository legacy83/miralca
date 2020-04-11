<?php

namespace Miralca\Admin;

use Dalen\Contracts\BootstrapInterface;
use Dalen\Contracts\DI\ServiceProviderInterface;
use Dalen\DI\ServiceProviderTrait;

/**
 * Class Categories
 *
 * @package Miralca\Admin
 */
class Categories implements BootstrapInterface, ServiceProviderInterface
{
    use ServiceProviderTrait;

    /**
     * @inheritdoc
     */
    public function __bootstrap(): void
    {
        add_action( 'admin_menu', [ $this, 'submenuPage' ] );
        add_filter( 'submenu_file', [ $this, 'submenuFile' ] );
    }

    public function submenuPage()
    {
        add_submenu_page(
            'edit.php?post_type=miralca_element',
            __( 'Categories', 'miralca' ),
            __( 'Categories', 'miralca' ),
            'manage_options',
            admin_url( 'edit-tags.php?taxonomy=miralca_category&post_type=miralca_element' ),
        );
    }

    public function submenuFile( $submenuFile )
    {
        global $current_screen;

        if ( 'edit-tags' == $current_screen->base && 'miralca_category' == $current_screen->taxonomy ) {
            $submenuFile = admin_url( 'edit-tags.php?taxonomy=miralca_category&post_type=miralca_element' );
        }

        return $submenuFile;
    }
}
