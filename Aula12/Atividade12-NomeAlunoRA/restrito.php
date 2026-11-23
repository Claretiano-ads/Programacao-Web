<?php
/* ==========================================================================
   Atividade 12 - PASSO 4: Página Protegida (restrito.php)
   Aluno(a): [Preencha seu Nome Completo]
   RA: [Preencha seu RA]
   ==========================================================================

   🔴 DESAFIO 3 (Proteção de Página com !isset($_SESSION)):
   1. Inicie a sessão no topo com session_start();
   2. Verifique se NÃO existe a sessão 'assinante_id':
      if (!isset($_SESSION['assinante_id'])) {
          header("Location: login.html");
          exit;
      }
   3. No HTML abaixo, exiba $_SESSION['assinante_nome'] e $_SESSION['assinante_plano'] com echo!
   ========================================================================== */

// ESCREVA AQUI O session_start() E A PROTEÇÃO if (!isset($_SESSION['assinante_id'])):




?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Espaço Restrito aos Assinantes (Atividade 12)</title>
</head>
<body style="font-family: Arial, sans-serif; padding: 20px;">

    <p style="text-align: right;">
        Olá, <strong><!-- Exiba aqui $_SESSION['assinante_nome'] com echo --></strong> | 
        Para sair do sistema da EDITORA BR@SIL, <a href="sair.php" style="color: red;">clique aqui</a>.
    </p>

    <div style="background-color: #800000; color: #FFFFFF; padding: 10px; font-weight: bold;">
        ESPAÇO RESTRITO AOS ASSINANTES — PLANO: <!-- Exiba aqui $_SESSION['assinante_plano'] com echo -->
    </div>

    <h3 style="text-align: center; margin-top: 25px;">O QUE VOCÊ DESEJA FAZER?</h3>

    <ul>
        <li>Alterar Dados Pessoais do Cadastro (Endereço)</li>
        <li>Renovar Assinaturas</li>
        <li>Trocar Senha</li>
        <li>Consultar Situação de Pagamento</li>
        <li>Cancelar Assinatura</li>
    </ul>

</body>
</html>
