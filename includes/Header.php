<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PHP Simple MVC</title>
    
    <?php
    // echo "<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />";
    ResourceLoader::hook('head');
    ?>
</head>

<body class="<?php echo $_GET["url"] ?>">
    <?php
    ResourceLoader::hook('body');
    ?>
    <div id="header-content">
        <div id="main-menu">
            <?php
            Req::resource('Menu');
            echo "\n";  // Pretty HTML output
            ?>
        </div>
    </div>
    <div id="body-content">