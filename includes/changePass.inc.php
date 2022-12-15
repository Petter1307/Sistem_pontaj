<?php

if (isset($_POST['submit'])) {
    session_start();
    $id = $_SESSION['id'];
    $currentpwd = $_POST['pwd'];
    $newpwd = $_POST['newpwd'];
    $repeatpwd = $_POST['repeatpwd'];

    include "../classes/dbh.classes.php";
    include "../classes/auth/changepass/changePass.class.php";
    include "../classes/auth/changepass/changePassContr.class.php";

    $tmp = new NewPassContr($id, $currentpwd, $newpwd, $repeatpwd);
    $tmp->changePwd();
    header("location: ../pages/profil.php?error=none");

}
