<?php
/**
 * See also, https://www.php.net/manual/en/class.pdo.php#89019
 * --> class Database extends POD { ... }
 */

class Database
{
    public static $dbName = 'sample_db';
    public static $dbChar = 'utf8';
    private static $dbDriver = 'mysql';
    private static $dbHost = 'localhost';
    private static $dbUser = 'sample_db_admin';
    private static $dbPswd = 'use-strong-password';

    private static function connect()
    {
        $settings = self::$dbDriver . ":";
        $settings .= "host=" . self::$dbHost . ";";
        $settings .= "dbname=" . self::$dbName . ";";
        $settings .= "charset=" . self::$dbChar;

        $pdo = new PDO($settings, self::$dbUser, self::$dbPswd);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    public static function query($query, $params = [])
    {
        $stmt = self::connect()->prepare($query);
        $stmt->execute($params);
        $data = $stmt->fetchAll();
        return $data;
    }
}
