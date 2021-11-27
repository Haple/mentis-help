<?php

if (isset($_POST["cadastrar_horario"])) {

    $dia = $_POST["dia"];
    $hora = $_POST["hora"];
    $refID = $_POST["id"];
    
    require_once 'db_inc.php';
    require_once 'functions_horario_inc.php';

    criarHorario($conn, $refID, $dia, $hora);

}
else{
    header("location: ../pages/dashboard_psicologo/DBcronograma.php");
}

?>
