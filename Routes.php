<?php
// The state of the file at Stage-4-1-Databases

Route::set('about-us', function() {
    AboutUs::CreateView('AboutUs');
});

Route::set('contact-us', function() {
    ContactUs::CreateView('ContactUs');
});

Route::set('home', function() {
    Home::CreateView('Home');
});
Route::set('index.php', function() {
    Home::CreateView('Home');
});
Route::set('', function() {
    Home::CreateView('Home');
});

if (!in_array($_GET['url'], Route::list())) {
    HTTP404::CreateView('HTTP404');
}
?>