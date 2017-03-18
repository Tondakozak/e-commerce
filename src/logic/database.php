<?php
/**
 * Created by PhpStorm.
 * User: Tonda
 * Date: 17.03.2017
 * Time: 18:07
 */

/**
 * Create a new instance of DB connection with specified collection
 * @param $collection
 * @return \MongoDB\Collection
 */
function select_collection($collection) {
    return (new MongoDB\Client)->ecomerce->$collection;
}

/**
 * Create a new instance of MongoDB object ID
 * @param $id string
 * @return \MongoDB\BSON\ObjectID
 */
function get_object_id($id) {
    return new MongoDB\BSON\ObjectID($id);
}

/**
 * Search the object and returns firt corresponding key if successful, false if not
 * @param $search bool|int|string
 * @param $mongo object mongoDB
 * @return bool|int|string
 */
function mongo_search($search, $mongo) {
    foreach ($mongo as $key => $value) {
        if ($search == $value) {
            return $key;
        }
        if (is_object($value)) {
            if (($k = mongo_search($search, $value)) !== false) {
                return $k;
            }
        }
    }

    return false;
}