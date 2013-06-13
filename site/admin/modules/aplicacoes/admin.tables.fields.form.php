<?

/**
 * Parâmetros
 */
$tableName = 'sysTableFields';
$tableID = $hub->GetParam('_tableID');

$edition = $hub->ExistParam('ID');

if($hub->ExistParam('ID')) {
  $reg = nbrDB::LoadTableObjects($tableName, $hub->GetParam('ID'));
  $reg = $reg[0];
} else 
  $reg = null;

$form = new nbrAdminForms($tableName);

$form->AddFieldString('Name', 'Nome do Campo', 50, 2, null, true, $edition);
$form->AddFieldList('Type', 'Tipo', 'STR=String|INT=Inteiro|NUM=Numero Decimal|BOL=Lógico|TAB=Tabela|LST=Lista|DTA=Data|DTT=Data e Hora|TXT=Texto|IMG=Imagem|FIL=Arquivo|PSW=Senha', 1, null, true, $edition);
$form->AddGroup('Se for campo String:');
$form->AddDescriptionText('Caso utilize um Campo do Tipo String, prencha o campo Tamanho com o número de caracteres que deseja que seu campo tenha.');
$form->AddFieldInteger('Length', 'Tamanho', 1, null, false, ($reg != null && $reg->Type != 'STR'));

$form->AddGroup('Se for campo Lista:');
$form->AddDescriptionText('Caso utilize um Campo do Tipo Lista, prencha o campo Opções.<br>Ex.: EST=Estado|CID=Cidade|BAR=Bairro|FIL=Arquivo');
$form->AddFieldString('ListValues', 'Opções', 500, 3, null, false, ($reg != null && $reg->Type != 'LST'));

$form->AddGroup('Se for campo Tabela:');
$form->AddDescriptionText('Caso utiliza um Campo do Tipo Tabela, informa abaixo a tabela a qual este campo irá linkar.');
$form->AddFieldLkpList('TableLink', 'Tabela Link', 'sysTables', 'Name', null, 2, false, $edition);


$form->AddFieldHidden('Order', '9999');
$form->PrintHTML();

?>