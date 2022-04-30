<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Pontaj</title>
</head>

<body>
    <div id="page_wrapper">
        <header>
            <img src="img/sigla_uab_big.png" alt="Sigla uab" class="login_img" />
        </header>
        <div id="login_form_wrapper">
            <form action="includes/login.inc.php" method="post" id="login_form">
                <input type="text" name="uid" placeholder="Username sau email" class="login_input" />
                <input type="password" name="pwd" placeholder="Password" class="login_input" />
                <input type="submit" name="submit" value="LOGIN" id="login_button" />
            </form>

            <div id="forgot_password">
                <p><a href="index.php">Forgot password ?</a></p>
            </div>
        </div>
        <?php
if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    $_SESSION['error'] = null;
    echo "error from sesion: " . $error;
}
?>
    </div>
</body>

</html>
