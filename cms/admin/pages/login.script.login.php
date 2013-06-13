<?

//Pega parâmetros..
$mail = trim($_POST['mail']);
$pass = trim($_POST['password']);

$login = $security->Login($mail, $pass);

if($login === true){
 $module = nbrModules::GetFirstModule();
 $page = $module->file;
 $hub->SetParam('_page', $module->file);
 $hub->SetParam('_title', $module->name);
 $hub->SetParam('_description', 'Módulo ' . $module->name);
 $hub->SetParam('_moduleID', $module->ID);
 $hub->SetParam('_folderID', $module->folderID);
 
 $link = $hub->GetUrl();
} else {
 $hub->SetParam('_script', $ADMIN_PAGES_PATH . 'login.pg.php');
 $hub->SetParam('mail', $mail);
 $hub->SetParam('msg', $login);
 $link = $hub->GetUrl(false);
}

//imprime script que redireciona página...
header('location: ' . $link);
?>