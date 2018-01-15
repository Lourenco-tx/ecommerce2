<?php

/*
	180112 - Criando Classe PageAdmin.php
	criada a pasta > views > admin e realizado Upload de pastas e arquivos do Template Admin
	criado o arquivo > views > PageAdmin.php extendida da class Page
	Foi necessário fazer um cópia do arquivo /vendor/slim/slim/.htaccess para a pasta raiz para funcionar e impedir o erro 404.
*/

namespace Hcode;

class PageAdmin extends Page {

	public function __construct($opts = array(), $tpl_dir = "/views/admin/")
	{

		parent::__construct($opts, $tpl_dir);

	}

}

?>