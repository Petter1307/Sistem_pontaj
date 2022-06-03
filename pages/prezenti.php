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
    <div id="wrapper">
        <?php
include "../templates/menu_simple.php";
?>
        <div class="mobile_page_title">
            <p>Prezenti</p>
        </div>
        <form action="results.php" method="post" id="form_select_studenti">
            <label for="specializare">Specializare</label>
            <select name="spec" id="specializare" required='true'>
                <option value="1">Informatica</option>
                <option value="2">ECTS</option>
                <option value="3">Drept</option>
                <option value="4">Limbi</option>
                <option value="5">Ortodox</option>
            </select>
            <label for="an_stud">An</label>
            <select name="an_studii" id="an_stud" required='true'>
                <option value="1">I</option>
                <option value="2">II</option>
                <option value="3">III</option>
                <option value="4">IV</option>
                <option value="5">V</option>
            </select>
            <label for="nr_grup">Grupa</label>
            <select name="nr_grupa" id="nr_grup" required='true'>
                <option value="1">Toate</option>
                <option value="2">I</option>
                <option value="3">II</option>
                <option value="4">III</option>
                <option value="5">IV</option>
            </select>
            <?php
echo "<label for='lang'>Saptamana curenta:</label>";
echo " <select name='saptamani' id='sapt' required='true'>";
for ($i = 1; $i <= 14; $i++) {
    echo "<option value=" . $i . ">Saptamana " . $i . "</option>";
}
?>

            <input type="submit" name="submit" value="Optine lista">
        </form>
    </div>

</body>

</html>
