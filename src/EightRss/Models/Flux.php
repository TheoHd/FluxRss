<?php
/**
 * Created by PhpStorm.
 * User: Eight
 * Date: 14/11/2017
 * Time: 12:49
 */

namespace EightRss\Models;

use App\Resources\Functions;
use PDO;

/**
 * Class Flux
 * @package EightRss\Models
 */
class Flux
{
    /**
     * @var Length of the flux
     */
    private $fluxLength;
    /**
     * @var Array containing all articles from the flux
     */
    private $fluxItems;
    /**
     * @var Functions
     */
    private $f;

    /**
     * Flux constructor.
     */
    public function __construct()
    {
        $this->fluxItems = $this->dbFluxItems();
        $this->fluxLength = $this->dbFluxLength();
        $this->f = new Functions();
    }

    /**
     * @return array
     */
    private function dbFluxItems()
    {
        global $db;
        $req1 = $db->query("SELECT * FROM flux");
        $base_array[] = [];
        $i = 1;
        while ($response = $req1->fetch()) {
            $base_array[$i] = simplexml_load_file($response['url']);
            $i++;
        }
        return $base_array;
    }

    /**
     * @return int
     */
    private function dbFluxLength()
    {
        global $db;
        $req = $db->query('SELECT COUNT(*) FROM flux');
        return (int)$req->fetch()[0];
    }

    /**
     * Add a new flux into database
     */
    public function addFlux()
    {
        global $db;
        $name = $_POST['name'];
        $url = $_POST['url'];
        $request = $db->prepare('INSERT INTO flux(name,url) VALUES (:name,:url)');
        $request->bindParam(':name', $name, PDO::PARAM_STR);
        $request->bindParam(':url', $url, PDO::PARAM_STR);
        $request->execute();
    }

    /**
     * Modify an existing flux from database
     */
    public function modifyFlux()
    {
        global $db;
        $oldname = $_POST['oldname'];
        $name = $_POST['name'];
        $url = $_POST['url'];
        if ($name != "" && $url != "") {
            $request = $db->prepare('UPDATE flux
                                    SET name = :name 
                                    AND url = :url
                                    WHERE name = :oldname');
            $request->bindParam(':oldname', $oldname, PDO::PARAM_STR);
            $request->bindParam(':name', $name, PDO::PARAM_STR);
            $request->bindParam(':url', $url, PDO::PARAM_STR);
            $request->execute();
            $this->f->redirect('/admin');
        } elseif ($name != "" && $url == "") {
            $request = $db->prepare('UPDATE flux
                                    SET name = :name
                                    WHERE name = :oldname');
            $request->bindParam(':oldname', $oldname, PDO::PARAM_STR);
            $request->bindParam(':name', $name, PDO::PARAM_STR);
            $request->execute();
            $this->f->redirect('/admin');
        } elseif ($url != "" && $name == "") {
            $request = $db->prepare('UPDATE flux
                                    SET url = :url
                                    WHERE name = :oldname');
            $request->bindParam(':oldname', $oldname, PDO::PARAM_STR);
            $request->bindParam(':url', $url, PDO::PARAM_STR);
            $request->execute();
            $this->f->redirect('/admin');
        } else {
            $this->f->redirect('/admin');
        }
    }

    /**
     * Delete an existing flux from database
     */
    public function deleteFlux()
    {
        global $db;
        $name = $_POST['name'];
        $request = $db->prepare('DELETE FROM flux WHERE name = :name');
        $request->bindParam(':name', $name, PDO::PARAM_STR);
        $request->execute();
    }

    /**
     * @return \PDOStatement
     */
    public function getFluxInfo()
    {
        global $db;
        $request = $db->query('SELECT * FROM flux');
        return $request->fetchAll();
    }

    /**
     * @return Array
     */
    public function getFluxItems()
    {
        return $this->fluxItems;
    }

    /**
     * @return Length
     */
    public function getFluxLength()
    {
        return $this->fluxLength;
    }
}