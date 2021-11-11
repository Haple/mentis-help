<?php
    include_once 'header.php'
?>
<div class="cadastro-body p-5">
    <div class="container d-flex justify-content-center">
        <div class="card-form2 shadow">
            <div class="container pt-5 pe-5 ps-5">
                <form action="../includes/cadastrar_psicologo_inc.php" method="post">
                    <h3 class="card-title text-center mb-4"><i style="font-size: 2rem;"
                            class="bi bi-clipboard-plus card-title"></i>
                        Cadastro - Psicólogo</h3>
                    <div class="mb-3">
                        <div class="form-floating">
                            <input type="text" name="nome" class="form-control" id="floatingInputGrid"
                                placeholder="insira seu nome" required>
                            <label for="floatingInputGrid">Nome:<span class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-floating">
                            <input type="email" name="email" class="form-control" id="floatingInputGrid"
                                placeholder="insira seu email" required>
                            <label for="floatingInputGrid">Endereço de Email:<span class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md mb-3">
                            <div class="form-floating">
                                <input type="text" name="cpf" class="form-control" id="cpf_mascara"
                                    placeholder="insira seu cpf" required>
                                <label for="cpf_mascara">CPF:<span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-md mb-3">
                            <div class="form-floating">
                                <input type="text" name="crp" class="form-control" id="crp_mascara"
                                    placeholder="insira seu crp" required>
                                <label for="crp_mascara">CRP:<span class="text-danger">*</span></label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md mb-3">
                            <div class="form-floating">
                                <select name="sexo" class="form-select" id="floatingSelectGrid"
                                    aria-label="Floating label select example">
                                    <option selected>Selecione</option>
                                    <option value="Feminino">Feminino</option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Outros">Outros</option>
                                </select>
                                <label for="floatingSelectGrid">Sexo<span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-md mb-3">
                            <div class="form-floating">
                                <input type="date" name="nascimento" class="form-control" id="floatingSelectGrid"
                                    placeholder="insira sua data" required>
                                <label for="floatingSelectGrid">Data de Nascimento:<span
                                        class="text-danger">*</span></label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-floating">
                            <input type="password" name="senha1" class="form-control" id="floatingSelectGrid"
                                placeholder="insira sua senha" required>
                            <label for="floatingSelectGrid">Senha:<span class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-floating">
                            <input type="password" name="senha2" class="form-control" id="floatingSelectGrid"
                                placeholder="Confirme sua senha" required>
                            <label for="floatingSelectGrid">Confirme sua Senha:<span
                                    class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-floating">
                            <textarea class="form-control" name="descricao" placeholder="deixe sua descrição"
                                id="floatingTextarea2" style="height: 100px"></textarea>
                            <label for="floatingTextarea2">Descrição:</label>
                        </div>
                    </div>
                    <?php
                        if(isset($_GET["error"])){
                            if($_GET["error"] == "senhasdiferentes"){
                                echo "<div class='alert alert-danger'>Senhas diferentes.</div>";
                            }
                            else if ($_GET["error"] == "emailutilizado"){
                                echo "<div class='alert alert-danger'>Email, CPF ou CRP já cadastrados.</div>";
                            }
                            else if ($_GET["error"] == "none"){
                                echo "<div class='alert alert-success'>Cadastro concluído!</div>";
                            }
                        }
                    ?>
                    <button type="submit" name="cadastrar_psicologo"
                        class="btn section-btn2">Cadastrar</button>
                    <div class="container text-center">
                        <div>
                            <p>Já possui uma conta? clique abaixo para logar!</p>
                            <a href="login.php" class="btn section-btn2">Login</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
</script>
<script>
var el = document.getElementById("wrapper");
var toggleButton = document.getElementById("menu-toggle");

toggleButton.onclick = function() {
    el.classList.toggle("toggled");
};
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">
$("#cpf_mascara").mask("000.000.000-00");
$("#crp_mascara").mask("00/0000");
</script>