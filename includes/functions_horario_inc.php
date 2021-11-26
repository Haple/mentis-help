<?php

include_once('db_inc.php');

function criarHorario($conn, $refID, $dia, $hora, $link){
    $sql = "INSERT INTO adicionar_horario (Ref_IDPsicologo, dia, hora, link) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../pages/dashboard_psicologo/DBcronograma.php?error=stmtfalhou");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssss", $refID, $dia, $hora, $link);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../pages/dashboard_psicologo/DBcronograma.php?error=none");
    exit();
}
?>
