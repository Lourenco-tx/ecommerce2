<?php

// Exibindo todos os erros e warnings para facilitar a identificação de erros
ini_set('display_errors', true);
error_reporting(E_ALL);

require_once('vendor/autoload.php');

session_start();

use Hcode\DB\Sql; //incluido para resolver erro da linha 15

use \Slim\Slim;

$app = new \Slim\Slim();

$app->config('debug', true);

require_once("functions.php");
require_once("site.php");
require_once("admin.php");
require_once("admin-users.php");
require_once("admin-categories.php");
require_once("admin-products.php");

$app->run();

?>