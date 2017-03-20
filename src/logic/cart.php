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

    if (!$cart_db || !isset($cart_db["cart"]) || count($cart_db["cart"]) == 0) {
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


function check_cart_form($data) {
    $error = false;

    // check inputs
    if (empty($data["name"])) {
        set_error("Fill in your name.");
        $error = true;
    }
    if (empty($data["email"])) {
        set_error("Fill in your email.");
        $error = true;
    }
    if (empty($data["tel"])) {
        set_error("Fill in your telephone.");
        $error = true;
    }
    if (empty($data["address1"])) {
        set_error("Fill in your Address line 1.");
        $error = true;
    }
    if (empty($data["town"])) {
        set_error("Fill in your town.");
        $error = true;
    }
    if (empty($data["postcode"])) {
        set_error("Fill in your postcode.");
        $error = true;
    }

    if ($error) {
        return false;
    } else {
        return $data;
    }

}


function save_order($user_data, $cart, $user_id) {

    $query = [
        "date" => time(),
        "items" => $cart,
        "payment" => "cash",
        "status" => "progressing",
        "tel" => protect_input($user_data["tel"]),
        "customer_details" => [
            "user_id" => $user_id,
            "name" => protect_input($user_data["name"]),
            "email" => protect_input($user_data["email"]),
            "address" => [
                "line_1" => protect_input($user_data["address1"]),
                "line_2" => protect_input($user_data["address2"]),
                "town" => protect_input($user_data["town"]),
                "postcode" => protect_input($user_data["postcode"]),
            ]
        ]
    ];

    // delete cart from users collection
    select_collection("users")->updateOne(
        ["_id" => get_user_id()],
        ['$set' => [
            "cart" => []
        ]]
    );

    // insert order to db
    $to_db = select_collection("orders")->insertOne($query);
    set_success("Thank you. Your order has been saved.");

    return $to_db;
}