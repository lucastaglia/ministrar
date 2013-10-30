<?

//exclue diretório mesmo que não estive vazio
function rmdir_recursiva($dir) 
{ 
 //Lista o conteúdo do diretório em uma tabela 
 $dir_content = scandir($dir); 
 //Este é realmente um diretóírio? 
 if($dir_content !== FALSE){ 
  //Para cada entrada do diretório 
  foreach ($dir_content as $entry) 
  { 
   //Atalhos simbólicos no Unix, passemos 
   if(!in_array($entry, array('.','..'))){ 
    //Encontramos o caminho em relação ao início 
    $entry = $dir . '/' . $entry; 
    //Esta entrada não é uma pasta: vamos removê-la 
    if(!is_dir($entry)){ 
     unlink($entry); 
    } 
    //Esta entrada é uma pasta, vamos recomeçar nesta pasta 
    else{ 
     rmdir_recursiva($entry); 
    } 
   } 
  } 
 } 
 //Removemos todas as entradas da pasta, agora podemos excluí-la 
 rmdir($dir); 
} 


//Copia diretório inteiro..
function CopiaDir($DirFont, $DirDest){
    
    mkdir($DirDest);
    if ($dd = opendir($DirFont)) {
        while (false !== ($Arq = readdir($dd))) {
            if($Arq != "." && $Arq != ".."){
                $PathIn = "$DirFont/$Arq";
                $PathOut = "$DirDest/$Arq";
                if(is_dir($PathIn)){
                    CopiaDir($PathIn, $PathOut);
                }elseif(is_file($PathIn)){
                    copy($PathIn, $PathOut);
                }
            }
        }
        closedir($dd);
    }
}
?>