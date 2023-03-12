<?php

use Framework\Container;
use Framework\Request;
use Framework\Application;
use Framework\Router;
use Dotenv\Dotenv;

session_start(["use_strict_mode" => true]);

date_default_timezone_set('Asia/Yekaterinburg');
if ( file_exists(dirname(__FILE__).'/vendor/autoload.php') ) {
    require_once dirname(__FILE__).'/vendor/autoload.php';
}
if (file_exists(".env"))
{
    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load(); //все параметры окружения помещаются в массив $_ENV
    echo "Окружение загружено<p>";
    // var_dump($_ENV);
}
else {
    echo "Ошибка хагрузки ENV<br>";
}


Container::getApp()->run();










exit();

$dimensions = array('reps', 'Kg', 'g', 'm', 'Km', 'hh', 'mm', 'ss', 'DD', 'MM', 'YY');
//Мета-данные страницы
require('pages/meta.php');

//Функциональные файлы
require('components/dbconnect.php');
require('pages/auth.php');
require('components/password_change.php');
require('components/task_add.php');
require('components/task_delete.php');
//require('components/record_delete.php');

//Отрисовка страницы
require('pages/page.php');
