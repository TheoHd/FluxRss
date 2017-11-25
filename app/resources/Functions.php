<?php

namespace App\Resources;

class Functions
{
    public function display($page, $object)
    {
        ob_start();
        require "src/".$this->getSettings()->{'main_project'}->{'name'}."/Views/content/" . $page . ".php";
        $content = ob_get_contents();
        ob_end_clean();
        require "src/".$this->getSettings()->{'main_project'}->{'name'}."/Views/layout/layout.php";
    }
    public function getSettings(){
        $settings = $this->getJsonInformation("settings.json");
        return $settings;
    }
    public function getJsonInformation($file){
        $json = file_get_contents('app/'.$file, true);
        $parsed_json = json_decode($json);
        return $parsed_json;
    }
    public function redirect($url)
    {
        header("Location: " . BASE_URL.$url);
        die();
    }
}
