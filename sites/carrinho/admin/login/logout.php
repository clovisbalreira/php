<?php
    session_start();
    unset($_SESSION['codigo']);
    unset($_SESSION['nome']);
    unset($_SESSION['nivel']);
    session_destroy();
    header("location:login_form.php");
    exit;
?>