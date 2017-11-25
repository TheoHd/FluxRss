<?php

namespace EightRss\Controllers;

use App\Resources\Functions;
use EightRss\Models\Flux;
use EightRss\Models\User;

class Article extends Functions
{

    public function start()
    {
        $flux = new Flux();
        $user = new User();
        $this->display('article', array('user' => $user,'flux' => $flux));
    }
}