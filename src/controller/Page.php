<?php
/**
 * Created by PhpStorm.
 * User: Tonda
 * Date: 24.02.2017
 * Time: 14:33
 */

namespace Controller;


class Page extends Controller {
    function execute() {

        if ($this->getUrlParameter("about")) {
            $this->header["title"] = "About";
            $this->view = "about";
        }

        if ($this->getUrlParameter("tos")) {
            $this->header["title"] = "Terms and Conditions";
            $this->view = "tos";
        }

        if ($this->getUrlParameter("privacy")) {
            $this->header["title"] = "Privacy";
            $this->view = "privacy";
        }
    }
}