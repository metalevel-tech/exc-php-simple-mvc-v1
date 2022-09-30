<?php
// The state of the file at Stage-2-2-Controllers

Route::set('about-us', function() {
    AboutUs::CreateView();
});

Route::set('contact-us', function() {
    ContactUs::CreateView();
});

Route::set('let-us-go', function() {
    LetUsGo::CreateView();
});

?>