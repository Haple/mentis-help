<?php

$serverName = "127.0.0.1";
$dBUsername = "root";
$dBPassword = "";
$dBName = "mentis";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}
