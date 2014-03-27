<?php 

/**
 * Faz Include de Bibliotecas de terceiros
 */


/**
 * Faz includes dos objetos
 */  
  include($OBJECTS_PATH . 'nbr.obj.db.php');  
  include($OBJECTS_PATH . 'nbr.obj.table.create.php');  
  include($OBJECTS_PATH . 'nbr.obj.admin.security.php');
  include($OBJECTS_PATH . 'nbr.obj.string.php');
  include($OBJECTS_PATH . 'nbr.obj.date.php');  
  include($OBJECTS_PATH . 'nbr.obj.site.php');
  include($OBJECTS_PATH . 'nbr.obj.images.php'); // Esse objeto será descontinuado 
  include($OBJECTS_PATH . 'nbr.obj.magicImage.php');
  include($OBJECTS_PATH . 'nbr.obj.mail.php');
  include($OBJECTS_PATH . 'nbr.obj.cms.php');
  include($OBJECTS_PATH . 'nbr.obj.router.php');
  include($OBJECTS_PATH . 'nbr.obj.page.php');
  include($OBJECTS_PATH . 'nbr.obj.tablepost.php');    
  include($OBJECTS_PATH . 'nbr.obj.admin.logs.php'); 
  include($OBJECTS_PATH . 'nbr.obj.admin.dataset.php');  
  include($OBJECTS_PATH . 'nbr.obj.report.pdf.php');  
  include($OBJECTS_PATH . 'nbr.obj.msg.php');  
  include($OBJECTS_PATH . 'nbr.obj.linkThumb.php'); 
  include($OBJECTS_PATH . 'nbr.obj.cache.php'); 
  include($OBJECTS_PATH . 'nbr.obj.events.php'); 
  include($OBJECTS_PATH . 'nbr.obj.params.php'); 

  /** Includes de objetos de terceiros **/
  include($OBJECTS_PATH . 'instagram.php');

  /** Faz includes das Funções **/
  include($FUNCTIONS_PATH . 'nbr.application.php');
  include($FUNCTIONS_PATH . 'nbr.draw.php');
  include($FUNCTIONS_PATH . 'nbr.files.php');
  include($FUNCTIONS_PATH . 'nbr.string.php');
  
  /** Faz includes das Funções do Admin **/
  include($ADMIN_FUNCTIONS_PATH . 'pages.php');
  
  /** Carrega objetos utilizados no framework... */
  $db       = new nbrDB();
  $cms      = new nbrCMS();
  $dataSet  = new nbrDataSet();
  $security = new nbrAdminSecurity();
  $msg      = new nbrMSG();
  $cache    = new nbrCache();  
  $events   = new nbrEvents();
  $params   = new nbrParams();
?>