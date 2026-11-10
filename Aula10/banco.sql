-- ============================================================================
-- Aula 10 - Laboratório 07: Criação do Banco e Tabela da Editora Br@sil
-- Como usar: Abra o phpMyAdmin (Porta 8080 no Codespaces), crie o banco
-- 'editora_brasil' e cole este código na aba SQL.
-- ============================================================================

CREATE DATABASE IF NOT EXISTS editora_brasil
DEFAULT CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE editora_brasil;

CREATE TABLE IF NOT EXISTS assinantes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    plano VARCHAR(50) NOT NULL,
    data_cadastro DATE NOT NULL
);
