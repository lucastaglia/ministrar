<?
function macroBeforePost($tableName, $id){
  global $db;
  
  $link = GeraLinkAmigavel($_POST['Titulo']);
  
  $link = ValidaLinkAmigavel($tableName, $link, 'Link', 1, $id);
  $_POST['Link'] = $link;
}
?>