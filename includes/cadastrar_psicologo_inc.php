<?php
if (isset($_POST["cadastrar_psicologo"])) {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $cpf = $_POST["cpf"];
    $crp = $_POST["crp"];
    $sexo = $_POST["sexo"];
    $nascimento = $_POST["nascimento"];
    $senha1 = $_POST["senha1"];
    $senha2 = $_POST["senha2"];
    $descricao = $_POST["descricao"];

    require_once 'db_inc.php';
    require_once 'functions_psicologo_inc.php';

    if (pwdMatch($senha1, $senha2) !== false){
        header("location: ../pages/cadastrar_psicologo.php?error=senhasdiferentes");
        exit();
    }

    if (uidExists($conn, $email, $cpf, $crp) !== false){
        header("location: ../pages/cadastrar_psicologo.php?error=emailutilizado");
        exit();
    }
    criarUsuario($conn, $nome, $email, $cpf, $crp, $sexo, $nascimento, $senha1, $descricao);
}
else{
    header("location: ../pages/cadastrar_psicologo.php");
}
?>

