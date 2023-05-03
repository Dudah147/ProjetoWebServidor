<?php 
    #Apenas um talvez
    class ConexaoBanco{
        private static $instancia;
        private $host;
        private $user;
        private $senha;
        private $dbase;
        private $conexao;

        function __construct() {
            $this->host = 'localhost';
            $this->user = 'root';
            $this->senha = '';
            $this->dbase = 'projetowebservidor';
            $this->conexao = false;
        }

        public static function get(){
            try {
                if(!isset(self::$instancia)){
                    self::$instancia = new PDO('mysql:host='.$this->host.';dbname='.$this->dbase.'', $this->user, $this->senha);
                    $this->conexao = true;
                }
                return self::$instancia;
            } catch (Exception $e) {
                $log = date('d.m.Y h:i:s')." - Erro ao conectar com o banco: ".$e->getMessage();
                error_log($log . PHP_EOL, 3, 'error/db_error.log');
            }
        }        
    }
?>