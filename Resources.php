<?php
# Generate random number and invalidate some resources from here
$random = rand(1, 10000);
$version = 1;

ResourceLoader::add( # Favicon.ico
    "head",
    "favicon.ico?v=$version",
    active: true,
    priority: 1,
    type: "image/x-icon",
    options: "rel=\"shortcut icon\""
);

ResourceLoader::add( # Favicon.ico
    "head",
    "assets/vendor/fontawesome/css/all.css?v=$version",
    active: true,
    priority: 5,
    options: "rel=\"stylesheet\""
    // type="text/css" is auto detected
    // , route:["posts", "about-us"]
);

ResourceLoader::add( # CSS for production
    "head",
    "assets/css/dist/style.min.css?v=$version",
    active: true,
    priority: 10,
    embed: true,
    options: "rel=\"stylesheet\""
    // type="text/css" is auto detected
);

ResourceLoader::add( # LESS for dev tests
    "head",
    "assets/css/src/style.less?v=$random#!watch",
    active: false,
    priority: 11,
    embed: false,
    options: "rel=\"stylesheet/less\""
    // type="text/css" is auto detected
);

ResourceLoader::add( # jQuery added
    "head",
    "assets/vendor/jquery.slim.min.js?v=$version",
    active: true,
    priority: 20,
    embed: false,
    options: "defer"
    // type="text/css" is auto detected
);

ResourceLoader::add( # JavaScript: main
    "head",
    "assets/js/dist/main.min.js?v=$version",
    priority: 20,
    embed: false,
    active: true,
    options: "defer"
    // type="text/css" is auto detected
);

ResourceLoader::add( # JavaScript: main-menu 
    "head",
    "assets/js/dist/main-menu.min.js?v=$version",
    // "assets/js/src/main-menu.js?v=$random",
    priority: 5,
    embed: false,
    active: true,
    options: "defer"
    // type="text/css" is auto detected
);
