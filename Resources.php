<?php
# Generate random number and invalidate some resources from here
$random = rand(1, 10000);
$version = 1;

ResourceLoader::add(
    "head", "favicon.ico?v=$version",
    priority:1, type:"image/x-icon", options:"rel=\"shortcut icon\""
);

ResourceLoader::add(
    "head", "assets/css/dist/style.min.css?v=$version",
    priority:10, embed:true, active:true, options:"rel=\"stylesheet\""
    // type="text/css" is auto detected
    // , route:["posts", "about-us"]
);

ResourceLoader::add(
    "head", "assets/css/src/style.less?v=$random",
    priority:11, embed:false, active:false, options:"rel=\"stylesheet\""
    // type="text/css" is auto detected
);

ResourceLoader::add(
    "head", "assets/vendor/jquery.slim.min.js?v=$random",
    priority:20, embed:false, active:true, options:"rel=defer"
    // type="text/css" is auto detected
);

ResourceLoader::add(
    "footer", "assets/js/dist/main.min.js?v=$random",
    priority:20, embed:false, active:true, options:"rel=defer"
    // type="text/css" is auto detected
);