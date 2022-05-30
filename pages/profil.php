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
    <title>Sistem pontaj</title>
</head>

<body>
    <div id="wrapper">
        <?php
include "../templates/menu_simple.php";
?>
        <div id="profile_wrapper">
            <div id="profile">
                <div class="profile_group">
                    <p>First and last name:&nbsp</p>

                    <p>
                        <?php
echo " " . $user->getUserFirst() . " " . $user->getUserLast();
?>
                    </p>
                </div>
                <div class="profile_group">
                    <p>User ID:&nbsp</p>
                    <p><?php
echo $user->getUserId();
?></p>
                </div>

                <div class="profile_group">
                    <p>User type:&nbsp</p>
                    <p><?php
if ($user->getUserType() == "nimda") {
    echo " " . "Admin";
} else {
    echo $user->getUserType();
}

?></p>
                </div>
                <div class="profile_group">
                    <p>Email:&nbsp</p>
                    <p><?php
echo $user->getUserEmail();
?></p>
                </div>
                <div class="profile_group">
                    <p>Registration Date:&nbsp</p>
                    <p>
                        <?php
echo $user->getUserCreationTime();
?>
                    </p>
                </div>

            </div>
            <div id="change_pass_form">
                <form action="../includes/changePass.inc.php" method="post" id="change_form_wrapper">
                    <input type="password" name="pwd" id="change_pwd" placeholder="Current password" class="input">
                    <input type="password" name="newpwd" id="change_newPwd" placeholder="New password" class="input">
                    <input type="password" name="repeatpwd" id="change_newPwdRepeat" placeholder="Repeat new password"
                        class="input">
                    <input type="submit" value="Submit" name="submit" class="create_button">
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
    </div>
</body>

</html>
