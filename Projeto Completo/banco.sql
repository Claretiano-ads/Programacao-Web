-- ============================================================================
-- Projeto Completo (Editora Br@sil) - Script de Banco de Dados MySQL
-- Execute na aba SQL do phpMyAdmin (Porta 8080) para homologação do projeto
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

-- Assinante padrão para teste imediato de Login (Login: maria@email.com | Senha: marmar26)
INSERT INTO assinantes (nome, email, senha, plano, data_cadastro)
SELECT 'Maria Silva', 'maria@email.com', 'marmar26', 'Revista Anual', CURDATE()
WHERE NOT EXISTS (SELECT 1 FROM assinantes WHERE email = 'maria@email.com');
