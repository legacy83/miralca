<?php

namespace Miralca;

# ------------------------------------------------------------------------------
# Lorem ipsum dolor sit amet
# ------------------------------------------------------------------------------
#
# Suspendisse sodales ipsum non justo imperdiet, ut lacinia erat
# cursus. Vestibulum dictum nisi ligula, in dictum justo pulvinar quis.
#

plugin()->register( new Editor\Elements() );
plugin()->register( new Editor\FieldGroups() );
plugin()->register( new Type\Register() );

# ------------------------------------------------------------------------------
# Lorem ipsum dolor sit amet
# ------------------------------------------------------------------------------
#
# Suspendisse sodales ipsum non justo imperdiet, ut lacinia erat
# cursus. Vestibulum dictum nisi ligula, in dictum justo pulvinar quis.
#

plugin()->run();
