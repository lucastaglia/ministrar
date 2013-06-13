<?
$grid = new nbrAdminGrid('cusEmpresaTextos', 'Textos de Empresa');

$grid->securityDelete = false;
$grid->securityEdit = true;
$grid->securityNew = false;

$grid->formFile = 'admin.empresaTextos.form.php';

$grid->AddColumnString('Identificador', 'Identificador', 250);

$grid->PrintHTML();
?>