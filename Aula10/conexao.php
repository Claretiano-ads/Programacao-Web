<?php
/* ==========================================================================
   Aula 10 - PASSO 3 do Laboratório 07: Script de Conexão (conexao.php)
   Estabelece comunicação entre o PHP e o banco de dados MySQL via mysqli
   ========================================================================== */

// Parâmetros de acesso ao SGBD MySQL
$servidor = "localhost";
$usuario  = "root";
$senha    = "root"; // No GitHub Codespaces a senha padrão é "root" (no XAMPP local seria "")
$banco    = "editora_brasil";

// Desativa exceções fatais automáticas do PHP 8.1+ para permitir que o nosso if (!$conexao) e die() tratem o erro didaticamente
mysqli_report(MYSQLI_REPORT_OFF);

// 1. Criando o link de conexão com os 4 parâmetros essenciais
$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

// 2. Verificando se houve erro na tentativa de conexão
if (!$conexao) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

// Configuração para garantir acentuação correta (UTF-8)
mysqli_set_charset($conexao, "utf8");
?>
