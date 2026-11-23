<?php
/* ==========================================================================
   Atividade 12 - PASSO 3: Autenticar e Criar a Sessão (autenticar.php)
   Aluno(a): [Preencha seu Nome Completo]
   RA: [Preencha seu RA]
   ==========================================================================

   🟡 DESAFIO 2 (Aplicação - Login com SELECT + $_SESSION + header):
   1. Inicie a sessão com session_start(); e inclua require_once "conexao.php";
   2. Receba $_POST['email_login'] e $_POST['senha_login'] nas variáveis $email e $senha.
   3. Consulte o banco verificando se existe um assinante com esse e-mail E senha:
      $sql = "SELECT id, nome, plano FROM assinantes WHERE email = '$email' AND senha = '$senha'";
      $resultado = mysqli_query($conexao, $sql);
   4. Verifique com if (mysqli_num_rows($resultado) == 1):
      - Se encontrou 1 registro: extraia os dados com $assinante = mysqli_fetch_assoc($resultado);
      - Salve na sessão:
        $_SESSION['assinante_id']    = $assinante['id'];
        $_SESSION['assinante_nome']  = $assinante['nome'];
        $_SESSION['assinante_plano'] = $assinante['plano'];
      - Redirecione para "restrito.php" usando header("Location: restrito.php"); exit;
      - Senão (else), exiba a mensagem vermelha "E-mail ou senha inválidos!" e um link para login.html.
   ========================================================================== */

// ESCREVA SEU CÓDIGO PHP DE AUTENTICAÇÃO ABAIXO DESTA LINHA:




?>
