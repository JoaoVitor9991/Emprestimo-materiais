<?php

require_once __DIR__ . '/back-end/conexao/Conexao.php';
require_once __DIR__ . '/back-end/model/Agendamento.php';
require_once __DIR__ . '/back-end/dao/Agendamento.php'; 

try {
    
    $conexao = Conexao::conectar();
    $agendamentoDAO = new AgendamentoDAO($conexao);

    $nome     = $_POST['nome_cliente'];
    $telefone = $_POST['numero_tel'];
    $data     = $_POST['data_hora'];
    $barbeiro = $_POST['id_barbeiro'];
    $servico  = $_POST['id_servico'];


    $token = bin2hex(random_bytes(16)); 

    
    $novoAgendamento = new Agendamento($nome, $telefone, $data, $barbeiro, $token, $servico);

   
    if ($agendamentoDAO->cadastrar($novoAgendamento)) {
        
        echo "<h1>Agendamento Realizado com Sucesso!</h1>";
        echo "<p>Guarde seu código de cancelamento: <strong>$token</strong></p>";
        echo "<a href='index.html'>Voltar para o início</a>";
    } else {
        echo "Erro ao processar agendamento.";
    }

} catch (Exception $e) {
    die("Erro crítico no sistema. Entre em contato com o Gestor do programa!: " . $e->getMessage());
}