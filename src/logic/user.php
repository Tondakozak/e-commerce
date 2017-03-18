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