<?
$submenu = array(
  array('Home', $router->GetLink('home')),
  array('Clientes', $router->GetLink('clientes'))
);


$page = new nbrPage();
$page->title  = 'Clientes';
$page->keywords = 'clientes';
$page->description = 'Conheça nossos clientes';

$page->addFileStylesheet('clientes.css');

$page->PrintPage();
?>