<?php
/* ==========================================================================
   Aula 12 - PASSO 1 do Laboratório 09: Listagem de Assinantes (listar_assinantes.php)
   Consulta a tabela 'assinantes' com SELECT e percorre com while + mysqli_fetch_assoc
   ========================================================================== */
require_once "conexao.php";

// Consulta SQL buscando todos os registros ordenados pelo nome
$sql = "SELECT id, nome, email, plano, data_cadastro FROM assinantes ORDER BY nome ASC";
$resultado = mysqli_query($conexao, $sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editora Br@sil - Assinantes Cadastrados</title>
</head>
<body style="font-family: Arial, sans-serif; padding: 20px;">

    <h2 style="color: #000080;">Relatório de Assinantes - Editora Br@sil</h2>
    <p>
        <a href="cadastro.html">+ Nova Assinatura</a> |
        <a href="login.html">Área do Assinante (Login)</a> |
        <a href="exemplos.php">📚 Exemplos Teóricos da Aula</a>
    </p>

    <table border="1" cellpadding="8" cellspacing="0" style="border-collapse: collapse; width: 100%; max-width: 800px;">
        <tr style="background-color: #000080; color: #FFFFFF;">
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Plano</th>
            <th>Data</th>
        </tr>
        <?php
        // Laço while percorre cada linha retornada pelo banco de dados
        while ($linha = mysqli_fetch_assoc($resultado)) {
            echo "<tr>";
            echo "<td>" . $linha['id'] . "</td>";
            echo "<td>" . $linha['nome'] . "</td>";
            echo "<td>" . $linha['email'] . "</td>";
            echo "<td>" . $linha['plano'] . "</td>";
            echo "<td>" . $linha['data_cadastro'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

</body>
</html>
<?php mysqli_close($conexao); ?>
