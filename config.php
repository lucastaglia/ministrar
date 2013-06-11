<?php  
  /** Configurações técnicas... */
  $GLOBALS['ROOT_PATH']              = '';
  $GLOBALS['ROOT_URL']               = '';
  $GLOBALS['ADMIN_URL']              = '';  
  $GLOBALS['LANG']                   = 'pt-br';
  $GLOBALS['SITEKEY']                = 'nbrazil';
  $GLOBALS['LINK_PREFIX']            = 'index.php?url='; //index.php?url=

  /** Configurações de Administração **/
  $GLOBALS['MODULES_PATH']           = $ROOT_PATH . 'site/admin/modules/';
  $GLOBALS['MODULES_URL']            = $ROOT_URL  . 'site/admin/modules/';
  $GLOBALS['OBJECTS_PATH']           = $ROOT_PATH . 'cms/objects/';
  $GLOBALS['FUNCTIONS_PATH']         = $ROOT_PATH . 'cms/functions/';
  $GLOBALS['TEMP_PATH']              = $ROOT_PATH . 'cms/temp/';
  
  $GLOBALS['CACHE_PATH']             = $ROOT_PATH . 'cms/cache/';
  $GLOBALS['CACHE_URL']              = $ROOT_URL . 'cms/cache/';
  $GLOBALS['COOKIE_EXPIRE']          = mktime(0, 0, 0,date('m'), date('d') + 7, date('Y')); //1 semana

  /** Configurações de Roteador (de links) **/
  $GLOBALS['ROUTER_LINKMASK']        = 'index.php?url=';
  $GLOBALS['ROUTER_SHOWLANGUAGE']    = false;

  /** Arquivos de utilizados para compor o HTML do Front **/
  $GLOBALS['FRONT_THEME_PATH']       = $ROOT_PATH   . 'site/theme/';
  $GLOBALS['FRONT_THEME_URL']        = $ROOT_URL    . 'site/theme/';
  $GLOBALS['FRONT_THEMEMOBILE_PATH'] = $ROOT_PATH   . 'site/theme/';
  $GLOBALS['FRONT_THEMEMOBILE_URL']  = $ROOT_URL    . 'site/theme/';
  $GLOBALS['FRONT_PAGES_PATH']       = $ROOT_PATH   . 'site/pages/';
  $GLOBALS['FRONT_PAGES_URL']        = $ROOT_URL    . 'site/pages/';
  

  /** Arquivos de utilizados para compor o HTML do Admin **/
  $GLOBALS['ADMIN_PATH']             = $ROOT_PATH   . 'cms/admin/';
  $GLOBALS['ADMIN_PAGES_PATH']       = $ADMIN_PATH  . 'pages/';
  $GLOBALS['ADMIN_PAGES_URL']        = $ADMIN_URL   . 'pages/';
  $GLOBALS['ADMIN_STYLESHEET_URL']   = $ADMIN_URL   . 'stylesheets/';
  $GLOBALS['ADMIN_JAVASCRIPT_URL']   = $ADMIN_URL   . 'javascripts/';
  $GLOBALS['ADMIN_IMAGES_PATH']      = $ADMIN_PATH  . 'images/';
  $GLOBALS['ADMIN_IMAGES_URL']       = $ADMIN_URL   . 'images/';
  $GLOBALS['ADMIN_FUNCTIONS_PATH']   = $ADMIN_PATH  . 'functions/';
  $GLOBALS['ADMIN_UPLOAD_PATH']      = $ROOT_PATH  . 'site/uploads/';
  $GLOBALS['ADMIN_UPLOAD_URL']       = $ROOT_URL   . 'site/uploads/';

  /** Configurações de Banco de dados **/
  $GLOBALS['DB_TYPE']                = 'mysql';
  $GLOBALS['DB_HOST']                = 'localhost';
  $GLOBALS['DB_USER']                = 'root';
  $GLOBALS['DB_PASS']                = '';
  $GLOBALS['DB_PORT']                = '';
  $GLOBALS['DB_DATABASE']            = 'db';
  $GLOBALS['DB_PERSISTENT']          = true;

  /** Configurações de Site **/
  $GLOBALS['SITE_TITLE']             = 'Título do meu site';
  $GLOBALS['SITE_DESCRIPTION']       = 'Descrição do meu site';
  $GLOBALS['SITE_PAGEINDEX']         = 'home'; //.com.br/home
  
  /** Configurações de e-mail **/
  $email                             = array();
  $email['FROMNAME']                 = '';
  $email['SENDTYPE']                 = '';
  $email['FROM']                     = '';
  $email['CC']                       = '';
  $email['CCO']                      = '';
  $email['SMTPHOST']                 = '';
  $email['SMTPUSER']                 = ''; 
  $email['SMTPPASS']                 = '';   
  $email['SMTPSECURE']               = '';    //ssl tls (ou deixe em branco)
  $email['SMTPPORT']                 = 465;   
  $EMAIL_CONFIG                      = $email;
?>