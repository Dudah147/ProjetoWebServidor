<div id="container">
<span id="text_login">Login</span>
<hr id="underline">
<div id="login">
    <div class="cadastro">  
        <div class="inputgroup">
            <h1 id="boas-vindas" style="text-align: center;">Olá, <?php echo $_SESSION['nome'];?></h1>
            <h3 style="text-align: center;">Você já está logado!</h3>
            <form action="controllers/deslogar.controller.php?action=deslogar" method="POST">
                <button type="submit" id="sair">Sair</button>
            </form>
        </div>
    </div>
</div>

