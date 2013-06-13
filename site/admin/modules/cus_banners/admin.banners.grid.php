<?
$grid = new nbrAdminGrid('cusBanners', 'Banners');

$grid->AddControlOrder();
$grid->formFile = 'admin.banners.form.php';

$grid->AddColumnImage('Imagem', 'Imagem');
$grid->AddColumnString('Link', 'Link', 200);
$grid->AddColumnBoolean('Publicado', 'Publicado', 75);

$grid->PrintHTML();
?>