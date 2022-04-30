<?php
class SingupContr extends Singup
{
  private $uid;
  private $email;
  private $first_name;
  private $last_name;
  private $user_type;
  private $pwd;
  private $pwdRepeat;

  public function __construct($uid,$email,$first_name,$last_name, $pwd,$pwdRepeat,$user_type){
    $this->uid= $uid;
    $this->email= $email;
    $this->first_name = $first_name;
    $this->last_name = $last_name;
    $this->pwd = $pwd;
    $this->pwdRepeat = $pwdRepeat;
    $this->user_type = $user_type;

  }
  private function emptyInput(){
    $result = null;
    if(empty($this->uid) || empty($this->emai) || empty($this->first_name) || empty($this->last_name) || empty($this->pwd) || empty($this->pwdRepeat))
    {
      $result = false;
    }else
    {
      $result = true;
    }
    return $result;
  }
  private function invalidUid(){
    $result = null;
    if(!preg_match("/^[a-zA-Z0-9]*$/",$this->uid))
    {
      $result = false;
    }else
    {
      $result = true;
    }
    return $result;
  }
  private function invalidEmail(){
    $result = null;
    if(!filter_var($this->email, FILTER_VALIDATE_EMAIL))
    {
      $result = false;
    }else
    {
      $result = true;
    }
    return $result;
  }
  private function pwdMatch(){
    $result = null;
    if($this->pwd !== $this->pwdRepeat){
      $result = false;
    }else
    {
      $result = true;
    }
    return $result; 
  }
  private function uidisTaken(){
    $result = null;
    if(!$this->checkUser($this->uid, $this->email))
    {
      $result=false; 
    } else
    {
      $result= true; 
    }
    return $result;
  }
  private function invalidType(){
    $result = null; 
    if(!$this->user_type == "student" || !$this->user_type=="profesor")
      $result = false;
      else 
      $result = true;
    return $result;
  }
  public function singupUser(){
    session_start();
    if($this->emptyInput() == false){
      $error = "emtyInput";
      $_SESSION['error'] = $error;
      header("location:../index.php");
      exit();
    }
    // Why not empty input ?
    if($this->invalidUid() == false){
      $error = "invalidUid";
      $_SESSION['error'] = $error;
      header("location:../index.php");
      exit();
    }
    if($this->invalidEmail() == false){
      $error = "invalidEmaildsa";
      $_SESSION['error'] = $error;
      header("location:../index.php");
      exit();
    }
    if($this->pwdMatch() == false){
      $error = "pwdDONTmathc";
      $_SESSION['error'] = $error;
      header("location:../index.php");
      exit();
    }
    if($this->uidisTaken() == false){
      $error = "UidisTaken";
      $_SESSION['error'] = $error;
      header("location:../index.php");
      exit();
    }
    if($this->invalidType() == false){
      $error = "invalidType";
      $_SESSION['error'] = $error;
      header("location:../index.php");
      exit();
    }
    $this->setUser($this->uid, $this->pwd, $this->email, $this->first_name, $this->last_name, $this->user_type);
  }

}
