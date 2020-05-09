<?php

/** 
*ファイルパス : C:\xampp\htdocs\training\Bootstrap.class.php
*ファイル名 : Bootstrap.class.php (設定に関するプログラム)
*/

namespace training;

require_once dirname(__FILE__) . '\..\vendor\autoload.php';

class Bootstrap 
{
    const DB_HOST = 'localhost';
    const DB_PORT = '5432';
    const DB_NAME = 'training_db';
    const DB_USER = 'training_user';
    const DB_PASS = 'training_pass';
    const DB_TYPE = 'pgsql';
    const APP_DIR = 'c:/xampp/htdocs/';
    const TEMPLATE_DIR = self::APP_DIR. 'training/views/templates/';
    const CACHE_DIR = self::APP_DIR. 'training/views/templates_c';
    const APP_URL = 'http://localhost/';
    const ENTRY_URL = self::APP_URL. 'training/';
    const DIRECTORY_SEPARATOR = '/';

    public static function loadClass($class)
    {
        $path = str_replace('\\' , self::DIRECTORY_SEPARATOR, self::APP_DIR . $class . '.class.php');
        require_once $path;
    }
}

// これを実行しないとオートローダーとして動かない
spl_autoload_register([
        'training\Bootstrap',
        'loadClass'
]);

?>