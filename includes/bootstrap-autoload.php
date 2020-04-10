<?php

namespace Miralca;

# ------------------------------------------------------------------------------
# Lorem ipsum dolor sit amet
# ------------------------------------------------------------------------------
#
# Suspendisse sodales ipsum non justo imperdiet, ut lacinia erat
# cursus. Vestibulum dictum nisi ligula, in dictum justo pulvinar quis.
#

$loader = new \Composer\Autoload\ClassLoader();
$loader->setPsr4( 'Miralca\\', __DIR__ . '/src' );
$loader->register();

# ------------------------------------------------------------------------------
# Lorem ipsum dolor sit amet
# ------------------------------------------------------------------------------
#
# Suspendisse sodales ipsum non justo imperdiet, ut lacinia erat
# cursus. Vestibulum dictum nisi ligula, in dictum justo pulvinar quis.
#

\Composer\Autoload\includeFile( __DIR__ . '/functions-helpers.php' );
