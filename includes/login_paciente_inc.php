<?php

if (isset($_POST["logar_paciente"])){

    $email = $_POST["email"];
    $senha1 = $_POST["senha1"];

    require_once 'db_inc.php';
    require_once 'functions_paciente_inc.php';

    loginUser($conn, $email, $senha1);
    }
    else {
        header("location: ../pages/login.php");
        exit();
}
?>