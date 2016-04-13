<?php

namespace Etourisme\UsersBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class UsersBundle extends Bundle
{
    public function getParent() {
        return 'FOSUserBundle';
    }

}
