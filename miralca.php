<?php
/**
 * Plugin Name: Miralca
 * Plugin URI:  https://github.com/trsenna/miralca
 * Author:      Thiago Senna
 * Author URI:  http://thremes.com.br
 * Description: Reorderable, reusable elements that combine to build unique content.
 * Version:     0.1.0
 *
 * @package   Mazoo
 * @author    Thiago Senna <thiago@thremes.com.br>
 * @copyright Copyright (c) 2019, Thiago Senna
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

define( 'MIRALCA_PLUGIN', true );
define( 'MIRALCA_PLUGIN_FILE', __FILE__ );
define( 'MIRALCA_PLUGIN_VERSION', get_file_data( __FILE__, [ 'Version' ] )[ 0 ] );

# ------------------------------------------------------------------------------
# Lorem ipsum dolor sit amet
# ------------------------------------------------------------------------------
#
# Suspendisse sodales ipsum non justo imperdiet, ut lacinia erat
# cursus. Vestibulum dictum nisi ligula, in dictum justo pulvinar quis.
#

add_action( 'miralca/bootstrap', function ( \Dalen\Plugin $plugin ) {

    $plugin->register( new \Miralca\Type\Register() );

} );

# ------------------------------------------------------------------------------
# Lorem ipsum dolor sit amet
# ------------------------------------------------------------------------------
#
# Suspendisse sodales ipsum non justo imperdiet, ut lacinia erat
# cursus. Vestibulum dictum nisi ligula, in dictum justo pulvinar quis.
#

add_action( 'miralca/autoload/loader', function ( \Composer\Autoload\ClassLoader $loader ) {

    $loader->setPsr4( 'Miralca\\', dirname( MIRALCA_PLUGIN_FILE ) . '/includes/src' );

} );

# ------------------------------------------------------------------------------
# Lorem ipsum dolor sit amet
# ------------------------------------------------------------------------------
#
# Suspendisse sodales ipsum non justo imperdiet, ut lacinia erat
# cursus. Vestibulum dictum nisi ligula, in dictum justo pulvinar quis.
#

add_action( 'miralca/autoload', function () {

    \Composer\Autoload\includeFile( __DIR__ . '/includes/functions-helpers.php' );

} );

# ------------------------------------------------------------------------------
# Lorem ipsum dolor sit amet
# ------------------------------------------------------------------------------
#
# Suspendisse sodales ipsum non justo imperdiet, ut lacinia erat
# cursus. Vestibulum dictum nisi ligula, in dictum justo pulvinar quis.
#

add_action( 'miralca/autoload', function () {

    $loader = new \Composer\Autoload\ClassLoader();
    do_action( 'miralca/autoload/loader', $loader );
    $loader->register();

} );

# ------------------------------------------------------------------------------
# Lorem ipsum dolor sit amet
# ------------------------------------------------------------------------------
#
# Suspendisse sodales ipsum non justo imperdiet, ut lacinia erat
# cursus. Vestibulum dictum nisi ligula, in dictum justo pulvinar quis.
#

$run = function () {

    if ( defined( 'MIRALCA_BOOTSTRAPPED' ) ) {
        return;
    }

    if ( defined( 'DALEN_PLUGIN' ) && DALEN_PLUGIN ) {

        do_action( 'miralca/autoload' );
        do_action( 'miralca/bootstrap', \Miralca\plugin() );
        \Miralca\plugin()->run();

        define( 'MIRALCA_BOOTSTRAPPED', true );
    }

};

add_action( 'miralca/run', $run );
add_action( 'dalen/bootstrap/plugins', $run );
