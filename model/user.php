<?php
require_once "config.php";
require_once "PDOOCI/PDO.php";

class Model_User
{
  protected $user_connexion;
  private $username;

    public function __construct(){
      return $this;
    }
    public function login($username, $password)
    {
        try {
            //$this->user_connexion=new PDO("odbc:Driver={Devart ODBC Driver for Oracle x64};SERVER=ec2-54-245-136-114.us-west-2.compute.amazonaws.com",$username,$password);
            $this->user_connexion=new PDOOCI\PDO(Config::TNS,$username,$password);
            $this->username=strtoupper($username);
            return $this->user_connexion;
        }

        catch(Exception $e) {
          echo 'Error connecting to database';
          echo "Error: <br>";
          echo $e->getMessage();
            return $e;
        }

  }
  public function ExecSqlStatement($sql){
    $pdo_statement=$this->user_connexion->prepare($sql);
    return $pdo_statement->execute();
  }
  public function dropUser($username){
    $sql="DROP USER $username";
    $pdo_statement=$this->user_connexion->prepare($sql);
    //$pdo_statement->bindParam(":name",$username);
    return $pdo_statement->execute();
  }
  public function dropTable($table_name){
    $sql="DROP TABLE PROJECT.{$table_name}";
    return $this->ExecSqlStatement($sql);
  }
    public function table_sys_privileges(){
        $sql="SELECT * FROM USER_SYS_PRIVS";
        $pdo_statement=$this->user_connexion->prepare($sql);
        //$pdo_statement->bindParam(":username",$username);
        $pdo_statement->execute();
        return $pdo_statement->fetchAll(PDOOCI\PDO::FETCH_ASSOC);

    }
    public function table_role_privileges(){
      $sql="SELECT * FROM USER_ROLE_PRIVS";
      $pdo_statement=$this->user_connexion->prepare($sql);
    //  $pdo_statement->bindParam(":username",$this->username);
      $pdo_statement->execute();
      return $pdo_statement->fetchAll(PDOOCI\PDO::FETCH_ASSOC);

    }
    public function table_tab_privileges(){
      $sql="SELECT * FROM USER_TAB_PRIVS";
      $pdo_statement=$this->user_connexion->prepare($sql);
      //$pdo_statement->bindParam(":username",$this->username);
      $pdo_statement->execute();
      return $pdo_statement->fetchAll(PDOOCI\PDO::FETCH_ASSOC);
    }
    public function table_schemas(){
      $sql="SELECT DISTINCT USERNAME FROM SYS.ALL_USERS ORDER BY USERNAME";
      $pdo_statement=$this->user_connexion->prepare($sql);
      //$pdo_statement->bindParam(":username",$this->username);
      $pdo_statement->execute();
      return $pdo_statement->fetchAll(PDOOCI\PDO::FETCH_ASSOC);
    }
    public function table_tables(){
      $sql="SELECT DISTINCT OWNER, OBJECT_NAME FROM ALL_OBJECTS WHERE OBJECT_TYPE = 'TABLE' AND OWNER =:username";
      $pdo_statement=$this->user_connexion->prepare($sql);
      $pdo_statement->bindParam(":username",$this->username);
      $pdo_statement->execute();
      return $pdo_statement->fetchAll(PDOOCI\PDO::FETCH_ASSOC);

    }
    public function table_functions(){
      $sql="SELECT OBJECT_NAME, OWNER FROM SYS.ALL_OBJECTS where upper(OBJECT_TYPE) = upper('FUNCTION') AND OWNER=:username order by OWNER, OBJECT_NAME";
      $pdo_statement=$this->user_connexion->prepare($sql);
      $pdo_statement->bindParam(":username",$this->username);
      $pdo_statement->execute();
      return $pdo_statement->fetchAll(PDOOCI\PDO::FETCH_ASSOC);
    }

    public function table_triggers(){
      $sql="SELECT TRIGGER_NAME, OWNER FROM SYS.ALL_TRIGGERS WHERE OWNER=:username order by OWNER, TRIGGER_NAME ";
      $pdo_statement=$this->user_connexion->prepare($sql);
      $pdo_statement->bindParam(":username",$this->username);
      $pdo_statement->execute();
      return $pdo_statement->fetchAll(PDOOCI\PDO::FETCH_ASSOC);

    }
    public function table_procedures(){
      $sql="SELECT OBJECT_NAME, OWNER FROM  SYS.ALL_OBJECTS where upper(OBJECT_TYPE) = upper('PROCEDURE') AND OWNER=:username ORDER BY OWNER, OBJECT_NAME ";
      $pdo_statement=$this->user_connexion->prepare($sql);
      $pdo_statement->bindParam(":username",$this->username);
      $pdo_statement->execute();
      return $pdo_statement->fetchAll(PDOOCI\PDO::FETCH_ASSOC);

    }

    public function get_table_content($table_name,$attributs_array="*",$conditions=null){
      if(is_array($attributs_array)) $attributs=implode(",",$attributs_array);
      else $attributs="*";
      echo $table_name;
      $sql="SELECT $attributs FROM $table_name";
      $pdo_statement=$this->user_connexion->prepare($sql);
    //  $pdo_statement->bindParam(":attributs",$attributs);
    //  $pdo_statement->bindParam(":table",$table_name);
      $pdo_statement->execute();
      return $pdo_statement->fetchAll(PDOOCI\PDO::FETCH_ASSOC);
    }
    public function createTable($table_name,$column_names,$types,$sizes,$default_val){
      $i=0;
      $sql="CREATE TABLE ".$table_name." (";
      while(array_key_exists($i,$column_names)){
        $sql.=$column_names[$i].$types;
        if(array_key_exists($i,$sizes)) $sql.="(".$sizes[$i].")";
        if(array_key_exists($i,$default_val)) $sql.=" default(".$default_val[$i].")";
        if($i<count($column_names)) $sql.=", ";
        $i++;
      }
      $sql.=")";
      $pdo_statement=$this->user_connexion->prepare($sql);
      return $pdo_statement->execute();

    }

}
