<?php

class BarbeiroDAO{
    private $pdo;

    public function __construct($conexao) {
        $this->pdo = $conexao;
    }

    public function listarBarbeiros(){
        try {

            $sql = "SELECT * FROM barbeiros";

            $stmt = $this->pdo->query($sql);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e){
            die("Erro ao listar clientes " . $e->getMessage());
        }
    }
}