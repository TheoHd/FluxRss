<?php
/**
 * Created by PhpStorm.
 * User: Eight
 * Date: 17/11/2017
 * Time: 00:11
 */

namespace App;


class Database
{
    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

    public function __construct($db_name, $db_user = "root",
    $db_pass ="", $db_host ="localhost"){
        $this->db_name = $db_name;
        $this->db_user= $db_user;
        $this->db_pass = $db_host;
        $this->db_host = $db_host;
    }
    public function getPDO(){
        if($this->pdo === null){
            $pdo = new PDO('mysql:dbname=eight_rss;host=localhost','root','');
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        return $this->pdo;
    }
    public function query($statement, $class_name){
        $request = $this->getPDO()->query($statement);
        $data = $request->fetchAll(PDO::FETCH_OBJ, $class_name);
        return $data;
    }
    public function prepare($statement, $class_name){
        $request = $this->getPDO()->prepare($statement);
    }
}