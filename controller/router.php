<?php
require_once 'controller/user.php';
require_once 'view/view.php';
session_start();

class Router{
  private static $Controller_User;
  private static $authentified=false;


  public function __construct(){

  }

  public static function authentify(){

   echo self::login();

    if(isset($_POST['login'])){
      try{
        self::$Controller_User=new Controller_User();
        self::$Controller_User->action_login($_POST['user'],$_POST['password']);
        //self::$Controller_User->getTable("sys_privileges");
        //print_r($t);
        self::$authentified=true;
        $_SESSION['authentified']=true;
      //  $_SESSION['usr']=self::$Controller_User;
        header("Refresh:0"); // Refresh
        //echo self::baseView();
      }
      catch(Exception $e){
        echo 'Error while logging in';
        $e->getMessage();
      }
    }
  }

 public function route_query() {

      try{

    if(!isset($_SESSION['authentified']) || !$_SESSION['authentified']){
        try{
          self::authentify();
          }
          catch(Exception $e){
            echo "Couldn't log in";
            $e->getMessage();
          }
        }
    else{
      echo self::baseView();
      self::$Controller_User=new Controller_User();
      self::$Controller_User->action_login($_SESSION['username'],$_SESSION['password']);

      if(!empty($_GET['table']) || isset($_GET['table']))
      {
        try
        {
          foreach(Config::SYSTEM_TABLES as $key=>$value){
            echo self::$Controller_User->getTable($value);
          }
        }
          catch (Exception $e)
          {
            echo 'Invalid table name';
          $e->getMessage();
          }
        }
        if(!empty($_GET['userTables']) || isset($_GET['userTables']))
        {
          try
          {
              echo self::$Controller_User->getUserTables();

          }
            catch (Exception $e)
            {
              echo 'No such table for this user';
            $e->getMessage();
            }
          }
          if(!empty($_GET['createTable'])||isset($_GET['createTable'])){

            $view=new view('CreateTable');
            echo $view->generate();
            if(isset($_POST['create'])){
              self::$Controller_User->action_createTable($_SESSION['table_name'],$_SESSION['name[]'],$_SESSION['type[]'],$_SESSION['size[]'],$_SESSION['default[]']);
            }

          }
          if(!empty($_GET['execQuery'])||isset($_GET['execQuery'])){
            $view=new view('TextArea');
            echo $view->generate();
            try{
              if(isset($_POST['execute'])){
                self::$Controller_User->action_ExecSqlStatement($_POST['sqlQuery']);
                echo 'Done.';
              }
            }
            catch (Exception $e)
            {
              echo 'Syntaxe error or unsufficient privileges.';
            $e->getMessage();
            }


          }
          if(!empty($_GET['dropUser'])||isset($_GET['dropUser'])){
            $view=new view('SmallTextArea');
            echo $view->generate();

            if(isset($_POST['drop'])){
              try{
              self::$Controller_User->action_dropUser($_POST['drop_text']);
              echo 'Done.';
              }
              catch (Exception $e)
              {
                echo 'Error, no such name or not enough privileges.';
              $e->getMessage();
              }

            }

          }
          if(!empty($_GET['dropTable'])||isset($_GET['dropTable'])){
            $view=new view('SmallTextArea');
            echo $view->generate();
            if(isset($_POST['drop'])){
              try{
              self::$Controller_User->action_dropTable($_POST['drop_text']);
              echo 'Done.';
              }
              catch (Exception $e)
              {
                echo 'Error, no such name or not enough privileges.';
              $e->getMessage();
              }

            }
          }

      if(isset($_GET['logout'])){
        $url = strtok($_SERVER["REQUEST_URI"], '?');
        echo $url;
        session_destroy();
        //header('location: MVC_TEST/');
        //header("location:".$url);
        unset($_GET['logout']);
        echo '<meta http-equiv="refresh" content="0">';
        exit();
        $this->login();

      }
      }
    }
    catch (Exception $e){
      $e->getMessage();
    }


}
  private static function login(){
    $view = new view("Login");
    return $view->generate();
  }
  private function baseView(){
    $view = new view("Dummy","Sidebar");
    return $view->generate();
  }

}
