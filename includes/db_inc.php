<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "pspj";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn){
    die("Conexão falhou: " . mysqli_conncet_error());
}
?>