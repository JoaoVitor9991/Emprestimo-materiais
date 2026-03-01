<?php

class AgendamentoDAO {
    private $pdo;

    
    public function __construct($conexao) {
        $this->pdo = $conexao;
    }

    public function cadastrar(Agendamento $agendamento) {
        try {
            
            $sql = "INSERT INTO agendamentos (nome_cliente, numero_tel, data_hora, id_barbeiro, token, id_servico ,status) 
                    VALUES (:nome, :tel, :data, :barbeiro, :token, :servico ,'Pendente')";

            $stmt = $this->pdo->prepare($sql);

           $stmt->bindValue(':nome', $agendamento->getNomeCliente());
            $stmt->bindValue(':tel', $agendamento->getNumeroTel());
            $stmt->bindValue(':data', $agendamento->getDataHora());
            $stmt->bindValue(':barbeiro', $agendamento->getIdBarbeiro());
            $stmt->bindValue(':token', $agendamento->getToken());
            $stmt->bindValue(':servico', $agendamento->getIdServico());
            
            return $stmt->execute();
            
        } catch (PDOException $e) {
            echo "Erro ao cadastrar: " . $e->getMessage();
            return false;
        }
    }

    public function buscarHorariosOcupados($id_barbeiro, $data) {
        try {
    
            $sql = "SELECT data_hora FROM agendamentos 
                    WHERE id_barbeiro = :id_barbeiro 
                    AND DATE(data_hora) = :data 
                    AND status != 'Cancelado'";

            
            $stmt = $this->pdo->prepare($sql);

           
            $stmt->bindValue(':id_barbeiro', $id_barbeiro);
            $stmt->bindValue(':data', $data);

            $stmt->execute();

           
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

            } catch (PDOException $e) {
                die("Erro ao buscar horários: " . $e->getMessage());
        }   
    }

    public function cancelar($token){
        try{
            $sql = "UPDATE agendamentos SET status = 'Cancelado' WHERE token = :token";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':token', $token);
            return $stmt->execute();
        } catch (PDOException $e){
            die ("Erro ao cancelar agendamento: . " . $e->getMessage());
        }
    }
}

