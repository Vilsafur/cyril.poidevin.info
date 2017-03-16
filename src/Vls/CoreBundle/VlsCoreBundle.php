<?php

namespace Vls\CoreBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class VlsCoreBundle extends Bundle
{
  public function getParent()
  {
    return 'FOSUserBundle';
  }
}
