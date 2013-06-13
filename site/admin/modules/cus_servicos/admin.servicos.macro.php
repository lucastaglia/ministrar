<?
function macroBeforePost($tableName, $id){
  global $db;
    
  /**
   * Gera Link Amigável
   */
  $link = GeraLinkAmigavel($_POST['Nome']);
  $link = trim($link);
  
  $link = ValidaLinkAmigavel($tableName, $link, 'Link', 1, $id);
  $_POST['Link'] = $link;
  
}
?>

