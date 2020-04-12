<?php

namespace Miralca;

# ------------------------------------------------------------------------------
# Lorem ipsum dolor sit amet
# ------------------------------------------------------------------------------
#
# Suspendisse sodales ipsum non justo imperdiet, ut lacinia erat
# cursus. Vestibulum dictum nisi ligula, in dictum justo pulvinar quis.
#

plugin()->register( new Admin\Categories() );
plugin()->register( new Admin\Tools() );
plugin()->register( new Editor\Elements() );
plugin()->register( new Editor\ElementsLock() );
plugin()->register( new Editor\FieldGroups() );
plugin()->register( new Taxonomy\Register() );
plugin()->register( new Tools\ExportPatterns() );
plugin()->register( new Type\Register() );

# ------------------------------------------------------------------------------
# Lorem ipsum dolor sit amet
# ------------------------------------------------------------------------------
#
# Suspendisse sodales ipsum non justo imperdiet, ut lacinia erat
# cursus. Vestibulum dictum nisi ligula, in dictum justo pulvinar quis.
#

plugin()->run();
