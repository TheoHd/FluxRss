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
use Exception;

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
        $urlRegex = '#((https?|http)://(\S*?\.\S*?))([\s)\[\]{},;"\':<]|\.\s|$)#i';
        $req1 = $db->query("SELECT * FROM flux");
        $baseArray[] = [];
        $i = 1;
        while ($response = $req1->fetch()) {
            if(preg_match($urlRegex,$response['url'])){
                $baseArray[$i] = simplexml_load_file($response['url']);
                $i++;
            }
        }
        return $baseArray;
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
        $id_f = $_POST['flux'];
        $name = $_POST['name'];
        $url = $_POST['url'];
        if ($name != "" && $url != "") {
            $request = $db->prepare('UPDATE flux
                                    SET name = :name 
                                    AND url = :url
                                    WHERE id_f = :id_f');
            $request->bindParam(':id_f', $id_f, PDO::PARAM_STR);
            $request->bindParam(':name', $name, PDO::PARAM_STR);
            $request->bindParam(':url', $url, PDO::PARAM_STR);
            $request->execute();
        } elseif ($name != "" && $url == "") {
            $request = $db->prepare('UPDATE flux
                                    SET name = :name
                                    WHERE id_f = :id_f');
            $request->bindParam(':id_f', $id_f, PDO::PARAM_STR);
            $request->bindParam(':name', $name, PDO::PARAM_STR);
            $request->execute();
        } elseif ($url != "" && $name == "") {
            $request = $db->prepare('UPDATE flux
                                    SET url = :url
                                    WHERE id_f = :id_f');
            $request->bindParam(':id_f', $id_f, PDO::PARAM_STR);
            $request->bindParam(':url', $url, PDO::PARAM_STR);
            $request->execute();
        }
    }

    /**
     * Delete an existing flux from database
     */
    public function deleteFlux()
    {
        global $db;
        $id_f = $_POST['name'];
        $request = $db->prepare('DELETE FROM flux WHERE id_f = :id_f');
        $request->bindParam(':id_f', $id_f, PDO::PARAM_STR);
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