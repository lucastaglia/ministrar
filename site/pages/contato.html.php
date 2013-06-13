<h1>Fale <b>Conosco</b></h1>

<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
<div id="formulario">
  <form  action="<?= $router->GetLink('s/enviaEmail'); ?>" method="post" id="contato" name="contato">

    <div class="campo">
      <label id="nome" for="nome">Nome</label>
      <input type="text" name="nome" id="nome" required>
    </div>

    <div class="campo">
      <label id="email" for="email">Email</label>
      <input type="text" name="email" id="email" required>
    </div>

           
    <div class="campo">
      <label id="msg" for="msg">Mensagem</label>
      <textarea name="msg" id="msg" required></textarea>
    </div>       
    
    <input type="submit" name="submit" id="submit" value="Enviar">
  
  </form>
</div>