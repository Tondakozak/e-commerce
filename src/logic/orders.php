<?php
/**
 * Created by PhpStorm.
 * User: Tonda
 * Date: 20.03.2017
 * Time: 19:21
 */

/**
 * Save order to DB
 * @param $user_data
 * @param $cart
 * @param $user_id
 * @return \MongoDB\InsertOneResult
 */
function save_order($user_data, $cart, $user_id) {

    $query = [
        "date" => time(),
        "items" => $cart,
        "payment" => "cash",
        "status" => "progressing",
        "arriving" => time() + (60*60*24*5),
        "customer_details" => [
            "tel" => protect_input($user_data["tel"]),
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

/**
 * Get details of the order
 * @param $order_id string
 * @return \MongoDB\InsertOneResult
 */
function get_order_details($order_id) {
    $order = select_collection("orders")->findOne([
        "_id" => get_object_id($_GET["id"])
    ]);
    if (!$order) {
        return false;
    } else {
        $data["date"] = $order["date"];
        $data["status"] = $order["status"];
        $data["arriving"] = $order["arriving"];
        $data["customer_details"]["name"] = $order["customer_details"]["name"];
        $data["customer_details"]["user_id"] = $order["customer_details"]["user_id"];
        $data["customer_details"]["tel"] = $order["customer_details"]["tel"];
        $data["customer_details"]["email"] = $order["customer_details"]["email"];
        $data["customer_details"]["address"]["line_1"] = $order["customer_details"]["address"]["line_1"];
        $data["customer_details"]["address"]["line_2"] = $order["customer_details"]["address"]["line_2"];
        $data["customer_details"]["address"]["town"] = $order["customer_details"]["address"]["town"];
        $data["customer_details"]["address"]["postcode"] = $order["customer_details"]["address"]["postcode"];

        $data["total_price"] = 0;
        $data["total_quantity"] = 0;

        // items detail information
        foreach ($order["items"] as $item) {
            $item_detail = select_collection("products")->findOne(["_id" => $item["product_id"]]);
            if ($item_detail) {
                $it["photo"] = $item_detail["photos"][0];
                $it["product_id"] = $item["product_id"];
                $it["product_name"] = $item["product_name"];
                $it["price"] = $item_detail["price"];
                $it["quantity"] = $item["quantity"];
                $it["total_price"] = $it["quantity"] * $it["price"];

                $data["total_price"] += $it["total_price"];
                $data["total_quantity"] += $it["quantity"];

                $data["items"][] = $it;
            }
        }

        return $data;
    }
}


/**
 * Get all user's orders if is staff, returns all
 * @param $user_id
 * @return array
 */
function get_orders($user_id) {
    $orders_details = select_collection("orders")->find([]);

    if (!$orders_details) {
        return false;
    }

    // for customer select only his orders
    if (is_customer()) {
        $orders = [];
        foreach ($orders_details as $item) {
            if ($item["customer_details"]["user_id"] == $user_id) {
                $orders[] = $item;
            }
        }
        if (empty($orders)) {
            return false;
        }
    } else {
        $orders = $orders_details;
    }
    $o = [];
    foreach ($orders as $item) {
        $temp["date"] = $item["date"];
        $temp["price"] = 500;
        $temp["order_id"] = $item["_id"];
        $temp["status"] = $item["status"];

        $o[] = $temp;
    }

    return $o;
}