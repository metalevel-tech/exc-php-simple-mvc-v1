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

Menu::addItem(0, "Home", "home");
Menu::addItem(1, "About", "about-us");
Menu::addItem(2, "Contacts", "contact-us");
Menu::addItem(3, "Blog", "posts");

Route::set("about-us", function () {
    AboutUs::CreateView("AboutUs");
});

Route::set("contact-us", function () {
    ContactUs::CreateView("ContactUs");
});

Route::set("posts", function () {
    Posts::CreateView("Posts");
});

Route::set("home", function () {
    Home::CreateView("Home");
});
Route::set("index.php", function () {
    Home::CreateView("Home");
});

if (!in_array($_GET["url"], Route::list())) {
    HTTP404::CreateView("HTTP404");
}
