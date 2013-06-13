<?
$form = new nbrAdminForms('cusEmpresaTextos');

$form->AddFieldString('Identificador', 'Identificador', 50, 2, null, true, true);
$form->AddFieldHtml('Textos', 'Textos', 3, 200);


$form->PrintHTML();
?>