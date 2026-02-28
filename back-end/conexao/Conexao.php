<?php

class Conexao {
    public static function conectar(){
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=barbearia", "root", "");

            
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e){
            echo "Falha " . $e->getMessage();
        }

        return $pdo;
    }
}