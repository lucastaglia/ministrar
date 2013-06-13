<?
session_start();

//includes necessários..
include('../cms/objects/nbr.obj.cms.php');
$cms = new nbrCMS();

//Antes de tudo, zera SESSION
unset($_SESSION["installERRO"]);
unset($_SESSION["installPOST"]);

//Joga POST na sessão..
$_SESSION["installPOST"] = $_POST;

function erro($msg){
  $_SESSION["installERRO"] = $msg;
  
  header('LOCATION: ./index.php');
  exit;
}

/**
 * VERIFICAÇÕES...
 */

//Verifica versão do PHP...
$versaoPHPMinima = '5.1.0';
if (version_compare(PHP_VERSION, $versaoPHPMinima, '<')) {
    erro('Para o cms funcionar, é necessário que seu servidor tenha o PHP 5.3.0 instalado ou superior.<br>Hoje você está usando o ' . PHP_VERSION  . '.');
}


//Verifica conexão com DB...
$dbHost = $_POST["dbhost"];
$dbName = $_POST["dbname"];
$dbUser = $_POST["dbuser"];
$dbPass = $_POST["dbpass"];

$con = @mysql_connect($dbHost, $dbUser, $dbPass); 
$db = @mysql_select_db($dbName, $con);


if(!$con){
  erro('Erro de conexão ao Bando de Dados.');
}

if(!$db){
  erro('Conseguimos conectar ao Bando de Dados. Porém o Database não foi encontrado.');
}

////AQUI RODARÁ SQL DE INSTALAÇÂO...
mysql_close(); 


/**
 * Criar config.php
 */

$code  = '<?' . "\r\n";
$code .= '/**' . "\r\n";
$code .= '*   MINISTRAR CMS' . "\r\n";
$code .= '*   ---------------------------------' . "\r\n";
$code .= '*   O CMS foi instalado pelo instalador automático.' . "\r\n";
$code .= '*   Na instalação a versão era: ' . $cms->GetVersion() . "\r\n";
$code .= '*   em  ' . date('d/m/Y H:i') . '.' . "\r\n";
$code .= '*' . "\r\n";
$code .= '*   Um produto desenvolvido pela' . "\r\n";
$code .= '*   http://www.novabrazil.art.br' . "\r\n";
$code .= '*' . "\r\n";
$code .= '*/' . "\r\n";

$code .= "\r\n";
$code .= "\r\n";

$code .= '  /** Configurações técnicas... */' . "\r\n";
$code .= '  $GLOBALS["ROOT_PATH"]              = "' . $_POST["sitepath"] . '";' . "\r\n";
$code .= '  $GLOBALS["ROOT_URL"]               = "' . $_POST["siteurl"] . '";' . "\r\n";
$code .= '  $GLOBALS["ADMIN_URL"]              = "' . $_POST["adminurl"] . '";' . "\r\n";
$code .= '  $GLOBALS["LANG"]                   = "pt-br";' . "\r\n";
$code .= '  $GLOBALS["SITEKEY"]                = "' . $_POST["sitekey"] . '";' . "\r\n";
$code .= '  $GLOBALS["LINK_PREFIX"]            = "index.php?url=";' . "\r\n";



$code .= "\r\n";
$code .= "\r\n";

$code .= '  /** Configurações de Administração **/' . "\r\n";
$code .= '  $GLOBALS["MODULES_PATH"]           = $ROOT_PATH . "site/admin/modules/";' . "\r\n";
$code .= '  $GLOBALS["MODULES_URL"]            = $ROOT_URL  . "site/admin/modules/";' . "\r\n";
$code .= '  $GLOBALS["OBJECTS_PATH"]           = $ROOT_PATH . "cms/objects/";' . "\r\n";
$code .= '  $GLOBALS["FUNCTIONS_PATH"]         = $ROOT_PATH . "cms/functions/";' . "\r\n";
$code .= '  $GLOBALS["TEMP_PATH"]              = $ROOT_PATH . "cms/temp/";' . "\r\n";

