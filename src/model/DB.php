<?php
/**
 * Created by PhpStorm.
 * User: Tonda
 * Date: 26.02.2017
 * Time: 14:55
 */

namespace Model;


class DB {
    /*
    public $db;

    public function __construct() {
        $this->db = new \MongoDB\Client("mongodb://".DB_USER.":".DB_PWD."@".PAGE_HOST."/".DB_NAME);
        //$db = $client->selectDatabase(DB_NAME);
        //return $db;
    }*/

    public $db;
    public function __construct() {
        $this->connect();
    }

    public function connect() {
        $this->db = new \MongoDB\Client("mongodb://".DB_USER.":".DB_PWD."@".PAGE_HOST."/".DB_NAME);
    }

    public function selectCollection($collection) {
        return $this->db->selectCollection(DB_NAME, $collection);
    }
}