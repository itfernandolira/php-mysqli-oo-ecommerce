<?php
error_reporting(E_ERROR | E_PARSE);
require_once("../connection/connection.php");

$ficheiro = $_FILES["ficheiro"]["tmp_name"];

$file = fopen($ficheiro, "r");
          while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
           {
                $sql="insert into produtospt values('$getData[0]','$getData[1]','$getData[2]','$getData[3]','$getData[4]','$getData[5]','$getData[6]')";
                $csogani->query($sql);
           }
$csogani->close();

header("Location: produtospt.php");
exit();

?>