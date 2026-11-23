-- ============================================================================
-- Aula 12 - Laboratório 09: Estrutura do Banco 'editora_brasil' + Assinante Teste
-- Caso o seu Codespace tenha sido recriado hoje, execute este script na aba SQL
-- do phpMyAdmin (Porta 8080) para garantir a tabela e um usuário de teste pronto!
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

-- Insere a assinante Maria Silva (Senha: marmar26) caso a tabela esteja vazia
INSERT INTO assinantes (nome, email, senha, plano, data_cadastro)
SELECT 'Maria Silva', 'maria@email.com', 'marmar26', 'Revista Anual', CURDATE()
WHERE NOT EXISTS (SELECT 1 FROM assinantes WHERE email = 'maria@email.com');
