<?php

namespace EightRss\Controllers;

use App\Resources\Functions;
use EightRss\Models\User;
use EightRss\Models\Comment;

class Article extends Functions
{

    public function start()
    {
        if(!isset($_GET['id'])){
            $this->redirect('\home');
        }
        $article = new \EightRss\Models\Article();
        $user = new User();
        $comment = new Comment();
        $error = "";
        if(isset($_POST['submit'])){
            if(isset($_POST['comment']) AND !empty($_POST['comment'])){
                $content = htmlspecialchars($_POST['comment']);
                $comment->addComment($content,$_GET['id']);
            }else{
                $error = "Tous les champs doivent être complétés";
            }
        }
        $comments = $comment->getComments($_GET['id']);
        $article = $article->displayArticle();
        $this->display('article', array('user' => $user,'article' => $article,'error' => $error,'comments' => $comments));
    }
}