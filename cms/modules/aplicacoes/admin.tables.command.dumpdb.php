<?
$arquivo = $db->database.".sql";
$arquivoFull = $cms->GetTempPath() . $arquivo;

$command = "mysqldump --opt --skip-extended-insert --complete-insert --host=".$db->host." --user=".$db->user." --password=".$db->pass." ".$db->database." > " . $cms->GetTempPath() . $db->database.".sql";
exec($command, $output, $error_code);


//Download..
header('Content-Disposition: attachment; filename=' . $arquivo);   
header('Content-Type: application/force-download');
header('Content-Type: application/octet-stream');
header('Content-Type: application/download');
header('Content-Description: File Transfer');            
header('Content-Length: ' . filesize($arquivoFull));
die(file_get_contents($arquivoFull));  
?>