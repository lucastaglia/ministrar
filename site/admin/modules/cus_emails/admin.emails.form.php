<?
$form = new nbrAdminForms('cusEmails');

$form->AddFieldString('Nome', 'Nome', 50, 2, null, true, true);
$form->AddFieldString('Email', 'E-mail', 50, 2, null, true, true);
$form->AddFieldDateTime('DataCadastro', 'D. Cadastro', 2, null, true, true);

$form->PrintHTML();
?>