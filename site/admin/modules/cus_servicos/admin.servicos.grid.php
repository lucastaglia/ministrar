<?
$grid = new nbrAdminGrid('cusServicos', 'Serviços');

$grid->formFile = 'admin.servicos.form.php';
$grid->macroFile = 'admin.servicos.macro.php';

$grid->AddControlOrder();

$grid->AddColumnString('Nome', 'Nome', 200);
$grid->AddColumnImage('Icone', 'Ícone');
$grid->AddColumnBoolean('Publicado', 'Publicado', 75);


$grid->PrintHTML();
?>