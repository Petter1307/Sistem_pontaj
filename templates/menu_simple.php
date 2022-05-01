<div id="menu_wrapper">
    <img id="uab_small" src="../img/sigla_uab_small.png" alt="UAB small icon" />
    <nav id="nav_wrapper">
        <ul id="menu">
            <?php
if ($_SESSION['user_type'] == 'profesor' || $_SESSION['user_type'] == 'nimda') {
    echo "<li><a href='home.php'>Prezenti</a></li>";
    echo "<li><a href='home.php'>Istoric prezente</a></li>";
}
?>


            <?php
if ($_SESSION['user_type'] == "nimda") {
    echo "<li><a href='newUser.php'>Creare utilizatori</a></li>";
}
?>
            <?php
if ($_SESSION['user_type'] == 'student') {
    echo "<li><a href='home.php'>Prezente</a></li>";
}
?>
            <li><a href="home.php">Profil</a></li>
            <li><a href="../includes/logout.inc.php">Logout</a></li>
        </ul>
    </nav>
</div>
