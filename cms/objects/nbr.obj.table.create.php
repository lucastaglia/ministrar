<?

class nbrTableCreate {
  
  private $table;
  private $tableID;
  
  function __construct($table){
    
    //verifica se parâmetro é branco ou nulo...
    if(empty($table))  
      throw new Exception('nbrTableCreate:: O parâmetro $table não pode ser branco ou nulo.');
      
    $this->table = $table;    
  }
  
  /**
   * Adiciona Campo ao sistema (e fisicamente no banco)
   *
   * @param string $name
   * @param string $type
   * @param integer $length
   * @param integer $tableLink
   * @param string $listValues
   */
  private function _CreateField($name, $type, $length = 0, $tableName = null, $tableLink = null, $listValues = null){
    global $db;
    
    //Codificação...
    $name       = utf8_decode($name);
    $listValues = utf8_decode($listValues);
    
    
    //Verifica se tabela já está criada..
    if(!$this->_verifyTableExist())
      throw new Exception('nbrTableCreate:: Não existe no sistema uma tabela criada com o nome especificado: ' . $this->table);
          
    //Adiciona campo no framework...
    $tableLink = ($tableLink == null)?'NULL':$tableLink;
    $listValues = ($listValues == null)?'NULL':("'" . $listValues . "'");
    
    $sql  = "INSERT INTO `sysTableFields` (`Table`, `Name`, `Type`, `Length`, `TableLink`, `ListValues`)";
    $sql .= " VALUES (" . $this->tableID . ", '$name', '$type', $length, $tableLink, $listValues)";
    $db->Execute($sql);
    
    $fieldID = $db->GetLastIdInsert();
    
    //Cria campo fisicamente...
    switch($type){
      case 'STR':
        $sql = 'ALTER TABLE `' . $this->table . '` ADD `' . $name . '` varchar(' . $length . ') NULL';
        $db->Execute($sql);
        break;
      
      case 'TAB':
        $constrainName = 'fk_' .strtolower($this->table) . '_' . strtolower($name);
        //Cria campo..
        $sql = 'ALTER TABLE `' . $this->table . '` ADD `' . $name . '`int(' . $length . ') NULL';
        $db->Execute($sql);
        //Adiciona constrain no sistema.. 
        $sql = "INSERT INTO `sysTableConstrains` (`Name`, `FromTable`, `FromField`, `ToTable`) VALUES ('$constrainName', $this->tableID, $fieldID, $tableLink)";
        $db->Execute($sql);
        //Adiciona fisicamente constrain
        
        $sql = "ALTER TABLE `$this->table` ADD CONSTRAINT `$constrainName` FOREIGN KEY (`$name`) REFERENCES `$tableName`(`ID`);";

        $db->Execute($sql);
        break;
        
      case 'INT':
        $sql = 'ALTER TABLE `' . $this->table . '` ADD `' . $name . '` int(11) NULL';
        $db->Execute($sql);
        break;   
             
      case 'BOL':
        $sql = 'ALTER TABLE `' . $this->table . '` ADD `' . $name . '` char(1) NULL';
        $db->Execute($sql);
        break;

      case 'LST':
        $sql = 'ALTER TABLE `' . $this->table . '` ADD `' . $name . '` char(1) NULL';
        $db->Execute($sql);
        break;
        
      case 'DTA':
        $sql = 'ALTER TABLE `' . $this->table . '` ADD `' . $name . '` datetime NULL';
        $db->Execute($sql);
        break;        
      
      case 'DTT':
        $sql = 'ALTER TABLE `' . $this->table . '` ADD `' . $name . '` datetime NULL';
        $db->Execute($sql);
        break;
    }
  }
  
  /**
   * Verifica se Tabela já está criada no sistema
   *
   * @return boolean
   */
  private function _verifyTableExist(){
    global $db;
    
    //verifica se esta tabela já existe no frameworl
    $sql = "SELECT ID FROM sysTables WHERE Name = '$this->table'";
    $res = $db->LoadObjects($sql);
    
    return (count($res) > 0);
  }

