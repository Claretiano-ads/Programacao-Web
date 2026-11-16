-- ============================================================================
-- Aula 11 - Laboratório 08: Atualização da Tabela 'assinantes' no phpMyAdmin
-- ============================================================================

-- OPÇÃO A: Se você já criou o banco 'editora_brasil' e a tabela 'assinantes'
-- na aula anterior, basta rodar este comando na aba SQL do banco 'editora_brasil':

ALTER TABLE assinantes ADD senha VARCHAR(20) NOT NULL AFTER email;


-- ============================================================================
-- OPÇÃO B: Caso o seu Codespaces tenha sido recriado do zero (ou você faltou
-- na aula passada), rode o bloco abaixo para criar o banco já com a coluna 'senha':
-- ============================================================================

CREATE DATABASE IF NOT EXISTS editora_brasil
DEFAULT CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE editora_brasil;

CREATE TABLE IF NOT EXISTS assinantes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    senha VARCHAR(20) NOT NULL,
    plano VARCHAR(50) NOT NULL,
    data_cadastro DATE NOT NULL
);
