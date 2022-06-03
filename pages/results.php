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
    <title>Sistem pontaj</title>
</head>

<body>
    <div class="wrapper">
        <?php
include "../templates/menu_simple.php";
?>
        <div id="prezenti_wrapper">
            <?php
if (isset($_POST['submit'])) {
    $an = $_POST['an_studii'];
    $spec = $_POST['spec'];
    $grupa = $_POST['nr_grupa'];
    $saptamana = $_POST['saptamani'];

    include "../classes/dbh.classes.php";
    include "../classes/user.class.php";
    include "../classes/profesor.class.php";

    $prof = new profesor($_SESSION['id']);

    $prof->getStudentList($an, $grupa, $spec);
    // echo $prof->getIdOcupare(1, 1, 1, 1);
    // echo $prof->testStuff();
    // ($id_student, $saptamana, $an, $spec, $grupa, $disc)
    if (isset($_GET['insert'])) {
        $id_insert = $_GET['insert'];
        if (isset($_GET['saptamana'])) {
            $incSaptamana = $_GET['saptamana'];
            if (isset($_GET['an'])) {
                $incAn = $_GET['an'];
                if (isset($_GET['spec'])) {
                    $incSpec = $_GET['spec'];
                    if (isset($_GET['grupa'])) {
                        $incGrupa = $_GET['grupa'];
                        if (isset($_GET['disc'])) {
                            $incDisc = $_GET['disc'];
                            $prof->insertPRezenta($id_insert, $incSaptamana, $incAn, $incSpec, $incGrupa, $incDisc);
                        }
                    }
                }
            }
        }
    }
} else {
    header('location:prezenti.php');
}
?>
        </div>
    </div>
</body>

</html>
