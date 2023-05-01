<?php
    class ManipularBanco{
        var $host;
        var $user;
        var $senha;
        var $dbase;
        var $conexao;
        function __construct($host, $user, $senha, $dbase) {
            $this->host = $host;
            $this->user = $user;
            $this->senha = $senha;
            $this->dbase = strtolower($dbase);
            $this->conexao = false;
        }
        function criarBanco($dbase){
            try{
                if($con = new mysqli($this->host, $this->user, $this->senha)){
                    $query="CREATE DATABASE $dbase";
                    if(mysqli_query($con, $query)){
                        echo "Criação realizada com sucesso";
                    }else{
                        throw new Exception('Não foi possível criar a base de dados');
                    }
                }else{
                    throw new Exception('Não foi possível conectar com o banco de dados');
                }
            }catch (Exception $e) {
                $log = date('d.m.Y h:i:s')." - Erro ao criar o banco: ".$e->getMessage();
                error_log($log . PHP_EOL, 3, './error/db_error.log');
            }
        }
        function removerBanco($user, $senha){
            try {
                if($user == "root" && $senha == ""){
                    if($con = new mysqli($this->host, $this->user, $this->senha, $this->dbase)){
                        $query="DROP DATABASE $this->dbase";
                        if(!mysqli_query($con, $query)){
                            throw new Exception('Não foi possível excluir a base de dados');
                        }else{
                            mysqli_query($con, $query);
                        }
                    }else{
                        throw new Exception('Não foi possível conectar com o banco de dados');
                    }
                }else{
                    throw new Exception("Não foi possível conectar com o banco de dados: Permissão insuficiente");
                }
            } catch (Exception $e) {
                $log = date('d.m.Y h:i:s')." - Erro ao remover o banco: ".$e->getMessage();
                error_log($log . PHP_EOL, 3, './error/db_error.log');
            }
        }

        function desconectarBanco(){
            try{
                if($this->conexao == true && $con = new mysqli($this->host, $this->user, $this->senha, $this->dbase)){
                    mysqli_close($con);
                    $this->conexao = false;
                }else{
                    throw new Exception("Você já está desconectado!");
                }
            }catch(Exception $e){
                $log = date('d.m.Y h:i:s')." - Erro ao desconectar: ".$e->getMessage();
                error_log($log . PHP_EOL, 3, './error/db_error.log');
            }
        }

        function pesquisarUsuario($usuario){
            try {
                if($this->conexao == true && $con = new mysqli($this->host, $this->user, $this->senha, $this->dbase)){
                    $sql = "SELECT * FROM usuarios WHERE cpf='$usuario' LIMIT 1";
                    if(mysqli_query($con, $sql)){
                        throw new Exception("Não foi possível encontrar o usuário");
                    }
                }
            } catch (Exception $e) {
                $log = date('d.m.Y h:i:s')." - Erro ao pesquisar o usuário: ".$e->getMessage();
                error_log($log . PHP_EOL, 3, './error/db_error.log');
            }
        }

        function pesquisarTabela(string $tabela){
            try {
                if($this->conexao == true && $con = new mysqli($this->host, $this->user, $this->senha, $this->dbase)){
                    $sql = "SELECT * FROM `".$tabela."` LIMIT 1";
                    mysqli_query($con, $sql);
                }
            } catch (Exception $e) {
                if($e->getMessage() == "Table 'projetowebservidor.".$tabela."' doesn't exist"){
                    return False;
                }else{
                    $log = date('d.m.Y h:i:s')." - Erro ao desconectar: ".$e->getMessage();
                    error_log($log . PHP_EOL, 3, './error/db_error.log');
                }
            }
        }

        function criarTabelas(){
            try {
                if($this->conexao == true && $con = new mysqli($this->host, $this->user, $this->senha, $this->dbase)){
                    if($this->pesquisarTabela('enderecos') == False){
                        $query = "CREATE TABLE enderecos (
                        id_endereco INT NOT NULL AUTO_INCREMENT,
                        cpf VARCHAR(60) NOT NULL,
                        cep VARCHAR(60) NOT NULL,
                        rua VARCHAR(60) NOT NULL,
                        bairro VARCHAR(60) NOT NULL,
                        cidade VARCHAR(60) NOT NULL,
                        estado VARCHAR(60) NOT NULL,
                        numero INT(6) NOT NULL,
                        PRIMARY KEY (id_endereco))";

                        if(!mysqli_query($con, $query)){
                            throw new Exception('Não foi possível criar a tabela enderecos desejada');
                        }
                    }

                    if($this->pesquisarTabela('usuarios') == False){
                        $query = "CREATE TABLE usuarios (
                            cpf VARCHAR(60) NOT NULL,
                            nome VARCHAR(30) NOT NULL,
                            nascimento DATE NOT NULL,
                            email VARCHAR(60) NOT NULL,
                            senha VARCHAR(60) NOT NULL,
                            PRIMARY KEY (cpf))";

                        $sql = "ALTER TABLE `enderecos` 
                        ADD FOREIGN KEY (cpf) REFERENCES usuarios(cpf)";

                        if(!mysqli_query($con, $query) && !mysqli_query($con, $sql)){
                            throw new Exception('Não foi possível criar a tabela usuarios desejada');
                        }
                    }

                    if($this->pesquisarTabela('sabores') == False){
                        $query = "CREATE TABLE sabores (
                            id_sabores INT NOT NULL AUTO_INCREMENT,
                            sabores VARCHAR(60) NOT NULL,
                            informacao VARCHAR(60) NOT NULL,
                            tipo VARCHAR(60) NOT NULL,
                            preco VARCHAR(60) NOT NULL,
                            imagem VARCHAR(60) NOT NULL,
                            PRIMARY KEY (id_sabores))";

                        if(!mysqli_query($con, $query)){
                            throw new Exception('Não foi possível criar a tabela sabores desejada');
                        }
                    }

                    if($this->pesquisarTabela('massa') == False){
                        $query = "CREATE TABLE massa (
                            id_massa INT NOT NULL AUTO_INCREMENT,
                            massa VARCHAR(60) NOT NULL,
                            informacao VARCHAR(60) NOT NULL,
                            preco VARCHAR(60) NOT NULL,
                            PRIMARY KEY (id_massa))";

                        if(!mysqli_query($con, $query)){
                            throw new Exception('Não foi possível criar a tabela massa desejada');
                        }
                    }

                    if($this->pesquisarTabela('borda') == False){
                        $query = "CREATE TABLE borda (
                            id_borda INT NOT NULL AUTO_INCREMENT,
                            borda VARCHAR(60) NOT NULL,
                            preco VARCHAR(60) NOT NULL,
                            PRIMARY KEY (id_borda))";

                        if(!mysqli_query($con, $query)){
                            throw new Exception('Não foi possível criar a tabela borda desejada');
                        }
                    }

                    if($this->pesquisarTabela('tamanho') == False){
                        $query = "CREATE TABLE tamanho (
                            id_tamanho INT NOT NULL AUTO_INCREMENT,
                            tamanho VARCHAR(60) NOT NULL,
                            informacao VARCHAR(60) NOT NULL,
                            qtd_sabor INT NOT NULL,
                            preco VARCHAR(60) NOT NULL,
                            PRIMARY KEY (id_tamanho))";

                        if(!mysqli_query($con, $query)){
                            throw new Exception('Não foi possível criar a tabela tamanho desejada');
                        }
                    }

                    if($this->pesquisarTabela('item_pedido') == False){
                        $query = "CREATE TABLE item_pedido (
                            id_item_pedido INT NOT NULL AUTO_INCREMENT,
                            id_tamanho INT NOT NULL,
                            id_borda INT NOT NULL,
                            id_massa INT NOT NULL,
                            id_sabores INT NOT NULL,
                            valor DOUBLE NOT NULL,
                            PRIMARY KEY (id_item_pedido),
                            FOREIGN KEY (id_tamanho) REFERENCES tamanho(id_tamanho),
                            FOREIGN KEY (id_borda) REFERENCES borda(id_borda),
                            FOREIGN KEY (id_massa) REFERENCES massa(id_massa),
                            FOREIGN KEY (id_sabores) REFERENCES sabores(id_sabores))";

                        if(!mysqli_query($con, $query)){
                            throw new Exception('Não foi possível criar a tabela item_pedido');
                        }
                    }

                    if($this->pesquisarTabela('pedidos') == False){
                        $query = "CREATE TABLE pedidos (
                            id_pedido INT NOT NULL AUTO_INCREMENT,
                            cpf  VARCHAR(60) NOT NULL,
                            valor_total DOUBLE NOT NULL,
                            data_pedido DATE NOT NULL,
                            id_item_pedido INT NOT NULL,
                            PRIMARY KEY (id_pedido),
                            FOREIGN KEY (cpf) REFERENCES usuarios(cpf),
                            FOREIGN KEY (id_item_pedido) REFERENCES item_pedido(id_item_pedido))";

                        if(!mysqli_query($con, $query)){
                            throw new Exception('Não foi possível criar a tabela pedidos desejada');
                        }
                    } 
                }else{
                    throw new Exception("Não foi possível conectar ao banco");
                }
            } catch (Exception $e) {
                $log = date('d.m.Y h:i:s')." - Erro ao criar as tabelas: ".$e->getMessage();
                error_log($log . PHP_EOL, 3, './error/db_error.log');
            }
        }

        function adicionarUsuario($cpf, $nome, $nascimento, $email, $senha){
            try {
                if($this->conexao == true && $con = new mysqli($this->host, $this->user, $this->senha, $this->dbase)){
                    if($this->pesquisarTabela('usuarios')){
                        $sql = "SELECT * FROM usuarios u WHERE u.cpf='".$cpf."'";
                        if(!mysqli_query($con, $sql)){
                            echo "FALSE";
                        }
                    }
                }
            } catch (Exception $e) {
                $log = date('d.m.Y h:i:s')." - Erro ao criar as tabelas: ".$e->getMessage();
                error_log($log . PHP_EOL, 3, './error/db_error.log');
            }
        }

        function adicionarEndereco(){
            try {

            } catch (Exception $e) {
                $log = date('d.m.Y h:i:s')." - Erro ao criar as tabelas: ".$e->getMessage();
                error_log($log . PHP_EOL, 3, './error/db_error.log');
            }
        }

        function adicionarPedido(){
            try {

            } catch (Exception $e) {
                $log = date('d.m.Y h:i:s')." - Erro ao criar as tabelas: ".$e->getMessage();
                error_log($log . PHP_EOL, 3, './error/db_error.log');
            }
        }

        function conectarBanco(){
            try {
                if($con = new mysqli($this->host, $this->user, $this->senha, $this->dbase)){
                    echo "Conexão estabelecida com sucesso\n";
                    $this->conexao=true;
                    //$this->removerBanco($this->user, $this->senha);
                    //$this->desconectarBanco($con);
                    //$this->criarTabelas();
                    //$this->adicionarUsuario('11437990975','Alexandre Rosas Costa','1999-12-16','alexandrerosascosta@gmail.com','123456789');
                    $this->pesquisarUsuario('11437990975');
                }else{
                    throw new Exception('Não foi possível conectar com o banco de dados');
                }
            } catch (Exception $e) {
                if($e->getMessage()=="Unknown database '".$this->dbase."'"){
                    $this->criarBanco($this->dbase);
                }else{
                    $log = date('d.m.Y h:i:s')." - Erro ao desconectar: ".$e->getMessage();
                    error_log($log . PHP_EOL, 3, './error/db_error.log');
                }
            }
        }
        
    }