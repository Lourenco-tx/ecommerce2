<?php

// Exibindo todos os erros e warnings para facilitar a identificação de erros
ini_set('display_errors', true);
error_reporting(E_ALL);

/*
180113 - Tela de Login PageAdmin
	Criado Rota get /admin/login/	 
	Criado Rota post /admin/login/    
*/

require_once('vendor/autoload.php');

use \Slim\Slim;
use \Hcode\Page;
use \Hcode\PageAdmin;
use \Hcode\Model\User;

$app = new \Slim\Slim();

$app->config('debug', true);

use Hcode\DB\Sql; //incluido para resolver erro da linha 15

$app->get('/', function() { 

	$page = new Page();

	$page->setTpl("index");
   
});

$app->get('/admin/', function() { 

	$page = new PageAdmin();

	$page->setTpl("index");
   
});

$app->get('/admin/login', function() { 

	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("login");
   
});

$app->post('/admin/login', function() {

	User::login($_POST["login"], $_POST["password"]);
	
	header("Location: /admin");
	
	exit;

});

$app->run();

?>