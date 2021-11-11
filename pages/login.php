<?php
    include_once 'header.php'
?>
<div class="cadastro-body p-5">
    <div class="container d-flex justify-content-center">
        <div class="card-form3 shadow">
            <div class="container pt-5 pe-5 ps-5">
                <h3 class="card-title text-center"><i style="font-size: 2rem;" class="bi bi-door-open" card-title"></i>
                    Login</h3>
                <ul class="nav nav-tabs">
                    <li class="nav-item"><a class="nav-link login-link active" data-bs-toggle="tab"
                            href="#psicologo">Psicólogo</a></li>
                    <li class="nav-item"><a class="nav-link login-link" data-bs-toggle="tab"
                            href="#paciente">Paciente</a>
                    </li>
                </ul>
                <div class="tab-content pt-3">
                    <div class="tab-pane" id="paciente">
                        <form action="../includes/login_paciente_inc.php" method="post">
                            <div class="mb-3">
                                <div class="form-floating">
                                    <input type="email" name="email" class="form-control" id="floatingInputGrid"
                                        placeholder="insira seu email" required>
                                    <label for="floatingInputGrid">Endereço de Email:<span
                                            class="text-danger">*</span></label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-floating">
                                    <input type="password" name="senha1" class="form-control" id="floatingSelectGrid"
                                        placeholder="insira sua senha" required>
                                    <label for="floatingSelectGrid">Senha:<span class="text-danger">*</span></label>
                                </div>
                            </div>
                            <button type="submit" name="logar_paciente" class="btn section-btn2">Login</a>
                        </form>
                    </div>

                    <div class="tab-pane active" id="psicologo">
                        <form action="../includes/login_psicologo_inc.php" method="post">
                            <div class="mb-3">
                                <div class="form-floating">
                                    <input type="text" name="crp" class="form-control" id="crp_mascara"
                                        placeholder="insira seu crp" required>
                                    <label for="crp_mascara">CRP:<span class="text-danger">*</span></label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-floating">
                                    <input type="password" name="senha1" class="form-control" id="floatingSelectGrid"
                                        placeholder="insira sua senha" required>
                                    <label for="floatingSelectGrid">Senha:<span class="text-danger">*</span></label>
                                </div>
                            </div>
                            <?php
                                if(isset($_GET["error"])){
                                    if($_GET["error"] == "loginerradoPA"){
                                        echo "<div class='alert alert-danger'>Email inválido</div>";
                                    }
                                    else if($_GET["error"] == "loginerrado"){
                                        echo "<div class='alert alert-danger'>CRP inválido</div>";
                                    }
                                    else if ($_GET["error"] == "senhaerrada"){
                                        echo "<div class='alert alert-danger'>Senha inválida</div>";
                                    }
                                }
                            ?>
                            <button type="submit" name="logar_psicologo"
                                class="btn section-btn2">Login</button>
                        </form>
                    </div>
                </div>
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