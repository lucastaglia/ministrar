<?
$grid = new nbrAdminGrid('cusClientes', 'Clientes');

$grid->formFile = 'admin.clientes.form.php';
$grid->AddControlOrder();

$grid->AddColumnString('Nome', 'Nome', 250);
$grid->AddColumnImage('Logomarca', 'Logomarca');
$grid->AddColumnBoolean('Publicado', 'Publicado', 75);

$grid->PrintHTML();
?>