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
    <link rel="stylesheet" href="../style.css" />
    <title>Document</title>
</head>

<body>
    <div id="wrapper">
        <div id="menu_wrapper">
            <img id="uab_small" src="../img/sigla_uab_small.png" alt="UAB small icon" />
            <nav id="nav_wrapper">
                <ul id="menu">
                    <li><a href="home.php">Prezenti</a></li>
                    <li><a href="home.php">Istoric prezente</a></li>
                    <?php
if ($_SESSION['user_type'] == "nimda") {
    echo "<li><a href='newUser.php'>Creare utilizatori</a></li>";
}
?>
                    <li><a href="home.php">Profil</a></li>
                    <li><a href="../includes/logout.inc.php">Logout</a></li>
                </ul>
            </nav>
        </div>
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
