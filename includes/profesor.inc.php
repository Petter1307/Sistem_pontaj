<?php
session_start();
if (isset($_POST['submit'])) {
    $an = $_POST['an_studii'];
    $spec = $_POST['spec'];
    $grupa = $_POST['nr_grupa'];
    $saptamana = $_POST['saptamani'];
}
