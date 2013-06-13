<?
$form = new nbrAdminForms('artArtigos');

$form->AddFieldString('Titulo', 'Título', 100, 3);

$form->AddFieldLkpList('Sessao', 'Sessão', 'artSessoes', 'Nome', '', 2);
$form->AddFieldDate('DataPublicacao', 'Dt. Publicação', 1, date('Y-m-d'));

$form->AddFieldHtml('Texto', 'Texto', 3, 200);

$form->AddFieldString('Tags', 'Tags', 150, 3);

$form->AddGroup('Link Amigável');
$form->AddDescriptionText('O Link Amigável será gerado automaticamente.');
$form->AddFieldString('Link', 'Link', 150, 3, null, false, true);

$form->AddGroup('Imagem de Destaque');
$form->AddDescriptionText('Neste campo deverá contar uma imagem de 151x148px.');
$form->AddFieldImage('Imagem', 'Imagem');

if(!$form->Editing()){
  $form->AddFieldHidden('Publicado', 'Y');
  $form->AddFieldHidden('PublicadoHome', 'Y');
}

$form->PrintHTML();
?>