<?php
/* ==========================================================================
   Aula 12 - Módulo de Conexão com o Banco MySQL (conexao.php)
   ========================================================================== */

$servidor = "localhost";
$usuario  = "root";
$senha    = "root"; // No GitHub Codespaces é "root" (no XAMPP local seria "")
$banco    = "editora_brasil";

mysqli_report(MYSQLI_REPORT_OFF);

$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

if (!$conexao) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

mysqli_set_charset($conexao, "utf8");
?>
