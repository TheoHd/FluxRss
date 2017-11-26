<?php
/**
 * Created by PhpStorm.
 * User: Eight
 * Date: 14/11/2017
 * Time: 12:49
 */

namespace EightRss\Models;
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
     * Flux constructor.
     */
    public function __construct()
    {
        $this->fluxItems = $this->dbFluxItems();
        $this->fluxLength = $this->dbFluxLength();
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
        $req = $db->query("SELECT COUNT(*) FROM flux");
        return (int)$req->fetch()[0];
    }
}