<?php
include('../../../../config.php');

if (!empty($_FILES)) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	
	//$targetPath = $_SERVER['DOCUMENT_ROOT'] . $_GET['folder'] . '/';
	//$targetFile =  str_replace('//','/',$targetPath) . $_FILES['Filedata']['name'];
	
	
	move_uploaded_file($tempFile, $TEMP_PATH . $_FILES['Filedata']['name']);

}
echo '1'; // Important so upload will work on OSX
?>