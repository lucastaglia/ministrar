<?
$params = $router->getParamsArray();
$titulo = 'Atenção';
$msg = $params[1];

$msg = base64_decode($msg);
$msg = urldecode($msg);

$page = new nbrPage();
$page->title  = 'Mensagem';
$page->keywords = 'Mensagem';
$page->description = 'Mensagem';
$page->index = false;

$page->PrintPage();
?>