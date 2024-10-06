<?php 
session_start();
if(!isset($_SESSION['user_name'])){
    header("location:index.php");
}

?>Welcome to <?php echo $_SESSION['user_name']?> <a href="logout.php">logout</a></h2>