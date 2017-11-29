<?php

namespace EightRss\Models;

use EightRss\Models\User;
use PDO;

class Comment
{
    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function addComment($content,$idArticle){
        global $db;
        $idUser = $this->getUser()->sessionUserId();
        $request = $db->prepare('INSERT INTO comment(id_a,id_u,content) VALUES (?, ? , ?)');
        $request->execute([$idArticle,$idUser[0],$content]);
    }
    public function getComments($id){
        global $db;
        $request = $db->prepare('SELECT * FROM comment WHERE id_a = ?');
        $request->execute([$id]);
        return $request->fetchAll();
    }
    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }
}
