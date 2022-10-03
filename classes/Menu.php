<?php
/**
 * Menu generator
 *  Menu::addItem(),  invoked by Routes.php
 *  Menu::getItems(), invoked by includes/Menu.php
 */

class Menu
{
    public static $menu_items = [];

    public static function addItem($item_id, $label, $uri)
    {
        self::$menu_items[] = [
            "item_id" => $item_id,
            "label" => $label,
            "uri" => $uri,
            "class" => ["menu-item"]
        ];
    }

    public static function getItems()
    {
        // Sort the array     
        usort(self::$menu_items, function ($a, $b) {
            return ($a["item_id"] <= $b["item_id"]) ? -1 : 1;
        });

        // Parse the selected item
        foreach (self::$menu_items as $key => $item) {
            // Add classes "home-item"
            if ($item["item_id"] == 0) {
                self::$menu_items[$key]["class"][] = "home-item";
            }
            
            // Add classes "selected-item"
            if ($_GET["url"] == $item["uri"]) {
                self::$menu_items[$key]["class"][] = "selected-item";
            }
        }

        // The actual menu is constructed by includes/Menu.php
        return self::$menu_items;
    }
}
