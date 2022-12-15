<?php
if (isset($_POST["submit"])) {
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];

    include "../classes/dbh.classes.php";
    include "../classes/auth/login/login.classes.php";
    include "../classes/auth/login/loginContr.classes.php";

    $login = new LoginContr($uid, $pwd);

    $login->loginUser();

}
