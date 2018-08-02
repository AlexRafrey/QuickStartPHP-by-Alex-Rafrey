<?
// FRONT CONTROLLER - index.php - через него проходят все запросы и можно использовать ЧПУ. Все запросы из  GET он будет распределять по контролеррам
// 1. Общие настройки! Вывод ошибок
ini_set('display_erros', 'ERROR index.php в корне сайта ошибка с дисплеем');
error_reporting(E_ALL);
// 2. Подключаем файлы с относительными путями. константа  root - это путь до файла где он вызывается
//dirname выводит каталог гле вызван -> здесь это корень сайта, где лежит  index.php
define('ROOT', dirname(__FILE__));
require_once(ROOT.'/components/Router.php');
require_once(ROOT.'/components/Db.php');
//3. подключаемся к бд
//3. подключаемся к роутеру ->  создаем New Router
$router = new Router();
$router->run();

//components->  главный роутер
//config-> настрйоки системы
