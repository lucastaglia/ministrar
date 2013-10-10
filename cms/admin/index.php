<?php

//Inicia sessão..
session_start();

error_reporting( E_ALL ^E_NOTICE ); //Mostra todos os erros menos os NOTICE..

//Tira bug do linux de barra invertidas no input..
foreach ($_POST as $x=>$post) {
  
  if(!is_array($_POST[$x])){
    $value = $_POST[$x];  
    $_POST[$x] = stripcslashes($value);
  }
	
}

// Acerta o horário caso seu servidor
date_default_timezone_set('America/Sao_Paulo');

//Seta no Cabeçalho codificação do fonte..
header('Content-type: text/html; charset=utf-8');

//Verifica se o CMS já foi instalado...
if(file_exists('../../config.php'))
  include('../../config.php');
else {
  header('LOCATION: ../../install/index.php');
  exit;
}

//Carrega framework
include($ROOT_PATH . 'cms/nbr.loader.php');

//Carrega framework Admin
include($ADMIN_PATH . 'nbr.admin.loader.php');

//Chame administrador de Cookies
include($ADMIN_PAGES_PATH . 'cookies.php');

//Joga parâmetro (do GRID) "Registros por Página" no Cookie do Usuário
if($hub->ExistParam('grid_limitPage')){
  $recordsLimitFromPage = $hub->GetParam('grid_limitPage');
  setcookie('nbr_grid_LimitFromPage', $recordsLimitFromPage, $COOKIE_EXPIRE);
  $_COOKIE['nbr_grid_LimitFromPage'] = $recordsLimitFromPage; //já atualiza variável...
}

//Verifica se já tem hub
if($hub->CountLevels() == 0){
  
  if($security->checkLogin()){
  
    //$module = nbrModules::GetFirstModule();
    $hub->SetParam('_page',  $ADMIN_PAGES_PATH . 'admin.index.php');
    $hub->SetParam('_title', 'Bem vindo');
    //$hub->SetParam('_description', 'Módulo ' . $module->name);
    //$hub->SetParam('_moduleID', $module->ID);
    //$hub->SetParam('_folderID', $module->folderID);
    header('Location:' . $hub->GetUrl());
    exit;
  } else {
    //Encaminha pro Login
    $hub->SetParam('_script', $ADMIN_PAGES_PATH . 'login.pg.php');
    $hub->SetParam('mail', $mail);
    $link = $hub->GetUrl();
    header('location:' . $link);      
    exit;    
  }
} elseif($hub->ExistParam('_page')){
  
  $page = $hub->GetFilePage();
  include($ADMIN_PATH . 'template.php');
  
} elseif($hub->ExistParam('_script')){
  
  include($hub->GetParam('_script'));  
  
}
/*
 echo('<!--' . "\r\n");
 $hub->PrintUrlParameters();
 echo('-->' . "\r\n");
*/ 
?>