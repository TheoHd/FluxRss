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
        $error = "";

        if ($user->isConnected()) {
            $this->redirect('/profile');
        }
        if (isset($_POST['submit'])) {
            if ($_POST['login'] == "") {
                $error = "Merci de remplir tous les champs. Le login est vide.";
                if($user->isBanned($_POST['login'])){ $error = "Vous êtes banni, veuillez contacter un administrateur."; }
            } else {
                if ($_POST['password'] == "") {
                    $error = "Merci de remplir tous les champs. Le mot de passe est vide.";
                    if($user->isBanned($_POST['login'])){ $error = "Vous êtes banni, veuillez contacter un administrateur."; }
                } else {
                    $user->login();
                    if (isset($_SESSION) && isset($_SESSION['connected']) && $_SESSION['connected'] == true) {
                        $this->redirect('/profile');
                        exit();
                    } else {
                        if($user->isBanned($_POST['login'])){
                            $error = "Vous êtes banni, veuillez contacter un administrateur.";
                        }
                        elseif (!$user->setBanOccurence($_POST['login'])) {
                            $error = "Nom d'utilisateur ou mot de passe invalide.";
                            if($user->isBanned($_POST['login'])){ $error = "Vous êtes banni, veuillez contacter un administrateur."; }
                        }
                        else{
                            $error = "Impossible de se connecter. Veuillez contacter l'administrateur.";
                        }
                    }
                }
            }
        }
        $form = $materialize->loginMtz();
        $this->display('login', array('user' => $user, 'form' => $form, 'error' => $error));
    }
}