<?
$page = new nbrPage();

//Carrega registro..
$params = $router->getParamsArray();
$linkID = $params[1];

$sql  = 'SELECT * FROM cusServicos';
$sql .= " WHERE (Publicado = 'Y')";
$sql .= " AND Link = '$linkID'";

$res = $db->LoadObjects($sql);

if(count($res) > 0){
  $reg = $res[0];

  $page->title       = utf8_encode($reg->Nome) . ' - Serviço';
  $page->keywords    = utf8_encode($reg->Tags);
  $page->description = utf8_encode($reg->Descricao);


} else {
  $page->pageName    = 'mensagem';
  $page->title       = 'Erro ao carregar Servico';
  $page->keywords    = null;
  $page->description = 'Serviço não encontrada';
  $page->index = false;
  $page->addFileStylesheet('mensagem.css');
  
  $titulo = 'Não foi possível encontrar a Novidade';
  $msg = 'Ocorreu um erro ao tentar carregar o Novidade. <br>Verifique se o link esta correto.';
}


$page->PrintPage();
?>

?>