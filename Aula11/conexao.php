<?php
/* ==========================================================================
   Aula 11 - Módulo de Conexão com o Banco MySQL (conexao.php)
   ========================================================================== */

$servidor = "localhost";
$usuario  = "root";
$senha    = "root"; // No GitHub Codespaces a senha padrão é "root" (no XAMPP local seria "")
$banco    = "editora_brasil";

mysqli_report(MYSQLI_REPORT_OFF);

// 1. Criando o link de conexão
$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

// 2. Verificando se houve erro na tentativa de conexão
if (!$conexao) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

// Garantindo acentuação correta (UTF-8)
mysqli_set_charset($conexao, "utf8");
?>
