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
    // TODO Finish isBanned
    public function isBanned(){

    }
    public function login(){
        global $db;
        $f = new Functions();
        $login = $_POST['login'];
        $password = sha1($_POST['password']);
        $request = $db->query("SELECT * FROM user WHERE login ='" . $login . "' AND password = '" . $password . "'");
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
            $f->redirect('/profile');
            exit();
        }
        else{
            return false;
        }
    }
    //TODO Get this to work
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
        $this->sql_check_error($request);
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
    // TODO Finish getUserBanState
    public function getUserBanState(){
        global $db;
        $request = $db->prepare('SELECT lvl WHERE id_u = '.$_GET['id']);
        return $request->fetch();
    }
    public function rememberMe($loginconnect,$passwordconnect){
        setcookie('email',$loginconnect,time()+365*24*3600,null,null,false,true);
        setcookie('password',$passwordconnect,time()+365*24*3600,null,null,false,true);
    }
    public function sql_check_error()
    {
        global $db;
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}