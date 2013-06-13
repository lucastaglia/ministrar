<?
$grid = new nbrAdminGrid('cusConteudos', 'Conteúdos');

$grid->securityDelete = false;
$grid->securityNew = false;

$grid->formFile = 'admin.conteudos.form.php';
$grid->orders = 'Titulo ASC';

$grid->AddColumnString('Titulo', 'Titulo', 250);

$grid->PrintHTML();
?>