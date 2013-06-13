<?
$form = new nbrAdminForms('cusNoticias');

$form->AddFieldString('Titulo', 'Titulo', 100, 2);
$form->AddFieldDate('DataPublicacao', 'Dt. Publicação', 1, date('Y-m-d'));
$form->AddFieldText('Texto', 'Texto', 3, 150);

$form->AddFieldHidden('Publicado', 'Y');

$form->PrintHTML();
?>