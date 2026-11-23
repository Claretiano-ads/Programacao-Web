<?php
/* ==========================================================================
   Atividade 12 - PASSO 1: Listagem de Assinantes (listar_assinantes.php)
   Aluno(a): [Preencha seu Nome Completo]
   RA: [Preencha seu RA]
   ==========================================================================

   🟢 DESAFIO 1 (Aquecimento - SELECT e Laço while com mysqli_fetch_assoc):
   1. No topo do arquivo, inclua "conexao.php" com require_once "conexao.php";
   2. Monte a consulta SQL:
      $sql = "SELECT id, nome, email, plano, data_cadastro FROM assinantes ORDER BY nome ASC";
   3. Execute a consulta com $resultado = mysqli_query($conexao, $sql);
   4. Dentro da tag <table> abaixo, crie o laço:
      while ($linha = mysqli_fetch_assoc($resultado)) { ... }
      imprimindo cada linha <tr> com as colunas id, nome, email, plano e data_cadastro!
   ========================================================================== */

// ESCREVA AQUI A CONEXÃO E A CONSULTA SELECT:




?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editora Br@sil - Assinantes Cadastrados (Atividade 12)</title>
</head>
<body style="font-family: Arial, sans-serif; padding: 20px;">

    <h2 style="color: #000080;">Relatório de Assinantes - Editora Br@sil</h2>
    <p><a href="login.html">Área do Assinante (Login)</a></p>

    <table border="1" cellpadding="8" cellspacing="0" style="border-collapse: collapse; width: 100%; max-width: 800px;">
        <tr style="background-color: #000080; color: #FFFFFF;">
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Plano</th>
            <th>Data</th>
        </tr>
        <?php
        // ESCREVA AQUI O LAÇO while ($linha = mysqli_fetch_assoc($resultado)) PARA EXIBIR AS LINHAS:



        ?>
    </table>

</body>
</html>
