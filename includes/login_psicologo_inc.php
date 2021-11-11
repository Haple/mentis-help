<?php

if (isset($_POST["logar_psicologo"])){

    $crp = $_POST["crp"];
    $senha1 = $_POST["senha1"];

    require_once 'db_inc.php';
    require_once 'functions_psicologo_inc.php';

    loginUser($conn, $crp, $senha1);
    }
    else {
        header("location: ../pages/login.php");
        exit();
}
?>