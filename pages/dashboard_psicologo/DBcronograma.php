<?php
    session_start();
    include_once('../../includes/db_inc.php');
    $currentUser = $_SESSION['idpsicologo'];
    if(isset($_POST['cadastrar_horario'])){
        $dia = $_POST['dia'];
        $hora = $_POST['hora'];

        $sql = "INSERT INTO adicionar_horario (Ref_IDPsicologo, dia, hora) VALUES ('$currentUser', ?, ?);";
        $result=mysqli_query($conn, $sql);
                        if($result){
                                echo "<div class='alert alert-success' role='alert'>Perfil atualizado!</div>";
                        }
                        else{
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

<body>

    <!-- Navbar -->
    <div class="shadow-sm">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light navbar-font pt-3 pb-3">
                <div class="container-fluid">
                    <a class="navbar-brand dash-title" href="../../index.php">
                        <div class="logo me-3">Mentis<span class="logo-ponto">.</span></div>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item me-2">
                                <a class="nav-link" href="dashboard_psicologo.php"><i class="bi bi-house"></i>
                                    Área do
                                    Psicólogo</a>
                            </li>
                            <li class="nav-item me-2">
                                <a class="nav-link active" aria-current="page" href="DBcronograma.php"><i
                                        class="bi bi-calendar-event"></i> Cronograma</a>
                            </li>
                            <li class="nav-item me-2">
                                <a class="nav-link" href="DBchats_psicologo.php"><i class="bi bi-chat-left"></i>
                                    Chats</a>
                            </li>
                            <li class="nav-item me-2">
                                <a class="nav-link" href="DBperfil_psicologo.php"><i class="bi bi-person"></i> Pefil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-danger" href="../../includes/logout_inc.php"><i
                                        class="bi bi-power"></i> Sair</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <div class="container">
        <div class="time-date pt-5">
            <button class="btn section-btn2 fw-bold" data-bs-toggle="modal"
                data-bs-target="#adicionar_horario">Adicionar
                Horário +</button>
            <button class="btn section-btn2 ms-3 fw-bold" data-bs-toggle="modal"
                data-bs-target="#visualizar_horario">Visualizar
                Horários <i class="bi bi-eye"></i></button>
        </div>

        <!-- HORÁRIOS -->
        <div class="time-table pt-3">
            <table class="table table-hover text-center">
                <thead class="table-light">
                    <tr>
                        <th scope="col">Data</th>
                        <th scope="col">Horário</th>
                        <th scope="col">Paciente</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td><button class="btn btn-outline-primary">Editar <i class="bi bi-pencil-fill"></i></button>
                        </td>
                        <td><button class="btn btn-outline-danger">Excluir <i class="bi bi-eraser-fill"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        <td><button class="btn btn-outline-primary">Editar <i class="bi bi-pencil-fill"></i></button>
                        </td>
                        <td><button class="btn btn-outline-danger">Excluir <i class="bi bi-eraser-fill"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>Larry the Bird</td>
                        <td>Larry the Bird</td>
                        <td>@twitter</td>
                        <td><button class="btn btn-outline-primary">Editar <i class="bi bi-pencil-fill"></i></button>
                        </td>
                        <td><button class="btn btn-outline-danger">Excluir <i class="bi bi-eraser-fill"></i></button>
                        </td>
                    </tr>
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

    <!-- MODAL 1 -->
    <div class="modal fade" id="adicionar_horario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Adicionar Horário</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="mb-3">
                            <div class="form-floating">
                                <input type="date" name="dia" class="form-control" id="floatingInputGrid"
                                    placeholder="insira o dia de atendimento" required>
                                <label for="floatingInputGrid">Dia:<span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-floating">
                                <input type="time" name="hora" class="form-control" id="floatingInputGrid"
                                    placeholder="insira a hora de atendimento" required>
                                <label for="floatingInputGrid">Hora:<span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <button type="submit" name="cadastrar_horario" class="btn section-btn2">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL 2 -->
    <div class="modal fade" id="visualizar_horario" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Visualizar Horários</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="time-table">
                        <table class="table table-hover text-center">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">Data</th>
                                    <th scope="col">Horário</th>
                                    <th scope="col">Editar</th>
                                    <th scope="col">Excluir</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include_once '../../includes/db_inc.php';
                                    include_once '../../includes/functions_psicologo_inc.php';
                                    $sql = "SELECT dia, hora FROM adicionar_horario;";
                                    $rs = mysqli_query($conn, $sql) or die("Conexão falhou!" . mysqli_error($conn));
                                    while($data = mysqli_fetch_assoc($rs)){
                                        $id=['IDadd_horario'];
                                ?>
                                <tr>
                                    <td><?=$data["dia"] ?></td>
                                    <td><?=$data["hora"] ?></td>
                                    <td><button class="btn btn-outline-primary">Editar <i
                                                class="bi bi-pencil-fill"></i></button>
                                    </td>
                                    <td><a href="../../includes/functions_horario_inc.php?iddelete=<?php echo $id ?>"
                                            class="btn btn-outline-danger">Excluir <i
                                                class="bi bi-eraser-fill"></i></a>
                                    </td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
</body>

</html>