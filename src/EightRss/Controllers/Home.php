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
        $articles = $article->displayArticles();
        $this->display('home', array('articles' => $articles, 'user' => $user));
    }
}