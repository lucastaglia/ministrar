<?
class nbrPage{
  public $title;
  public $keywords;
  public $description;
  public $pageName;
  public $index = true;
  
  private $a_css = array();
  private $a_js = array();
  private $a_image_src = array();
  
  function __construct(){
    global $router, $cms;
    $this->pageName = $router->getPage();
  }
  
  public function PrintPage($useTemplate = true){
    global $router, $FRONT_PAGES_PATH, $cms, $page, $site, $db; //Globals usados nas páginas
    
    $fileHtml = $this->pageName . '.html.php';
    
    //verifica se tem que carregar o template...
    if($useTemplate)
      include($cms->GetThemePath() . 'template.php');
    else 
    include($FRONT_PAGES_PATH . $fileHtml);
  }
  
  public function addFileStylesheet($file){
    $this->a_css[] = $file;
  }
  public function addFileJavascript($file){
    $this->a_js[] = $file;
  }


  public function addFileImageSrc($url){
    $this->a_image_src[] = $url;
  }
  
  private function printJS(){
    global $cms, $LINK_PREFIX;
    
    foreach ($this->a_js as $js) {
      $html = '<script type="text/javascript" src="' . $cms->GetFrontJavaScriptUrl() . $js . '?v=' . $LINK_PREFIX . '"></script>' . "\r\n";
      echo($html);
    }
  }
  
  private function printCSS(){
    global $cms, $LINK_PREFIX;
    
    foreach ($this->a_css as $css) {
      $html = '<link rel="stylesheet" type="text/css" href="' . $cms->GetFrontStyleSheetUrl() . $css . '?v=' . $LINK_PREFIX . '"/>' . "\r\n";
      echo($html);
    }
  }
  
  private function printImageSrc(){
    global $cms;
    
    foreach ($this->a_image_src as $image_src) {
      $html = '<link href="' . $image_src . '" rel="image_src">' . "\r\n";
      echo($html);
    }    
  }
  
  public function printHeader(){

  echo('<!-- Meta Tags -->'. "\r\n");
  echo('<meta name="author" content="Nova Brazil Agência Interativa">'. "\r\n");
  echo('<meta name="description" content="' . $this->description . '">'. "\r\n");
  echo('<meta name="keywords" content="' . $this->keywords . '">'. "\r\n");
  
  if(!$this->index)
    echo('<meta Name=”robots” content=”noindex,nofollow”>'. "\r\n");
    
  echo('<!-- Estilos Especiais desta Página -->'. "\r\n");
  $this->printCSS();
  echo('<!-- Scripts Especiais desta Página -->'. "\r\n");
  $this->printJS();
  echo('<!-- Imagens para Facebook e outros Shared -->'. "\r\n");
  $this->printImageSrc();
    
  }
}
?>