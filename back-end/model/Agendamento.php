<?php

require_once __DIR__ . '/../Conexao/Conexao.php';

class Agendamento {
    private $nome_cliente;
    private $numero_tel;
    private $data_hora;
    private $id_barbeiro;
    private $token;

    public function __construct($nome_cliente, $numero_tel, $data_hora, $id_barbeiro, $token)
    {
        $this->nome_cliente = $nome_cliente;
        $this->numero_tel = $numero_tel;
        $this->data_hora = $data_hora;
        $this->id_barbeiro = $id_barbeiro;
        $this->token = $token;
    }

    public function getNomeCliente() {
        return $this->nome_cliente;
    }

    public function getNumeroTel(){
        return $this->numero_tel;
    }

    public function getDataHora(){
        return $this->data_hora;
    }

    public function getIdBarbeiro(){
        return $this->id_barbeiro;
    }

    public function getToken(){
       return $this->token;
    }
}