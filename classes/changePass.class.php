<?php
class NewPass extends Dbh
{

    protected function getCurrentPassHash($id)
    {
        $stmt = $this->connect()->prepare('SELECT passowrd from user where id=?');
        if (!$stmt->execute(array($id))) {
            $stmt = null;
            return null;
        }
        if ($stmt->rowCount() == 0) {
            return null;
        }
        if ($stmt->rowCount() > 2) {
            return null;
        }
        if ($stmt->rowCount() == 1) {
            $tmp = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $tmp[0]['password'];
        }
    }
    protected function changePassword($id, $pwd)
    {
        $stmt = $this->connect()->prepare('UPDATE user SET password = ? where id= ?');
        $hashpwd = password_hash($pwd, PASSWORD_DEFAULT);
        if (!$stmt->execute(array($hashpwd, $id))) {
            $stmt = null;
            session_start();
            $error = "stmtfailed";
            $_SESSION['error'] = $error;
            header("location:../pages/profile.php");
            exit();
        }
    }
}
