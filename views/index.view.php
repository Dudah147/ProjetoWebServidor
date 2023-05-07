<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" type="text/css" href="CSS/HomePage.css" media="screen" />
</head>

<body style=" margin: 0; padding: 0; font-size: 16px;font-family: Verdana, Geneva, Tahoma, sans-serif; margin-left: 10;">

    <?php require "layout/header.view.php" ?>

    <div id="container">
        <br>

        <div>
            <br><br>

            <section class="carousel" style="width: 800px; height: 400px; display: block; margin-left: auto;margin-right: auto;">
                <div class="paineis">

                    <article class="page1"><img src="https://diariodonordeste.verdesmares.com.br/image/contentid/policy:1.3277542:1663012513/Pizza%20de%20Calabresa.jpg?f=16x9&h=240&w=425&$p$f$h$w=4bfebf0" alt=""></article>
                    <article class="page2"><img src="https://media-cdn.tripadvisor.com/media/photo-s/17/10/0d/0f/hot-and-spicy.jpg" alt=""></article>
                    <article class="page3"><img src="https://s2.glbimg.com/wMQRG2vmN_dDJ-1HrSwGOKEbZak=/0x0:1080x608/924x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_e84042ef78cb4708aeebdf1c68c6cbd6/internal_photos/bs/2021/e/n/G9IuruRaezxqgmwozOyg/capa-materia-gshow-49-.png" alt=""></article>
                    <article class="page4"><img src="https://cdn.panelinha.com.br/receita/1443495600000-Pizza-de-mucarela-caseira.jpg" alt=""></article>
                    <article class="page5"><img src="https://cdn.panelinha.com.br/receita/1443495600000-Pizza-de-mucarela-caseira.jpg" alt=""></article>
                </div>
            </section>
            <br><br>

            <div style="text-align: center;">
                <a style="font-size: 10px;  ">Clique aqui e faça já seu pedido!</a>
                <br>
            </div>

            <div id="promocoes" style="background-color: rgb(215, 155, 14); margin: 10px 90px;border-radius: 40px; height: 650px;">
                <br>
                <p style=" width: 6em; margin-left: auto; margin-right: auto; font-size: 26px;color: aliceblue;"><b>PROMOÇÕES</b></p>

                <div class="img-container" style="display: flex; flex-direction: row ; flex-wrap:wrap;">
                    <img src="img/1.png" alt="" style="width: 300px;  margin-left: 80px;  margin-bottom: 30px;">
                    <img src="img/3.png" alt="" style="width: 300px;  margin-left: 60px;">
                    <img src="img/5.png" alt="" style="width: 300px;  margin-left: 60px;">
                    <img src="img/4.png" alt="" style="width: 300px;  margin-left: 80px;">
                    <img src="img/2.png" alt="" style="width: 300px;  margin-left: 60px;">
                    <img src="img/6.png" alt="" style="width: 300px;  margin-left: 60px;">
                </div>
            </div>
        </div>
        <br><br><br><br>


        <div id="contato" style="display: flex; flex-direction: row;">
            <div style=" width: 100%;color:aliceblue ;margin-top: 100px;  display: flex; flex-direction: column;background-color: #000000; align-items: center;">
                <h1>Endereço</h1>
                <p>R. Doutor Washington Subtil Chueire, 330 | Jardim Carvalho| Ponta Grossa - PR</p>
                <p>42 99999-9999</p>
            </div>


            <div class="formulario">

                <form class="form" action="" style="background-color: gold">
                    <div class="form-item col-responsive">
                        <input class="input" type="text" name="nome" required="required" id="name" />
                        <label class="label" for="nome">Nome</label>
                    </div>

                    <div class="form-item col-responsive">
                        <input class="input" type="text" name="email" required="required" id="email" />
                        <label class="label" for="email">E-mail</label>
                    </div>

                    <div class="form-item">
                        <input class="input" type="text" name="assunto" required="required" id="assunto" style="width: 400px;" />
                        <label class="label" for="assunto">Assunto</label>
                    </div>

                    <div class="form-item">
                        <textarea class="textarea" name="mensagem" required="required" id="textarea" style="width: 400px;"></textarea>
                        <label class="label" for="mensagem">mensagem</label>
                    </div>

                    <div class="form-item">
                        <input class="botao" type="submit" style="background-color: #000000; width: 500px;color: aliceblue;" value="Enviar" />
                    </div>
                </form>

            </div><!--Class Formulario-->
        </div>
    </div>

    <?php
    require "controllers/carrinho.controller.php";
    require "controllers/usuario.controller.php";
    // require('./controllers/manipularBanco.controller.php');
    // $con = new ManipularBanco("localhost", "root", "", "ProjetoWebServidor");
    // $con->conectarBanco();
    ?>

    <script type="text/javascript" src="JS/usuario.js"></script>
    <script type="text/javascript" src="JS/carrinho.js"></script>
</body>

</html>