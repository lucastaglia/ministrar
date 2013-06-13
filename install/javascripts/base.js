$(document).ready(function(){
  
  $('.emailenvio').change(function(){
    if($(this).val() == 'smtp') {
     
      $('#grupoSMTP').fadeIn('slow'); 
      $('#grupoSMTP input[type="text"]').attr('required', 'required');
      $('#grupoSMTP input[type="password"]').attr('required', 'required');
    } else {
      $('#grupoSMTP').fadeOut('slow');
      $('#grupoSMTP input[type="text"]').removeAttr('required');
      $('#grupoSMTP input[type="password"]').removeAttr('required');
    }
    
  });
  
});