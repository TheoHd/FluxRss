<?php
/**
 * Created by PhpStorm.
 * User: Eight
 * Date: 14/11/2017
 * Time: 12:52
 */

namespace EightRss\Controllers;

use App\Resources\Functions;
use EightRss\Models\User;
use App\Materialize;

class Register extends Functions
{
    public function start()
    {
        $user = new User();
        $materialize = new Materialize();

        if(isset($_POST['submit'])){
            $user->register();
        }

        $form = $materialize->registerMtz();
        $this->display('register', array('user' => $user,'form' => $form));
    }
}