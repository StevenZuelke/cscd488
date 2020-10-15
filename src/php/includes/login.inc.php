<?php
    if(isset($_POST['log        inSubmit']))
    session_start();
    $_SESSION['username'] = $_POST['username'];
    header("Location: ../index.php");
    exit();

?>