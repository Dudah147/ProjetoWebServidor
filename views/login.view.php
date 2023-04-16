<div id="container_login">
    <span id="text_login">Login</span>
    <hr id="underline">
    <div id="login">
        <div class="cadastro">  
            <?php 
                require("controllers/validar_login.controller.php");
                echo $error ?? '';
            ?>
            <form id="form" action="" method="POST">
                <div class="input-group">
                    <div class="input-box">
                        <label>E-mail:</label>
                        <input type="text" name="email" id="email">
                        <i class="img-success"><img src="img/success-icon.svg" alt=""></i>
                        <i class="img-error"><img src="img/error-icon.svg" alt=""></i>

                        <small>Error message</small>
                    </div>
                    <div class="input-box">
                        <label>Senha:</label>
                        <input type="password" name="senha" id="senha">
                        <i class="img-success"><img src="img/success-icon.svg" alt=""></i>
                        <i class="img-error"><img src="img/error-icon.svg" alt=""></i>

                        <small>Error message</small>
                    </div>
                    <div class="botoes">
                        <button id="entrar" type="submit">ENTRAR</button>
                        <div class="row">
                            <hr>
                            <a href="cadastro.php" id="cadastrar">Ainda não tenho cadastro</a>
                            <hr>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="logado">
            <h1 id="boas-vindas" style="text-align: center;">Olá,</h1>
            <h3 style="text-align: center;">Você já está logado!</h3>
            <button type="button" id="sair">Sair</button>
        </div>
    </div>
</div>