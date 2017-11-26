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
use App\Resources\Materialize;

class Login extends Functions
{
    public function start()
    {
        $user = new User();
        $materialize = new Materialize();
        if($user->isConnected()){
           $this->redirect('/profile');
        }
        if(isset($_POST['submit'])){
            $user->login();
            $this->redirect('/profile');
            exit();
        }
        $form = $materialize->loginMtz();
        $this->display('login', array('user' => $user,'form' => $form));
    }
}