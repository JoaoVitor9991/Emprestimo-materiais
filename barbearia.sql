
CREATE DATABASE IF NOT EXISTS barbearia;
USE barbearia;


CREATE TABLE IF NOT EXISTS barbeiros (
    id_barbeiro INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL
);


CREATE TABLE IF NOT EXISTS servicos (
    id_servico INT AUTO_INCREMENT PRIMARY KEY,
    nome_servico VARCHAR(100) NOT NULL,
    preco DECIMAL(10,2) NOT NULL
);


CREATE TABLE IF NOT EXISTS agendamentos (
    id_agendamento INT AUTO_INCREMENT PRIMARY KEY,
    nome_cliente VARCHAR(100) NOT NULL,
    numero_tel VARCHAR(20) NOT NULL,
    data_hora DATETIME NOT NULL,
    id_barbeiro INT NOT NULL,
    id_servico INT NOT NULL,
    token VARCHAR(64) UNIQUE NOT NULL, 
    status ENUM('Pendente', 'Concluido', 'Cancelado') DEFAULT 'Pendente',
    
    
    FOREIGN KEY (id_barbeiro) REFERENCES barbeiros(id_barbeiro) ON DELETE CASCADE,
    FOREIGN KEY (id_servico) REFERENCES servicos(id_servico) ON DELETE CASCADE
);


INSERT INTO barbeiros (nome) VALUES ('Amatsu'), ('João Vitor'), ('Barbeiro Sênior');
INSERT INTO servicos (nome_servico, preco) VALUES ('Corte Degradê', 35.00), ('Barba Terapia', 25.00), ('Combo Cabelo + Barba', 50.00);