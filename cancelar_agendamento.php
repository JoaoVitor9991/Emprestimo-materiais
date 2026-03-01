<?php

require_once __DIR__ . '/back-end/conexao/Conexao.php';
require_once __DIR__ . '/back-end/dao/AgendamentoDAO.php';

$token = $_GET['token'] ?? null;

if ($token){
    $conexao = Conexao::conectar();
    $dao = new AgendamentoDAO($conexao);

    if ($dao->cancelar($token)){
        echo "<h1>Agendamento cancelado.</h1>";
        echo "<a href='index.html'>Voltar</a>";
    } else {
        echo "<h1>Erro ao cancelar. Token inválido.</h1>";
    }
}