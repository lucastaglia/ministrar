<?
$form = new nbrAdminForms('cusConteudos');

$form->AddFieldString('Titulo', 'Titulo', 50, 3);
$form->AddFieldHtml('Texto', 'Texto', 3, 250);

$form->PrintHTML();
?>