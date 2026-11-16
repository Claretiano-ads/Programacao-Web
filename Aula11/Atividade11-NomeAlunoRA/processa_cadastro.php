<?php
/* ==========================================================================
   Atividade de Laboratório 11 - Persistência no MySQL (INSERT) + Senha
   Aluno(a): [Preencha seu Nome Completo]
   RA: [Preencha seu RA]
   ==========================================================================

   INSTRUÇÕES PARA O ALUNO:

   1. Inclua o arquivo "conexao.php" usando require_once "conexao.php";
   2. Receba via $_POST os campos 'nome_assinante', 'email_assinante' e 'plano_escolhido',
      e crie a variável $dataCadastro = date("Y-m-d");
   3. Valide se algum campo está vazio com if (empty($nome) || empty($email) || empty($plano)).

   🟢 DESAFIO 1 (Aquecimento - Geração Automática de Senha):
   - Extraia as 3 primeiras letras do $nome usando substr($nome, 0, 3)
   - Extraia as 3 primeiras letras do $email usando substr($email, 0, 3)
   - Junte as duas partes com "26" e converta tudo para minúsculo usando strtolower(),
     salvando na variável $senhaGerada.

   🟡 DESAFIO 2 (Aplicação - Verificação de Duplicidade com SELECT e mysqli_num_rows):
   - Monte a consulta: $sqlVerifica = "SELECT id FROM assinantes WHERE email = '$email'";
   - Execute com $resultadoVerifica = mysqli_query($conexao, $sqlVerifica);
   - Verifique com if (mysqli_num_rows($resultadoVerifica) > 0): se for maior que 0,
     exiba o aviso laranja de que o e-mail já possui assinatura cadastrada!

   🔴 DESAFIO 3 (Desafio Final - Gravação com INSERT INTO e Comprovante):
   - No bloco else (quando o e-mail ainda não existe), monte o comando:
     $sqlInsert = "INSERT INTO assinantes (nome, email, senha, plano, data_cadastro) VALUES (...)";
   - Execute com if (mysqli_query($conexao, $sqlInsert)) e exiba o comprovante HTML abaixo
     mostrando o Nome, Plano, E-mail (Login) e a $senhaGerada!
   ========================================================================== */

// ESCREVA SEU CÓDIGO PHP ABAIXO DESTA LINHA:




?>
