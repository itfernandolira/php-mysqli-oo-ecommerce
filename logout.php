<?php
    session_start();
    unset($_SESSION['loginDone']);
    unset($_SESSION['usernameLog']);
    header("Location: index.php");
?>