<?
$grid = new nbrAdminGrid('artSessoes', 'Sessões');

$grid->orders = 'Nome ASC';

$grid->formFile = 'admin.sessoes.form.php';


$grid->AddColumnString('Nome', 'Nome', 350);

$grid->PrintHTML();
?>