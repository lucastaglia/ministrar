<?php
//Inicia sessão..
session_start();

//error_reporting(0); //Esconde erros
//error_reporting(E_ALL); //Mostra todos os erros
ini_set('error_log', dirname(__FILE__) . '/nbrazil_ERROR_log.txt'); //salva erros em um arquivo

// Acerta o horário caso seu servidor
date_default_timezone_set('America/Sao_Paulo');

//Seta no Cabeçalho codificação do fonte..
header('Content-type: text/html; charset=utf-8');

//Altera configurações do PHP (forçado)
ini_set("upload_max_filesize","1024M");
ini_set("post_max_size","1024M");
ini_set('memory_limit', '1024M'); //ilimitado

//Verifica se o CMS já foi instalado...
if(file_exists('./config.php'))
  include('./config.php');
else {
  header('LOCATION: ./install/index.php');
  exit;
}

//Carrega framework
include('./cms/nbr.loader.php');

//Carrega Roteador...
$router   = new nbrRouter();

//Carrega Site (de acordo com a URL)..
$site = new nbrSite();

if($router->getPage() == 's'){
  $script = $router->params[1];
  include($FRONT_SCRIPTS_PATH . $script . '.php');
}else
  include($FRONT_PAGES_PATH . $router->pageFile);
?>