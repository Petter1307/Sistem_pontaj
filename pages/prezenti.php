<?php
session_start();
if (!isset($_SESSION['id']) or !($_SESSION['user_type'] == 'profesor' or $_SESSION['user_type'] == 'nimda')) {
    header("location:../includes/logout.inc.php");
    header("location:../index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <div class="mobile_page_title">
            <p>Prezenti</p>
        </div>
        <div id="search_prezenti_form">
            <form action="" method="post"></form>
        </div>
    </div>

</body>

</html>
