<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Proiect</title>
</head>

<body>
    <div class="signup_wrapper">
        <form action="includes/singup.inc.php" method="post">
            <input type="text" name="uid" placeholder="Username"><br>
            <input type="text" name="email" placeholder="Email"><br>
            <input type="text" name="first_name" placeholder="Prenume"><br>
            <input type="text" name="last_name" placeholder="Name"><br>
            <input type="password" name="pwd" placeholder="Parola"><br>
            <input type="password" name="pwdRepeat" placeholder="Repeta parola"><br>
            <input type="radio" name="radio_type" value="Profesor">
            <label for="profesor">Profesor</label><br>
            <input type="radio" name="radio_type" value="Student" checked>
            <label for="student">Student</label><br>
            <br>
            <button type="submit" name="submit">Sing Up</button>
        </form>

        <form action="includes/login.inc.php" method="post">
            <input type="text" name="uid">
            <input type="password" name="pwd">
            <input type="submit" name="submit" value="Login">
        </form>

        <?php 
                if(isset($_SESSION['error'])){
                    $error = $_SESSION['error'];
                    $_SESSION['error'] = null;
                    echo "error from sesion: ".$error;
                }
                     if(isset($_SESSION['id'])){
                    $error = $_SESSION['id'];
                    echo "error from sesion: ".$error;
                }
        
        ?>

    </div>
    <nav>
        <ul>
            <li><a href="pages/login.html">Login page</a></li>
            <li><a href="pages/home.html"></a></li>
            <li><a href=""></a></li>
        </ul>
    </nav>
</body>

</html>
