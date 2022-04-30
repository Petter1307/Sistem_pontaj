<?php 
    session_start();
    if(isset($_SESSION['id'])){
        $id = $_SESSION['id'];
        echo $id;
    if(isset($_SESSION['user_type'])){
        $user_type = $_SESSION['user_type'];
    }
    else{
        $error = "invalid_user_type";
        $_SESSION['error'] = $error;
        header("location:../index.php");
    }
    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
    }else{
        $error = "invalid_user_name";
        $_SESSION['error'] = $error;
        header("location:../index.php");     
    }

    }else{
        $error = "no_user_id";
        $_SESSION['error'] = $error;
        header("location:../index.php");
    }
?>


<h1>Student page</h1>
<p>
    <?php 
    echo $id;
?>
</p>
<a href="../includes/logout.inc.php">Logout</a>
<form action="../includes/logout.inc.php" method="get">
    <input type="button" name="submit" value="submit">
</form>
