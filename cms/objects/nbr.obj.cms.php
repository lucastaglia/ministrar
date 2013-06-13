<?
class nbrCMS
{
  
  private $_lang;
  private $themePath;
  private $themeURL;    
  public $isMobile = false;
  private $vension = '1.2.0';

  
  function __construct($lang = 'pt-br'){
    global $FRONT_THEME_PATH, $FRONT_THEMEMOBILE_PATH, $FRONT_THEME_URL, $FRONT_THEMEMOBILE_URL;
    
    //Verifica se é versão mobile...
    if(preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|mobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))){
      $this->isMobile = true;
    } elseif((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml')>0) || ((isset($_SERVER['HTTP_X_WAP_PROFILE']) || isset($_SERVER['HTTP_PROFILE'])))){
      $this->isMobile = true;
    } 
    //atualiza caminho do Tema..
    if($this->isMobile){
      $this->themePath = $FRONT_THEMEMOBILE_PATH;
      $this->themeURL  = $FRONT_THEMEMOBILE_URL;
    }else{
      $this->themePath = $FRONT_THEME_PATH;
      $this->themeURL  = $FRONT_THEME_URL;      
    }
   
    $this->_lang = $lang;
  }
  
  /**
   * Retorna URL (root) do site
   *
   * @return string
   */
  public function GetRootUrl(){
    global $ROOT_URL;
    
    //Verifica se variável está correta...
    if(empty($ROOT_URL))
      throw new Exception('nbrCMS:: Variável $ROOT_URL do arquivo de configuração não pode ser branco ou nulo.');
      
    return $ROOT_URL;
  }
  
  /**
   * Retorna caminho físico (root) do site
   *
   * @return string
   */
  public function GetRootPath(){
    global $ROOT_PATH;
    
    //Verifica se variável está correta...
    if(empty($ROOT_PATH))
      throw new Exception('nbrCMS:: Variável $ROOT_PATH do arquivo de configuração não pode ser branco ou nulo.');
      
    return $ROOT_PATH;
  }
  
  /**
   * Retorna caminho físico da pasta de Tema
   *
   * @return string
   */
  public function GetThemePath(){
    return $this->themePath;
  }
  
  /**
   * Retorna URL da pasta de Thema
   *
   * @return string
   */
  public function GetThemeUrl(){
    return $this->themeURL;
  }
  
  /**
   * Retorna URL dos StyleSheets (arquivos de css) do Front
   *
   * @return string
   */
  public function GetFrontStyleSheetUrl(){
    return $this->themeURL . 'stylesheets/';
  }
  
  /**
   * retorna URL dos Scripts de JavaScript do Front
   *
   * @return string
   */
  public function GetFrontJavaScriptUrl(){
    return $this->themeURL . 'javascripts/';
  }
  
  /**
   * Retorna URL da pasta de Imagens do Front
   *
   * @return string
   */
  public function GetFrontImageUrl(){
    return $this->themeURL . 'images/';
  }  
  
  /**
   * Retorna URL dos StyleSheets (arquivos de css) do Admin
   *
   * @return string
   */
  public function GetAdminStyleSheetUrl(){
    global $ADMIN_STYLESHEET_URL;
    
    //Verifica se variável está correta...
    if(empty($ADMIN_STYLESHEET_URL))
      throw new Exception('nbrCMS:: Variável $ADMIN_STYLESHEET_URL do arquivo de configuração não pode ser branco ou nulo.');
      
    return $ADMIN_STYLESHEET_URL;
  }
  
  /**
   * retorna URL dos Scripts de JavaScript do Admin
   *
   * @return string
   */
  public function GetAdminJavaScriptUrl(){
    global $ADMIN_JAVASCRIPT_URL;
    
    //Verifica se variável está correta...
    if(empty($ADMIN_JAVASCRIPT_URL))
      throw new Exception('nbrCMS:: Variável $ADMIN_JAVASCRIPT_URL do arquivo de configuração não pode ser branco ou nulo.');
      
    return $ADMIN_JAVASCRIPT_URL;
  }  
  
  /**
   * Retorna URL da pasta de Imagens do Admin
   *
   * @return string
   */
  public function GetAdminImageUrl(){
    global $ADMIN_IMAGES_URL;
    
    //Verifica se variável está correta...
    if(empty($ADMIN_IMAGES_URL))
      throw new Exception('nbrCMS:: Variável $ADMIN_IMAGES_URL do arquivo de configuração não pode ser branco ou nulo.');
      
    return $ADMIN_IMAGES_URL;
  }
  
  /**
   * Retorna caminho físico da pasta onde contém os arquivos de imagem do Admin
   *
   * @return string
   */
  public function GetAdminImagePath(){
    global $ADMIN_IMAGES_PATH;
    
    //Verifica se variável está correta...
    if(empty($ADMIN_IMAGES_PATH))
      throw new Exception('nbrCMS:: Variável $ADMIN_IMAGES_PATH do arquivo de configuração não pode ser branco ou nulo.');
      
    return $ADMIN_IMAGES_PATH;
  }
  
  public function GetImageUploadUrl(){
    global $ADMIN_UPLOAD_URL;
    
    return $ADMIN_UPLOAD_URL;
  }

  public function GetImageUploadPath(){
    global $ADMIN_UPLOAD_PATH;
    
    return $ADMIN_UPLOAD_PATH;
  }
  
  /**
   * Retorna caminho (físico) do Diretório Temporário
   *
   * @return string
   */
  public function GetTempPath(){
    global $TEMP_PATH;
    
    return $TEMP_PATH;
  }
  
  /**
   * Retorna Idioma (atual) do Site
   *
   * @return string
   */
  public function GetLanguage(){
    return $this->_lang;
  }
  
  /**
   * Retorna versão do CMS
   *
   * @return string
   */
  public function GetVersion(){
    return $this->vension;
  }
  
    
}
?>