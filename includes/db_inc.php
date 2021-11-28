<?php

$serverName = getenv("DB_SERVER") ?: "127.0.0.1";
$dBUsername = getenv("DB_USERNAME") ?: "root";
$dBPassword = getenv("DB_PASS") ?: "";
$dBName = getenv("DB_NAME") ?: "mentis";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}
