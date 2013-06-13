    <div id="boxContent">

      <div id="banner-seta-direita"></div>  
      <div id="banner-seta-esquerda"></div>        
    
      <div id="banners">
<?
$sql  = 'SELECT * FROM cusBanners';
$sql .= " WHERE Publicado = 'Y'";
$sql .= ' ORDER BY Ordem ASC';

$banners = $db->LoadObjects($sql);

foreach ($banners as $banner) {
?>
        <a target="_blank" href="<?= utf8_encode($banner->Link); ?>" title="<?= utf8_encode($banner->Descricao); ?>">
          <img src="<?= $cms->GetImageUploadUrl() . $banner->Imagem; ?>" title="<?= utf8_encode($banner->Descricao); ?>" />
        </a>
<?
}
?>


      </div>  
      <div id="banner_controler"></div>
      <div id="quem-somos" class="ancora"></div>
      <h1>Quem somos?</h1>
      <p>Competência, paixão, modernidade e irreverência. Definitivamente a Nova Brazil é diferente!</p>
      <p>Somos uma agência jovem, cheia de energia e experiência para oferecer uma comunicação objetiva com base em resultados.</p>
      <p>Aqui é assim: antes de tudo, cada integrante do nosso time é consumidor. Por isso, independente de seu cargo, tem total liberdade de expressar ideias e opiniões em nossos trabalhos. O atendimento é criativo, a mídia sabe atender e a criação adora dar palpites ao pessoal de mídia.</p>
	  <p>Somos uma agência feita de emoção! Uma agência full digital, madura e preparada para atendes grandes desafios.</p>
	  <p>A Nova Brazil aposta na busca permanente pelo melhor, pelo diferencial e criativo, pelo poder de transformação que uma boa comunicação possui. É no planejamento da agência, que entende comunicação e marketing digital como poucas, que nascem os projetos que exploram todo o potencial do meio em favor de uma marca. Muito mais do que alinhar com o offline, propomos estratégias e ações complementares que vem reforçar o alcance de cada objetivo traçado.</p>
	  <p>Desde seu atendimento com um delicioso café e biscoitos, ao envolvimento com seus clientes e projetos faz a Nova Brazil ser uma agência diferenciada. Visamos estreitar o relacionamento nosso com nosso cliente e de nosso cliente com seus clientes. Somos ousados com um planejamento que conduz a comunicação de forma diferente.</p>

	  <p>Você precisa nos conhecer melhor.</p>
</p>
      <div id="o-que-fazemos" class="ancora"></div>
      <h1>O que fazemos?</h1>
      <p>Veja abaixo os principais serviços e produtos que nossa agência oferece a você.</p>
      
      <ul id="recursos">
<?
$sql  = 'SELECT * FROM cusServicos';
$sql .= " WHERE Publicado = 'Y'";
$sql .= ' ORDER BY Ordem ASC';
$servicos = $db->LoadObjects($sql);

foreach ($servicos as $servico) {
?>      
        <li>
          <? if(!empty($servico->PaginaTexto)){ ?><a href="<?= $router->GetLink('servico/' . $servico->Link); ?>" title="<?= utf8_encode($servico->Nome); ?>"><? } ?>
            <img title="<?= utf8_encode($servico->Nome);?>" src="<?= $cms->GetImageUploadUrl() . $servico->Icone; ?>" width="80" height="80" class="icone" />
            <span class="titulo"><?= utf8_encode($servico->Nome);?></span>
            <span class="descricao"><?= utf8_encode($servico->Descricao); ?></span>
          <? if(!empty($servico->PaginaTexto)){ ?></a><? } ?>
        </li>
<?
}
?>
                                                
      </ul>

      <div class="clearboth"></div>
    
	  <div id="quem-ja-fez" class="ancora"></div>
      <h1>Quem já fez?</h1>
      <p>Confira os principais clientes que já trabalhamos.</p>

      <ul id="quem-ja-fez">

<?
$sql  = 'SELECT * FROM cusClientes';
$sql .= " WHERE Publicado = 'Y'";
$sql .= ' ORDER BY Ordem';

$clientes = $db->LoadObjects($sql);

foreach ($clientes as $cliente) {
?>      
      <li><a href="#" target="_blank">
        <img src="<?= $cms->GetImageUploadUrl() . $cliente->Logomarca ?>" width="150" height="135" class="zoomIn"  /></a>
        <span class="titulo"><?= utf8_encode($cliente->Nome); ?></span>
      </li>
<?
}
?>

      </ul>
      <div class="clearboth"></div>





<div id="blog" class="ancora"></div>      
      <h1 >Blog</h1>
      <p>Confira abaixo os últimos acontecimentos em nossa agência.</p>
       <ul id="news">
<?
$sql  = 'SELECT * FROM artArtigos';
$sql .= " WHERE Publicado = 'Y'";;
$sql .= ' Order by DataPublicacao DESC';

$noticias = $db->LoadObjects($sql);

foreach ($noticias as $noticia) {
?>
	   <li>
	     <a href="<?= $router->GetLink('artigo/' . utf8_encode($noticia->Link)); ?>" title="<?= utf8_encode($noticia->Titulo); ?>">
		   <img src="<?= $cms->GetImageUploadUrl() . utf8_encode($noticia->Imagem); ?>" width="151" height="148">
		   <span><?= utf8_encode($noticia->Titulo); ?></span>
		 </a>
	   </li>
<?
}
?>     
        </u> 

<div class="clearboth"></div>

</div>