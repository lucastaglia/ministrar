<?
$grid = new nbrAdminGrid('cusEmails', 'E-mails');
$grid->orders = 'DataCadastro DESC';

$grid->formFile = 'admin.emails.form.php';

$grid->AddColumnString('Nome', 'Nome', 250);
$grid->AddColumnString('Email', 'E-mail', 200);
$grid->AddColumnDateTime('DataCadastro', 'D. Cadastro', 140);

$grid->PrintHTML();
?>