<?php
/**
 * Created by PhpStorm.
 * User: Tonda
 * Date: 02.04.2017
 * Time: 13:27
 */
require_once "utility/common.php";


/**
 * Class GetProductTest
 * Test get_product() function
 */
class GetObjectIdTest extends UnitTestCase {

    function testGetObjectIdFromString() {
        $id_string = "58de534717d5e025c0003835";
        $object = get_object_id($id_string);

        $this->assertTrue($object instanceof MongoDB\BSON\ObjectID);
    }
    function testGetObjectIdFromObject() {
        $id_string = "58de534717d5e025c0003835";
        $object = get_object_id($id_string);

        $object_from_object = get_object_id($object);

        $this->assertTrue($object_from_object instanceof \MongoDB\BSON\ObjectID);
    }

    

}