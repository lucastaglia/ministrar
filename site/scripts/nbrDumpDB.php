<?
$arquivo = $db->database . '_' . date('d-m-Y_H-i') . ".sql";
$arquivoFull = $cms->GetBkpsPath() . $arquivo;

$command = "mysqldump --opt --skip-extended-insert --complete-insert --host=".$db->host." --user=".$db->user." --password=".$db->pass." " .$db->database." > " . $arquivoFull;
exec($command, $output, $error_code);


if($error_code == 0){
  die('BKP criado - ' . $arquivo);
} else {
  die('Ocorreu um erro ao tentar exportar backup do banco de dados. [erro: ' . $error_code . ']');


}
?>