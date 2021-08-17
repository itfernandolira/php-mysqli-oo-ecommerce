<?php

    error_reporting(E_ERROR | E_PARSE);
    require_once("../connection/connection.php");

    $ref=$_GET["ref"];
    
    $sql="delete from produtospt where referencia='$ref'";

    $csogani->query($sql);

    $csogani->close();

    header("Location: produtospt.php");
    exit();

?>