<?php

header('Content-Type: application/json');
require_once __DIR__ . '/back-end/conexao/Conexao.php';
require_once __DIR__ . '/back-end/dao/AgendamentoDAO.php';

try {
    $barbeiroId = $_GET['id_barbeiro'] ?? null;
    $data = $_GET['data'] ?? null;

    if (!$barbeiroId || !$data){
        echo json_encode(["Erro" => "Dados insuficientes"]);
        exit;
    }

    $conexao = Conexao::conectar();
    $dao = new AgendamentoDAO($conexao);

    $ocupados = $dao->buscarHorariosOcupados($barbeiroId, $data);

    echo json_encode($ocupados);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["Erro" => $e->getMessage()]);
}