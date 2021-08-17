<?php
error_reporting(E_ERROR | E_PARSE);
require_once("../connection/connection.php");

    $referencia=$_POST["referencia"];
    $designacao=$_POST["designacao"];
    $preco=$_POST["preco"];
    $desconto=$_POST["desconto"];
    $categoria=$_POST["categoria"];
    $destaque=$_POST["destaque"];

    $filename = $_FILES["imagem"]["name"];
    $tempname = $_FILES["imagem"]["tmp_name"];    
    $folder = "../img/product/".$filename;

    $sql="insert into produtospt values('$referencia','$designacao','$filename','$preco','$categoria','$destaque','$desconto')";

    $csogani->query($sql);

    if (move_uploaded_file($tempname, $folder))  {
        $msg = "Image uploaded successfully";
    } else{
        $msg = "Failed to upload image";
    }

    $csogani->close();

    header("Location: produtospt.php");
    exit();

?>