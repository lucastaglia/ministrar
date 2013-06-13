<?
$page = new nbrPage();

//Carrega registro..
$params = $router->getParamsArray();
$linkID = $params[1];

$sql  = 'SELECT * FROM artArtigos';
$sql .= " WHERE (Publicado = 'Y')";
$sql .= " AND Link = '$linkID'";

$res = $db->LoadObjects($sql);

if(count($res) > 0){
  $reg = $res[0];

  $page->title       = utf8_encode($reg->Titulo) . ' - Artigo';
  $page->keywords    = utf8_encode($reg->Tags);
  $page->description = utf8_encode(strip_tags($reg->Texto));
  $page->addFileImageSrc($cms->GetImageUploadUrl() . utf8_encode($reg->Imagem));


} else {
  $page->pageName    = 'mensagem';
  $page->title       = 'Erro ao carregar Artigo';
  $page->keywords    = null;
  $page->description = 'Artigo não encontrada';
  $page->index = false;
  $page->addFileStylesheet('mensagem.css');
  
  $titulo = 'Não foi possível encontrar o Artigo';
  $msg = 'Ocorreu um erro ao tentar carregar o Artigo. <br>Verifique se o link esta correto.';
}


$page->PrintPage();
?>

?>