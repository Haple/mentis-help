<?php
    include_once('../../includes/db_inc.php');
    if(isset($_GET["id_excluir"])){
        $id = $_GET["id_excluir"];

        $sql = "DELETE from adicionar_horario where IDadd_horario = $id";
        $result = mysqli_query($conn, $sql);
        if($result){
            header("location: DBcronograma.php");
            exit();
        }
    }
?>