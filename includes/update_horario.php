<?php
include 'db_inc.php';
$id = $_GET['id_upd'];

if(isset($_GET['upd_horario'])){
  
    $sql="UPDATE adicionar_horario SET Ref_IDPaciente = '$novoid', NomePaciente = '$novonome' WHERE IDadd_horario = id_upd";
}

?>