$code .= "\r\n";
$code .= "\r\n";

$code .= '  $GLOBALS["CACHE_PATH"]             = $ROOT_PATH . "cms/cache/";' . "\r\n";
$code .= '  $GLOBALS["CACHE_URL"]              = $ROOT_URL . "cms/cache/";' . "\r\n";
$code .= '  $GLOBALS["COOKIE_EXPIRE"]          = mktime(0, 0, 0,date("m"), date("d") + 7, date("Y")); //1 semana' . "\r\n";

$code .= "\r\n";
$code .= "\r\n";

$code .= '/** Configurações de Roteador (de links) **/' . "\r\n";
$code .= '  $GLOBALS["ROUTER_LINKMASK"]        = "index.php?url=";' . "\r\n";
$code .= '  $GLOBALS["ROUTER_SHOWLANGUAGE"]    = false;' . "\r\n";

$code .= "\r\n";
$code .= "\r\n";

$code .= '  /** Arquivos de utilizados para compor o HTML do Front **/' . "\r\n";
$code .= '  $GLOBALS["FRONT_THEME_PATH"]       = $ROOT_PATH   . "site/theme/";' . "\r\n";
$code .= '  $GLOBALS["FRONT_THEME_URL"]        = $ROOT_URL    . "site/theme/";' . "\r\n";
$code .= '  $GLOBALS["FRONT_THEMEMOBILE_PATH"] = $ROOT_PATH   . "site/theme/";' . "\r\n";
$code .= '  $GLOBALS["FRONT_THEMEMOBILE_URL"]  = $ROOT_URL    . "site/theme/";' . "\r\n";
$code .= '  $GLOBALS["FRONT_PAGES_PATH"]       = $ROOT_PATH   . "site/pages/";' . "\r\n";
$code .= '  $GLOBALS["FRONT_PAGES_URL"]        = $ROOT_URL    . "site/pages/";' . "\r\n";
$code .= '  $GLOBALS["FRONT_SCRIPTS_PATH"]     = $ROOT_PATH   . "site/scripts/";' . "\r\n";
$code .= '  $GLOBALS["FRONT_SCRIPTS_URL"]      = $ROOT_URL    . "site/scripts/";' . "\r\n";

$code .= "\r\n";
$code .= "\r\n";

$code .= '  /** Arquivos de utilizados para compor o HTML do Admin **/' . "\r\n";
$code .= '  $GLOBALS["ADMIN_PATH"]             = $ROOT_PATH   . "cms/admin/";' . "\r\n";
$code .= '  $GLOBALS["ADMIN_PAGES_PATH"]       = $ADMIN_PATH  . "pages/";' . "\r\n";
$code .= '  $GLOBALS["ADMIN_PAGES_URL"]        = $ADMIN_URL   . "pages/";' . "\r\n";
$code .= '  $GLOBALS["ADMIN_STYLESHEET_URL"]   = $ADMIN_URL   . "stylesheets/";' . "\r\n";
$code .= '  $GLOBALS["ADMIN_JAVASCRIPT_URL"]   = $ADMIN_URL   . "javascripts/";' . "\r\n";
$code .= '  $GLOBALS["ADMIN_IMAGES_PATH"]      = $ADMIN_PATH  . "images/";' . "\r\n";
$code .= '  $GLOBALS["ADMIN_IMAGES_URL"]       = $ADMIN_URL   . "images/";' . "\r\n";
$code .= '  $GLOBALS["ADMIN_FUNCTIONS_PATH"]   = $ADMIN_PATH  . "functions/";' . "\r\n";
$code .= '  $GLOBALS["ADMIN_UPLOAD_PATH"]      = $ROOT_PATH  . "site/uploads/";' . "\r\n";
$code .= '  $GLOBALS["ADMIN_UPLOAD_URL"]       = $ROOT_URL   . "site/uploads/";' . "\r\n";

