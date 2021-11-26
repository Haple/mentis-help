<?php
session_start();
include_once('../../includes/db_inc.php');
$id = $_GET["id_agendar"];
$currentUser = $_SESSION['idpaciente'];
if(isset($_POST["agendar"])){
    $id_psi = $_POST["id_psi"];
    $id_pa = $_POST["id_pa"];
    $id_hora = $_POST["id_hora"];
    $nome_psi = $_POST["nome_psi"];
    $email_psi = $_POST["email_psi"];
    $dia_c = $_POST["dia_c"];
    $hora_c = $_POST["hora_c"];
    $link_c = $_POST["link_c"];

    $query= "INSERT INTO consulta (IDPsicologo_c, IDPaciente_c, IDHorario, nomePsicologo_c, emailPsicologo_c,
     dia_c, hora_c, link_c) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
    //$queryy= "UPDATE adicionar_horario SET disponibilidade = 'Indisponível' WHERE IDadd_horario = '$id';"
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $query)){
        header("location: DBcronograma.php?error=stmtfalhou");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssssssss",  $id_psi, $id_pa, $id_hora, $nome_psi, $email_psi, $dia_c, $hora_c, $link_c);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: dashboard_paciente.php?error=none");
    exit();
}
?>

<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mentis</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet">
    <!-- My CSS -->
    <link rel="stylesheet" href="../../css/style.css">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="icon" href="../../resources/favicon.png">
</head>

<div class="p-5">
    <div class="container d-flex justify-content-center">
            <div class="container pt-5 pe-5 ps-5">
                <div class="time-table pt-4">
                    <table class="table table-hover text-center">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">ID do Psicólogo</th>
                                <th scope="col">Dia</th>
                                <th scope="col">Hora</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Email</th>
                                <th scope="col">Sexo</th>
                                <th scope="col">Idade</th>
                                <th scope="col">Link</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        $sql = "select (YEAR(CURDATE()) - YEAR(nascimentoPsicologo)) - 
                        (right(CURDATE(),5) < right(nascimentoPsicologo,5)) as idade, i.IDPsicologo,
                         i.nomePsicologo, i.emailPsicologo, i.sexoPsicologo, i.nascimentoPsicologo, 
                         h.dia, h.hora, h.link, h.IDadd_horario from psicologo as i JOIN adicionar_horario as h on 
                         i.IDPsicologo = h.Ref_IDPsicologo WHERE IDadd_horario = '$id';";
                        $rs = mysqli_query($conn, $sql);
                        
                        while($row = mysqli_fetch_assoc($rs)){
                        ?>
                            <tr>
                                <td><?=  $row["IDadd_horario"] ?></td>
                                <td><?=  $row["IDPsicologo"] ?></td>
                                <td><?=  $row["dia"] ?></td>
                                <td><?=  $row["hora"] ?></td>
                                <td><?=  $row["nomePsicologo"] ?></td>
                                <td><?=  $row["emailPsicologo"] ?></td>
                                <td><?=  $row["sexoPsicologo"] ?></td>
                                <td><?=  $row["idade"] ?></td>
                                <td><?=  $row["link"] ?></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <form method="post">
                    <div class="mb-3">
                        <div class="form-floating">
                            <input type="hidden" name="link_c" class="form-control" value="<?php echo $row['link']; ?>"
                                id="floatingInputGrid" placeholder="insira seu email" required>
                            <label for="floatingInputGrid"></label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-floating">
                            <input type="hidden" name="dia_c" class="form-control" value="<?php echo $row['dia']; ?>"
                                id="floatingInputGrid" placeholder="insira seu email" required>
                            <label for="floatingInputGrid"></label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-floating">
                            <input type="hidden" name="hora_c" class="form-control" value="<?php echo $row['hora']; ?>"
                                id="floatingInputGrid" placeholder="insira seu email" required>
                            <label for="floatingInputGrid"></label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-floating">
                            <input type="hidden" name="id_psi" class="form-control"
                                value="<?php echo $row['IDPsicologo']; ?>" id="floatingInputGrid"
                                placeholder="insira seu email" required>
                            <label for="floatingInputGrid"></label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-floating">
                            <input type="hidden" name="nome_psi" class="form-control"
                                value="<?php echo $row['nomePsicologo']; ?>" id="floatingInputGrid"
                                placeholder="insira seu email" required>
                            <label for="floatingInputGrid"></label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-floating">
                            <input type="hidden" name="email_psi" class="form-control"
                                value="<?php echo $row['emailPsicologo']; ?>" id="floatingInputGrid"
                                placeholder="insira seu email" required>
                            <label for="floatingInputGrid"></label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-floating">
                            <input type="hidden" name="id_hora" class="form-control"
                                value="<?php echo $row['IDadd_horario']; ?>" id="floatingInputGrid"
                                placeholder="insira seu email" required>
                            <label for="floatingInputGrid"></label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-floating">
                            <input type="hidden" name="id_pa" value="<?php echo $currentUser; ?>" class="form-control"
                                id="floatingSelectGrid" placeholder="insira sua senha" required>
                            <label for="floatingSelectGrid"></label>
                        </div>
                    </div>
                    <button type="submit" name="agendar" class="btn section-btn2 navbar-font">Confirmar</button>
                    <a href="dashboard_paciente.php" type="submit" class="btn btn-outline-secondary navbar-font ms-2">Cancelar</a>
                </form>
                <?php
                        }
                    ?>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
</script>
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">
$("#crp_mascara").mask("00/0000");
</script>
</body>

</html>