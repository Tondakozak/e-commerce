<?php
/**
 * Created by PhpStorm.
 * User: Tonda
 * Date: 26.02.2017
 * Time: 10:34
 */

namespace Model;


class Registration {
    public function checkForm() {
        $data = array();
        $data["error"] = false;

        // check if all fields are filled in
        if (empty(trim($_POST["register-name"]))) {
            $_SESSION["message"]["error"][] = "Please fill in your name.";
            $data["error"] = true;
            $data["data"]["name"] = "";
        } else {
            $data["data"]["name"] = trim($_POST["register-name"]);
        }
        if (empty(trim($_POST["register-email"]))) {
            $_SESSION["message"]["error"][] = "Please fill in your email.";
            $data["error"] = true;
            $data["data"]["email"] = "";
        } else {
            $data["data"]["email"] = strtolower(trim($_POST["register-email"]));
        }
        if (empty(trim($_POST["register-password"]))) {
            $_SESSION["message"]["error"][] = "Please fill in your password.";
            $data["error"] = true;
            $data["data"]["password"] = "";
        } else {
            $data["data"]["password"] = trim($_POST["register-password"]);
        }
        if (empty(trim($_POST["register-password-again"]))) {
            $_SESSION["message"]["error"][] = "Please fill in your password again.";
            $data["error"] = true;
            $data["data"]["password-again"] = "";
        } else {
            $data["data"]["password-again"] = trim($_POST["register-password-again"]);
        }

        // check if the passwords match
        if ($data["data"]["password"] != $data["data"]["password-again"]) {
            $_SESSION["message"]["error"][] = "The passwords don't match.";
            $data["data"]["password"] = "";
            $data["data"]["password-again"] = "";
            $data["error"] = true;
        }

        // check if the email is available
        if (!$this->isEmailAvailable($data["data"]["email"])) {
            $_SESSION["message"]["error"][] = "Sorry, this email address is already registered.";
            $data["data"]["email"] = "";
            $data["error"] = true;
        }


        return $data;
    }

    public function register($data) {
        $user_data = [
            "category" => "staff",
            "name" => $data["name"],
            "password" => password_hash($data["password"], PASSWORD_DEFAULT),
            "email" => $data["email"]
        ];
        $db = new \Model\DB();
        $collection = $db->selectCollection("users");
        $insert = $collection->insertOne($user_data);

        if ($insert->getInsertedCount() > 0) {
            $_SESSION["message"]["success"][] = "You are successfully registered.";
            return true;
        } else {
            $_SESSION["message"]["error"][] = "Registration wasn't successful";
            return false;
        }

    }

    protected function isEmailAvailable($email) {
        $db = new \Model\DB();
        $collection = $db->selectCollection("users");

        $in_db = $collection->findOne(["email"=>$email]);
        return !$in_db;
    }
}