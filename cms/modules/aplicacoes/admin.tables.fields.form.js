$(document).ready(function(){
  
  mostraCampo($('div#Type select').val());

  $('div#Type select').change(function(){
    mostraCampo($(this).val());
  });
  
  
  
});

function escondeCampos(){
  $('.legendaString').hide();
  $('.descricaoString').hide();
  $('div#Length').hide();
  
  $('.legendaLista').hide();
  $('.descricaoLista').hide();
  $('div#ListValues').hide();  
  
  $('.legendaTabela').hide();
  $('.descricaoTabela').hide();
  $('div#TableLink').hide();    
}

function mostraCampo($tipo){
  
  escondeCampos();
  
  if($tipo == 'TAB'){
    $('.legendaTabela').show();
    $('.descricaoTabela').show();
    $('div#TableLink').show();
    
  } else if($tipo == 'STR'){
    $('.legendaString').show();
    $('.descricaoString').show();
    $('div#Length').show();
    
  } else if($tipo == 'LST'){
    $('.legendaLista').show();
    $('.descricaoLista').show();
    $('div#ListValues').show();  
  }  
  
}