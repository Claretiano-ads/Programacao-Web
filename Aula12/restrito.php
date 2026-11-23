<?php
/* ==========================================================================
   Aula 12 - PASSO 4 do Laboratório 09: Página Protegida (restrito.php)
   Bloqueia acesso direto sem login usando !isset($_SESSION['assinante_id'])
   ========================================================================== */
session_start();

// PROTEÇÃO DE PÁGINA: Se não existir sessão ativa, expulsa para o login!
if (!isset($_SESSION['assinante_id'])) {
    header("Location: login.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Espaço Restrito aos Assinantes</title>
</head>
<body style="font-family: Arial, sans-serif; padding: 20px;">

    <p style="text-align: right;">
        Olá, <strong><?php echo $_SESSION['assinante_nome']; ?></strong> | 
        Para sair do sistema da EDITORA BR@SIL, <a href="sair.php" style="color: red;">clique aqui</a>.
    </p>

    <div style="background-color: #800000; color: #FFFFFF; padding: 10px; font-weight: bold;">
        ESPAÇO RESTRITO AOS ASSINANTES — PLANO: <?php echo strtoupper($_SESSION['assinante_plano']); ?>
    </div>

    <h3 style="text-align: center; margin-top: 25px;">O QUE VOCÊ DESEJA FAZER?</h3>

    <ul>
        <li>Alterar Dados Pessoais do Cadastro (Endereço)</li>
        <li>Renovar Assinaturas</li>
        <li>Trocar Senha</li>
        <li>Consultar Situação de Pagamento</li>
        <li>Cancelar Assinatura</li>
    </ul>

    <hr>
    <p><a href="listar_assinantes.php">&larr; Ver Relatório Geral de Assinantes</a></p>

</body>
</html>
