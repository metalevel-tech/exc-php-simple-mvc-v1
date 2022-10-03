<?php
# Generate random number and invalidate some resources from here
$random = rand(1, 10000);
$version = 1;

ResourceLoader::add( # Favicon.ico
    "head",
    "favicon.ico?v=$version",
    priority: 1,
    type: "image/x-icon",
    options: "rel=\"shortcut icon\""
);

ResourceLoader::add( # CSS for production
    "head",
    "assets/css/dist/style.min.css?v=$version",
    priority: 10,
    embed: true,
    active: true,
    options: "rel=\"stylesheet\""
    // type="text/css" is auto detected
    // , route:["posts", "about-us"]
);

ResourceLoader::add( # LESS for dev tests
    "head",
    "assets/css/src/style.less?v=$random#!watch",
    priority: 11,
    embed: false,
    active: false,
    options: "rel=\"stylesheet/less\""
    // type="text/css" is auto detected
);

ResourceLoader::add( # jQuery added
    "head",
    "assets/vendor/jquery.slim.min.js?v=$version",
    priority: 20,
    embed: false,
    active: false,
    options: "async"
    // type="text/css" is auto detected
);

// ResourceLoader::add( # JavaScript: main
//     "head",
//     "assets/js/dist/main.min.js?v=$version",
//     priority: 20,
//     embed: false,
//     active: true,
//     options: "defer"
//     // type="text/css" is auto detected
// );

ResourceLoader::add( # JavaScript: main-menu 
    "head",
    "assets/js/dist/main-menu.min.js?v=$random",
    // "assets/js/src/main-menu.js?v=$random",
    priority: 5,
    embed: false,
    active: true,
    options: "defer"
    // type="text/css" is auto detected
);
