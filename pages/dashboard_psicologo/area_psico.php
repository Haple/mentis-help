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
                                <a class="nav-link active" aria-current="page" href="area_psico.php"><i
                                        class="bi bi-camera-video"></i>
                                    Área do Psicólogo</a>
                            </li>
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
                                <a class="nav-link" href="DBperfil_psicologo.php"><i class="bi bi-person"></i>
                                    Perfil</a>
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

    <section class="container text-dark text-center text-md-start pt-3 pb-5">
        <div class="d-sm-flex align-items-center justify-content-between">
            <div>
                <h2>Plataforma Web de gerenciamento e auxílio da saúde mental de jovens.</h2>
                <p class="lead my-3 subtopic-content">O objetivo geral deste projeto é poder oferecer suporte mental a
                    jovens que estejam se sentindo abalados psicologicamente e queiram receber auxílio de profissionais
                    da saúde, assim podendo se consultar com esses psicólogos dentro da plataforma através dos recursos
                    de chats e chamadas de vídeo. </p>
                <a href="#funciona" class="btn btn-lg mb-3 btn-showcase text-light" type="submit">Começar</a>
            </div>
            <img class="img-fluid d-none d-md-block" width="560" height="560" src="../../resources/call.png" alt="">
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
        </script>
</body>

</html>