<?
$form = new nbrAdminForms('cusServicos');

$form->AddFieldString('Nome', 'Nome', 200, 2);
$form->AddFieldText('Descricao', 'Descrição', 3, 100);

$form->AddGroup('Ícone');
$form->AddDescriptionText('Dimensão: 80x80px');
$form->AddFieldImage('Icone', 'Ícone');

$form->AddGroup('Página');
$form->AddFieldHtml('PaginaTexto', 'Texto', 3, 100, null, false);
$form->AddFieldString('Tags', 'Tags', 150, 3);

$form->AddGroup('Link Amigável');
$form->AddDescriptionText('O Link Amigável será gerado automaticamente.');
$form->AddFieldString('Link', 'Link', 100, 3, null, false, true);

if(!$form->Editing()){
  $form->AddFieldHidden('Publicado', 'Y');
  $form->AddFieldHidden('Ordem', '999');
}

$form->PrintHTML();
?>