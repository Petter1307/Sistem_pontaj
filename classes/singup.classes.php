<?php

class Singup extends Dbh {


    protected function checkUser($uid,$email){
        $stmt = $this->connect()->prepare('SELECT id FROM user WHERE username = ? OR email = ?');
        
        if(!$stmt->execute(array($uid,$email))){
            $stmt = null;
            session_start();
            $error = "stmtfailed";
            $_SESSION['error'] = $error;
            header("location:../index.php");
            exit();
        }
        $resultCheck = null;
        if($stmt ->rowCount() > 0){
            $resultCheck = false;
        }
        else{
            $resultCheck = true;
        }
        return $resultCheck;
    }

    protected function setUser($uid, $pwd, $email, $first_name, $last_name,$user_type){
        $stmt = $this->connect()->prepare('INSERT INTO user(username,password,email,first_name,last_name,user_type) VALUES(?,?,?,?,?,?)');

        $hashpwd=password_hash($pwd, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($uid, $hashpwd, $email, $first_name, $last_name,$user_type)))
        {
            $stmt = null; 
            session_start();
            $error = "stmtfailed";
            $_SESSION['error'] = $error;
            header("location:../index.php");
            exit();
        }

        $stmt = null; 
    }
}
