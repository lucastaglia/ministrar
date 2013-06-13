<?
$submenu = array(
  array('Home', $router->GetLink('home')),
  array('A MAC', $router->GetLink('empresa'))
);


$page = new nbrPage();
$page->title  = 'Home';
$page->keywords = 'Bem vindo';
$page->description = 'Saiba mais sobre a MAC Consultoria.';

$page->addFileStylesheet('html.css');
$page->addFileStylesheet('empresa.css');

$page->PrintPage();
?>