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

add_action( 'dalen/bootstrap/plugins', function () {

    require_once( __DIR__ . '/includes/bootstrap-autoload.php' );
    require_once( __DIR__ . '/includes/bootstrap-plugin.php' );

} );
