<?php
/**
 * Created by PhpStorm.
 * User: Tonda
 * Date: 24.02.2017
 * Time: 15:15
 */

namespace Model;


class Navigation {
    private $items_common = [
        ["/", "Home"],
        ["/page/about/", "About"],
        ["/product/", "Products"]
    ];
    private $items_custom = [
        "visitor" => [
            ["/registration/", "Registration"],
            ["/login/", "Login"],
            ["/cart/", "Cart"]
            ],
        "customer" => [
            ["/logout/", "Logout"],
            ["/account/", "My Account"],
            ["/cart/", "Cart"]
        ],
        "staff" => [
            ["/logout/", "Logout"],
            ["/account/", "My Account"],
            ["/cart/", "Cart"]
        ]
    ];
    public function generateNavigation($section) {
        $navigation = [];

        // common part
        $navigation["common"] = $this->items_common;

        // custom part of the navigation
        if (!isset($_SESSION["user_role"])) {
            $navigation["custom"] = $this->items_custom["visitor"];
        } elseif ($_SESSION["user_role"] == "customer") {
            $navigation["custom"] = $this->items_custom["customer"];
        } elseif ($_SESSION["user_role"] == "staff") {
            $navigation["custom"] = $this->items_custom["staff"];
        } else {
            $navigation["custom"] = $this->items_custom["visitor"];
        }

        // active item
        $navigation["active"] = "";
        foreach (array_merge($navigation["common"], $navigation["custom"]) as $item) {
            if ($item[0] == "/$section/" || $item[0] == $section) {
                $navigation["active"] = $item[0];
            }
        }
        return $navigation;
    }
}