<?php
class Database
{
    public static function StartUp()
    {
        $pdo = new PDO('mysql:host='.SERVIDOR.';dbname='.DATABASE.';charset=utf8', USUARIO_DB, PASSWORD_DB);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}