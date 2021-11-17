<?php
    session_start();
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
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="icon" href="../resources/favicon2.png">
</head>

<body>
    <!-- Navbar -->
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light navbar-font pt-3 pb-3">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.php">
                    <div class="logo me-3">Mentis<span class="logo-ponto">.</span></div>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active underlink" aria-current="page" href="../index.php">Início</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link underlink" href="../index.php#quem">Sobre</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Saúde Mental
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="pages/health_pages/ansiedade.php">Ansiedade</a></li>
                                <li><a class="dropdown-item" href="pages/health_pages/bipolaridade.php">Bipolaridade</a></li>
                                <li><a class="dropdown-item" href="pages/health_pages/anorexia.php">Anorexia</a></li>
                                <li><a class="dropdown-item" href="pages/health_pages/bulimia.php">Bulimia</a></li>
                                <li><a class="dropdown-item" href="pages/health_pages/borderline.php">Transtorno Borderline</a></li>
                                <li><a class="dropdown-item" href="pages/health_pages/fobiasocial.php">Fobia Social</a></li>
                                <li><a class="dropdown-item" href="pages/health_pages/burnout.php">Síndrome de Burnout</a></li>
                                <li><a class="dropdown-item" href="pages/health_pages/sindromepanico.php">Síndrome do Pânico</a></li>
                                <li><a class="dropdown-item" href="pages/health_pages/depequimica.php">Dependência Química</a></li>
                            </ul>
                        </li>
                    </ul>
                    <?php
                        if(isset($_SESSION["idpaciente"])){
                            echo "<form class='d-flex'>";
                            echo "<a href='dashboard_paciente/dashboard_paciente.php' class='navbar-font btn me-2 section-btn2' type='button'><i class='bi bi-arrow-return-right'></i> Área do Paciente</a>";
                            echo "<a href='includes/logout_inc.php' class='navbar-font btn navbar-login_sair' type='button'>Sair</a>";
                            echo "</form>";
                        }
                        else if(isset($_SESSION["idpsicologo"])){
                            echo "<form class='d-flex'>";
                            echo "<a href='dashboard_psicologo/dashboard_psicologo.php' class='navbar-font btn me-2 section-btn2' type='button'><i class='bi bi-arrow-return-right'></i> Área do Psicólogo</a>";
                            echo  "<a href='includes/logout_inc.php' class='navbar-font btn navbar-login_sair' type='button'>Sair</a>";
                            echo "</form>";
                        }
                        else{
                            echo "<form class='d-flex'>";
                            echo "<a href='cadastrar.php' class='navbar-font btn me-2 section-btn2' type='button'><i class='bi bi-arrow-return-right'></i> Cadastrar</a>";
                            echo "<a href='login.php' class='navbar-font btn navbar-login_sair' type='button'>Login</a>";
                            echo "</form>";
                        }
                    ?>
                </div>
            </div>
        </nav>
    </div>