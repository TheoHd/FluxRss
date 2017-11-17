<?php

namespace App;

class Functions extends Materialize
{
    /*
    *@display(str)
    *Display the page while using ob_start
    */
    public function display($page, $object)
    {
        ob_start();
        require "src/EightRss/Views/content/" . $page . ".php";
        $content = ob_get_contents();
        ob_end_clean();
        require "src/EightRss/Views/layout/layout.php";
    }

    public function redirect($url)
    {
        header("Location: " . BASE_URL.$url);
        die();
    }
}
