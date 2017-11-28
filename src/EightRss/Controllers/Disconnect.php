<?php

namespace EightRss\Controllers;

use App\Resources\Functions;
use EightRss\Models\User;

class Disconnect extends Functions
{

    public function start()
    {
        $user = new User();
        if ($user->isConnected()) {
            $user->disconnect();
            $user->unsetCookie();
            $this->redirect('/home');
        }
    }
}