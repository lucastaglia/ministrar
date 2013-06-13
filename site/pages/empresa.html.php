<script type="text/javascript">
  var aba_atual = 'historia';
  var velocidade = 200;

  function abreConteudo(nome){

    //alert('aba_atual - ' + aba_atual);
    //alert('nome - ' + nome);
    
    if(aba_atual != nome){
      $('li#aba_menu_' + aba_atual).removeClass('selected');
      $('li#aba_menu_' + nome).addClass('selected');      
      
      $('div#aba_' + aba_atual).fadeOut(velocidade, function(){
        
        aba_atual = nome;
        $('div#aba_' + nome).fadeIn(velocidade);
        
      });
    }
  }
</script>

<div id="home_sidebar">
  <h1 class="tag"><b>A MAC</b></h1>
  
  <ul id="ancoras">
    <li id="aba_menu_historia" class="selected"><a href="javascript:abreConteudo('historia');">História</a></li>
    <li id="aba_menu_principios"><a href="javascript:abreConteudo('principios');">Princípios e Valores</a></li>    
    <li id="aba_menu_diferencial"><a href="javascript:abreConteudo('diferencial');">Diferencial</a></li>    
  </ul>
  
</div>

<div id="texto" class="html">
  
  <div class="aba" id="aba_historia">
    <h1>Nossa Empresa</h1>
    <?
    $texto = LoadRecord('cusEmpresaTextos', 1);
    echo(utf8_encode($texto->Textos));
    ?>
  </div>

  <div class="aba" id="aba_principios">
    <h1>Princípios e Valores</h1>
    <?
    $texto = LoadRecord('cusEmpresaTextos', 2);
    echo(utf8_encode($texto->Textos));
    ?>
  </div>
  
  <div class="aba" id="aba_diferencial">
    <h1>Diferencial</h1>
    <?
    $texto = LoadRecord('cusEmpresaTextos', 3);
    echo(utf8_encode($texto->Textos));
    ?>
  </div>
  
  
  </div>