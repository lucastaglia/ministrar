<?
$form = new nbrAdminForms('cusClientes');

$form->AddFieldString('Nome', 'Nome', 50, 2);

$form->AddFieldImage('Logomarca', 'Logomarca');
$form->AddDescriptionText('A dimensão (mínima) utilizada no site é: 209x188px');

if(!$form->Editing()){
  $form->AddFieldHidden('Publicado', 'Y');
  $form->AddFieldHidden('Ordem', '999');
}

$form->PrintHTML();
?>