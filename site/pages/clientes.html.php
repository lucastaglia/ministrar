<?
$texto = LoadRecord('cusConteudos', 9);
?>

<h1 class="tag" id="clientes">Clientes</h1>
<span id="chamada"><?= utf8_encode($texto->Texto); ?></span>

<div class="clearboth"></div>
<ul id="clientes">

        <?
        $sql  = 'SELECT * FROM cusClientes';
        $sql .= " WHERE Publicado = 'Y'";
        $sql .= ' ORDER BY Ordem ASC';
        $clientes = $db->LoadObjects($sql);
        
        $col = 1;
        foreach ($clientes as $x=>$cliente) {
          $img = new nbrImages($cms->GetImageUploadPath() . $cliente->Logomarca);
        ?>
<li <?= (($col == 4)?' style="margin-right: 0;"':null); ?>><img src="<?= $img->GeraThumb(214, 194); ?>" class="zoomIn"><span><?= utf8_encode($cliente->Nome); ?></span></li>

        <?
          if($col == 4){
            $col = 1;
          } else {
            $col ++;
          }
        }
        ?>
</ul>