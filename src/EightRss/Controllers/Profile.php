<?php
/**
 * Created by PhpStorm.
 * User: Eight
 * Date: 14/11/2017
 * Time: 12:52
 */

namespace EightRss\Controllers;

use App\Functions;
use EightRss\Models\User;

class Profile extends Functions
{
    public function start()
    {
        $user = new User();
        $this->display('profile', array('user' => $user));
    }
}