<?
$parametros = $router->getParamsArray();

$files = array_slice($parametros, 2);

if(count($files) <= 0){
  header("HTTP/1.1 304 Not Modified");
  exit;  
}

$code = '/* Gerado em: ' . date('d/m/Y H:i:s') . ' */' . "\r\n";
$ultimaData = null;

foreach ($files as $file) {
  $fileFull = $cms->GetThemePath() . 'stylesheets/' . $file;
  $modificacao = filemtime($fileFull);
  
  //se esse arquivo for mais recente atualiza...
  if($modificacao > $ultimaData)
    $ultimaData = $modificacao;
  
  $code .= "\r\n";
  $code .= '/*******************************' . "\r\n";
  $code .= ' Arquivo: '. $file . "\r\n";
  $code .= ' Data de Modificação: '. date ("d/m/Y H:i:s", $modificacao) . "\r\n";
  $code .= '*/' . "\r\n";  
  $code .= "\r\n";
  
  $arquivo = fopen($fileFull, 'r');
  if ($arquivo == false) die('Não foi possível abrir o arquivo.');
  
  while(true) {
  	$linha = fgets($arquivo);
  	if ($linha==null) break;
  	  $code .= $linha;
  }
  $code .= "\r\n";
  fclose($arquivo);	

}


//seta data de modificação do aquivo
header("Last-Modified: ".gmdate("D, d M Y H:i:s", $ultimaData)." GMT");

//Seta identificador do cache etag
$etag = md5($code);
header("Etag: " . $etag);

//gaante que o cache estará ligado
header('Cache-Control: public');

//check if page has changed. If not, send 304 and exit
$etagHeader = (isset($_SERVER['HTTP_IF_NONE_MATCH']) ? trim($_SERVER['HTTP_IF_NONE_MATCH']) : false);
$dataHeader = @strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']);

if ($dataHeader == $ultimaData || $etagHeader == $etag)
{
  header("HTTP/1.1 304 Not Modified");
  exit;
}

//Imprime JS
header("Content-type: text/javascript; charset=utf-8");
echo($code);
?>