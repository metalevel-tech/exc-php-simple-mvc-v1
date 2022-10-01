<ul class="main-menu-list">
    <?php
    $menu_items = Menu::getItems();

    foreach ($menu_items as $item) {
        /**
         * $item = [
         *      "item_id" => $item_id,
         *      "label" => $label,
         *      "uri" => $uri,
         *      "class" => ["menu-item", "selected-item", "home-item"]
         * ];
         */
        
        // Use for JS data-sets
        $output = "<li class='". implode(" ", $item["class"]) ."'>";
        $output .= "<a href='/". $item["uri"] ."'>";
        $output .= "<span>". $item["label"] ."</span>";
        $output .= "</a></li>";

        echo $output;
    }
    ?>
</ul>