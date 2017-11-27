<?php

namespace EightRss\Controllers;

use App\Resources\Functions;
use EightRss\Models\Article;
use EightRss\Models\User;

class Home extends Functions
{

    public function start()
    {
        $article = new Article();
        $user = new User();
        $article->verifyArticlesAreInDatabase();
        if(isset($_GET['id'])){
            $c_page = $_GET['id'];
        }else{
            $c_page = 1;
        }
        $articles = $article->displayArticles(15,$c_page);
        $this->display('home', array('articles' => $articles, 'user' => $user));
    }
}