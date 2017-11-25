<?php

namespace EightRss\Controllers;

use App\Resources\Functions;
use EightRss\Models\Flux;
use EightRss\Models\User;

class Home extends Functions
{

    public function start()
    {
        $flux = new Flux();
        $user = new User();
        $homeFlux = $flux->getFlux();
        //$flux->stockArticlesInBdd();
        $this->display('home', array('homeFlux' => $homeFlux,'flux' => $flux, 'user' => $user));
    }
}