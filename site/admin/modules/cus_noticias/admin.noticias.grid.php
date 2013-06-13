<?
$grid = new nbrAdminGrid('cusNoticias', 'Noticias');

$grid->formFile = 'admin.noticias.form.php';

$grid->orders = 'DataPublicacao DESC';

$grid->AddColumnString('Titulo', 'Titulo', 250);
$grid->AddColumnDate('DataPublicacao', 'Dt. Publicação', 150, 'center');
$grid->AddColumnBoolean('Publicado', 'Publicado', 75);

$grid->PrintHTML();
?>