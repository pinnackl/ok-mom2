<?php

namespace FOSChildBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class FOSChildBundle extends Bundle
{
	public function getParent()
    {
        return 'FOSUserBundle';
    }
}
