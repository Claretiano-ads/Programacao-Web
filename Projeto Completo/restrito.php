<?php
/* ==========================================================================
   Projeto Completo - Requisito 5 de Homologação: Área Restrita (restrito.php)
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espaço Restrito aos Assinantes - Editora Br@sil</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>

    <div id="conteudo">
        <p style="text-align: right; margin-top: 0;">
            Olá, <strong><?php echo htmlspecialchars($_SESSION['assinante_nome']); ?></strong> | 
            Para sair do sistema da EDITORA BR@SIL, <a href="sair.php" style="color: red; font-weight: bold;">clique aqui</a>.
        </p>

        <div class="faixa-restrita">
            ESPAÇO RESTRITO AOS ASSINANTES — PLANO: <?php echo htmlspecialchars(strtoupper($_SESSION['assinante_plano'])); ?>
        </div>

        <h3 style="text-align: center; margin-top: 25px;">O QUE VOCÊ DESEJA FAZER?</h3>

        <ul style="line-height: 2;">
            <li>Alterar Dados Pessoais do Cadastro (Endereço)</li>
            <li>Renovar Assinaturas</li>
            <li>Trocar Senha</li>
            <li>Consultar Situação de Pagamento</li>
            <li>Cancelar Assinatura</li>
        </ul>

        <hr>
        <p>
            <a href="listar_assinantes.php" class="botao">📋 Ver Relatório de Assinantes</a>
            <a href="sair.php" class="botao botao-restrito" style="margin-left: 8px;">Encerrar Sessão (Logout)</a>
        </p>
    </div>

</body>
</html>
