<?
$page = 'contato'; 
$texto = LoadRecord('cusConteudos', 10);


$submenu = array(
  array('Home', 'index.php'),
  array('Contato', 'contato.php')
);

?>
<div id="contato_sidebar">
  <h1 class="tag">Fale <b>Conosco</b></h1>
  <a href="https://maps.google.com.br/maps?ie=UTF8&amp;q=googlemaps&amp;fb=1&amp;gl=br&amp;hq=googlemaps&amp;hnear=0x94df193144e17bf1:0x282a8b2473efe630,Blumenau+-+SC&amp;cid=0,0,7806795884789014202&amp;t=m&amp;ll=-26.858467,-49.122513&amp;spn=0.006295,0.006295&amp;output=embed" class="iframe">
    <img src="<?= $cms->GetFrontImageUrl(); ?>mapa.jpg" width="226" height="171" id="mapa" class="zoomIn">
  </a>
  
  <span id="telefone"><span id="ddd">47</span> 3363-3417</span>
  
  <span class="enderecos"><a href="mailto:contato@macconsultoria.com">contato@macconsultoria.com</a></span>
  <span class="enderecos">Skype: macengenharia</span>
  <span class="enderecos" style="margin-top: 10px;">Rua 3300, nº 360 - 8º Andar - Centro</span>
  <span class="enderecos">Balneário Camboriú - SC </span>
  <span class="enderecos">CEP: 88330-272</span>
  
</div>

<div id="texto">
  <span id="chamada"><?= utf8_encode($texto->Texto); ?></span>
  
  <div id="formulario">
    <form  action="<?= $router->GetLink('s/enviaEmail'); ?>" method="post" id="contato" name="contato">

      <div class="campo">
        <label id="nome" for="nome">Nome</label>
        <input type="text" name="nome" id="nome" class="campoTexto">
      </div>

      <div class="campo">
        <label id="email" for="email">Email</label>
        <input type="text" name="email" id="email" class="campoTexto">
      </div>

      <div class="campo">
        <label id="endereco" for="endereco">Endereço</label>
        <input type="text" name="endereco" id="endereco" class="campoTexto">
      </div>  
      <div class="campo">
        <label id="enderecoN" for="enderecoN">N°</label>
        <input type="text" name="enderecoN" id="enderecoN" class="campoTexto">
      </div>  
      <div class="campo">
        <label id="bairro" for="bairro">Bairro</label>
        <input type="text" name="bairro" id="bairro" class="campoTexto">
      </div>  
            
      <div class="campo">
        <label id="cidade" for="cidade">Cidade</label>
        <input type="text" name="cidade" id="cidade" class="campoTexto">
      </div>  
      <div class="campo">
        <label id="UF" for="UF">UF</label>
        <input type="text" name="UF" id="UF" class="campoTexto">
      </div> 
             
      <div class="campo" style="clear: both;">
        <label id="UF" for="UF">Mensagem</label>
        <textarea name="msg" id="msg"></textarea>
      </div>       
      
      <input type="image" name="submit" id="submit" src="<?= $cms->GetFrontImageUrl(); ?>buttom_bg.png" value="Enviar" class="zoomIn">
    
    </form>
  </div>
</div>