<?php
class ConexaoBanco
{
    private static $instancia;

    public static function get()
    {
        try {
            if (!isset(self::$instancia)) {

                self::$instancia = new PDO('mysql:host=localhost', 'root', '');
            }
            return self::$instancia;
        } catch (Exception $e) {
            $log = date('d.m.Y h:i:s') . " - Erro ao conectar com o banco: " . $e->getMessage();
            error_log($log . PHP_EOL, 3, 'error/db_error.log');
        }
    }
}
