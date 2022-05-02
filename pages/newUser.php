<?php
session_start();

if (!isset($_SESSION['id']) or $_SESSION['user_type'] != 'nimda') {
    header("location:../includes/logout.inc.php");
    header("location:../index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php
include "../templates/scrtipts.php";
?>
    <title>Document</title>
</head>

<body>
    <div id="wrapper">
        <?php
include "../templates/menu_simple.php";
?>
        <div id="singup_wrapper">
            <form action="../includes/singup.inc.php" method="post" id="create_form">
                <input type="text" name="uid" placeholder="Username" class="input"><br>
                <input type="text" name="email" placeholder="Email" class="input"><br>
                <input type="text" name="first_name" placeholder="Prenume" class="input"><br>
                <input type="text" name="last_name" placeholder="Name" class="input"><br>
                <input type="password" name="pwd" placeholder="Parola" class="input"><br>
                <input type="password" name="pwdRepeat" placeholder="Repeta parola" class="input"><br>
                <label for="profesor"><input type="radio" name="radio_type" value="Profesor">Profesor</label><br>
                <label for="student"><input type="radio" name="radio_type" value="Student" checked>Student</label><br>
                <br>
                <button type="submit" name="submit" id="create_button">Creare</button>
            </form>
            <?php
if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    $_SESSION['error'] = null;
    echo $error;
}
?>
        </div>
    </div>
</body>

</html>
