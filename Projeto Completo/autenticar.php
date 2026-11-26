<?php
/* ==========================================================================
   Projeto Completo - Requisito 5 de Homologação: Autenticação (autenticar.php)
   Valida e-mail e senha no MySQL, cria $_SESSION e redireciona com header()
   ========================================================================== */

session_start();
require_once "conexao.php";

$email = trim($_POST['email_login'] ?? '');
$senha = trim($_POST['senha_login'] ?? '');

$sql = "SELECT id, nome, plano FROM assinantes WHERE email = '$email' AND senha = '$senha'";
$resultado = mysqli_query($conexao, $sql);

if ($resultado && mysqli_num_rows($resultado) == 1) {
    $assinante = mysqli_fetch_assoc($resultado);

    // Armazena os dados do assinante autenticado na sessão do servidor
    $_SESSION['assinante_id']    = $assinante['id'];
    $_SESSION['assinante_nome']  = $assinante['nome'];
    $_SESSION['assinante_plano'] = $assinante['plano'];

    mysqli_close($conexao);
    header("Location: restrito.php");
    exit;
}
mysqli_close($conexao);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Falha no Login - Editora Br@sil</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>

    <div id="conteudo" style="max-width: 480px;">
        <div class="caixa-erro">
            <h3>E-mail ou senha inválidos!</h3>
            <p>Verifique suas credenciais ou cadastre uma nova assinatura para gerar sua senha.</p>
            <p>
                <a href="login.html" class="botao botao-restrito">&larr; Tentar novamente</a>
                <a href="cadastro.html" class="botao" style="margin-left: 8px;">Criar Assinatura</a>
            </p>
        </div>
    </div>

</body>
</html>
