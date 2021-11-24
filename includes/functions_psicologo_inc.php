<?php

function pwdMatch($senha1, $senha2){
    $result;
    if($senha1 !== $senha2){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function uidExists($conn, $email, $cpf, $crp){
    $sql = "SELECT * FROM psicologo WHERE emailPsicologo= ? OR CPFPsicologo = ? OR CRP = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../pages/cadastrar_psicologo.php?error=stmtfalhou");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sss", $email, $cpf, $crp);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function criarUsuario($conn, $nome, $email, $cpf, $crp, $sexo, $nascimento ,$senha1, $descricao){
    $sql = "INSERT INTO psicologo (nomePsicologo, emailPsicologo, CPFPsicologo, CRP, sexoPsicologo, nascimentoPsicologo, senhaPsicologo, descricaoPsicologo) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../pages/cadastrar_psicologo.php?error=stmtfalhou");
        exit();
    }
    $hashedSenha = password_hash($senha1, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssssssss", $nome, $email, $cpf, $crp, $sexo, $nascimento, $hashedSenha, $descricao);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../pages/cadastrar_psicologo.php?error=none");
    exit();
}

//LOGIN

function loginUser($conn, $crp, $senha1){
    $uidExists = uidExists($conn, $email, $cpf, $crp);

    if ($uidExists === false){
        header("location: ../pages/login.php?error=loginerrado");
        exit();
    }

    $senhaHashed = $uidExists["senhaPsicologo"];
    $checkSenha = password_verify($senha1, $senhaHashed);

    if ($checkSenha === false){
        header("location: ../pages/login.php?error=senhaerrada");
        exit();
    }
    else if ($checkSenha === true){
        session_start();
        $_SESSION["idpsicologo"] = $uidExists["IDPsicologo"];
        $_SESSION["crppsicologo"] = $uidExists["CRP"];
        header("location: ../pages/dashboard_psicologo/dashboard_psicologo.php");
        exit();
    }
}
?>