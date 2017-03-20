<?php
/**
 * Created by PhpStorm.
 * User: Tonda
 * Date: 17.03.2017
 * Time: 19:16
 */

/**
 * Update last visit record in DB for the current user
 */
function update_last_visit() {
    if (!is_logged()) {
        // if there is not an account for guest yet, it is created
        if (!select_collection("users")->findOne(["_id" => session_id()])) {
            select_collection("users")->insertOne(["_id" => session_id(), "role" => "guest"]);
        }
    }

    select_collection("users")->updateOne(
        ["_id" => get_user_id()],
        ['$set' => [
            "last_visit" => time()
        ]]
    );
}

/**
 * Delete carts from account which weren't wisited for 10 days
 */
function delete_old_carts() {
    $old_carts = select_collection("users")->find(["last_visit" => ['$lt' => (time() - (1000*60*60*24*10))]]);

    foreach ($old_carts as $old) {
        // add products back to offer
        foreach ($old["cart"] as $item) {
            select_collection("products")->updateOne(
                ["_id" => $item["_id"]],
                ['$inc' => ["quantity" => $item["quantity"]]]
            );
        }

        // remove cart from the account
        select_collection("users")->updateOne(
            ["_id" => get_user_id()],
            ['$set' => [
                "cart" => []
            ]]
        );
    }
}

/**
 * Return user Address, false if doesn't exists
 * @param $id string|object
 * @return array|false
 */
function get_user_address($id) {
    $data = select_collection("users")->findOne(["_id" => $id]);
    if (!$data) {
        $return = false;
    } else {
        $return["name"] = (isset($data["name"]))?$data["name"]:"";
        $return["email"] = (isset($data["email"]))?$data["email"]:"";
        $return["tel"] = (isset($data["tel"]))?$data["tel"]:"";
        $return["address"]["line_1"] = (isset($data["address"]["line_1"]))?$data["address"]["line_1"]:"";
        $return["address"]["line_2"] = (isset($data["address"]["line_2"]))?$data["address"]["line_2"]:"";
        $return["address"]["town"] = (isset($data["address"]["town"]))?$data["address"]["town"]:"";
        $return["address"]["postcode"] = (isset($data["address"]["postcode"]))?$data["address"]["postcode"]:"";
    }

    return $return;
}

/**
 * Saves user data
 * @param $data
 * @param $user_id
 */
function save_user_details($data, $user_id) {
    $query = [
        "name" => protect_input($data["name"]),
        "email" => protect_input($data["email"]),
        "tel" => protect_input($data["tel"]),
        "address" => [
            "line_1" => protect_input($data["address1"]),
            "line_2" => protect_input($data["address2"]),
            "town" => protect_input($data["town"]),
            "postcode" => protect_input($data["postcode"]),
        ]
    ];

    // delete cart from users collection
    select_collection("users")->updateOne(
        ["_id" => $user_id],
        ['$set' => $query]
    );
}