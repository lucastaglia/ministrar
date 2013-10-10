<?
global $PLUGINS_PATH;

$action = $hub->GetParam('action')  ;
$pluginID = $hub->GetParam('pluginID');

$reg = LoadRecord('sysPlugins', $pluginID);

if($action == 'install'){
   include($PLUGINS_PATH . $reg->Path . '/install.php');
} else { //Desintalar...
  include($PLUGINS_PATH . $reg->Path . '/uninstall.php');
}

//muda plugin como ativo!
$post = new nbrTablePost();
$post->table = 'sysPlugins';
$post->id = $pluginID;

if($action == 'install'){
  $post->AddFieldBoolean('Actived', true);
  
  $dataSet->SetParam('msgSucess', 'O plugin foi instalado com sucesso');
} else {
  $post->AddFieldBoolean('Actived', false);
  $dataSet->SetParam('msgSucess', 'O plugin foi desintalado com sucesso');
}

$post->Execute();

$hub->BackLevel(2);
header('LOCATION: ' . $hub->GetUrl());
?>