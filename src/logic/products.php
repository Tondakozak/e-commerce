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
    $data = $collection->findOne(["_id" => new MongoDB\BSON\ObjectID($id)]);

    if (!$data) {
        return false;
    } else {
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

        return $product_data;
    }
}


/*
 *


db.products.insert(
{
    "name" : "blue boty",
    "description" : "Lorem ipsum dolor sit amet",
    "photos" : ["1.jpg", "2.jpg"],
    "quantity" : 60,
    "category" : ["out-door", "blue"],
    "gender" : "male",
    "size" : 30,
    "price" : 99
}
)

*/