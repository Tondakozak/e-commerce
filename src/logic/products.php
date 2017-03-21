<?php
/**
 * Created by PhpStorm.
 * User: Tonda
 * Date: 17.03.2017
 * Time: 14:35
 */

function get_product($id) {
    // connect to mongodb server
    $collection = (new MongoDB\Client)->ecomerce->products;
    $data = $collection->findOne(["_id" => get_object_id($id)]);

    if (!$data) {
        return false;
    } else {
        /*
        $product_data["id"] = $data["_id"];
        $product_data["description"] = $data["description"];
        $product_data["name"] = $data["name"];
        $product_data["quantity"] = $data["quantity"];
        $product_data["gender"] = $data["gender"];
        $product_data["size"] = $data["size"];
        $product_data["price"] = $data["price"];

        foreach ($data["photos"] as $photo) {
            $product_data["photos"][] = $photo;
        }
        foreach ($data["category"] as $category) {
            $product_data["category"][] = $category;
        }
        */
        $product_data = mongo_to_array($data);
        $product_data["id"] = $product_data["_id"];

        return $product_data;
    }
}


/*
 *


db.products.insert(
{
    "name" : "Bota 2",
    "description" : "saf Lorem ipsum dolor sit amet",
    "photos" : ["2.jpg", "1.jpg"],
    "quantity" : 100,
    "brand" : "Baťa",
    "category" : ["in-door", "fialova,"],
    "gender" : "female",
    "size" : 50,
    "price" : 1119
}
)

*/

/**
 * Returns array of IDs of the most popular products
 * @param $limit
 * @return array|bool
 */
function get_most_popular($limit) {
    $orders = select_collection("orders")->find();

    // orders exist
    $popular = [];
    if ($orders) {

        // get products id and their quantity
        $orders = mongo_to_array($orders);
        foreach ($orders as $ord) {
            foreach ($ord["items"] as $item) {
                $product_id = (string)$item["product_id"];
                if (!isset($popular[$product_id])) {
                    $popular[$product_id] = 0;
                }

                $popular[$product_id] += 1;
            }
        }

        // sort array
        asort($popular);
        $popular = array_reverse($popular);
        $popular = array_slice($popular, 0, $limit); // leave only $limit number of items
        $popular_ids = array_keys($popular);
    } else {
        $popular_ids = false;
    }

    return $popular_ids;
}

/**
 * Returns IDs of recommended products
 * @param $limit
 * @param $user_id
 * @return array|bool
 */
function get_recomendation($limit, $user_id) {
    $user_tracking = select_collection("users")->findOne(["_id" => $user_id]);
    if ($user_tracking && isset($user_tracking["tracking"]) && count($user_tracking["tracking"]) > 0) {
        // there are some tracking data
        $tracking = mongo_to_array($user_tracking["tracking"]);
        asort($tracking);
        $tracking = array_reverse($tracking);
        $tracking_id = array_keys($tracking);

        // products data
        $recommend = [];
        $products_db = select_collection("products")->find(["quantity" => ['$gt' => 0]]);
        if ($products_db) {
            $products = mongo_to_array($products_db);
            foreach ($products as $item) {
                // get all category
                $category = $item["category"];
                $category[] = $item["brand"];
                $category[] = $item["gender"];
                $category[] = "size-".$item["size"];

                $score = 0;
                // add score
                foreach ($category as $c) {
                    $c = (string)$c;
                    if (array_key_exists($c, $tracking)) {
                        $score += $tracking[$c];
                    }
                }

                if ($score) {
                    $recommend[(string)$item["_id"]] = $score;
                }
            }

        }
 
        // sort recommend
        asort($recommend);
        $recommend = array_slice(array_reverse($recommend), 0, $limit);
        $recommend = array_keys($recommend);
    } else {
        $recommend = false;
    }

    return $recommend;
}

/**
 * Return data of recommended items
 * @param $user_id
 * @return array
 */
function get_recommended_data($user_id) {
    $limit = 3;

    $recommend_ids = get_recomendation($limit, $user_id);
    if (count($recommend_ids) > $limit) {
        $popular_ids = get_most_popular($limit - count($recommend_ids));
        $recommend_ids = array_merge($recommend_ids, $popular_ids);
    }

    $data = [];

    foreach ($recommend_ids as $recommend) {
        $data[] = get_product($recommend);
    }

    return $data;

}