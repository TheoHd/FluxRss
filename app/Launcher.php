<?php

namespace App\Resources;
/**
 * Verify the url existence and redirects to the respective controller
 * @package App
 */
class Launcher
{
    private $page;
    private $f;

    /**
     * Launcher constructor.
     */
    public function __construct()
    {
        $this->f = new Functions;
    }

    /**
     * Retrieve and require the controller
     */
    public function start()
    {
        if (!isset($_GET['page']) || $_GET['page'] == "" || empty($_GET['page'])) {
            $this->setPage('home');
            $this->controllerInit();
        } else {
            if (!file_exists("src/" . $this->f->getSettings()->{'main_project'}->{'name'} . "/Controllers/" . ucfirst($_GET['page']) . ".php")) {
                $this->setPage('notFound');
                $this->controllerInit();
            } else {
                $this->setPage($_GET['page']);
                $this->controllerInit();
            }
        }
    }

    /**
     * Initialize the controller
     */
    public function controllerInit()
    {
        $name = $this->f->getSettings()->{'main_project'}->{'name'} . '\\' .'Controllers' .'\\' . ucfirst($this->getPage());
        $c = new $name;
        $c->start();
    }

    /**
     * @param $page
     */
    public function setPage($page)
    {
        $this->page = $page;
    }

    /**
     * @return string
     */
    public function getPage()
    {
        return $this->page;
    }
}