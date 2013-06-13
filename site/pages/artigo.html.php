<?
global $reg;
?>
<div id="boxContent" class="ckeditor">

      <h1><?= utf8_encode($reg->Titulo); ?></h1>
      <?= utf8_encode($reg->Texto); ?>

     <div class="linha clearboth"></div>
     <h2>Veja outros artigos</h2>
	 
     <ul id="news">
<?
$sql  = 'SELECT * FROM artArtigos';
$sql .= " WHERE Publicado = 'Y' AND ID <> $reg->ID";
$sql .= ' Order by DataPublicacao DESC';
$sql .= ' LIMIT 0,5';

$outros = $db->LoadObjects($sql);

foreach ($outros as $outro) {
?>
	   <li>
	     <a href="<?= $router->GetLink('artigo/' . utf8_encode($outro->Link)); ?>" title="<?= utf8_encode($outro->Titulo); ?>">
		   <img src="<?= $cms->GetImageUploadUrl() . utf8_encode($outro->Imagem); ?>" width="151" height="148">
		   <span><?= utf8_encode($outro->Titulo); ?></span>
		 </a>
	   </li>
<?
}
?>

	 </ul>
     <div class="clearboth"></div>
</div>