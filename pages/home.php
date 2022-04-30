<?php
session_start();

if (!isset($_SESSION['id'])) {
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
    </div>
</body>

</html>
