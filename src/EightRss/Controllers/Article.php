<?php

namespace EightRss\Controllers;

use App\Resources\Functions;
use EightRss\Models\User;

class Article extends Functions
{

    public function start()
    {
        $article = new \EightRss\Models\Article();
        $user = new User();
        $article = $article->displayArticle();
        $this->display('article', array('user' => $user,'article' => $article));
    }
}