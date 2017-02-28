<?php
/**
 * Created by PhpStorm.
 * User: Tonda
 * Date: 24.02.2017
 * Time: 17:12
 */

namespace Controller;


class Login extends Controller {
    function execute() {
        $this->header["title"] = "Login";

        // if the user is already logged in -> redirect to home page
        if (isset($_SESSION["user"])) {
            $this->redirect("/");
        }


        // if the form was submitted
        if (isset($_POST["login-email"])) {
            $log = new \Model\Login();


            $login_data = $log->checkForm();

            // form is filled correctly
            if (!$login_data["error"]) {

                $login = $log->login($login_data["data"]["email"], $login_data["data"]["password"]);
                if ($login) { // login is successful
                    $this->redirect(""); // redirect to home page
                }
            }

            $this->data["form"]["login-email"] = $login_data["data"]["email"];
        }

        // fill data array of empty strings
        if (!isset($this->data["form"])) {
            $this->data["form"]["login-email"] = "";
        }

        $this->view = "login_form";
    }
}