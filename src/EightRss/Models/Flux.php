<?php
/**
 * Created by PhpStorm.
 * User: Eight
 * Date: 14/11/2017
 * Time: 12:49
 */

namespace EightRss\Models;

use PDO;

class Flux
{
    public function sql_check_error()
    {
        global $db;
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function addFlux()
    {
        global $db;
        $db->prepare('INSERT INTO flux VALUES()');
    }
    public function insertFluxIntoDb(){
        global $db;
        $db->prepare('INSERT INTO flux VALUES()');
    }

    public function getFlux()
    {
        global $db;
        $req1 = $db->query("SELECT * FROM flux");
        $base_array[] = [];
        $i = 1;
        while ($response = $req1->fetch()) {
            $base_array[$i] = simplexml_load_file($response['url']);
            $i++;
        }
        return $base_array;
    }
    public function getFluxNbOfElements(){
            global $db;
            $req = $db->query("SELECT COUNT(*) FROM flux");
            return (int)$req->fetch()[0];
    }
    public function stockArticlesInBdd($title){
        global $db;
        $req = $db->prepare("INSERT INTO article VALUES (:title,:content,:date_release)");
        //$req->bindValue(':title', $title, );
        return (int)$req->fetch()[0];
    }
    // TODO Add addFlux
    // TODO Add changeFlux
    // TODO Add deleteFlux

    // TODO Add getFlux
    // TODO Add getInfoFlux

    // TODO Add getArticle
    // TODO Add getInfoArticle

    // TODO Add getTheme
    // TODO Add deleteTheme
    // TODO Add getInfoTheme
}