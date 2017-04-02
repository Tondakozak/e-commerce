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
class ProtectOutputTest extends UnitTestCase {

    function testProtectOutputString() {
        $input = "<script>alert()</script>";
        $expected_output = "&lt;script&gt;alert()&lt;/script&gt;";
        $protected = protect_output($input);
        $this->assertNotEqual($protected, $input);
        $this->assertEqual($protected, $expected_output);
    }

    function testProtectOutputArray() {
        $input = [
            "<script>alert()</script>",
            [
                "<script>alert()</script>",
                [
                    "<script>alert()</script>"
                ]
            ]
        ];
        $expected_output = [
            "&lt;script&gt;alert()&lt;/script&gt;",
            [
                "&lt;script&gt;alert()&lt;/script&gt;",
                [
                    "&lt;script&gt;alert()&lt;/script&gt;"
                ]
            ]
        ];
        $protected = protect_output($input);
        $this->assertNotEqual($protected, $input);
        $this->assertEqual($protected, $expected_output);
    }





}