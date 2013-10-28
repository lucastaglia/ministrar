<?

class nbrDB
{
    
    /**
     * Versão da Classe
     */
    const version = '1.0';
    
    /**
     * Administra conexão persistente (não abre nova conexao se ja tem uma semelhante aberta)
     *
     * @var boolean
     */
    private $_persistent;
   
    /**
     * Especifica qual é o usuário usado na conexão
     *
     * @var string
     */
    public $user;
    
    /**
     * Especifica o host de conexão do banco de dados
     *
     * @var string
     */
    public $host;
    
    /**
     * Especifica a senha de acesso ao banco de dados
     *
     * @var string
     */
    public $pass;
    
    /**
     * Especifica qual database é selecionado nesta conex�o
     *
     * @var string
     */
    public $database;
    
    /**
     * Especifica qual porta é utilizada para a conex�o
     *
     * @var unknown_type
     */
    public $port;
    
    /**
     * Caso o banco retorna algum erro, será setado essa propriedade com a mensagem retornada
     *
     * @var string
     */

    
    /**
     * Caso o banco retorna algum erro, será setado essa propriedade com o número do erro.
     *
     * @var string
     */
    public $errorNumber;

    
    public $errorMsg;
    
    /**
     * Id da Conexão com o banco de dados
     *
     * @var connection
     */
    
    private $connection;

    private function _setErrorMsg()
    {
        switch ($this->type) 
        {
            case enumDb_TypeConnection::MYSQL:
                $this->errorMsg = mysql_error($this->connection);
                $this->errorNumber = mysql_errno($this->connection);
                break;
                
            case enumDb_TypeConnection::ANYWHERE:
                $this->errorMsg = sqlanywhere_error($this->connection);
                
            case enumDb_TypeConnection::SYBASE:
                $this->errorMsg = sybase_get_last_message();
        }
    }

    private function _connect(){
      
      //Verifica se é persistente e gerencia conexão (no caso verifica se tem uma semelhante j� aberta)
      if($this->_persistent) {
        global $nbrDB_conns;
            
        foreach ($nbrDB_conns as $conn){
          if($conn->host == $this->host 
            && $conn->pass == $this->pass 
            && $conn ->user == $this->user 
            && $conn->database == $this->database) {
              $this->connection = $conn->connection;
              return;
          }
        }
      }

      switch ($this->type){
        case enumDb_TypeConnection::MYSQL:
                
        //Verifica se extensão está habilitada no PHP
        if(!function_exists('mysql_connect'))
          throw new Exception('nbrDB: A extensão mysql de conexão com o banco de dados não está habilitada no seu servidor.');
                
        $this->connection = mysql_connect($this->host, $this->user, $this->pass);
                
        if($this->connection === false){
          $this->_setErrorMsg();
          throw new Exception('nbrDB: Ocorreu um erro ao tentar conectar a seu banco de dados MySql.');
        }
                    
        $selectionDb = mysql_select_db($this->database, $this->connection);
                
        if($selectionDb === false){
          $this->_setErrorMsg();
          throw new Exception('nbrDB: Ocorreu um erro ao tentar selecionar um database ao seu banco de dados.');
        }
        break;
            
        case enumDb_TypeConnection::ANYWHERE:

        //Verifica se extensão está habilitada no PHP
        if(!function_exists('sqlanywhere_connect'))
          throw new Exception('nbrDB: O extensão sqlanywhere de conexão com o banco de dados não está habilitada no seu servidor.');
                
        $connstr = 'uid=' . $this->user.";pwd=" . $this->pass;
        $connstr .= ';ENG=' . $this->database . ';' . 'links=tcpip(host=' . $this->host;
        $connstr .= ';port=' . $this->port .')';
        
        $this->connection = sqlanywhere_connect($connstr);

        if($this->connection === false){
          $this->_setErrorMsg();
          throw new Exception('nbrDB: Ocorreu um erro ao tentar conectar a seu banco de dados.');
        }
        break;
            
        case enumDb_TypeConnection::SYBASE:
                
          if(!function_exists('sybase_connect'))
            throw new Exception('nbrDB: O extensão sybase de conexão com o banco de dados não está habilitada no seu servidor.');

          $this->connection = sybase_connect($this->host, $this->user, $this->pass);
                
          if($this->connection === false){
            $this->_setErrorMsg();
            throw new Exception('nbrDB: Ocorreu um erro ao tentar conectar a seu banco de dados Sybase.');
          }
                
          $selectionDb = sybase_select_db($this->database, $this->connection);
                
          if($selectionDb === false){
            $this->_setErrorMsg();
            throw new Exception('nbrDB: Ocorreu um erro ao tentar selecionar um database ao seu banco de dados.');
          }
          break;
                
          default:    //Se não identificar a conexão
            throw new Exception('nbrDB: Este tipo de conexão não foi identificado pelo objeto.');
        }
        
        //Se for conexão persistente joga conexao no cache
        if($this->_persistent)
          array_push($nbrDB_conns, $this);
    }

