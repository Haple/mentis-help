<?php
    session_start();
    include_once('../../includes/db_inc.php');
    $currentUser = $_SESSION['idpsicologo'];
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
                                <a class="nav-link" aria-current="page" href="dashboard_psicologo.php"><i
                                        class="bi bi-chat-left"></i>
                                    Consultas</a>
                            </li>
                            <li class="nav-item me-2">
                                <a class="nav-link" href="DBcronograma.php"><i class="bi bi-calendar-event"></i>
                                    Cronograma</a>
                            </li>
                            <li class="nav-item me-2">
                                <a class="nav-link active me-2" aria-current="page" href="DBperfil_psicologo.php"><i
                                        class="bi bi-person"></i> Perfil</a>
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

    <div class="p-5 container d-flex justify-content-center">
        <div class="card-formDBPsi shadow">
            <div class="container pt-5 pe-5 ps-5">
                <form method="POST">
                    <?php
                        $sql = "SELECT * FROM psicologo WHERE IDPsicologo = $currentUser";
                        $gotResults = mysqli_query($conn, $sql);

                        if($gotResults){
                            if(mysqli_num_rows($gotResults)>0){
                                while($row = mysqli_fetch_array($gotResults)){
                                    //print_r($row);
                                    
                        ?>
                    <h3 class="card-title text-center mb-4"><i style="font-size: 2rem;"
                            class="bi bi-person card-title"></i>
                        Perfil</h3>
                    <div class="mb-3">
                        <div class="form-floating">
                            <input type="text" name="update_nome" value="<?php echo $row['nomePsicologo']; ?>"
                                class="form-control" id="floatingInputGrid" placeholder="insira seu nome">
                            <label for="floatingInputGrid">Nome:</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-floating">
                            <input type="email" name="update_email" value="<?php echo $row['emailPsicologo']; ?>"
                                class="form-control" id="floatingInputGrid" placeholder="insira seu email">
                            <label for="floatingInputGrid">Endereço de Email:</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-floating">
                            <select name="update_sexo" class="form-select" id="floatingSelectGrid"
                                aria-label="Floating label select example">
                                <option selected value="Feminino">Feminino</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Outros">Outros</option>
                            </select>
                            <label for="floatingSelectGrid">Sexo<span class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="update_descricao"
                                value="<?php echo $row['descricaoPsicologo']; ?>" placeholder="deixe sua descrição"
                                id="floatingTextarea2" style="height: 100px"></input>
                            <label for="floatingTextarea2">Descrição:</label>
                        </div>
                    </div>
                    <?php
                        if(isset($_POST['update_psicologo'])){
                            $novonome = $_POST['update_nome'];
                            $novoemail = $_POST['update_email'];
                            $novodesc = $_POST['update_descricao'];
                            $novosexo = $_POST['update_sexo'];

                            $sql="UPDATE psicologo SET nomePsicologo = '$novonome', emailPsicologo = '$novoemail',
                            descricaoPsicologo = '$novodesc', sexoPsicologo = '$novosexo' WHERE IDPsicologo = $currentUser";
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
                    <button type="submit" name="update_psicologo" value="Update"
                        class="btn section-btn2 navbar-font">Atualizar</button>
                </form>
            </div>
        </div>
    </div>
    <?php
                                }
                            }
                        }
                    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
</body>
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">
$("#cpf_mascara").mask("000.000.000-00");
$("#crp_mascara").mask("00/0000");
</script>

</html>