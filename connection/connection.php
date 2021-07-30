<?php
  # connection/connection.php
  $hostname_csogani = "localhost";
  $database_csogani = "ogani";
  $username_csogani = "root";
  $password_csogani = "";
  $csogani = mysqli_connect($hostname_csogani, $username_csogani, $password_csogani, $database_csogani);
  mysqli_set_charset($csogani, "utf8");
?>