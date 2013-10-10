<?
$handle = fopen("http://releases.novabrazil.art.br/ministrar.index/index.html", "rb");
$contents = null;

while (!feof($handle)) {
  $contents .= fread($handle, 8192);
}
echo $contents;
fclose($handle);
?>