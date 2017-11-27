<?php
/**
 * Created by PhpStorm.
 * User: Eight
 * Date: 26/11/2017
 * Time: 12:09
 */

namespace EightRss\Models;

use App\Resources\Functions;
use PDO;

/**
 * Class Article
 * @package EightRss\Models
 */
class Article
{
    /**
     * @var Flux
     */
    private $flux;
    /**
     * @var Functions
     */
    private $f;

    /**
     * Article constructor.
     */
    public function __construct()
    {
        $this->flux = new Flux();
        $this->f = new Functions();
    }

    /**
     * Verify if articles from the flux are in database
     */
    public function verifyArticlesAreInDatabase()
    {
        for ($i = 1; $i <= $this->flux->getFluxLength(); $i++) {
            foreach ($this->flux->getFluxItems()[$i]->channel->item as $item) {
                if (!$this->articleIsInDatabase($item->title)) {
                    $this->addArticleInDatabase($item);
                }
            }
        }
    }


    /**
     * Display the articles that are in database in descending order by date
     */
    public function displayArticles()
    {
        global $db;
        $request = $db->prepare('SELECT * FROM article ORDER BY YEAR(pubDate) DESC, MONTH(pubDate) DESC, DAY(pubDate) DESC');
        $request->execute();
        return $request;
    }

    /**
     * Display one article
     */
    public function displayArticle()
    {
        global $db;
        $request = $db->prepare('SELECT * FROM article WHERE id_a = ?');
        $request->execute([$_GET['id']]);
        return $request;
    }

    /**
     * @param $guide
     * @return bool
     * Verify if a single article is in database
     */
    private function articleIsInDatabase($title)
    {
        global $db;
        $request = $db->prepare('SELECT title FROM article WHERE title = :title');
        $request->bindParam(':title', $title, PDO::PARAM_STR);
        $request->execute();
        if ($title = $request->fetch()) {
            return true;
        }
        return false;
    }

    /**
     * @param $item
     * Add a single article in database
     */
    private function addArticleInDatabase($item)
    {
        global $db;
        $title = $this->verifyPropertyExistence($item->title);
        $pubDate = $this->verifyPropertyExistence($item->pubDate);
        $pubDate = strftime("%Y-%m-%d %H:%M:%S", strtotime($pubDate));
        $category = $this->verifyPropertyExistence($item->category);
        $guide = $this->verifyPropertyExistence($item->guide);
        $description = $this->verifyPropertyExistence($item->description);
        $link = $this->verifyLinkExistence($item->link);
        $image_url = $this->verifyImageUrlExistence($item->enclosure->attributes()->url, $item->enclosure->attributes());
        $request = $db->prepare('INSERT INTO article(title,description,pubDate,guide,link,category,image_url) 
        VALUES (:title,:description,:pubDate,:guide,:link,:category,:image_url)');
        $request->bindParam(':title', $title, PDO::PARAM_STR);
        $request->bindParam(':description', $description, PDO::PARAM_STR);
        $request->bindParam(':pubDate', $pubDate, PDO::PARAM_STR);
        $request->bindParam(':guide', $guide, PDO::PARAM_STR);
        $request->bindParam(':link', $link, PDO::PARAM_STR);
        $request->bindParam(':category', $category, PDO::PARAM_STR);
        $request->bindParam(':image_url', $image_url, PDO::PARAM_STR);
        $request->execute();
    }

    private function verifyPropertyExistence($property)
    {
        if (isset($property) && !empty($property)) {
            return $property;
        } else {
            return 'Non spécifié';
        }
    }

    private function verifyLinkExistence($link)
    {
        if (isset($link) && !empty($link)) {
            return $link;
        } else {
            return null;
        }
    }

    private function verifyImageUrlExistence($url, $attributes)
    {
        if (isset($url) && !empty($attributes) && !is_null($attributes)) {
            return $url;
        } else {
            return null;
        }
    }
}