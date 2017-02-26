<?php

namespace Controller;

abstract class Controller {
    protected $header = array("title" => "Title");
    protected $data = [];
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
            extract($this->data, EXTR_PREFIX_ALL, "");
            extract($this->protectOutput($this->data));
            require ("src/view/{$this->view}.php");
        }
    }

    public function renderMessages() {
        require "src/view/messages.php";

        // protect data
        if (isset($_SESSION["message"])) {
            $_SESSION["message"] = $this->protectOutput($_SESSION["message"]);
        }
        // render success messages
        if (isset($_SESSION["message"]["success"]) && !empty($_SESSION["message"]["success"])) {
            foreach ($_SESSION["message"]["success"] as $msg) {
                view_success($msg);
            }
        }

        // render error messages
        if (isset($_SESSION["message"]["error"]) && !empty($_SESSION["message"]["error"])) {
            foreach ($_SESSION["message"]["error"] as $msg) {
                view_error($msg);
            }
        }

        // delete rendered messages from the session
        unset($_SESSION["message"]);
    }

    public function protectOutput($data) {
        if(!is_array($data)) {
            return htmlspecialchars($data, ENT_QUOTES);
        } else {
            $protectString = function(&$string) {
                $string = htmlspecialchars($string, ENT_QUOTES);
            };

            array_walk_recursive($data, $protectString);
            return $data;
        }
    }

    abstract function execute();
}

