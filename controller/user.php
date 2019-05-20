<?php
require_once 'view/view.php';
require_once 'model/user.php';
class Controller_User {

  protected $user;
  public $authentified;
  public function __construct(){
    $authentified=false;
  }
  public function action_login($usr,$pass){

    $this->user=new Model_User();
    try{
      $connexion=$this->user->login($usr,$pass);
      $_SESSION["username"]=$usr;
      $_SESSION["password"]=$pass;
      $authentified=true;
      //$t=$this->getTable("sys_privileges");

      return $connexion;
    }
    catch(Exception $e){
      echo 'Invalid credentials';
      return $e->getMessage();

    }
  }
  public function getTable($table_name) {
    $function="table_".$table_name;
   try{
      $rows = $this->user->{$function}();
      $view=new view('Table');
      return $view->generate(array('rows'=>$rows,'table_name'=>$table_name));
     }
    catch(Exception $e){
      echo 'Invalid table name';
      return $e->getMessage();
    }
  }
  public function getUserTables(){
    $tables= $this->user->table_tables();

    $all="";
    //$keys =$tables[0]['OBJECT_NAME'];
    $values= array_column($tables,'OBJECT_NAME');
    foreach($values as $table_name){
      $rows=$this->user->get_table_content($table_name);
      $view= new view('Table');
      $all.="<br>".$view->generate(array('rows'=>$rows,'table_name'=>$table_name));
    }
    return $all;
  }
  public function action_createTable($table_name,$column_names,$types,$sizes,$default_val){

    $tables= $this->user->createTable($table_name,$column_names,$types,$sizes,$default_val);
  }
  public function action_dropUser($username){
    return $this->user->dropUser($username);
  }
  public function action_dropTable($table_name){
    return $this->user->dropTable($table_name);
  }
  public function action_ExecSqlStatement($sql){
    return $this->user->ExecSqlStatement($sql);
  }
}

?>
