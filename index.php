<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>PHP Simple MVC</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
</head>
<body>
<?php
// The state of the file at Stage-1-Routing

spl_autoload_register(function ($class_name) {
    require_once('classes/'. $class_name .'.php');
});

require_once('Routes.php');

echo '<br>' . $_GET['url'];

?>
</body>
</html>