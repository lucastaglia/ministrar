<?
$grid = new nbrAdminGrid('artArtigos', 'Artigos');

$grid->orders = 'DataPublicacao DESC';
$grid->formFile = 'admin.artigos.form.php';
$grid->macroFile = 'admin.artigos.macro.php';

$grid->AddColumnString('Titulo', 'Título', 350);
$grid->AddColumnTable('Sessao', 'Sessão', 250, 'artSessoes', 'Nome');
//$grid->AddColumnImage('Imagem', 'Imagem', 150, 100);
$grid-> AddColumnBoolean('Publicado', 'Publicado', 55);
$grid-> AddColumnBoolean('PublicadoHome', 'Home');
$grid->AddColumnDate('DataPublicacao', 'Dt. Publicação', 'center');

$grid->PrintHTML();
?>