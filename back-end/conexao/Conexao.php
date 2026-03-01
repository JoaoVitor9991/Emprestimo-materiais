<?php

class Conexao {
    public static function conectar(){
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=barbearia", "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo; 
        } catch (PDOException $e){
            die("Falha na conexão com o banco: " . $e->getMessage());
        }
    }
}