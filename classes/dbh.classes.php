<?php

class Dbh{

  protected function connect(){
    try {
      $username = "root";
      $password = "1234";
      $dbh = new PDO('mysql:host=localhost;dbname=sistem_pontaj',$username,$password);
      return $dbh;
    } catch (PDOException $e) {
      print "Error: " . $e->getMessage() . "<br/>";
      die();
    }

  }
}
