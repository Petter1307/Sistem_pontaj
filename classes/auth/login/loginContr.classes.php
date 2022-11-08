<?php
class LoginContr extends Login
{
  private $uid;
  private $pwd;

  public function __construct($uid,$pwd){
    $this->uid= $uid;
    $this->pwd= $pwd;
  }
  private function emptyInput(){
    $result = null;
    if(empty($this->uid) || empty($this->pwd))
    {
      $result = false;
    }else
    {
      $result = true;
    }
    return $result;
  }

  public function loginUser(){
    if($this->emptyInput() == false){
      session_start();
      $error = "emtyInput";
      $_SESSION['error'] = $error;
      header("location:../index.php");
      exit();
    }
    $this->getUser($this->uid,$this->pwd);
  }

}
