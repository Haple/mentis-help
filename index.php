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
    <link rel="stylesheet" href="css/style.css">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="icon" href="resources/favicon.png">
</head>

<body>
    <!-- Navbar -->
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light navbar-font pt-3 pb-3">
            <div class="container-fluid">
                <a class="navbar-brand dash-title" href="index.php">
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
                            <a class="nav-link active" aria-current="page" href="index.php">Início</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#quem">Sobre</a>
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
                            echo "<a href='pages/dashboard_paciente/dashboard_paciente.php.php' class='navbar-font btn me-2 section-btn2' type='button'><i class='bi bi-arrow-return-right'></i> Área do Paciente</a>";
                            echo "<a href='includes/logout_inc.php' class='navbar-font btn navbar-login_sair' type='button'>Sair</a>";
                            echo "</form>";
                        }
                        else if(isset($_SESSION["idpsicologo"])){
                            echo "<form class='d-flex'>";
                            echo "<a href='pages/dashboard_psicologo/dashboard_psicologo.php' class='navbar-font btn me-2 section-btn2' type='button'><i class='bi bi-arrow-return-right'></i> Área do Psicólogo</a>";
                            echo  "<a href='includes/logout_inc.php' class='navbar-font btn navbar-login_sair' type='button'>Sair</a>";
                            echo "</form>";
                        }
                        else{
                            echo "<form class='d-flex'>";
                            echo "<a href='pages/cadastrar.php' class='navbar-font btn me-2 section-btn2' type='button'><i class='bi bi-arrow-return-right'></i> Cadastrar</a>";
                            echo "<a href='pages/login.php' class='navbar-font btn navbar-login_sair' type='button'>Login</a>";
                            echo "</form>";
                        }
                    ?>
                </div>
            </div>
        </nav>
    </div>
    <!-- Showcase -->
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
            <img class="img-fluid d-none d-md-block" width="560" height="560" src="resources/mental.png" alt="">
        </div>
    </section>
    <!-- Como Funciona  -->
    <section id="funciona" class="section-color pt-5 pb-5">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md">
                    <img src="resources/doctor.png" class="img-fluid d-none d-md-block" alt="">
                </div>
                <div class="col-md p-5">
                    <h2>Como Funciona</h2>
                    <p class="lead subtopic-content">A proposta do projeto é disponibilizar informações como sintomas,
                        causas e tratamentos sobre as diferentes doenças mentais mais comuns nesta faixa etária, assim
                        como fornecer o apoio de profissionais de saúde mental (psicólogos). Assim que um jovem tiver o
                        desejo de realizar uma consulta, ele poderá entrar em contato com um profissional e decidir uma
                        data para realizar sua consulta. </p>

                </div>
            </div>
    </section>
    <!-- Quem Somos -->
    <section id="quem" class="pt-5 pb-5">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md p-5">
                    <h2>Quem Somos</h2>
                    <p class="lead subtopic-content">Nós somos um grupo de estudantes que procuram ajudar outros jovens,
                        principalmente que ainda estejam no âmbito escolar, a lidar com as frustrações e o estresse
                        que esse período da vida costuma gerar nas pessoas.</p>
                    <p class="lead subtopic-content">Criamos este projeto com a intenção de oferecer suporte psicológico
                        para esses
                        jovens que estão tendo dificuldades para lidar com eventos comuns na fase da adolescência,
                        sendo eles eventos gerais, como vestibulares, graduações e trabalho quando dificuldades
                        pessoais.</p>
                </div>
                <div class="col-md">
                    <img src="resources/team.png" class="img-fluid d-none d-md-block" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- Advantages
    <section class="pt-5 pb-5" style="background-color: #96CDD1;">
        <div class="container">
            <div id="carouselExampleControls" class="carousel slide text-center text-light" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <i class="bi bi-laptop" style="font-size: 50px;"></i>
                        <h3>Consulte-se sem sair de casa!</h3>
                        <p class="lead">As sessões psicoterapêuticas são feitas de forma fácil, rápida e online.</p>
                    </div>
                    <div class="carousel-item">
                        <i class="bi bi-calendar-week" style="font-size: 50px;"></i>
                        <h3>Consulta feita quando você quiser!</h3>
                        <p class="lead">O paciente pode selecionar a data e hora mais favorável para ele realizar a
                            consulta.</p>
                    </div>
                    <div class="carousel-item">
                        <i class="bi bi-chat-square-text" style="font-size: 50px;"></i>
                        <h3>Converse com profissionais de qualidade!</h3>
                        <p class="lead">A plataforma conta com diversos psicólogos prontos para fornecer o devido
                            atendimento</p>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
    Contato 
    <section id="contato" class="text-dark pt-5">
        <div class="container">
            <h1 class="text-center pt-2">Entre em contato!</h1>
            <p class="text-center text-secondary">Utilize este espaço para compartilhar seus
                pensamentos em relação à plataforma ou perguntar algo caso surja qualquer dúvida!</p>
            <div class="row align-items-center justify-content-between">
                <div class="col-md">
                    <form>
                        <div class="mb-3">
                            <div class="form-floating">
                                <input type="email" name="email" class="form-control" id="floatingSelectGrid"
                                    placeholder="Insira seu email" required>
                                <label for="floatingSelectGrid">Email:</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-floating">
                                <input type="text" name="nome" class="form-control" id="floatingSelectGrid"
                                    placeholder="Insira seu nome" required>
                                <label for="floatingSelectGrid">Nome:</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-floating">
                                <textarea class="form-control" name="msg" placeholder="deixe sua mensagem"
                                    id="floatingTextarea2" style="height: 140px"></textarea>
                                <label for="floatingTextarea2">Insira sua mensagem</label>
                            </div>
                        </div>
                        <button type="submit" class="btn section-btn text-light mb-3">Enviar</button>
                    </form>
                </div>
                <div class="col-md">
                    <img src="resources/contact.png" class="img-fluid d-none d-md-block" alt="">
                </div>
            </div>
        </div>
    </section>
         -->
    <!-- Footer -->
    <footer class="p-5 text-dark text-center position-relative section-color">
        <div class="container">
            <p>Copyright &copy; 2021 Mentis</p>
        </div>
    </footer>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
</body>

</html>