    public function _read($sql){
    
      //Verifica se é um sql de SELECT
        if((strpos(strtolower($sql), 'select') === false) && (strpos(strtolower($sql), 'call') === false))
          throw new Exception('nbrDB: Você só pode fazer uma consulta ao banco dados utilizando um sql de SELECT');
        
        switch ($this->type)
        {
          case enumDb_TypeConnection::MYSQL:
            return mysql_query($sql, $this->connection);
            
          case enumDb_TypeConnection::ANYWHERE:
            return sqlanywhere_query($this->connection, $sql);
            
          case enumDb_TypeConnection::SYBASE :
            return sybase_query($sql, $this->connection);
        }
    }

    /**
     * Classe que gerencia conexão com banco de dados
     *
     * @param enumDb_TypeConnection $type
     * @param string $host
     * @param string $user
     * @param string $pass
     * @param string $database
     * @param string $port
     * @param boolean $persistent
     * 
     */
    public function __construct(){
      global  $DB_TYPE, $DB_HOST, $DB_USER, $DB_PASS, $DB_PORT, $DB_DATABASE, $DB_PERSISTENT;
            
      //Seta parâmetros de conexão
      $this->type        = $DB_TYPE;
      $this->host        = $DB_HOST;
      $this->user        = $DB_USER;
      $this->pass        = $DB_PASS;
      $this->port        = $DB_PORT;
      $this->database    = $DB_DATABASE;
      $this->_persistent = $DB_PERSISTENT;     
        
        //Faz conexão
        $this->_connect();
    }

    function __destruct(){
        //Se não for conexão persistente, ele força o fechamento da conexão
        if(!$this->_persistent)
            $this->Close();
    }

    /**
     * Execute comando SQL no servidor
     *
     * @param string $sql
     * $return boolean
     */
    public function Execute($sql)
    {
      
      $this->sql = $sql;
      
      switch ($this->type){
            case enumDb_TypeConnection::MYSQL:
                $resource = mysql_query($sql, $this->connection);
                
                if($resource === false)
            {
                $this->_setErrorMsg();
                throw new Exception('nbrDB: Não foi possível concluir a execução do comando enviado ao banco de dados:' . $sql);
            }
                return true;
            
            case enumDb_TypeConnection::ANYWHERE:
                $resource = sqlanywhere_query($this->connection, $sql);
                
                if($resource === false)
            {
                $this->_setErrorMsg();
                throw new Exception('nbrDB: Não foi possível concluir a execução do comando enviado ao banco de dados.');
            }
                return true;
                
            case enumDb_TypeConnection::SYBASE:
                $resource = sybase_query($sql);
                
                if($resource === false)
            {
                $this->_setErrorMsg();
                throw new Exception('nbrDB: Não foi possível concluir a execução do comando enviado ao banco de dados.');
            }
            return true;        
        }
    }

    /**
     * Retorna ID inserido no INSERT
     *
     * @return integer
     */
    public function GetLastIdInsert()
    {
        //Verifica se última ação foi um insert
        if(strpos(strtoupper($this->sql), 'INSERT') === false)
            throw new Exception('nbrDB: Você só pode solicitar o ID inserido após ter executado um comando INSERT no banco de dados.');
            
        switch ($this->type)
        {
            case enumDb_TypeConnection::MYSQL:     return mysql_insert_id($this->connection);
            case enumDb_TypeConnection::ANYWHERE : return sqlanywhere_insert_id($this->connection);
            
            case enumDb_TypeConnection::SYBASE  :
                $id = $this->LoadArrays('select @@identity');
                return $id[0][0];
        }
    }

