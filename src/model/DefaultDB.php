<?php
/**
 * Created by PhpStorm.
 * User: Tonda
 * Date: 26.02.2017
 * Time: 16:50
 */

namespace Model;


class DefaultDB {
    public function __construct() {
        // connect
        $db = new \Model\DB();
        $collection = $db->selectCollection("users");

        // find document with category = staff
        $staff = $collection->findOne(["category"=> "staff"]);
        // in DB there are no staff users
        if (!$staff) {
            // Insert new Staff user
            $new_details = [
                "category" => "staff",
                "name" => "Staff",
                "password" => password_hash("123456789", PASSWORD_DEFAULT),
                "email" => "staff@example.com"
            ];
            $new_staff = $collection->insertOne($new_details);
            if ($new_staff->getInsertedCount() > 0) {
                // inserted
            } else {
                // error
            }
        } else {
            // already exists
        }
    }
}