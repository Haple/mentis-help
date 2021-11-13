<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "mentis";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn){
    die("Conexão falhou: " . mysqli_conncet_error());
}
?>