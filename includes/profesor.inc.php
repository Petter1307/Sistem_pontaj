<?php
if (isset($_POST['submit'])) {
    $an = $_POST['an_studii'];
    $spec = $_POST['spec'];
    $grupa = $_POST['nr_grupa'];
    $saptamana = $_POST['saptamani'];

    include "../classes/dbh.classes.php";
    include "../classes/user.class.php";
    include "../classes/profesor.class.php";

    $prof = new profesor(1);

    $prof->getStudentList($an, $grupa, $spec);
}
