<?php
    class conectarBanco{
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
                echo $e->getMessage();
            }
        }
        function removerBanco($user, $senha){
            try {
                if($user == "root" && $senha == ""){
                    if($con = new mysqli($this->host, $this->user, $this->senha, $this->dbase)){
                        $query="DROP DATABASE $this->dbase";
                        if(mysqli_query($con, $query)){
                            echo "Exclusão realizada com sucesso";
                        }else{
                            throw new Exception('Não foi possível excluir a base de dados');
                        }
                    }else{
                        throw new Exception('Não foi possível conectar com o banco de dados');
                    }
                }else{
                    throw new Exception("Não foi possível conectar com o banco de dados: Permissão insuficiente");
                }
            } catch (Exception $e) {
                $e->getMessage();
            }
        }

        function desconectarBanco($con){
            try{
                if($this->conexao == true){
                    mysqli_close($con);
                    $this->conexao = false;
                    echo "Conexão encerrada com sucesso";
                }else{
                    throw new Exception("Você já está desconectado!");
                }
            }catch(Exception $e){
                $e->getMessage();
            }
        }
        function conectarBanco(){
            try {
                if($con = new mysqli($this->host, $this->user, $this->senha, $this->dbase)){
                    echo "Conexão estabelecida com sucesso\n";
                    $this->conexao=true;
                    //$this->removerBanco($this->user, $this->senha);
                    //$this->desconectarBanco($con);
                }else{
                    throw new Exception('Não foi possível conectar com o banco de dados');
                }
            } catch (Exception $e) {
                if($e->getMessage()=="Unknown database '".$this->dbase."'"){
                    $this->criarBanco($this->dbase);
                }
            }
        }
        
    }