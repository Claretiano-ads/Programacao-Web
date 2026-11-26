<?php
/* ==========================================================================
   Projeto Completo - Requisito 2 de Homologação: Conexão Ativa (conexao.php)
   Conecta ao banco 'editora_brasil' no MySQL e garante a estrutura da tabela
   ========================================================================== */

$servidor = "localhost";
$usuario  = "root";
$senha    = "root"; // No GitHub Codespaces é "root" (no XAMPP local seria "")
$banco    = "editora_brasil";

mysqli_report(MYSQLI_REPORT_OFF);

// 1. Conecta ao servidor MySQL e garante que a base 'editora_brasil' exista
$conexaoServidor = @mysqli_connect($servidor, $usuario, $senha);
if (!$conexaoServidor && $senha === "root") {
    // Fallback automático caso o aluno esteja rodando no XAMPP local com senha vazia ""
    $senha = "";
    $conexaoServidor = @mysqli_connect($servidor, $usuario, $senha);
}

if (!$conexaoServidor) {
    die("Falha na conexão com o servidor MySQL: " . mysqli_connect_error());
}

mysqli_query($conexaoServidor, "CREATE DATABASE IF NOT EXISTS editora_brasil DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
mysqli_close($conexaoServidor);

// 2. Abre a conexão oficial selecionando o banco 'editora_brasil'
$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

if (!$conexao) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

mysqli_set_charset($conexao, "utf8");

// 3. Garante que a tabela 'assinantes' exista com todas as colunas exigidas na homologação
mysqli_query($conexao, "
    CREATE TABLE IF NOT EXISTS assinantes (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        senha VARCHAR(20) NOT NULL,
        plano VARCHAR(50) NOT NULL,
        data_cadastro DATE NOT NULL
    )
");
?>
