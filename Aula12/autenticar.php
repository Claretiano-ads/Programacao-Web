<?php
/* ==========================================================================
   Aula 12 - PASSO 3 do Laboratório 09: Autenticação e Sessão (autenticar.php)
   Verifica e-mail e senha no MySQL e cria a sessão $_SESSION do assinante
   ========================================================================== */

// 1. Inicia o gerenciamento de sessão no PHP (sempre no topo!)
session_start();
require_once "conexao.php";

$email = $_POST['email_login'] ?? '';
$senha = $_POST['senha_login'] ?? '';

// 2. Consulta o banco buscando um assinante com o e-mail E a senha informados
$sql = "SELECT id, nome, plano FROM assinantes WHERE email = '$email' AND senha = '$senha'";
$resultado = mysqli_query($conexao, $sql);

// 3. Se encontrou exatamente 1 registro válido:
if (mysqli_num_rows($resultado) == 1) {
    $assinante = mysqli_fetch_assoc($resultado);

    // Grava os dados do usuário na variável superglobal $_SESSION
    $_SESSION['assinante_id']    = $assinante['id'];
    $_SESSION['assinante_nome']  = $assinante['nome'];
    $_SESSION['assinante_plano'] = $assinante['plano'];

    // Redireciona para o painel protegido
    header("Location: restrito.php");
    exit;
} else {
    echo "<h3 style='color: red; font-family: Arial;'>E-mail ou senha inválidos!</h3>";
    echo "<a href='login.html' style='font-family: Arial;'>Tentar novamente</a>";
}

mysqli_close($conexao);
?>
