<?php
use Framework\Request;
use Framework\Router;
use Framework\Application;

date_default_timezone_set('Asia/Yekaterinburg');
if ( file_exists(dirname(__FILE__).'/vendor/autoload.php') ) {
    require_once dirname(__FILE__).'/vendor/autoload.php';
}

$request = new Request();
Application::init();
echo (new Router($request))->getContent();










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
