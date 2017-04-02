<?php

require_once "utility/common.php";
require "../../src/logic/user.php";


/**
 * Class GetProductTest
 * Test get_product() function
 */
class CountInCartTest extends UnitTestCase {

    function testCountItems() {
        clear_collection("users");

        // create user
        $user_db = select_collection("users")->insertOne(["role"=>"guest"]);
        $user_id = $user_db->getInsertedId();

        $in_cart = count_items_in_cart($user_id);
        $this->assertEqual($in_cart, 0);


        // insert to cart
        select_collection("users")->updateOne(
            ["_id" => $user_id],
            [
                '$set' => [
                    "cart" => [
                        ["quantity" => 10, "product_name" => "shoe"],
                        ["quantity" => 5, "product_name" => "boots"],
                    ]
                ]
            ]
        );

        $in_cart = count_items_in_cart($user_id);
        $this->assertEqual($in_cart, 15);
    }

}