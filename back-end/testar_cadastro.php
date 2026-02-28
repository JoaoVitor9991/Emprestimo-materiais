<?php


require_once __DIR__ . '/conexao/Conexao.php';
require_once __DIR__ . '/model/Agendamento.php';
require_once __DIR__ . '/dao/AgendamentoDAO.php';


$tokenUnico = bin2hex(random_bytes(16));


$agendamentoTeste = new Agendamento(
    "João Vitor", 
    "67999999999", 
    "2026-03-10 14:00:00", 
    1, 
    $tokenUnico
);


$conexao = Conexao::conectar();
$dao = new AgendamentoDAO($conexao);

if ($dao->cadastrar($agendamentoTeste)) {
    echo "<h2>Sucesso!</h2>";
    echo "Agendamento realizado para o cliente: " . $agendamentoTeste->getNomeCliente() . "<br>";
    echo "Seu link de cancelamento seria com o token: <strong>" . $tokenUnico . "</strong>";
} else {
    echo "Algo deu errado no cadastro.";
}