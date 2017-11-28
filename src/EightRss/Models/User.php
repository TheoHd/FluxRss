<?php
/**
 * Created by PhpStorm.
 * User: Eight
 * Date: 14/11/2017
 * Time: 12:49
 */

namespace EightRss\Models;

use App\Resources\Functions;
use PDO;

class User
{
    public function isConnected(){
        if(isset($_SESSION) && !empty($_SESSION) && $_SESSION['connected'] == true){
            return true;
        }
        else{
            return false;
        }
    }
    public function isAdmin(){
        if(isset($_SESSION) && !empty($_SESSION) && $_SESSION['connected'] == true && $_SESSION['lvl'] == 3){
            return true;
        }
        else{
            return false;
        }
    }
    public function login(){
        global $db;
        if(!isset($_SESSION['id']) AND isset($_COOKIE['login'],$_COOKIE['password']) AND !empty($_COOKIE['login']) AND !empty($_COOKIE['password'])){
            $login = $_COOKIE['login'];
            $password = $_COOKIE['password'];
            $request = $db->prepare('SELECT * FROM user WHERE login = :login AND password = :password');
            $request->bindParam(':login',$login,PDO::PARAM_STR);
            $request->bindParam(':password',$password,PDO::PARAM_STR);
            $request->execute();
            if ($response = $request->fetch()) {
                $_SESSION['connected'] = true;
                $_SESSION['id'] = $response['id_u'];
                $_SESSION['lvl'] = $response['lvl'];
                $_SESSION['login'] = $response['login'];
                $_SESSION['email'] = $response['email'];
                $_SESSION['lastname'] = $response['lastname'];
                $_SESSION['firstname'] = $response['firstname'];
                $_SESSION['telephone'] = $response['telephone'];
                $_SESSION['address'] = $response['address'];
            }
        }else{
            $login = $_POST['login'];
            $password = sha1($_POST['password']);
            $request = $db->prepare('SELECT * FROM user WHERE login = :login AND password = :password');
            $request->bindParam(':login',$login,PDO::PARAM_STR);
            $request->bindParam(':password',$password,PDO::PARAM_STR);
            $request->execute();
            if ($response = $request->fetch()) {
                $_SESSION['connected'] = true;
                $_SESSION['id'] = $response['id_u'];
                $_SESSION['lvl'] = $response['lvl'];
                $_SESSION['login'] = $response['login'];
                $_SESSION['email'] = $response['email'];
                $_SESSION['lastname'] = $response['lastname'];
                $_SESSION['firstname'] = $response['firstname'];
                $_SESSION['telephone'] = $response['telephone'];
                $_SESSION['address'] = $response['address'];
                if(isset($_POST['rememberMe']) && $_POST['rememberMe'] == 'on'){
                    $this->rememberMe($login,$password);
                }
            }
        }
    }
    public function register(){
        global $db;
        $f = new Functions();
        $request = $db->prepare('INSERT INTO user(email,login,password,lastname,firstname,telephone,address) VALUES (:email,:login,:password,:lastname,:firstname,:telephone,:address)');
        $request->bindValue(":email", $_POST['email'], PDO::PARAM_STR);
        $request->bindValue(":login", $_POST['login'], PDO::PARAM_STR);
        $request->bindValue(":password", sha1($_POST['password']), PDO::PARAM_STR);
        $request->bindValue(":lastname", $_POST['lastname'], PDO::PARAM_STR);
        $request->bindValue(":firstname", $_POST['firstname'], PDO::PARAM_STR);
        $request->bindValue(":telephone", $_POST['telephone'], PDO::PARAM_STR);
        $request->bindValue(":address", $_POST['address'], PDO::PARAM_STR);
        $request->execute();
        $this->sql_check_error();
        $f->redirect('/login/1');
        exit();
    }
    public function disconnect(){
        session_destroy();
    }
    public function getUserId(){
        global $db;
        $request = $db->prepare('SELECT id_u WHERE id_u = '.$_GET['id']);
        $request->execute();
    }
    public function getUserInfo(){
        global $db;
        $request = $db->prepare('SELECT * WHERE id_u = '.$_GET['id']);
        $request->execute();
    }
    public function getUserBanState(){
        global $db;
        $request = $db->prepare('SELECT lvl WHERE id_u = '.$_GET['id']);
        return $request->fetch();
    }
    public function rememberMe($loginconnect,$passwordconnect){
        setcookie('login',$loginconnect,time()+365*24*3600,null,null,false,true);
        setcookie('password',$passwordconnect,time()+365*24*3600,null,null,false,true);
    }
    public function unsetCookie(){
        setcookie('login','',time()-3600);
        setcookie('password','',time()-3600);
    }
}