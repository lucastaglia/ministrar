<?
$grid = new nbrAdminGrid('sysTables', 'Tabelas');

//Comandos..

$hub->SetParam('_script', $moduleObj->path . 'admin.tables.command.constrains.php');
$grid->AddCommand('Re-criar Constrains', $hub->GetUrl(), 'Excluir e recriar os constrais do Sistema', 'Tem certeza que deseja EXCLUIR TODOS OS CONTRAINS e recriá-los?');

$hub->SetParam('_script', $moduleObj->path . 'admin.tables.command.dumpdb.php');
$grid->AddCommand('Backup do DB', $hub->GetUrl(), 'Faça um Dump do DB');

$hub->SetParam('_script', $moduleObj->path . 'admin.tables.command.deleteCache.php');
$grid->AddCommand('Limpar Cache', $hub->GetUrl(), 'Limpar arquivos de cache', 'Tem certeza que deseja EXCLUIR os arquivos de cache do CMS?');

//Complementos de SQL...
$grid->orders = 'A.Name ASC';

//Arquivos Complementares..
$grid->formFile  = 'admin.tables.form.php';
$grid->macroFile = 'admin.tables.macro.php';

//Colunas...
$grid->AddColumnString('Name', 'Nome', 230);
$grid->AddColumnString('Comment','Comentário', 500);
$grid->AddColumnBoolean('IsSystem','Do Sistema?', 70);

$grid->PrintHTML();
?>