$code .= "\r\n";
$code .= "\r\n";

$code .= '  /** Configurações de Banco de dados **/' . "\r\n";
$code .= '  $GLOBALS["DB_TYPE"]                = "mysql";' . "\r\n";
$code .= '  $GLOBALS["DB_HOST"]                = "' . $_POST["dbhost"] . '";' . "\r\n";
$code .= '  $GLOBALS["DB_USER"]                = "' . $_POST["dbuser"] . '";' . "\r\n";
$code .= '  $GLOBALS["DB_PASS"]                = "' . $_POST["dbpass"] . '";' . "\r\n";
$code .= '  $GLOBALS["DB_PORT"]                = "";' . "\r\n";
$code .= '  $GLOBALS["DB_DATABASE"]            = "' . $_POST["dbname"] . '";' . "\r\n";
$code .= '  $GLOBALS["DB_PERSISTENT"]          = true;' . "\r\n";

$code .= "\r\n";
$code .= "\r\n";


/** Configurações de Site **/
$code .= '  $GLOBALS["SITE_TITLE"]             = "' . $_POST["sitetitulo"] . '";' . "\r\n";
$code .= '  $GLOBALS["SITE_DESCRIPTION"]       = "' . $_POST["sitedescricao"] . '";' . "\r\n";
$code .= '  $GLOBALS["SITE_PAGEINDEX"]         = "home";'; //.com.br/home";' . "\r\n";

$code .= "\r\n";
$code .= "\r\n";

$code .= '  /** Configurações de e-mail **/' . "\r\n";
$code .= '  $email                             = array();' . "\r\n";
$code .= '  $email["FROMNAME"]                 = "' . $_POST["emailnomeremetente"] . '";' . "\r\n";
$code .= '  $email["FROM"]                     = "' . $_POST["emailremetente"] . '";' . "\r\n";
$code .= '  $email["SENDTYPE"]               = "' . $_POST["emailenvio"] . '";' . "\r\n";
$code .= '  $email["CC"]                       = "";' . "\r\n";
$code .= '  $email["CCO"]                      = "";' . "\r\n";
$code .= '  $email["SMTPHOST"]                 = "' . $_POST["emailsmtphost"] . '";' . "\r\n";
$code .= '  $email["SMTPUSER"]                 = "' . $_POST["emailsmtpusuario"] . '";' . "\r\n";
$code .= '  $email["SMTPPASS"]                 = "' . $_POST["emailsmtpsenha"] . '";' . "\r\n";
$code .= '  $email["SMTPSECURE"]               = "' . $_POST["emailsmtpseguranca"] . '";    //ssl tls (ou deixe em branco)' . "\r\n";
$code .= '  $email["SMTPPORT"]                 = "' . $_POST["emailsmtpporta"] . '";' . "\r\n";
$code .= '  $GLOBALS["EMAIL_CONFIG"]             = $email;' . "\r\n";

$code .= "\r\n";
$code .= "\r\n";

$code .= '?>' . "\r\n";

$fp = fopen('../config.php', 'w');

//escreve
$escreve = fwrite($fp, $code);

//fecha o arquivo...
fclose($fp);


//Instala DB...

$arquivoDB = 'sql.sql';

$arquivo = Array();
$arquivo = file($arquivoDB);
$prepara = '';  // Cria a Variavel $prepara

foreach($arquivo as $v){
  $prepara .= $v;
}

$sql = explode(';', $prepara); 

//executa comandos SQL...
foreach($sql as $v) {
  
  $v = utf8_decode($v);
  mysql_query($v, $con);
}

//cria diretórios...
mkdir('../cms/cache/', 0777, true);
mkdir('../cms/temp', 0777, true);
mkdir('../site/uploads', 0777, true);
mkdir('../site/uploads/ckeditor', 0777, true);

//Instalação concluida
$_SESSION['installStatus'] = true;
header('LOCATION: ./index.php');

?>