<?
//redireciona link antigo...
$paginaNova = 'artigo';

$params = $router->getParamsArray();

//tira o primeiro nivel (da pagina).
array_shift($params);

header('LOCATION: ' . $router->GetLink($paginaNova . '/' . implode('/', $params)));
?>