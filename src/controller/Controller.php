<?php

namespace Controller;

abstract class Controller {
    protected $header = array("title" => "T");
    protected $url;
    protected $navigation;
    protected $view;

    public function redirect($location) {
        header("Location: /$location");
        exit();
    }

    /**
     * Return list of values of given url parameter, if does't exist, return false
     * @param $parameter
     * @return array|bool
     */
    public function getUrlParameter($parameter) {
        if (array_key_exists($parameter, $this->url["parameters"])) {
            if (empty($this->url["parameters"][$parameter])) {
                return true;
            }
            return $this->url["parameters"][$parameter];
        } else {
            return false;
        }
    }

    public function renderView() {
        if ($this->view) {
            require ("src/view/{$this->view}.php");
        }
    }

    abstract function execute();
}

