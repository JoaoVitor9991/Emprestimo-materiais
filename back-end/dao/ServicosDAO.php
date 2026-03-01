<?php

class ServicosDAO{
    private $pdo;

    public function __construct($conexao)
    {
        $this->pdo = $conexao;
    }

    public function listarTodos(){
        try {
            $sql = "SELECT * FROM servicos";

            $stmt = $this->pdo->query($sql);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e){
            die ("Erro ao listar serviços: " . $e->getMessage());
        }
    }
}