<?php
    error_reporting(E_ERROR | E_PARSE);
    require_once("../connection/connection.php");

    $referencia=$_POST["referencia"];
    $refOld=$_POST["refOld"];
    $designacao=$_POST["designacao"];
    $preco=$_POST["preco"];
    $desconto=$_POST["desconto"];
    $categoria=$_POST["categoria"];
    $destaque=$_POST["destaque"];

    $filename = $_FILES["imagem"]["name"];
    $tempname = $_FILES["imagem"]["tmp_name"];    
    $folder = "../img/product/".$filename;

    if (!empty($filename)) {

        $sql="update produtospt set referencia='$referencia',designacao='$designacao',preco='$preco',desconto='$desconto',categoria='$categoria',destaque='$destaque',imagem='$filename' where referencia='$refOld'";

        if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
        } else{
            $msg = "Failed to upload image";
        }
    }
    else {
        $sql="update produtospt set referencia='$referencia',designacao='$designacao',preco='$preco',desconto='$desconto',categoria='$categoria',destaque='$destaque' where referencia='$refOld'";
    }

    $csogani->query($sql);

    $csogani->close();

    header("Location: produtospt.php");
    exit();

?>