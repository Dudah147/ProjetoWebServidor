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

        function pesquisarUsuario($cpf){
            try {
                if($this->conexao == true && $con = new mysqli($this->host, $this->user, $this->senha, $this->dbase)){
                    $sql = "SELECT * FROM usuarios WHERE cpf_usuario='".$cpf."'";
                    $dados = mysqli_query($con, $sql);
                    if(!mysqli_fetch_all($dados)){
                        return False;
                    }else{
                        return True;
                    }
                }
            } catch (Exception $e) {
                $log = date('d.m.Y h:i:s')." - Erro ao pesquisar o usuário: ".$e->getMessage();
                error_log($log . PHP_EOL, 3, './error/db_error.log');
            }
        }

        function pesquisarEndereco($cpf){
            try {
                if($this->conexao == true && $con = new mysqli($this->host, $this->user, $this->senha, $this->dbase)){
                    $sql = "SELECT * FROM enderecos WHERE cpf_usuario='".$cpf."'";
                    $dados = mysqli_query($con, $sql);
                    if(!mysqli_fetch_all($dados)){
                        return False;
                    }else{
                        return True;
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
                    return True;
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
                        $query = "CREATE TABLE enderecos(id_endereco INT NOT NULL AUTO_INCREMENT,
                                    cpf_usuario VARCHAR(60) NOT NULL,
                                    cidade VARCHAR(60) NOT NULL,
                                    estado VARCHAR(60) NOT NULL,
                                    numero INT NOT NULL,
                                    bairro VARCHAR(60) NOT NULL,
                                    cep VARCHAR(60) NOT NULL,
                                    rua VARCHAR(60) NOT NULL,
                                    PRIMARY KEY (id_endereco)
                                );";

                        if(!mysqli_query($con, $query)){
                            throw new Exception('Não foi possível criar a tabela enderecos desejada');
                        }
                    }

                    if($this->pesquisarTabela('usuarios') == False){
                        $query = "CREATE TABLE usuarios(cpf_usuario VARCHAR(60) NOT NULL,
                                    nome_usuario VARCHAR(60) NOT NULL,
                                    senha_usuario VARCHAR(60) NOT NULL,
                                    email_usuario VARCHAR(60) NOT NULL,
                                    nasc_usuario DATE NOT NULL,
                                    PRIMARY KEY (cpf_usuario)
                                );";

                        $sql = "ALTER TABLE `enderecos` 
                                ADD FOREIGN KEY (cpf_usuario)
                                REFERENCES usuarios (cpf_usuario) ON DELETE CASCADE";

                        if(!mysqli_query($con, $query) && !mysqli_query($con, $sql)){
                            throw new Exception('Não foi possível criar a tabela usuarios desejada');
                        }
                    }

                    if($this->pesquisarTabela('pedidos') == False){
                        $query = "CREATE TABLE pedidos(id_pedido INT NOT NULL AUTO_INCREMENT,
                            cpf_usuario VARCHAR(60) NOT NULL,
                            valor_total_pedido DOUBLE NOT NULL,
                            data_pedido TIMESTAMP NOT NULL,
                            PRIMARY KEY (id_pedido),
                            FOREIGN KEY (cpf_usuario)
                            REFERENCES usuarios(cpf_usuario) ON DELETE CASCADE
                            )";

                        if(!mysqli_query($con, $query)){
                            throw new Exception('Não foi possível criar a tabela pedidos desejada');
                        }
                    } 
                    

                    if($this->pesquisarTabela('sabores') == False){
                        $query = "CREATE TABLE sabores(id_sabor INT NOT NULL AUTO_INCREMENT,
                            sabores VARCHAR(60) NOT NULL,
                            info_sabor VARCHAR(60) NOT NULL,
                            tipo_sabor VARCHAR(60) NOT NULL,
                            preco_sabor DOUBLE NOT NULL,
                            imagem_sabor VARCHAR(60) NOT NULL,
                            PRIMARY KEY (id_sabor)
                            );";

                        if(!mysqli_query($con, $query)){
                            throw new Exception('Não foi possível criar a tabela sabores desejada');
                        }
                    }

                    if($this->pesquisarTabela('massa') == False){
                        $query = "CREATE TABLE massa(id_massa INT NOT NULL AUTO_INCREMENT,
                            preco_massa DOUBLE NOT NULL,
                            info_massa VARCHAR(60) NOT NULL,
                            massa VARCHAR(60) NOT NULL,
                            PRIMARY KEY (id_massa)
                            );";

                        if(!mysqli_query($con, $query)){
                            throw new Exception('Não foi possível criar a tabela massa desejada');
                        }
                    }

                    if($this->pesquisarTabela('borda') == False){
                        $query = "CREATE TABLE borda(
                            id_borda INT NOT NULL AUTO_INCREMENT,
                            preco_borda DOUBLE NOT NULL,
                            borda VARCHAR(60) NOT NULL,
                            PRIMARY KEY (id_borda)
                            );";

                        if(!mysqli_query($con, $query)){
                            throw new Exception('Não foi possível criar a tabela borda desejada');
                        }
                    }

                    if($this->pesquisarTabela('tamanho') == False){
                        $query = "CREATE TABLE tamanho(id_tamanho INT NOT NULL AUTO_INCREMENT,
                            tamanho VARCHAR(60) NOT NULL,
                            preco_tamanho DOUBLE NOT NULL,
                            qtd_sabor INT NOT NULL,
                            info_tamanho VARCHAR(60) NOT NULL,
                            PRIMARY KEY (id_tamanho)
                            );";

                        if(!mysqli_query($con, $query)){
                            throw new Exception('Não foi possível criar a tabela tamanho desejada');
                        }
                    }

                    if($this->pesquisarTabela('item') == False){
                        $query = "CREATE TABLE item(
                            id_item INT NOT NULL AUTO_INCREMENT,
                            id_borda INT NOT NULL,
                            id_tamanho INT NOT NULL,
                            id_massa INT NOT NULL,
                            id_pedido INT NOT NULL,
                            valor_item DOUBLE NOT NULL,
                            PRIMARY KEY (id_item));";

                        if(!mysqli_query($con, $query)){
                            throw new Exception('Não foi possível criar a tabela pedidos desejada');
                        }
                        $query="ALTER TABLE item ADD FOREIGN KEY(id_borda) REFERENCES borda(id_borda);";
                        mysqli_query($con, $query);
                        $query="ALTER TABLE item ADD FOREIGN KEY(id_tamanho) REFERENCES tamanho(id_tamanho);";
                        mysqli_query($con, $query);
                        $query="ALTER TABLE item ADD FOREIGN KEY(id_massa) REFERENCES massa(id_massa);";
                        mysqli_query($con, $query);
                    } 

                    if($this->pesquisarTabela('item_sabores') == False){
                        $query = "CREATE TABLE item_sabores(id_item_sabor INT NOT NULL,
                            id_item INT NOT NULL,
                            id_sabor INT NOT NULL,
                            PRIMARY KEY (id_item_sabor));";

                        if(!mysqli_query($con, $query)){
                            throw new Exception('Não foi possível criar a tabela sabores desejada');
                        }
                        
                        $query = "ALTER TABLE item_sabores ADD FOREIGN KEY(id_item) REFERENCES item(id_item);";
                        mysqli_query($con, $query);
                        $query = "ALTER TABLE item_sabores ADD FOREIGN KEY(id_sabor) REFERENCES sabores(id_sabor);";
                        mysqli_query($con, $query);
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
                        if(!$this->pesquisarUsuario($cpf)){ //Usuário ainda não cadastrado
                            echo "a";
                            $sql="INSERT INTO usuarios (cpf_usuario,nome_usuario,nasc_usuario,email_usuario,senha_usuario) 
                            VALUES ('{$cpf}','{$nome}','{$nascimento}','{$email}','{$senha}');";

                            if(mysqli_query($con, $sql)){
                                echo "Inseriu";
                            }else{
                                echo "Não inseriu";
                            }

                        }else{
                            throw new Exception("Usuário já cadastrado");
                        }
                    }
                }
            } catch (Exception $e) {
                $log = date('d.m.Y h:i:s')." - Erro ao cadastrar usuário: ".$e->getMessage();
                error_log($log . PHP_EOL, 3, './error/db_error.log');
            }
        }

        function removerUsuario($cpf){
            try {
                if($this->conexao == true && $con = new mysqli($this->host, $this->user, $this->senha, $this->dbase)){
                    if($this->pesquisarTabela('usuarios')){
                        if($this->pesquisarUsuario($cpf)){ //Usuário cadastrado
                            $sql="DELETE FROM usuarios WHERE cpf_usuario = '{$cpf}'";

                            if(!mysqli_query($con, $sql)){
                                throw new Exception("Houve um erro ao deletar o usuário com CPF '{$cpf}'.");
                            }
                        }else{
                            throw new Exception("Usuário com CPF '{$cpf}' não está cadastrado.");
                        }
                    }
                }
            } catch (Exception $e) {
                $log = date('d.m.Y h:i:s')." - Erro ao remover usuário: ".$e->getMessage();
                error_log($log . PHP_EOL, 3, './error/db_error.log');
            }
        }

        function adicionarEndereco($cpf,$cep,$rua,$bairro,$cidade,$estado,$numero){
            try {
                if($this->conexao == true && $con = new mysqli($this->host, $this->user, $this->senha, $this->dbase)){
                    if($this->pesquisarTabela('enderecos')){
                        $sql="INSERT INTO enderecos (cpf_usuario,cep,rua,bairro,cidade,estado,numero) 
                        VALUES ('{$cpf}','{$cep}','{$rua}','{$bairro}','{$cidade}','{$estado}','{$numero}');";
                        if(!mysqli_query($con, $sql)){
                            throw new Exception("Não foi possível realizar o cadastro do endereço");
                        }
                    }
                }
            } catch (Exception $e) {
                $log = date('d.m.Y h:i:s')." - Erro ao criar as tabelas: ".$e->getMessage();
                error_log($log . PHP_EOL, 3, './error/db_error.log');
            }
        }

        function removerEndereco($cpf,$cep){
            try {
                if($this->conexao == true && $con = new mysqli($this->host, $this->user, $this->senha, $this->dbase)){
                    if($this->pesquisarTabela('enderecos')){
                        $sql="DELETE FROM enderecos WHERE cpf='{$cpf}' AND cep='{$cep}'";
                        if(!mysqli_query($con, $sql)){
                           throw new Exception("Não foi possível remover o endereço");
                        }
                    }
                }
            } catch (Exception $e) {
                $log = date('d.m.Y h:i:s')." - Erro ao criar as tabelas: ".$e->getMessage();
                error_log($log . PHP_EOL, 3, './error/db_error.log');
            }
        }

        function adicionarPedido($cpf,$valor_total,$data){
            try {
                if($this->conexao == true && $con = new mysqli($this->host, $this->user, $this->senha, $this->dbase)){
                    if($this->pesquisarTabela('pedidos')){
                        $sql="INSERT INTO pedidos (cpf_usuario,valor_total_pedido,data_pedido) 
                        VALUES ('{$cpf}','{$valor_total}','{$data}');";
                        if(!mysqli_query($con, $sql)){
                            throw new Exception("Não foi possível adicionar o pedido");
                        }
                    }
                }
            } catch (Exception $e) {
                $log = date('d.m.Y h:i:s')." - Erro ao criar as tabelas: ".$e->getMessage();
                error_log($log . PHP_EOL, 3, './error/db_error.log');
            }
        }

        function removerPedido($cpf){
            try {
                if($this->conexao == true && $con = new mysqli($this->host, $this->user, $this->senha, $this->dbase)){
                    if($this->pesquisarTabela('pedidos')){
                        $sql="DELETE FROM pedidos WHERE cpf='{$cpf}'";
                        if(!mysqli_query($con, $sql)){
                            throw new Exception("Não foi possível remover o pedido");
                        }
                    }
                }
            } catch (Exception $e) {
                $log = date('d.m.Y h:i:s')." - Erro ao criar as tabelas: ".$e->getMessage();
                error_log($log . PHP_EOL, 3, './error/db_error.log');
            }
        }

        function adicionarSabor($sabor,$info_sabor,$tipo_sabor,$preco_sabor,$imagem_sabor){
            try {
                if($this->conexao == true && $con = new mysqli($this->host, $this->user, $this->senha, $this->dbase)){
                    if($this->pesquisarTabela('sabores')){
                        $sql="INSERT INTO sabores (sabores,info_sabor,tipo_sabor,preco_sabor,imagem_sabor) 
                        VALUES ('{$sabor}','{$info_sabor}','{$tipo_sabor}',{$preco_sabor},'{$imagem_sabor}');";
                        if(!mysqli_querry($con,$sql)){
                            throw new Exception("Não foi possível adicionar o sabor");
                        }
                    }
                }
            } catch (Exception $e) {
                $log = date('d.m.Y h:i:s')." - Erro ao criar as tabelas: ".$e->getMessage();
                error_log($log . PHP_EOL, 3, './error/db_error.log');
            }
        }

        function adicionarTamanho($tamanho,$preco_tamanho){
            try {
                if($this->conexao == true && $con = new mysqli($this->host, $this->user, $this->senha, $this->dbase)){
                    if($this->pesquisarTabela('tamanho')){
                        $sql="INSERT INTO tamanho (tamanho,preco_tamanho,qtd_sabor,info_tamanho) 
                        VALUES ('{$sabor}','{$info_sabor}','{$tipo_sabor}',{$preco_sabor},'{$imagem_sabor}');";
                        if(!mysqli_querry($con,$sql)){
                            throw new Exception("Não foi possível adicionar o sabor");
                        }
                    }
                }
            } catch (Exception $e) {
                $log = date('d.m.Y h:i:s')." - Erro ao criar as tabelas: ".$e->getMessage();
                error_log($log . PHP_EOL, 3, './error/db_error.log');
            }
        }

        function adicionarBorda(){
            try {
                if($this->conexao == true && $con = new mysqli($this->host, $this->user, $this->senha, $this->dbase)){
                    if($this->pesquisarTabela('sabores')){
                        $sql="INSERT INTO sabores (sabores,info_sabor,tipo_sabor,preco_sabor,imagem_sabor) 
                        VALUES ('{$sabor}','{$info_sabor}','{$tipo_sabor}',{$preco_sabor},'{$imagem_sabor}');";
                        if(!mysqli_querry($con,$sql)){
                            throw new Exception("Não foi possível adicionar o sabor");
                        }
                    }
                }
            } catch (Exception $e) {
                $log = date('d.m.Y h:i:s')." - Erro ao criar as tabelas: ".$e->getMessage();
                error_log($log . PHP_EOL, 3, './error/db_error.log');
            }
        }

        function adicionarMassa(){
            try {
                if($this->conexao == true && $con = new mysqli($this->host, $this->user, $this->senha, $this->dbase)){
                    if($this->pesquisarTabela('sabores')){
                        $sql="INSERT INTO sabores (sabores,info_sabor,tipo_sabor,preco_sabor,imagem_sabor) 
                        VALUES ('{$sabor}','{$info_sabor}','{$tipo_sabor}',{$preco_sabor},'{$imagem_sabor}');";
                        if(!mysqli_querry($con,$sql)){
                            throw new Exception("Não foi possível adicionar o sabor");
                        }
                    }
                }
            } catch (Exception $e) {
                $log = date('d.m.Y h:i:s')." - Erro ao criar as tabelas: ".$e->getMessage();
                error_log($log . PHP_EOL, 3, './error/db_error.log');
            }
        }

        function removerSabor(){

        }

        function removerTamanho(){

        }

        function removerBorda(){

        }

        function removerMassa(){
            
        }

        function conectarBanco(){
            try {
                if($con = new mysqli($this->host, $this->user, $this->senha, $this->dbase)){
                    echo "Conexão estabelecida com sucesso\n";
                    $this->conexao=true;
                    //$this->removerBanco($this->user, $this->senha);
                    //$this->desconectarBanco($con);
                    //$this->criarTabelas();
                    //$this->adicionarUsuario('11437990975',"AlexandreRosasCosta",'1999-12-16',"alexandrerosascosta@gmail.com",'123456789');
                    //$this->pesquisarUsuario('11539299961');
                    //$this->adicionarEndereco('11437990975','84020420','Olegario Mariano','Neves','Ponta Grossa','Paraná',439);
                    //$this->adicionarPedido('11437990975',12.50,'2023-05-02');
                    $this->removerUsuario('11437990975');
                    
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