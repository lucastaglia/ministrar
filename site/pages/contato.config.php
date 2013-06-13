<?
$submenu = array(
  array('Home', $router->GetLink('home')),
  array('Contato', $router->GetLink('contato'))
);

$page = new nbrPage();
$page->title  = 'Contato';
$page->keywords = 'contato, fale conosco';
$page->description = 'Fale com nossa equipe';

$page->addFileStylesheet('contato.css');
$page->addFileStylesheet('html.css');

$page->PrintPage();
?>