<?php
if (isset($_POST["submit"])) {
    $uid = $_POST["uid"];
    $email = $_POST["email"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdRepeat"];
    $radio_type = $_POST['radio_type'];
    if ($radio_type == "Profesor") {
        $user_type = "profesor";
    } else if ($radio_type == "Student") {
        $user_type = "student";
    }
    include "../classes/dbh.classes.php";
    include "../classes/auth/register/singup.classes.php";
    include "../classes/auth/register/singupContr.classes.php";

    $singup = new SingupContr($uid, $email, $first_name, $last_name, $pwd, $pwdRepeat, $user_type);

    $singup->singupUser();

    header('location: ../pages/home.php?error=none');
}
