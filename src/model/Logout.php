<?php
/**
 * Created by PhpStorm.
 * User: Tonda
 * Date: 28.02.2017
 * Time: 16:02
 */

namespace Model;


class Logout {
    public function logout() {
        unset($_SESSION["user"]);
        unset($_SESSION["user_role"]);

        $_SESSION["message"]["success"][] = "You are logged out.";
    }
}