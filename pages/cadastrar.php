<?php
    include_once 'header.php'
?>
<div class="container pt-5">
    <div class="row">
        <div class="col-md p-5 d-grid">
            <a href="cadastrar_psicologo.php" class="btn card-cadastro text-light pt-5">
                <i style="font-size: 6rem;" class="bi bi-clipboard-plus"></i>
                <h1>Psicólogo</h1>
                <p>Clique aqui caso deseja se cadastrar como um psicólogo!</p>
            </a>
        </div>
        <div class="col-md p-5 d-grid">
            <a href="cadastrar_paciente.php" class="btn card-cadastro text-light pt-5">
                <i style="font-size: 6rem;" class="bi bi-person"></i>
                <h1>Paciente</h1>
                <p>Clique aqui caso deseja se cadastrar como um paciente!</p>
            </a>
        </div>
    </div>
</div>

<div class="container pt-5 text-center">
    <div class="pb-5">
        <p class="lead">Já possui uma conta? clique no botão abaixo para logar!</p>
        <a href="login.php" class="btn section-btn2">Login</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
</script>
</body>

</html>