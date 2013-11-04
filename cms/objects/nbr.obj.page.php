<?
class nbrPage{
  public $title;
  public $keywords;
  public $description;
  public $pageName;
  public $index = true;
  
  private $a_css = array();
  private $a_cssTemplate = array();
  private $a_js = array();
  private $a_jsTemplate = array();
  private $a_image_src = array();
  
  function __construct(){
    global $router, $cms;
    $this->pageName = $router->getPage();
    
    //verifica se existe CSS com o nome da página e adiciona automaticamente
    $fileCSS = $router->getPage() . '.css';
    if(file_exists($cms->GetFrontStyleSheetPath() . $fileCSS)){
      $this->addFileStylesheet($fileCSS);
    }

    //verifica se existe JS com o nome da página e adiciona automaticamente
    $fileJS = $router->getPage() . '.js';
    if(file_exists($cms->GetFrontJavaScriptPath() . $fileJS)){
      $this->addFileJavascript($fileJS);
    }    
  }
  
  public function PrintPage($useTemplate = true){
    global $router, $FRONT_PAGES_PATH, $cms, $page, $site, $db, $params; //Globals usados nas páginas
    
    $fileHtml = $this->pageName . '.html.php';
    
    //verifica se tem que carregar o template...
    if($useTemplate)
      include($cms->GetThemePath() . 'template.php');
    else 
    include($FRONT_PAGES_PATH . $fileHtml);
  }
  
  public function addFileStylesheet($file, $isTemplate = false){
    
    if(!$isTemplate){
      if(array_search($file, $this->a_css) === false)
        $this->a_css[] = $file;
    } else {
      if(array_search($file, $this->a_cssTemplate) === false)
        $this->a_cssTemplate[] = $file;

    }
  }
  
  public function addFileJavascript($file, $isTamplate = false){
    
    if(!$isTamplate){
      if(array_search($file, $this->a_js) === false)
        $this->a_js[] = $file;
    } else {

      if(array_search($file, $this->a_jsTemplate) === false)
        $this->a_jsTemplate[] = $file;
      
    }
  }


  public function addFileImageSrc($url){
    $this->a_image_src[] = $url;
  }
  
  private function printJS(){
    global $cms, $LINK_PREFIX, $router;

    $files = array_merge($this->a_jsTemplate, $this->a_js);
    
    if(count($files) > 0){
      $html = '<script type="text/javascript" src="' . $router->GetLink('s/js/' . implode('/', $files)) . '"></script>' . "\r\n";
      echo($html);
    }
  }
  
  private function printCSS(){
    global $cms, $LINK_PREFIX, $router;
    
    $files = array_merge($this->a_cssTemplate, $this->a_css);
    
    if(count($files) > 0){
      $html = '<link rel="stylesheet" type="text/css" href="' . $router->GetLink('s/css/' . implode('/', $files)) . '"/>' . "\r\n";
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
    global $cms, $events;

  echo('<!-- Meta Tags -->'. "\r\n");
  echo('<meta name="author" content="Nova Brazil Agência Interativa">'. "\r\n");
  echo('<meta name="description" content="' . $this->description . '">'. "\r\n");
  echo('<meta name="keywords" content="' . $this->keywords . '">'. "\r\n");
  echo('<meta name="CMS" content="Nova Brazil Ministrar' . $cms->GetVersion() . '">'. "\r\n");

  if(!$this->index)
    echo('<meta Name=”robots” content=”noindex,nofollow”>'. "\r\n");

  echo('<!-- Estilos Especiais desta Página -->'. "\r\n");
  $this->printCSS();
  echo('<!-- Scripts Especiais desta Página -->'. "\r\n");
  $this->printJS();
  echo('<!-- Imagens para Facebook e outros Shared -->'. "\r\n");
  $this->printImageSrc();

  //Dispara evento 'front_head_include'
  $evs = $events->getEventsArray('front_head_include');
  $returns = null;
  foreach ($evs as $e) {

  	$returns .= $e();
  	$returns .= "\n\r";
  }
  
  if(!empty($returns)){
    echo('<!-- Impresso por Eventos -->' . "\r\n");
    echo($returns);  
  }
    echo('<!-- -->');  
  }
}
?>