<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("location:../includes/logout.inc.php");
    header("location:../index.php");
}

include "../includes/user.inc.php";

$user = new User($_SESSION['id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
include "../templates/scrtipts.php"
?>
    <title>Document</title>
</head>

<body>
    <div id="wrapper">
        <?php
include "../templates/menu_simple.php";
?>
        <div id="profile">
            <p>
                <?php
echo $user->getUserFirst() . " " . $user->getUserLast();
?>
            </p>
            <p><?php
echo $user->getUserId();
?></p>
            <p><?php
echo $user->getUserEmail();
?></p>
            <p><?php
if ($user->getUserType() == "nimda") {
    echo "Boss de boss";
} else {
    echo $user->getUserType();
}

?></p>
            <p>
                <?php
echo $user->getUserCreationTime();
?>

            </p>
        </div>
    </div>
</body>

</html>
