<?
class nbrModules{
  private $modules = array();
  
  function __construct(){
  }
  
  /**
   * Retorna array com todos os módulos (disponíveis para este usuário)
   *
   * @return array (de nbrModule)
   */
  public function GetModules(){
    
    return $this->Load();
  }
  
  /**
   * Retorna o primeiro módulo do sistema
   *
   * @return nbrModule
   */
  public static function GetFirstModule(){
    $modules = new nbrModules();
    $res = $modules->Load();
    return $res[0];
  }
  
  public function Load(){
    global $db, $security;
    
 
    
    //Grupos de Segurança...
    $sql  = 'SELECT `Group` FROM sysAdminUsersGroups';
    $sql .= ' WHERE `User` = ' . $security->GetUserID();
    
    $res = $db->LoadObjects($sql);
    
    $groups = array();
    foreach ($res as $reg) {
      $groups[] = $reg->Group;
    }
    
    //Módulos..
    $sql  = 'SELECT sysModules.* FROM sysModuleSecurityGroups';
    $sql .= ' JOIN sysModules ON(sysModules.ID = sysModuleSecurityGroups.Module)';
    $sql .= ' WHERE sysModules.Actived = \'Y\' AND sysModuleSecurityGroups.`Group` IN(' . implode(',', $groups) . ')';
    $sql .= ' GROUP BY sysModuleSecurityGroups.`Module`';
    $sql .= ' ORDER BY sysModules.Name ASC';
    
    $modules = $db->LoadObjects($sql);
    
    $a_modules = array();
    
    foreach ($modules as $module) {
      $a_modules[] = new nbrModule($module);
    }    
    return $a_modules;
  }
}

class nbrModule{
  public $ID;
  public $name;
  public $description;
  public $iconPath;
  public $path;
  public $url;
  public $file;
  public $folderID;
  public $folderName;
  public $MultiLanguages;

  function __construct($reg){
    global $MODULES_URL, $MODULES_PATH, $db, $hub, $ROOT_URL;
    
    //Seleciona a Primeira Pasta..
    $sql  = 'SELECT sysModuleFolders.*, sysModules.Path, sysModuleFolders.ID folderID, sysModuleFolders.Name folderName, sysModuleFolders.MultiLanguages MultiLanguages FROM sysModuleFolders';
    $sql .= " LEFT JOIN sysModules ON(sysModules.ID = sysModuleFolders.Module)";
    $sql .= " WHERE sysModuleFolders.Actived = 'Y' AND sysModuleFolders.Module = " . $reg->ID;
    $sql .= ' ORDER BY sysModuleFolders.`Order` ASC';
    $sql .= ' LIMIT 0,1';
    $pastas = $db->LoadObjects($sql);
    $pasta = $pastas[0];
    
    //Pega Link da Primeira paasta
    $link = $MODULES_PATH . $pasta->Path . '/' . $pasta->File;    
    
    //Carrega propriedades...
    $this->ID          			= utf8_encode($reg->ID);
    $this->name        			= utf8_encode($reg->Name);
    $this->description 			= utf8_encode($reg->Description);
    $this->folderPath  			= utf8_encode($reg->Path) . '/';
    $this->file        			= $link;
    $this->path        			= $MODULES_PATH . utf8_encode($reg->Path) . '/';
    $this->url         			= $MODULES_URL . utf8_encode($reg->Path) . '/';
    $this->iconPath    			= $ROOT_URL . 'cms/icons/' . utf8_encode($reg->Icon);
    $this->folderID    			= $pasta->folderID;
    $this->folderName  			= utf8_encode($pasta->folderName);
    $this->MultiLanguages  		= utf8_encode($pasta->MultiLanguages);
  }

  /**
   * Retorna nbrModule do Módulo especificado
   *
   * @param integer $id
   * @return nbrModule
   */
  public static function LoadModule($id) {
    global $db;
    //Carrega módulos..
    
    $sql  = 'SELECT * FROM sysModules';
    $sql .= " WHERE ID=" . $id;
    $modules = $db->LoadObjects($sql);
    
    $module = new nbrModule($modules[0]);
    return $module;
  }
  
  public function CheckLanguage($languadeID){
    global $db;
    
    $sql  = 'SELECT COUNT(ID) TOTAL FROM sysModulesLanguages';
    $sql .= " WHERE Modulo =" . $this->ID . " AND Idioma =" . $languadeID;
    $res = $db->LoadObjects($sql);
    
    return ($res[0]->TOTAL > 0);
  }
}
?>