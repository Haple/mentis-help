<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PSPJ</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet">
    <!-- My CSS -->
    <link rel="stylesheet" href="../../css/style.css">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="icon" href="../resources/favicon.png">
</head>

<body>
    <!-- Navbar -->
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light navbar-font pt-3 pb-3">
            <div class="container-fluid">
                <a class="navbar-brand" href="../../index.php">
                    <img src="../../resources/logo2.png" alt="" width="60" height="60"
                        class="img-fluid d-inline-block align-text-top me-2">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active underlink" aria-current="page" href="../../index.php">INÍCIO</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link underlink" href="#">LINK</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link underlink" href="#">LINK</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                DROPDOWN
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item disabled" href="#"
                                        style="color: #96CDD1; font-weight: bolder;">Doenças Mentais</a></li>
                                <li><a class="dropdown-item" href="#">Tópico 1</a></li>
                                <li><a class="dropdown-item" href="#"
                                        style="color: #96CDD1; font-weight: bolder;">Distúrbios Mentais</a></li>
                                <li><a class="dropdown-item" href="#">Tópico 2</a></li>
                                <li><a class="dropdown-item" href="#">Tópico 2</a></li>
                                <li><a class="dropdown-item" href="#">Tópico 2</a></li>
                                <li><a class="dropdown-item" href="#">Tópico 2</a></li>
                                <li><a class="dropdown-item" href="#">Tópico 2</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <a href="../cadastrar.php" class="navbar-font btn me-2 navbar-btn" type="button"><i
                                class="bi bi-arrow-return-right"></i> CADASTRAR</a>
                        <a href="#" class="navbar-font btn underlink" type="button">LOGIN</a>
                    </form>
                </div>
            </div>
        </nav>
    </div>