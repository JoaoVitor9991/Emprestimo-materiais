<?php

require_once __DIR__ . '/back-end/conexao/Conexao.php';
require_once __DIR__ . '/back-end/dao/BarbeiroDAO.php'; 
require_once __DIR__ . '/back-end/dao/ServicosDAO.php'; 

try {
    
    $conexao = Conexao::conectar();

    
    $barbeiroDAO = new BarbeiroDAO($conexao);
    $servicoDAO = new ServicosDAO($conexao);

    
    $listaBarbeiros = $barbeiroDAO->listarBarbeiros();
    $listaServicos = $servicoDAO->listarTodos();

    
    echo "<h1>Teste de Integração - Barbearia</h1>";

    echo "<h3>Barbeiros Cadastrados:</h3>";
    if (empty($listaBarbeiros)) {
        echo "<p style='color:red;'>Nenhum barbeiro encontrado no banco!</p>";
    } else {
        echo "<pre>";
        print_r($listaBarbeiros);
        echo "</pre>";
    }

    echo "<hr>";

    echo "<h3>Serviços Disponíveis:</h3>";
    if (empty($listaServicos)) {
        echo "<p style='color:red;'>Nenhum serviço encontrado no banco!</p>";
    } else {
        echo "<pre>";
        print_r($listaServicos);
        echo "</pre>";
    }

} catch (Exception $e) {
    echo "<h2>Ocorreu um erro no teste:</h2>";
    echo "<p style='color:red;'>" . $e->getMessage() . "</p>";
}