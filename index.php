<?php
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
