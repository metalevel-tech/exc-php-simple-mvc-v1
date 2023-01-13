<?php

/**
 * Route::set(
 *      $uri,       // URI of the page, same as the $uri in Menu::AddItem()
 *      function()  // Function which produces the output of the page
 * );
 *  
 * Controller::CreateView(
 *      $view,      // Page view name,
 * );
 * 
 *  Menu::AddItem(
 *      $item_id,   // Menu item order number, 0 has special priority, null not a menu item,
 *      $label,     // Menu item label,
 *      $uri        // URI of the page behind the menu item
 * );
 */

Menu::addItem(0, "home", "Home");
Menu::addItem(1, "about", "About");
Menu::addItem(2, "contacts", "Contacts");
Menu::addItem(3, "blog", "Blog");

// echo "<pre>";
// var_dump(Menu::$menu_items);
// echo "</pre>";

Route::set("about", function () {
    AboutUs::CreateView("About");
});

Route::set("contacts", function () {
    ContactUs::CreateView("ContactUs");
});

Route::set("blog", function () {
    Blog::CreateView("Blog");
});

Route::set("index.php", function () {
    Home::CreateView("Home");
});

Route::set("home", function () {
    Home::CreateView("Home");
});

if (!in_array($_GET["uri"], Route::list())) {
    HTTP404::CreateView("HTTP404");
}
