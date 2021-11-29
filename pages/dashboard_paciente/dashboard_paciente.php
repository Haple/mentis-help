<?php
session_start();
include_once('../../includes/db_inc.php');
$currentUser = $_SESSION['idpaciente'];
if (isset($_POST['agendar_hhhorario'])) {
    $novoid = $_POST['id'];
    $novonome = $_POST['nome'];

    $sql = "UPDATE adicionar_horario SET Ref_IDPaciente = '$novoid', NomePaciente = '$novonome' WHERE IDadd_horario = id_upd";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<div class='alert alert-success' role='alert'>Perfil atualizado!</div>";
    } else {
        echo "<div class='alert alert-success' role='alert'>Não foi possível atualizar!</div>";
        die(mysqli_error($conn));
    }
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet">
    <!-- My CSS -->
    <link rel="stylesheet" href="../../css/style.css">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="icon" href="../../resources/favicon.png">
</head>

<body>

    <!-- Navbar -->
    <div class="shadow-sm">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light navbar-font pt-3 pb-3">
                <div class="container-fluid">
                    <a class="navbar-brand dash-title" href="../../index.php">
                        <div class="logo me-3">Mentis<span class="logo-ponto">.</span></div>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item me-2">
                                <a class="nav-link active" aria-current="page" href="dashboard_paciente.php"><i class="bi bi-house"></i>
                                    Área do
                                    Paciente</a>
                            </li>
                            <li class="nav-item me-2">
                                <a class="nav-link" href="DBchats_paciente.php"><i class="bi bi-chat-left"></i>
                                    Consulta</a>
                            </li>
                            <li class="nav-item me-2">
                                <a class="nav-link" href="DBperfil_paciente.php"><i class="bi bi-person"></i> Perfil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-danger" href="../../includes/logout_inc.php"><i class="bi bi-power"></i> Sair</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div class="container">
        <h3 class="navbar-font fs-3 mt-5">Horários Disponíveis</h3>
        <div class="time-table pt-4">
            <table class="table table-hover text-center">
                <thead class="table-light">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Dia</th>
                        <th scope="col">Hora</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Sexo</th>
                        <th scope="col">Idade</th>
                        <th scope="col">Agendar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    error_log("AHA!");

                    $sql = "select (YEAR(CURDATE()) - YEAR(nascimentoPsicologo)) - (right(CURDATE(),5) < right(nascimentoPsicologo,5)) as idade, i.nomePsicologo, i.emailPsicologo, i.sexoPsicologo, i.nascimentoPsicologo, h.dia, h.hora, h.IDadd_horario from psicologo as i JOIN adicionar_horario as h on i.IDPsicologo = h.Ref_IDPsicologo WHERE disponibilidade = 'Disponivel' ORDER by dia;";
                    // $sql = "select * from psicologo as i JOIN adicionar_horario as h on i.IDPsicologo = h.Ref_IDPsicologo WHERE disponibilidade = 'Disponível' ORDER by dia;";
                    $rs = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($rs) > 0) {
                        error_log("AHA! There is something here!");
                    } else {
                        error_log("OH NO! There is nothing here!");
                    }

                    while ($row = mysqli_fetch_assoc($rs)) {

                    ?>
                        <tr>
                            <td><?= $row["IDadd_horario"] ?></td>
                            <td><?= $row["dia"] ?></td>
                            <td><?= $row["hora"] ?></td>
                            <td><?= $row["nomePsicologo"] ?></td>
                            <td><?= $row["emailPsicologo"] ?></td>
                            <td><?= $row["sexoPsicologo"] ?></td>
                            <td><?= $row["idade"] ?></td>
                            <td><a name="upd_horario" type="submit" href="agendar_paciente.php?id_agendar=<?php echo $row['IDadd_horario']; ?>" class="btn section-btn2 fw-bold"> Agendar</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <nav aria-label="Páginas">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- HORÁRIOS 
    <div class="container">
        <form class="col-4 pt-4 d-flex">
            <input class="form-control me-2" type="search" placeholder="Pesquisar..." aria-label="Search">
            <button class="btn section-btn2 fw-bold">Pesquisar</button>
        </form>
        <div class="time-table pt-4">
            <table class="table table-hover text-center">
                <thead class="table-light">
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Sexo</th>
                        <th scope="col">Data de Nascimento</th>
                        <th scope="col">Descrição</th>
                    </tr>
                </thead>
                <tbody>
                    ?php
                        include_once '../../includes/db_inc.php';
                        $sql = "SELECT * FROM psicologo;";
                        $rs = mysqli_query($conn, $sql) or die("Conexão falhou!" . mysqli_error($conn));
                        while($data = mysqli_fetch_assoc($rs)){
                            $id=['IDadd_horario'];
                        ?>
                    <tr>
                        <td>?=$data["nomePsicologo"] ?></td>
                        <td>?=$data["emailPsicologo"] ?></td>
                        <td>?=$data["sexoPsicologo"] ?></td>
                        <td>?=$data["nascimentoPsicologo"] ?></td>
                        <td>?=$data["descricaoPsicologo"] ?></td>
                    </tr>
                    ?php
                        }
                    ?>
                </tbody>
            </table>
        </div>

        <nav aria-label="Páginas">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div> -->

    <!-- MODAL 1 
    <div class="modal fade" id="ver_desc" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Descrição</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ?php
                        include_once '../../includes/db_inc.php';
                        $sql = "SELECT descricaoPsicologo FROM psicologo WHERE ;";
                        $rs = mysqli_query($conn, $sql) or die("Conexão falhou!" . mysqli_error($conn));
                        if($data = mysqli_fetch_assoc($rs)){
                            $id=['IDadd_horario'];
                        ?>
                    <p>?=$data["descricaoPsicologo"] ?></p>
                    ?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <?php
        include_once '../../includes/db_inc.php';
        $currentUser = $_SESSION['idpaciente'];
        $sql = "SELECT * FROM paciente WHERE IDPaciente = $currentUser";
        $gotResults = mysqli_query($conn, $sql);
        if ($gotResults) {
            if (mysqli_num_rows($gotResults) > 0) {
                while ($row = mysqli_fetch_array($gotResults)) {
                    //print_r($row);
        ?>
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Deseja agendar uma consulta neste horário?</p>
                                <form method="post">
                                    <div class="mb-3">
                                        <div class="form-floating">
                                            <input type="hidden" name="id" value="<?php echo $row['IDPaciente']; ?>" class="form-control" id="floatingInputGrid" placeholder="insira o dia de atendimento" required>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-floating">
                                            <input type="hidden" name="nome" value="<?php echo $row['nomePaciente']; ?>" class="form-control" id="floatingInputGrid" placeholder="insira o dia de atendimento" required>
                                        </div>
                                    </div>
                                    <button type="submit" name="agendar_horario" class="btn section-btn2 me-2">Sim</button>
                                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Não</button>
                                </form>
                            </div>
                        </div>
                    </div>
    </div>
<?php
                }
            }
        }
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
</script>
</body>

</html>