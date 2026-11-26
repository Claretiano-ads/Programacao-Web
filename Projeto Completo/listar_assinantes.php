<?php
/* ==========================================================================
   Projeto Completo - Requisito 4 de Homologação: Listagem Dinâmica (listar_assinantes.php)
   Recupera registros com SELECT e exibe em tabela HTML com laço while
   ========================================================================== */

require_once "conexao.php";

$sql = "SELECT id, nome, email, plano, data_cadastro FROM assinantes ORDER BY nome ASC";
$resultado = mysqli_query($conexao, $sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editora Br@sil - Assinantes Cadastrados</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>

    <div id="conteudo">
        <div class="menu-navegacao">
            <a href="index.html" class="marca">📚 EDITORA BR@SIL</a>
            <div class="menu-links">
                <a href="cadastro.html">+ Nova Assinatura</a>
                <a href="listar_assinantes.php">📋 Assinantes</a>
                <a href="login.html">🔐 Área Restrita</a>
                <a href="homologacao.php">✅ Homologação</a>
            </div>
        </div>

        <h2>Relatório de Assinantes Cadastrados</h2>
        <p class="subtitulo">
            Registros recuperados diretamente do banco <code>editora_brasil</code> via instrução
            <code>SELECT</code> e percorridos com laço <code>while ($linha = mysqli_fetch_assoc($resultado))</code>.
        </p>

        <table class="tabela-dados">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Plano</th>
                    <th>Data de Cadastro</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($resultado && mysqli_num_rows($resultado) > 0) {
                    while ($linha = mysqli_fetch_assoc($resultado)) {
                        echo "<tr>";
                        echo "<td>" . $linha['id'] . "</td>";
                        echo "<td><strong>" . htmlspecialchars($linha['nome']) . "</strong></td>";
                        echo "<td>" . htmlspecialchars($linha['email']) . "</td>";
                        echo "<td>" . htmlspecialchars($linha['plano']) . "</td>";
                        echo "<td>" . $linha['data_cadastro'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Nenhum assinante cadastrado ainda. <a href='cadastro.html'>Cadastre o primeiro assinante aqui!</a></td></tr>";
                }
                ?>
            </tbody>
        </table>

        <p style="margin-top: 18px;">
            <a href="cadastro.html" class="botao">+ Cadastrar Novo Assinante</a>
            <a href="login.html" class="botao botao-restrito" style="margin-left: 8px;">Ir para Área do Assinante (Login)</a>
        </p>
    </div>

</body>
</html>
<?php mysqli_close($conexao); ?>
