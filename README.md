# PHP Model View Controller (MVC)

Sample example of PHP MVC. It is like a tutorial and follows the tutorial "Simple MVC in PHP" howCode at YouTube (see the references section below), but is updated and compatible with PHP 8.1 also some other features are added. However, despite it is little bit outdated, I strongly recommend you to watch the tutorial ["Simple MVC in PHP"](#references) which just 20 minutes.

The branches are named `Stage-X...` and represent the consequential steps that lead to the final state.

## Auto load Classes

`__autoload()` is no longer supported, use `spl_autoload_register()` instead.

```log
[Fri Sep 30 13:26:51.015401 2022] [proxy_fcgi:error] [pid 2629300] [client 185.218.64.95:41546] AH01071: Got error 'PHP message: PHP Fatal error:  __autoload() is no longer supported, use spl_autoload_register() instead in /var/www/php-mvc.example.com/index.php on line 16'
```

The relevant code of [Simple MVC in PHP (1/4) - Routing](https://youtu.be/DpbUqJcch0Y) should be changed to:

```php
spl_autoload_register(function($class) {
    include 'classes/' . $class . '.php';
});
```

Explanations, solutions, references:

* PHP Manual: [Autoloading Classes](https://www.php.net/manual/en/language.oop5.autoload.php)
* PHP Manual: [SPL Functions > spl_autoload_register](https://www.php.net/manual/en/function.spl-autoload-register.php)
* Stack Overflow: [How to fix: Cannot redeclare spl_autoload_register()?](https://stackoverflow.com/a/59049684/6543935)
* Stack Overflow: [How to use spl_autoload() instead of __autoload()](https://stackoverflow.com/a/10687888/6543935)
* W3School: [PHP `include` and `require` Statements](https://www.w3schools.com/php/php_includes.asp)

## Tweak .htaccess

The example provided in the beginning of the tutorial [Simple MVC in PHP (1/4) - Routing](https://youtu.be/DpbUqJcch0Y) is incomplete, because sometimes we need to change some other options and also to serve some static files and avoid unnecessary additional processing. In the first section of the current [.htaccess](./.htaccess) file some of these requirements are covered.

Explanations, solutions, references:

* Stack Overflow [Note about the `-MultiViews` option](https://stackoverflow.com/a/20685686/6543935)

## References

* howCode at YouTube: [Simple MVC in PHP (1/4) - Routing](https://youtu.be/DpbUqJcch0Y)
* howCode at YouTube: [Simple MVC in PHP (2/4) - Classes](https://youtu.be/04aTM01Y3uQ)
* howCode at YouTube: [Simple MVC in PHP (3/4) - Views](https://youtu.be/aUvfzHHTKJU)
* howCode at YouTube: [Simple MVC in PHP (4/4) - Databases](https://youtu.be/DpbUqJcch0Y)
* howCode at GitHub: [how - helper classes](https://github.com/howCodeORG/how)