    /**
     * Carrega o resultado da ultima consulta em um Array
     * @param string $sql
     * @return array
     */
    public function LoadArrays($sql)
    {
        $resource = $this->_read($sql);
        
        switch ($this->type)
        {
            case enumDb_TypeConnection::MYSQL:
                $value = array();
                while($rw = mysql_fetch_array($resource))
                {
                    array_push($value, $rw);
                }
                return $value;
                
            case enumDb_TypeConnection::ANYWHERE:
                $value = array();
                while($rw = sqlanywhere_fetch_array($resource))
                {
                    array_push($value, $rw);
                }
                return $value;
                
            case enumDb_TypeConnection::SYBASE:
                $value = array();
                while($rw = sybase_fetch_array($resource))
                {
                    array_push($value, $rw);
                }
                return $value;
        }
    }
    
    /**
     * Carrega o resultado da ultima consulta em um Array de objetos
     * @param string $sql
     * @return array
     */
    public function LoadObjects($sql)
    {
	//echo('[' . $sql . ']');
        $resource = $this->_read($sql);
        
        
        switch ($this->type)
        {
            case enumDb_TypeConnection::MYSQL:
                $value = array();
                while($rw = mysql_fetch_object($resource))
                {
                    array_push($value, $rw);
                }
                return $value;
        
            case enumDb_TypeConnection::ANYWHERE:
                $value = array();
                while($rw = sqlanywhere_fetch_object($resource))
                {
                    array_push($value, $rw);
                }
                return $value;
        
            case enumDb_TypeConnection::SYBASE:
                $value = array();
                while($rw = sybase_fetch_object($resource))
                {
                    array_push($value, $rw);
                }
                return $value;
        }
    }
    
    /**
     * Fecha conex�o com banco de dados
     *
     */
    public function Close()
    {
        //Verifica se é persistente e verifica se na global ainda existe esta conexao
        if($this->_persistent){
            global $nbrDB_conns;
            
            //Re-ordena os �ndices
            sort($nbrDB_conns);
                    
            $encontrou = false;
            for($i = 0; $i < count($nbrDB_conns); $i++){
                $conn = $nbrDB_conns[$i];
                
                if($conn->host == $this->host 
                    && $conn->pass == $this->pass 
                    && $conn ->user == $this->user 
                    && $conn->database == $this->database)
                {
                    $encontrou = true;
                    //Exclui da global a conex�o
                    unset($nbrDB_conns[$i]);
                }
            }
            
            /**
             * Se não foi encontrado é pq possívelmente a variável já foi fechada anteriormente e ignora. 
             * (no caso por ser Conexão Persistente mais de um objeto declarado utilizou a mesma conexou, 
             * e um deles já fechou ela)
             */
            if(!$encontrou)
                return;
        }
        //echo('<!--DESCONECTOU-->');
        //Fecha conexão no banco 
        switch ($this->type){
            case enumDb_TypeConnection::MYSQL     : mysql_close($this->connection);break;
            case enumDb_TypeConnection::ANYWHERE  : sqlanywhere_disconnect($this->connection);break;
            case enumDb_TypeConnection::SYBASE    : sybase_close($this->connection);break;
        }

        
        //Zera parâmetros...
        $this->connection = false;
    }

    /**
     * Carrega aquivo .sql e executa no banco de dados.
     *
     * @param string $sqlFile
     */
    public function LoadSqlFile($sqlFile){

      if(!file_exists($sqlFile)){
        throw new Exception('Arquivo SQL não foi encontrado.');
      }
            
      //Carrega arquivo...
      $arquivo = Array();
      $arquivo = file($sqlFile);
      $prepara = '';  // Cria a Variavel $prepara
      
      foreach($arquivo as $v){
          $prepara .= $v;
      }
      
      $sql = explode(';', $prepara); 
      
      //executa comandos SQL...
      foreach($sql as $v) {
        
        $v = utf8_decode($v);
        $v = trim($v);
        
        if(!empty($v))
          $this->Execute($v);
      }
    }
}

# ENUMERADORES
/**
 * Enumerador do tipo de conexão
 *
 */
class enumDb_TypeConnection{
    const MYSQL       = 'mysql';
    const ANYWHERE    = 'anywhere';
    const SYBASE      = 'sybase';
}

/**
 * Essas variável tem q ficar no escopo do script.
 * É usada para gerenciar conexões persistentes
 * 
 */
global $nbrDB_conns;
$nbrDB_conns = array();

/**
 * Função executada quando o script de PHP chegar ao fim (irá desconectar TODAS as conexões persistentes abertas)
 *
 */
function nbrDB_shutdown(){
    global $nbrDB_conns;

    for($i = 0; $i < count($nbrDB_conns); $i++)
    {
        $conn = $nbrDB_conns[$i];
        $conn->Close();
    }
}
register_shutdown_function('nbrDB_shutdown');
?>