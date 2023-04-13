<form id="form" action="cadastro.php?acao=cadastro" method="POST">
<div class="input-group">
    <div class="input-box">
        <label>Nome:</label>
        <input type="text" name="nome" id="name">
        <i class="img-success"><img src="img/success-icon.svg" alt=""></i>
        <i class="img-error"><img src="img/error-icon.svg" alt=""></i>
        <small>Error message</small>
    </div>
    <div class="input-box">
        <label>CPF:</label>
        <input type="text" name="cpf" id="cpf" placeholder="123.456.789-10">
        <i class="img-success"><img src="img/success-icon.svg" alt=""></i>
        <i class="img-error"><img src="img/error-icon.svg" alt=""></i>
        <small>Error message</small>
    </div>
    <div class="input-box">
        <label>Data de Nascimento:</label>
        <input type="text" name="nascimento" id="nascimento" placeholder="DD/MM/YYYY">
        <i class="img-success"><img src="img/success-icon.svg" alt=""></i>
        <i class="img-error"><img src="img/error-icon.svg" alt=""></i>
        <small>Error message</small>
    </div>
    <div class="input-box">
        <label>E-mail:</label>
        <input type="email" name="email" id="email" placeholder="exemplo@email.com">
        <i class="img-success"><img src="img/success-icon.svg" alt=""></i>
        <i class="img-error"><img src="img/error-icon.svg" alt=""></i>
        <small>Error message</small>
    </div>
    <div class="input-box">
        <label>Senha:</label>
        <input type="password" name="senha" id="passwords">
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
<!-- 

<form action="cadastro.php?acao=cadastro" method="POST">
    <input type="text" name="nome">
    <button type="submit">Enviar</button>
</form> -->