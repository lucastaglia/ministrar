<?
$form = new nbrAdminForms('cusBanners');

$form->AddFieldString('Link', 'Link', 100, 3, null, false);
$form->AddFieldString('Descricao', 'Descrição', 50, 2);

$form->AddGroup('Imagem');
$form->AddDescriptionText('Formato JPG. Dimensão: 1000x367px');
$form->AddFieldImage('Imagem', 'Imagem');

$form->AddFieldHidden('Publicado', 'Y');
$form->AddFieldHidden('Ordem', 999);

$form->PrintHTML();
?>