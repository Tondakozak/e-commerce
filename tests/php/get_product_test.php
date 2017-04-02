<?php
/**
 * Created by PhpStorm.
 * User: Tonda
 * Date: 02.04.2017
 * Time: 13:27
 */
require_once "utility/common.php";

require_once "../../src/logic/products.php";

/**
 * Class GetProductTest
 * Test get_product() function
 */
class GetProductTest extends UnitTestCase {

    function testFirstLogMessagesCreatesFileIfNonexistent() {
        clear_collection("products");

        $product_data = [
            "name" => "Base London Black",
            "description" => "Derby shoes will introduce a sophisticated and classic style to a formal footwear collection.",
            "brand" => "Derby",
            "price" => 199,
            'quantity' => 500,
            'size' => 38,
            "category" => "black, classic, formal",
            "gender" => "male",
            'photos' => "photo.jpg"
        ];

        // add product to DB
        $product_id = add_product(
            $product_data["name"],
            $product_data["description"],
            $product_data["brand"],
            $product_data["price"],
            $product_data["quantity"],
            $product_data["size"],
            $product_data["category"],
            $product_data["gender"],
            $product_data["photos"]
        );

        $get_product = get_product($product_id);
        $this->assertEqual($get_product["name"], $product_data["name"]);
        $this->assertEqual($get_product["description"], $product_data["description"]);
        $this->assertEqual($get_product["gender"], $product_data["gender"]);

        clear_collection("products");
    }

    function testNoExist() {
        $get_product = get_product("58de534717d5e025c0003835");
        $this->assertFalse($get_product);
    }

}