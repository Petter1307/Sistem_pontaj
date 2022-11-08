<?php
class NewPassContr extends NewPass
{
    private $id;
    private $oldPass;
    private $newPass;
    private $newPassRepeated;
    public function __construct($id, $old, $new, $repeat)
    {
        $this->id = $id;
        $this->oldPass = $old;
        $this->newPass = $new;
        $this->newPassRepeated = $repeat;
    }
    private function emptyInput()
    {
        if (empty($this->id) || empty($this->oldPass) || empty($this->newPass) || empty($this->newPassRepeated)) {
            return false;
        } else {
            return true;
        }
    }
    private function pwdMatch()
    {
        if ($this->newPass != $this->newPassRepeated) {
            return false;
        } else {
            return true;
        }
    }
    private function verifyOldpass()
    {
        $old = $this->getCurrentPassHash($this->id);
        $checkPwd = password_verify($this->oldPass, $old);
        if ($checkPwd == false) {
            return false;
        } else if ($checkPwd == true) {
            return true;
        }
    }

    public function changePwd()
    {
        if ($this->emptyInput() == false) {
            $error = "emptyinput";
            $_SESSION['error'] = $error;
            header('location:../pages/profil.php');
            exit();
        }
        if ($this->pwdMatch() == false) {
            $error = "pwddontmatch";
            $_SESSION['error'] = $error;
            header("location:../pages/profil.php");
            exit();
        }
        if ($this->verifyOldpass() == false) {
            $error = "oldNotGood";
            $_SESSION['error'] = $error;
            header('location:../pages/profil.php');
            exit();
        }
        $this->changePassword($this->id, $this->newPass);
    }
}
