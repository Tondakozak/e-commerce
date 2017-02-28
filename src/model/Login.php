<?php
/**
 * Created by PhpStorm.
 * User: Tonda
 * Date: 28.02.2017
 * Time: 15:25
 */

namespace Model;


class Login {
    public function checkForm() {
        $data = array();
        $data["error"] = false;

        // check if all fields are filled in
        if (empty(trim($_POST["login-email"]))) {
            $_SESSION["message"]["error"][] = "Please fill in your email.";
            $data["error"] = true;
            $data["data"]["email"] = "";
        } else {
            $data["data"]["email"] = strtolower(trim($_POST["login-email"]));
        }

        if (empty(trim($_POST["login-password"]))) {
            $_SESSION["message"]["error"][] = "Please fill in your password.";
            $data["error"] = true;
            $data["data"]["password"] = "";
        } else {
            $data["data"]["password"] = trim($_POST["login-password"]);
        }

        return $data;
    }

    public function login($email, $password) {
        $db_data = [
            "email" => $email
        ];
        $db = new \Model\DB();
        $collection = $db->selectCollection("users");
        $user_data = $collection->findOne($db_data);
        var_dump($user_data);
        if($user_data) {
            if (password_verify($password, $user_data["password"])) {
                // password is correct
                // login in
                $_SESSION["message"]["success"][] = "You are successfully logged in.";
                $_SESSION["user"] = $user_data["email"];
                $_SESSION["user_role"] = $user_data["category"];
                return true;
            }
        }

        // login wasn't successful
        $_SESSION["message"]["error"][] = "Email or password is incorrect.";

        return false;
    }
}