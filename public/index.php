<?php
require_once(__DIR__ . '/../vendor/autoload.php');

use Config\Tata;

$router = new Tata();

$router->addRoute('/', 'HomeController', 'index');

$router->handleRequest();