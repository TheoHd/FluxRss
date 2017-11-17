<?php

namespace EightRss\Controllers;

use App\Functions;
use EightRss\Models\User;

class NotFound extends Functions
{
    public function start()
    {
        $user = new User();
        $this->display('not-found', array('user' => $user));
    }
}