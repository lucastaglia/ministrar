/* SCROOL ANIMADO */
$(document).ready(function($) {
 
  if(pagename == 'home'){
  	$(".scroll").click(function(event){		
  		event.preventDefault();
  		$('html,body').animate({
  			  scrollTop:$(this.hash).offset().top
  		}, 1500, 'easeOutBounce');
  	});
  	
  	$('a#home').click(function(){
  	  $('#back-top a').click();
  	  return false;
  	});
  }
  
  
  
});


/* BANNERS */
$(document).ready(function() {
    $('#banners').cycle({
		fx: 'scrollHorz',
		speed:  'slow', 
    next:   '#banner-seta-direita', 
    prev:   '#banner-seta-esquerda',
	pager:  '#banner_controler' 
	});
});



//Valida��o do Formul�rio de Contato
      $(document).ready(function(){
        $('form#contato').validate({
            rules:{
                nome:{
                    required: true,
                    minlength: 3
                },
                email: {
                    required: true,
                    email: true
                },
                telefone:{
                    required: true,
                    minlength: 3
                },
			    mensagem:{
                    required: true,
                    minlength: 3
                }
            },
            messages:{
                nome:{
                    required: "Obrigatorio",
                    minlength: "Min. 3 caracteres."
                },
                email: {
                    required: "Obrigatorio",
                    email: "E-mail inv&aacute;lido"
                },
				telefone:{
                    required: "Obrigatorio",
                    minlength: "Min. 3 caracteres."
                },
				mensagem:{
                    required: "Obrigatorio",
                    minlength: "Min. 3 caracteres."
                }

            },
			submitHandler: function(){
  			  ContatoSubmit();
			} 
        });
      });

/* CONTATO - M�scara no campo Telefone */
$(document).ready(function(){
	$('form#contato input#telefone').mask('(99) 9999-9999');
});

/* CONTATO - Legenda dos Campos */
$(document).ready(function(){
  
  $('#formulario div.linha').each(function(){
    
    var input = $(this).find('input.texto');
    var textarea = $(this).find('textarea');
    var label = $(this).find('label');
    
    input.focus(function(){
      label.fadeOut(150)  ;
    }).focusout(function(){
      
      if(input.val() == '')
        label.fadeIn(500)  ;
    });
    
    //caso clique no label ele tmb some...
    label.click(function(){
      label.fadeOut(150)  ;
      input.focus();
      textarea.focus();
    })
    
    //Faz o mesmo com textareas..
    textarea.focus(function(){
      label.fadeOut(150)  ;
    }).focusout(function(){
      
      if(textarea.val() == '')
        label.fadeIn(500)  ;
    });

  });
  
});

function resetFormContact(){
	$('form#contato input, form#contato textarea').removeAttr("disabled").val(''); 
	$('form#contato label').fadeIn(500); 
	$('form#contato input#enviar').val('Enviar mensagem');

	//reseta Validador..
	$('form#contato').validate().resetForm();
}

function ContatoSubmit(){
  
    $('form#contato input, textarea').attr("disabled", true); 
    $('form#contato input#enviar').val('Enviando...'); 


		$.ajax({
		  type: "POST",
          url: link_url + 's/enviaEmail' ,
          data: { nome: $('input#nome').val(), email: $('input#email').val() , telefone: $('input#telefone').val(), texto: $('textarea#mensagem').val()  },
            
		  success: function(data) {
		    jAlert(data, 'Envio de Mensagem');
		    resetFormContact();
		  }

		});
}

/* Manipula Histórico do Navegador para Links Fragmentados */
$(document).ready(function(){

  if(pagename == 'home'){
    $('.scroll, a#home, div#back-top a').click(function(e){
      e.preventDefault();
      window.history.pushState({url: "" + $(this).attr('href') + ""}, $(this).attr('title') , $(this).attr('href'));
     });
  }   
});