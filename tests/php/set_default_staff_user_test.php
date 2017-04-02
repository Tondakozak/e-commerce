<?php

require_once "utility/common.php";
require "../../src/logic/user.php";


/**
 * Class GetProductTest
 * Test get_product() function
 */
class SetDefaultStaffUserTest extends UnitTestCase {

    function testSetUser() {
        clear_collection("users");
        set_default_staff_user();
        $get_staff = select_collection("users")->findOne(["role" => "staff"]);

        $this->assertEqual($get_staff["email"], "staff@staff.com");
    }
    function testSetOnlyOne() {
        clear_collection("users");

        set_default_staff_user(); // set for first time
        set_default_staff_user(); // set again
        $get_staffs = select_collection("users")->find(["role" => "staff"]);

        $this->assertEqual(count($get_staffs->toArray()), 1);
    }




}