<header>
    <div id="header_wrapper">
        <div id="header_img">
            <a href="../pages/home.php"><img src="../img/sigla_uab_small.png" alt="UAB small icon" /></a>
        </div>
        <nav id="mobile_menu" style="cursor: pointer" onclick="change_model();">
            <div class="dropdown">
                <i class="fa-solid fa-bars fa-2xl" id="open_menu"></i>
                <i class="fa-regular fa-circle-xmark fa-2xl" id="close_menu"></i>
                <div class="dropdown_content" id="myDropdown">
                    <?php
if ($_SESSION['user_type'] == 'profesor' || $_SESSION['user_type'] == 'nimda') {
    echo "<a href='home.php'>Prezenti</a>";
    echo "<a href='home.php'>Istoric prezente</a>";
}
?>


                    <?php
if ($_SESSION['user_type'] == "nimda") {
    echo "<a href='newUser.php'>Creare utilizatori</a>";
}
?>
                    <?php
if ($_SESSION['user_type'] == 'student') {
    echo "<a href='home.php'>Prezente</a>";
}
?>
                    <a href="home.php">Profil</a>
                    <a href="../includes/logout.inc.php">Logout</a>
                </div>
            </div>
        </nav>

        <nav id="desktop_menu">
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
</header>
