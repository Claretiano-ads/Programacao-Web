<?php
/* ==========================================================================
   AULA 12 - EXEMPLOS DE CÓDIGO PARA DEMONSTRAÇÃO DO PROFESSOR EM SALA
   Demonstra:
   1. SELECT + laço while com mysqli_fetch_assoc()
   2. Ciclo de vida da Sessão: session_start(), $_SESSION e isset()
   3. Redirecionamento com header("Location: ...")
   ========================================================================== */
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 12 - Exemplos Teóricos do Professor (SELECT + $_SESSION)</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>

    <div id="conteudo">
        <div class="barra-servidor">
            <span><strong>Demonstração Teórica - Aula 12</strong></span>
            <div>
                <a href="listar_assinantes.php">📋 Ver Relatório</a> |
                <a href="login.html">🔐 Ir para Login</a> |
                <a href="cadastro.html">+ Novo Assinante</a>
            </div>
        </div>

        <h2>Exemplos Práticos em Código (Para Mostrar em Aula)</h2>
        <p class="subtitulo">
            Demonstração ao vivo da leitura de múltiplos registros com <code>while + mysqli_fetch_assoc()</code>,
            gerenciamento de estado com <code>$_SESSION</code> e proteção com <code>header("Location: ...")</code>.
        </p>

        <!-- BLOCO 1: SELECT + while + mysqli_fetch_assoc -->
        <h3>1. Como o <code>while ($linha = mysqli_fetch_assoc($resultado))</code> Funciona?</h3>
        <div class="exemplo-box">
            <p>A função <code>mysqli_fetch_assoc()</code> lê uma linha por vez do resultado do MySQL e devolve um <strong>Array Associativo</strong> onde as chaves são os nomes das colunas da tabela:</p>
            <pre style="background:#eef2f9;padding:10px;border-radius:4px;overflow-x:auto;"><code>$sql = "SELECT id, nome, email, plano FROM assinantes ORDER BY nome ASC";
$resultado = mysqli_query($conexao, $sql);

while ($linha = mysqli_fetch_assoc($resultado)) {
    echo $linha['id'] . " - " . $linha['nome'] . " (" . $linha['plano'] . ")";
}</code></pre>
            <?php
            mysqli_report(MYSQLI_REPORT_OFF);
            $conDemo = @mysqli_connect("localhost", "root", "root", "editora_brasil");
            if ($conDemo) {
                $resDemo = mysqli_query($conDemo, "SELECT id, nome, email, senha, plano FROM assinantes ORDER BY id ASC LIMIT 3");
                if ($resDemo && mysqli_num_rows($resDemo) > 0) {
                    echo "<p><strong>Registros encontrados agora no seu banco <code>editora_brasil</code> (com a senha para você testar o Login!):</strong></p><ul>";
                    while ($item = mysqli_fetch_assoc($resDemo)) {
                        echo "<li>ID <strong>#" . $item['id'] . "</strong>: " . $item['nome'] . " | Login: <code>" . $item['email'] . "</code> | Senha: <code>" . $item['senha'] . "</code></li>";
                    }
                    echo "</ul>";
                } else {
                    echo "<p style='color:#d9534f;'>Nenhum assinante cadastrado ainda. <a href='cadastro.html'>Cadastre um assinante aqui</a> ou execute o arquivo <code>Aula12/banco.sql</code> no phpMyAdmin!</p>";
                }
                mysqli_close($conDemo);
            } else {
                echo "<p style='color:#d9534f;'>⚠️ Banco <code>editora_brasil</code> ainda não criado. Execute <code>Aula12/banco.sql</code> no phpMyAdmin (Porta 8080).</p>";
            }
            ?>
        </div>

        <!-- BLOCO 2: Estado Atual da Sessão ($_SESSION) -->
        <h3>2. Monitor ao Vivo da Superglobal <code>$_SESSION</code></h3>
        <div class="exemplo-box">
            <p>O protocolo HTTP não tem memória. Por isso usamos <code>session_start();</code> no topo da página para ler a memória da sessão no servidor:</p>
            <?php if (isset($_SESSION['assinante_id'])): ?>
                <p style="color: #2b542c; font-weight: bold;">
                    ✅ EXISTE UMA SESSÃO ATIVA NESTE NAVEGADOR!
                </p>
                <ul>
                    <li><code>$_SESSION['assinante_id']</code> = <strong><?php echo $_SESSION['assinante_id']; ?></strong></li>
                    <li><code>$_SESSION['assinante_nome']</code> = <strong><?php echo $_SESSION['assinante_nome']; ?></strong></li>
                    <li><code>$_SESSION['assinante_plano']</code> = <strong><?php echo $_SESSION['assinante_plano']; ?></strong></li>
                </ul>
                <p><a href="restrito.php" class="botao">Acessar Espaço Restrito</a> <a href="sair.php" style="margin-left:10px;color:red;">Encerrar Sessão (sair.php)</a></p>
            <?php else: ?>
                <p style="color: #a94442; font-weight: bold;">
                    🔒 NENHUMA SESSÃO ATIVA NO MOMENTO (<code>isset($_SESSION['assinante_id'])</code> é FALSO).
                </p>
                <p>Se você tentar abrir <a href="restrito.php"><code>restrito.php</code></a> agora, o comando <code>header("Location: login.html");</code> vai expulsar você automaticamente para a tela de login!</p>
            <?php endif; ?>
        </div>

        <!-- BLOCO 3: Ciclo de Vida e Redirecionamento -->
        <h3>3. Proteção de Página com <code>!isset()</code> e <code>header("Location: ...")</code></h3>
        <div class="exemplo-box">
            <pre style="background:#eef2f9;padding:10px;border-radius:4px;overflow-x:auto;"><code>&lt;?php
session_start(); // 1º comando obrigatório antes de qualquer HTML

// Se NÃO existir a variável de sessão 'assinante_id', expulsa para o login!
if (!isset($_SESSION['assinante_id'])) {
    header("Location: login.html");
    exit;
}
?&gt;</code></pre>
        </div>

        <a href="listar_assinantes.php" class="botao">Passo 1: Abrir Relatório de Assinantes &rarr;</a>
    </div>

</body>
</html>
