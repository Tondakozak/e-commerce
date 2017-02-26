<?php
/**
 * Created by PhpStorm.
 * User: Tonda Kozák
 * Date: 24.02.2017
 * Time: 12:17
 */

namespace Controller;


use Model\Navigation;

class Main extends Controller {
    public $controller;
    private $sections = [
        "home",
        "product",
        "cart",
        "login",
        "logout",
        "registration",
        "account",
        "administration",
        "page"
    ];

    public function __construct() {
        $this->setUrl();
    }

    private function getUrlSection() {
        return $this->url["section"];
    }



    /**
     * parse url string and set $this->url
     */
    private function setUrl() {
        $url_string = $_SERVER['REQUEST_URI'];
        // explode url by "/"
        $url_array = explode("/", $url_string);
        // delete empty fields
        $url_array_filtered = array();
        foreach ($url_array as $field) {
            if (!empty($field)) {
                $url_array_filtered[] = $field;
            }
        }

        // for home page
        if (!count($url_array_filtered)) {
            $url_array_filtered[] = "home";
        }

        $this->url["section"] = $url_array_filtered[0];
        unset($url_array_filtered[0]);

        // get parameters
        $url_parameters = [];
        foreach ($url_array_filtered as $item) {
            $item = explode("-", $item);
            $url_parameters[$item[0]] = [];
            if (isset($item[1])) {
                $url_parameters[$item[0]] = explode(".", $item[1]);
            }
        }
        $this->url["parameters"] = $url_parameters;
    }

    public function execute() {
        $section = $this->getUrlSection();

        // if the section is predefined
        if (in_array($section, $this->sections)) {
            // create an instance of section controller
            $controller_name = "Controller\\".ucfirst($section);
            $this->controller = new $controller_name;
        } else {
            // 404 error
            $this->redirect("page/error/404/");
        }

        // invoke section controller action
        $this->controller->execute();

        // set header for this template
        $this->header = $this->controller->header;
        // add title appendix
        if ($this->header["title"] != PAGE_NAME) {
            $this->header["title"] .= " | ".PAGE_NAME;
        }



        // set navigation
        $nav = new Navigation();
        $nav_section = ($this->getUrlSection()=="home")?"/":$this->getUrlSection();
        $nav_section = ($nav_section == "page" && $this->getUrlParameter("about"))?"page/about":$nav_section;
        $this->navigation = $nav->generateNavigation($nav_section);

        // set layout view
        $this->view = "layout";
    }
}