<?php
/**
 * Created by PhpStorm.
 * User: Tonda
 * Date: 24.02.2017
 * Time: 16:59
 */

namespace Controller;


class Registration extends Controller {
    function execute() {
        $this->header["title"] = "Registration";

        // if the user is already logged in -> redirect to home page
        if (isset($_SESSION["user"])) {
            $this->redirect("/");
        }


        // if the form was submitted
        if (isset($_POST["register-name"])) {
            $reg = new \Model\Registration();

            $form_data = $reg->checkForm();

            // form is filled correctly
            if (!$form_data["error"]) {
                $register = $reg->register($form_data["data"]);
                if ($register) {
                    $this->redirect("login/");
                }
            } else {
                $this->data["form"]["register-name"] = $form_data["data"]["name"];
                $this->data["form"]["register-email"] = $form_data["data"]["email"];
                $this->data["form"]["register-password"] = $form_data["data"]["password"];
                $this->data["form"]["register-password-again"] = $form_data["data"]["password-again"];
            }
        }

        // fill data array of empty strings
        if (!isset($this->data["form"])) {
            $this->data["form"]["register-name"] = "";
            $this->data["form"]["register-email"] = "";
            $this->data["form"]["register-password"] = "";
            $this->data["form"]["register-password-again"] = "";
        }

        $this->view = "registration_form";
    }
}