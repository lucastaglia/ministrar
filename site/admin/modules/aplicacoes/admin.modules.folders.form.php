<?
$tableName = 'sysModuleFolders';

$edition = $hub->ExistParam('ID');

$form = new nbrAdminForms($tableName);

$form->AddFieldString('Name', 'Nome', 100, 2, null, true);
$form->AddFieldString('Grouper', 'Agrupador', 50, 1, 'Geral');
$form->AddFieldString('File', 'Nome do Arquivo', 50, 2);
$form->AddFieldHidden('Actived', 'Y');

$form->PrintHTML();

?>