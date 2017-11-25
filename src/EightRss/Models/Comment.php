<?php

namespace EightRss\Models;

use App\Resources\Functions;
use PDO;

class Comment
{
    // TODO Add getComment
    public function getComment($id_article){

    }
    // TODO Add addComment
    public function addComment($id_article){

    }
    public function sql_check_error()
    {
        global $db;
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}