  /**
   * Retorna o ID da tabela especificada
   *
   * @param string $tableName
   * @return integer
   */
  private function _getTableID($tableName){
    global $db;
    
    $sql = "SELECT ID FROM sysTables WHERE Name = '$tableName'";
    $res = $db->LoadObjects($sql);
    
    if(count($res) > 0)
      return $res[0]->ID;
    else 
      throw new Exception('nbrTableCreate:: Não foi entrado nenhuma tabela no sistema com este nome:' . $tableName);
  }

  public function CreateTable($comments, $isSystem = false){
    global $db;
    
    //Codificação...
    $comments2 = utf8_encode($comments);
    $comments = utf8_decode($comments);

    //Verifica se tabela já está criada..
    if($this->_verifyTableExist())
      throw new Exception('nbrTableCreate:: Já existe uma tabela com esse  mesmo nome no sistema.');
       
    //verifica se parâmetro é branco ou nulo...
    if(empty($comments))  
      throw new Exception('nbrTableCreate:: O parâmetro $comments não pode ser branco ou nulo.');

    //Cria tabela Fisicamente..
    $sql  = 'CREATE TABLE `' . $this->table . '` (' . "\r\n";
    $sql .= '  `ID` int(11) NOT NULL AUTO_INCREMENT,' . "\r\n";
    $sql .= '  PRIMARY KEY (`ID`)' . "\r\n";
    $sql .= ") ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COMMENT='" . $comments . "';" . "\r\n";
    $db->Execute($sql);
      
    //Adiciona tabela no framework..
    $sql = "INSERT INTO `sysTables` (`Name`, `IsSystem`, `Comment`) VALUES ('" . $this->table . "', '" . ($isSystem?'Y':'N') . "', '" . $comments . "')";
    $db->Execute($sql);
    $this->tableID = $db->GetLastIdInsert();
  }
  
  /**
   * Adiciona novo campo do tipo String para ser criado.
   *
   * @param string $fieldName
   * @param string $lenght
   */
  public function CreateFieldString($fieldName, $lenght){
    $this->_CreateField($fieldName, 'STR', $lenght);
  }
  /**
   * Adiciona novo campo do tipo Integer para ser criado.
   *
   * @param string $fieldName
   * @param string $lenght
   */
  public function CreateFieldInteger($fieldName){
    $this->_CreateField($fieldName, 'INT');
  }
  
  /**
   * Adiciona novo Campo do Tipo Table (Link com Tabela) para ser criado.
   *
   * @param string $fieldName
   * @param string $toTableName
   */
  public function CreateFieldTable($fieldName, $toTableName) {
    
    $toTableID = $this->_getTableID($toTableName);
    
    $this->_CreateField($fieldName, 'TAB', 11, $toTableName, $toTableID);
  }
  
  /**
   * Adiciona novo Campo do Tipo Lista para ser criado.
   *
   * Ex.: $options = 'SC=Santa Catarina|SP=São Paulo|RJ=Rio de Janeiro'
   * 
   * @param string $fieldName
   * @param string $options
   */
  public function CreateFieldList($fieldName, $options){
    $this->_CreateField($fieldName, 'LST', 3, null, null, $options);
  }
  
  /**
   * Adiciona novo Campo do Tipo Lógico (boolean) para ser criado.
   *
   * @param string $fielName
   */
  public function CreateFieldBoolean($fielName){
    $this->_CreateField($fielName, 'BOL', 1);
  }
  
  /**
   * Adiciona novo Campo do tipo Data (01/01/2009) para ser criado.
   *
   * @param string $fieldName
   */
  public function CreateFieldDate($fieldName){
    $this->_CreateField($fieldName, 'DTA');
  }

  /**
   * Adiciona novo Campo do tipo DataHora (01/01/2009 08:00:00) para ser criado.
   *
   * @param string $fieldName
   */
function macroBeforeDelete($tableName, $id){
    $this->_CreateField($fieldName, 'DTT');
  }
}

?>