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

function uidExists($conn, $email, $cpf){
    $sql = "SELECT * FROM paciente WHERE emailPaciente = ? OR CPFPaciente = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../pages/cadastrar_paciente.php?error=stmtfalhou");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $email, $cpf);
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

function criarUsuario($conn, $nome, $email, $cpf, $sexo, $estado_civil, $nascimento, $senha1){
    $sql = "INSERT INTO paciente (nomePaciente, emailPaciente, CPFPaciente, sexoPaciente, estado_civilPaciente, nascimentoPaciente, senhaPaciente) VALUES (?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../pages/cadastrar_paciente.php?error=stmtfalhou");
        exit();
    }

    $hashedSenha = password_hash($senha1, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssssss", $nome, $email, $cpf, $sexo, $estado_civil, $nascimento, $hashedSenha);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../pages/cadastrar_paciente.php?error=none");
    exit();
}

//LOGIN

function loginUser($conn, $email, $senha1){
    $uidExists = uidExists($conn, $email, $cpf);

    if ($uidExists === false){
        header("location: ../pages/login.php?error=loginerradoPA");
        exit();
    }

    $senhaHashed = $uidExists["senhaPaciente"];
    $checkSenha = password_verify($senha1, $senhaHashed);

    if ($checkSenha === false){
        header("location: ../pages/login.php?error=senhaerrada");
        exit();
    }
    else if ($checkSenha === true){
        session_start();
        $_SESSION["idpaciente"] = $uidExists["IDPaciente"];
        $_SESSION["emailpaciente"] = $uidExists["emailPaciente"];
        header("location: ../pages/dashboard_paciente/dashboard_paciente.php");
        exit();
    }
}
?>