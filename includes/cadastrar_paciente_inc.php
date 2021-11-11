<?php

if (isset($_POST["cadastrar_paciente"])) {

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $cpf = $_POST["cpf"];
    $sexo = $_POST["sexo"];
    $estado_civil = $_POST["estado_civil"];
    $nascimento = $_POST["nascimento"];
    $senha1 = $_POST["senha1"];
    $senha2 = $_POST["senha2"];

    require_once 'db_inc.php';
    require_once 'functions_paciente_inc.php';

    if (pwdMatch($senha1, $senha2) !== false){
        header("location: ../pages/cadastrar_paciente.php?error=senhasdiferentes");
        exit();
    }

    if (uidExists($conn, $email, $cpf) !== false){
        header("location: ../pages/cadastrar_paciente.php?error=emailutilizado");
        exit();
    }

    criarUsuario($conn, $nome, $email, $cpf, $sexo, $estado_civil, $nascimento, $senha1);

}
else{
    header("location: ../pages/cadastrar_paciente.php");
}
?>