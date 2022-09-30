# PHP Model View Controller (MVC)

Sample example of PHP MVC.

## Auto load Classes

`__autoload()` is no longer supported, use `spl_autoload_register()` instead.

```log
[Fri Sep 30 13:26:51.015401 2022] [proxy_fcgi:error] [pid 2629300] [client 185.218.64.95:41546] AH01071: Got error 'PHP message: PHP Fatal error:  __autoload() is no longer supported, use spl_autoload_register() instead in /var/www/php-mvc.example.com/index.php on line 16'
```

The relevant code of [Simple MVC in PHP (1/4) - Routing](https://youtu.be/DpbUqJcch0Y) should be changed to:

```php
spl_autoload_register(function($class) {
    include 'classes/' . $class . '.class.php';
});
```

Explanation, solutions, references:

* Stack Overflow: [How to fix: Cannot redeclare spl_autoload_register()?](https://stackoverflow.com/a/59049684/6543935)
* Stack Overflow: [How to use spl_autoload() instead of __autoload()](https://stackoverflow.com/a/10687888/6543935)

## References

* howCode at YouTube: [Simple MVC in PHP (1/4) - Routing](https://youtu.be/DpbUqJcch0Y)
* howCode at GitHub: [how - helper classes](https://github.com/howCodeORG/how)
