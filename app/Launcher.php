<?php

namespace App;

use EightRss\Controllers\Home;
use EightRss\Controllers\Admin;
use EightRss\Controllers\Article;
use EightRss\Controllers\Disconnect;
use EightRss\Controllers\Login;
use EightRss\Controllers\NotFound;
use EightRss\Controllers\Profile;
use EightRss\Controllers\Register;

/**
 * Class Launcher
 * @package App
 */
class Launcher
{
    private $page;

    /**
     * Launcher constructor.
     */
    public function __construct()
    {
        $this->page = "";
    }

    /**
     * @var
     *Retrieve and require the controller
     */
    public function start()
    {
        if (!isset($_GET['page']) || $_GET['page'] == "") {
            $this->setPage('home');
            $this->controllerInit($this->getPage());
        } else {
            if (!file_exists("src/EightRss/Controllers/" . ucfirst($_GET['page']) . ".php")) {
                $this->setPage('notFound');
                $this->controllerInit($this->getPage());
            } else {
                $this->setPage($_GET['page']);
                $this->controllerInit($this->getPage());
            }
        }
    }

    /**
     * @param $page
     */
    public function controllerInit($page)
    {
        if ($page == 'admin') {
            $c = new Admin();
            $c->start();
        }
        if ($page == 'article') {
            $c = new Article();
            $c->start();
        }
        if ($page == 'disconnect') {
            $c = new Disconnect();
            $c->start();
        }
        if ($page == 'home') {
            $c = new Home();
            $c->start();
        }
        if ($page == 'login') {
            $c = new Login();
            $c->start();
        }
        if ($page == 'not-found') {
            $c = new NotFound();
            $c->start();
        }
        if ($page == 'profile') {
            $c = new Profile();
            $c->start();
        }
        if ($page == 'register') {
            $c = new Register();
            $c->start();
        }
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