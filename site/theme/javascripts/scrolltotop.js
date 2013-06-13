/* MOSTRA BOTÂO DE VOLTAR PARA O TOPO */
$(document).ready(function(){
	$("#back-top").hide();
	
	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('#back-top').fadeIn('slow');
			} else {
				$('#back-top').fadeOut('slow');
			}
		});

		// scroll body to 0px on click
		$('#back-top a').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});

});

//menu 2

var menu2aberto = false;

function abreMenu2(){

  if(menu2aberto == false){
    $("#header2").animate({
      top: '0'
    }, 500);
    
    menu2aberto = true;
  }
  
}

function fechaMenu2(){

  if(menu2aberto == true){
    $("#header2").animate({
      top: '-65'
    }, 500);
    
    menu2aberto = false;
  }
}
$(document).ready(function(){
	
	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				//$('#header2').fadeIn('slow');
				abreMenu2();
			} else {
				//$('#header2').fadeOut('slow');
				fechaMenu2();
			}
		});

	});

	//verifica se a pagina abriu no começo
	if($(window).scrollTop() > 100){
	  abreMenu2();
	}
});