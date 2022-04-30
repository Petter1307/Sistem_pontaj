<?php



class Login extends Dbh {

    protected function getUser($uid, $pwd){
        $stmt = $this->connect()->prepare('SELECT password FROM user WHERE username = ? or email = ?;');
        session_start();


        if(!$stmt->execute(array($uid, $uid)))
        {
            $stmt = null; 
            $error = "stmtfailed";
            $_SESSION['error'] = $error;
            header("location:../index.php");
            exit();
        }
        if($stmt->rowCount() == 0){
            $stmt = null;
            $error = "usernotfound";
            $_SESSION['error'] = $error;
            header("location:../index.php");
            exit();

        }
        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $checkPwd = password_verify($pwd,$pwdHashed[0]["password"]);
        if($checkPwd == false){
            $stmt = null;
            $error = "wrongpassowrd";
            $_SESSION['error'] = $error;
            header("location:../index.php");
            exit();
            
        }else if($checkPwd == true){
            $stmt = $this->connect()->prepare('SELECT * FROM user WHERE (username = ? or email = ?) AND password = ?;');
            
        if(!$stmt->execute(array($uid, $uid, $pwdHashed[0]["password"])))
        {
            $stmt = null; 
            $error = "stmtfailed";
            $_SESSION['error'] = $error;
            header("location:../index.php");
            exit();
        }
        
        if($stmt->rowCount() == 0){
            $stmt = null;
            $error = "usernotfound";
            $_SESSION['error'] = $error;
            header("location:../index.php");
            exit();

        }

        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $_SESSION["user_type"]=$user[0]["user_type"];
        $_SESSION["id"] = $user[0]["id"];
        $_SESSION["username"] = $user[0]["username"];
        $stmt = null; 
       
        if($_SESSION["user_type"] == "student")
        header("location:../student/student.php");
        else if($_SESSION["user_type"]=="profesor")
        header("location:../index.php"); //TODO go to profesor page
        else if($_SESSION["user_type"] == "nimda")
        // header("location:../index.php"); //TODO go to admin page
        header("location:../student/student.php");
        else
        header("location:../index.php?fuck_you");
        
    }

    }
}
