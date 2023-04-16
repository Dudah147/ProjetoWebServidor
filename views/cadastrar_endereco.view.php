<div id="container_cadEnd">
    <span id="text_cadEnd">Cadastrar Endereço</span>
    <hr id="underline">

    <div id="cadEnd">
        <form id="form" action="cadastrar_endereco.php?acao=cadastrar" method="POST">
            <div class="input-group">
                <div class="input-box">
                    <label>CEP:</label>
                    <input type="text" name="cep" id="cep" placeholder="XXXXX-XXX">
                    <button class="busca" type="button">Buscar</button>
                    <i class="img-success"><img src="img/success-icon.svg" alt=""></i>
                    <i class="img-error"><img src="img/error-icon.svg" alt=""></i>

                    <small>Error message</small>
                </div>
                <div class="input-box">
                    <label>Rua:</label>
                    <input type="text" name="rua" id="street">
                    <i class="img-success"><img src="img/success-icon.svg" alt=""></i>
                    <i class="img-error"><img src="img/error-icon.svg" alt=""></i>

                    <small>Error message</small>
                </div>
                <div class="input-box">
                    <label>Bairro:</label>
                    <input type="text" name="bairro" id="district">
                    <i class="img-success"><img src="img/success-icon.svg" alt=""></i>
                    <i class="img-error"><img src="img/error-icon.svg" alt=""></i>

                    <small>Error message</small>
                </div>
                <div class="input-box">
                    <label>Cidade:</label>
                    <input type="text" name="cidade" id="city">
                    <i class="img-success"><img src="img/success-icon.svg" alt=""></i>
                    <i class="img-error"><img src="img/error-icon.svg" alt=""></i>

                    <small>Error message</small>
                </div>
                <div class="input-box">
                    <label>Estado:</label>
                    <input type="text" name="estado" id="state">
                    <i class="img-success"><img src="img/success-icon.svg" alt=""></i>
                    <i class="img-error"><img src="img/error-icon.svg" alt=""></i>

                    <small>Error message</small>
                </div>
                <div class="input-box">
                    <label>Número:</label>
                    <input type="number" name="numero" id="number">
                    <i class="img-success"><img src="img/success-icon.svg" alt=""></i>
                    <i class="img-error"><img src="img/error-icon.svg" alt=""></i>

                    <small>Error message</small>
                </div>
                <div class="botoes">
                    <button id="btnEnviar" type="submit">Enviar</button>
                    <button type="reset">Excluir</button>
                </div>
            </div>
        </form>
    </div>
</div>