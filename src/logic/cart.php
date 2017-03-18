<?php
/**
 * Created by PhpStorm.
 * User: Tonda
 * Date: 17.03.2017
 * Time: 18:05
 */

function get_cart($user_id) {
    $collection = (new MongoDB\Client)->ecomerce->users;

    $cart_db = $collection->findOne(["_id" => $user_id]);

    if (!$cart_db || !isset($cart_db["cart"])) {
        return false;
    } else {
        return $cart_db["cart"];
    }
}

function update_cart_in_db($cart, $user_id) {
    $collection = select_collection("users");

    $update = $collection->updateOne(
        [
            "_id" => $user_id
        ],
        [
            '$set' => ["cart" => $cart]
        ]
    );
}


function decrease_product_quantity($product_id, $quantity) {
    return select_collection("products")->updateOne(
        ["_id" => get_object_id($product_id)],
        ['$inc' => ["quantity" => (0-$quantity)]]);
}