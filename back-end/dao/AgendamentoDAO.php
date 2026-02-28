<?php

class AgendamentoDAO {
    private $pdo;

    
    public function __construct($conexao) {
        $this->pdo = $conexao;
    }

    public function cadastrar(Agendamento $agendamento) {
        try {
            
            $sql = "INSERT INTO agendamentos (nome_cliente, numero_tel, data_hora, id_barbeiro, token, status) 
                    VALUES (:nome, :tel, :data, :barbeiro, :token, 'Pendente')";

            $stmt = $this->pdo->prepare($sql);

           $stmt->bindValue(':nome', $agendamento->getNomeCliente());
            $stmt->bindValue(':tel', $agendamento->getNumeroTel());
            $stmt->bindValue(':data', $agendamento->getDataHora());
            $stmt->bindValue(':barbeiro', $agendamento->getIdBarbeiro());
            $stmt->bindValue(':token', $agendamento->getToken());

            
            return $stmt->execute();
            
        } catch (PDOException $e) {
            echo "Erro ao cadastrar: " . $e->getMessage();
            return false;
        }
    }
}

