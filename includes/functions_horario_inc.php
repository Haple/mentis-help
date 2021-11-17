<?php

include_once '../pages/dashboard_psicologo/DBperfil_piscologo.php';
include_once('../../includes/db_inc.php');

function criarHorario($conn, $dia, $hora){
    $sql = "INSERT INTO adicionar_horario (dia, hora) VALUES (?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../pages/dashboard_psicologo/DBcronograma.php?error=stmtfalhou");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $dia, $hora);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../pages/dashboard_psicologo/DBcronograma.php?error=none");
    exit();
}

?>