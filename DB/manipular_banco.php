<?php
class ManipulacaoBanco{
    private $con;

    public function __construct(){
        $this->con = ConexaoBanco::get();
        $this->con->prepare('USE `projetowebservidor`')->execute();
    }

    public function selecionarDados($tabela, $params = 0){
        if ($params == 0) {
            $sql = "SELECT * FROM $tabela";
        } else {
            $sql = "SELECT * FROM $tabela WHERE $params";
        }

        $query = $this->con->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insereDados($params, $tabela){
        $insert = '(';
        $values = '(';
        foreach ($params as $k => $v) {
            $insert =  $insert . $k . ", ";
            $values = $values . ":" . $k . ", ";
        }

        $insert = substr($insert, 0, (strlen($insert) - 2)) . ")";
        $values = substr($values, 0, (strlen($values) - 2)) . ")";


        $sql = "INSERT INTO $tabela $insert VALUES $values";
        $query = $this->con->prepare($sql);

        $query->execute($params);

        return $this->con->lastInsertId();
    }

    public function removerDados($tabela, $param){
        $sql = "DELETE FROM {$tabela} WHERE {$param}";
    }
}
        /* public function pesquisarUsuario($cpf){
            try {
                if($this->con){
                    $sql = "SELECT * FROM usuarios WHERE cpf_usuario='".$cpf."'";
                    $dados = mysqli_query($this->con, $sql);
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
                if($this->con == true){
                    $sql = "SELECT * FROM enderecos WHERE cpf_usuario='".$cpf."'";
                    $dados = mysqli_query($this->con, $sql);
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
                if($this->con){
                    $sql = "SELECT * FROM `".$tabela."` LIMIT 1";
                    mysqli_query($this->con, $sql);
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
        
        public function inserirUsuario($cpf, $nome, $nascimento, $email, $senha){
            try {
                if($this->con){
                    $sql="INSERT INTO usuarios (cpf_usuario,nome_usuario,nasc_usuario,email_usuario,senha_usuario) 
                    VALUES ('{$cpf}','{$nome}','{$nascimento}','{$email}','{$senha}');";
                    if(!mysqli_query($this->con, $sql)){
                        throw new Exception("Não foi possível inserir o usuário!");
                    }
                }
            } catch (Exception $e) {
                $log = date('d.m.Y h:i:s')." - Erro ao cadastrar usuário: ".$e->getMessage();
                error_log($log . PHP_EOL, 3, './error/db_error.log');
            }
        }

        function removerUsuario($cpf){
            try {
                if($this->con){
                    $sql="DELETE FROM usuarios WHERE cpf_usuario = '{$cpf}'";
                    if(!mysqli_query($this->con, $sql)){
                        throw new Exception("Houve um erro ao deletar o usuário com CPF '{$cpf}'.");
                    }
                }
            } catch (Exception $e) {
                $log = date('d.m.Y h:i:s')." - Erro ao remover usuário: ".$e->getMessage();
                error_log($log . PHP_EOL, 3, './error/db_error.log');
            }
        }

        function adicionarEndereco($cpf,$cep,$rua,$bairro,$cidade,$estado,$numero){
            try {
                if($this->con){
                    if($this->pesquisarTabela('enderecos')){
                        $sql="INSERT INTO enderecos (cpf_usuario,cep,rua,bairro,cidade,estado,numero) 
                        VALUES ('{$cpf}','{$cep}','{$rua}','{$bairro}','{$cidade}','{$estado}','{$numero}');";
                        if(!mysqli_query($this->con, $sql)){
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
                if($this->con){
                    if($this->pesquisarTabela('enderecos')){
                        $sql="DELETE FROM enderecos WHERE cpf='{$cpf}' AND cep='{$cep}'";
                        if(!mysqli_query($this->con, $sql)){
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
                if($this->con){
                    if($this->pesquisarTabela('pedidos')){
                        $sql="INSERT INTO pedidos (cpf_usuario,valor_total_pedido,data_pedido) 
                        VALUES ('{$cpf}','{$valor_total}','{$data}');";
                        if(!mysqli_query($this->con, $sql)){
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
                if($this->con){
                    if($this->pesquisarTabela('pedidos')){
                        $sql="DELETE FROM pedidos WHERE cpf='{$cpf}'";
                        if(!mysqli_query($this->con, $sql)){
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
                if($this->con){
                    if($this->pesquisarTabela('sabores')){
                        $sql="INSERT INTO sabores (sabores,info_sabor,tipo_sabor,preco_sabor,imagem_sabor) 
                        VALUES ('{$sabor}','{$info_sabor}','{$tipo_sabor}',{$preco_sabor},'{$imagem_sabor}');";
                        if(!mysqli_querry($this->con,$sql)){
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
                if($this->con){
                    if($this->pesquisarTabela('tamanho')){
                        $sql="INSERT INTO tamanho (tamanho,preco_tamanho,qtd_sabor,info_tamanho) 
                        VALUES ('{$sabor}','{$info_sabor}','{$tipo_sabor}',{$preco_sabor},'{$imagem_sabor}');";
                        if(!mysqli_querry($this->con    ,$sql)){
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
                    //$this->removerUsuario('11437990975');
                    $this->desconectarBanco();
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
    */
