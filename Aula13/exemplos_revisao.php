<?php
/* ==========================================================================
   AULA 13 - PAINEL DE REVISÃO INTERATIVA PARA A PROVA BIMESTRAL (PHP & MYSQL)
   Demonstra ao vivo os 4 Tópicos da Revisão:
   1. Sintaxe PHP, Variáveis ($), Concatenação (.) e echo
   2. $_POST vs $_GET (parâmetros na URL) + empty()
   3. CRUD SQL Essencial (INSERT, SELECT, UPDATE e DELETE)
   4. Sessões (session_start, $_SESSION, isset, session_destroy e header)
   ========================================================================== */
session_start();

// Exemplo interativo de $_GET: captura parâmetro ?filtro= da URL se existir
$filtroGet = $_GET['plano_url'] ?? 'Nenhum parâmetro enviado via $_GET na URL ainda';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 13 - Revisão Intensiva PHP & MySQL (Prova Bimestral)</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f2f4f8; margin: 0; padding: 25px; color: #333; }
        #conteudo { max-width: 820px; margin: 0 auto; background: #fff; padding: 25px 30px; border-top: 5px solid #000080; border-radius: 6px; box-shadow: 0 4px 10px rgba(0,0,0,0.08); }
        h2 { color: #000080; margin-top: 0; }
        h3 { color: #000080; border-bottom: 2px solid #eef2f9; padding-bottom: 5px; margin-top: 24px; }
        .card-revisao { background: #f8faff; border-left: 4px solid #000080; padding: 14px 18px; margin-bottom: 16px; border-radius: 4px; font-size: 14px; }
        code { background: #eaeef3; padding: 2px 5px; border-radius: 3px; font-family: Consolas, monospace; font-size: 13px; }
        pre { background: #1e293b; color: #f8fafc; padding: 12px; border-radius: 5px; overflow-x: auto; font-size: 13px; }
        pre code { background: transparent; color: inherit; padding: 0; }
        .tabela-crud { width: 100%; border-collapse: collapse; margin-top: 10px; font-size: 14px; }
        .tabela-crud th { background: #000080; color: #fff; padding: 8px 10px; text-align: left; }
        .tabela-crud td { border: 1px solid #ccc; padding: 8px 10px; }
        .botao { background: #000080; color: #fff; padding: 8px 14px; text-decoration: none; border-radius: 4px; font-size: 13px; font-weight: bold; display: inline-block; }
    </style>
</head>
<body>

    <div id="conteudo">
        <h2>📚 Revisão Intensiva em Código — Unidades 5 e 6 (PHP & MySQL)</h2>
        <p>Resumo prático dos 4 tópicos cobrados na <strong>Prova Bimestral</strong> e no <strong>Projeto Integrador da Editora Br@sil</strong>.</p>

        <!-- TÓPICO 1 -->
        <h3>Tópico 1: Arquitetura Server-Side, Variáveis (<code>$</code>) e Strings</h3>
        <div class="card-revisao">
            <p><strong>Por que dois cliques não funcionam no <code>.php</code>?</strong> Porque o navegador só entende HTML/CSS/JS. O PHP roda no Servidor Web (Apache/Codespaces) e devolve HTML puro com <code>echo</code>.</p>
            <pre><code>&lt;?php
$nome  = "Maria Silva";
$email = "MARIA@email.com";

// substr() corta 3 letras a partir da posição 0; strtolower() converte para minúsculo
// O operador ponto (.) concatena (junta) as strings:
$senha = strtolower(substr($nome, 0, 3) . substr($email, 0, 3) . "26");
echo "Senha gerada: " . $senha; // Imprime: marmar26
?&gt;</code></pre>
        </div>

        <!-- TÓPICO 2 -->
        <h3>Tópico 2: Formulários (<code>$_POST</code> vs. <code>$_GET</code>) e <code>empty()</code></h3>
        <div class="card-revisao">
            <p><strong>Diferença na Prova:</strong></p>
            <ul>
                <li><code>$_POST['campo']</code>: Dados enviados ocultos no corpo da requisição HTTP (<code>method="POST"</code>). Ideal para senhas e cadastros.</li>
                <li><code>$_GET['campo']</code>: Dados enviados visíveis na URL (ex: <code>?plano_url=Revista+Anual</code>).</li>
            </ul>
            <p>
                <strong>Teste ao vivo do <code>$_GET</code>:</strong>
                <a href="exemplos_revisao.php?plano_url=Plano+Digital+VIP" class="botao">Simular clique com ?plano_url=Plano+Digital+VIP na URL</a>
            </p>
            <p>Valor lido agora por <code>$_GET['plano_url']</code>: <strong><code><?php echo htmlspecialchars($filtroGet); ?></code></strong></p>
        </div>

        <!-- TÓPICO 3 -->
        <h3>Tópico 3: Integração PHP + MySQL (As 4 Operações do CRUD)</h3>
        <div class="card-revisao">
            <pre><code>// 1. Conectar ao MySQL (4 parâmetros: servidor, usuário, senha, banco)
$conexao = mysqli_connect("localhost", "root", "root", "editora_brasil");

// 2. Executar qualquer comando SQL no banco
$resultado = mysqli_query($conexao, $sql);</code></pre>

            <table class="tabela-crud">
                <tr>
                    <th>Operação</th>
                    <th>Sintaxe Padrão SQL no PHP</th>
                    <th>Finalidade no Sistema</th>
                </tr>
                <tr>
                    <td><strong>C</strong>reate (<code>INSERT</code>)</td>
                    <td><code>INSERT INTO assinantes (nome, email) VALUES ('$nome', '$email')</code></td>
                    <td>Cadastrar novo assinante no banco</td>
                </tr>
                <tr>
                    <td><strong>R</strong>ead (<code>SELECT</code>)</td>
                    <td><code>SELECT id, nome FROM assinantes WHERE email = '$email' ORDER BY nome ASC</code></td>
                    <td>Listar assinantes (com <code>while</code> + <code>mysqli_fetch_assoc</code>) ou validar login</td>
                </tr>
                <tr>
                    <td><strong>U</strong>pdate (<code>UPDATE</code>)</td>
                    <td><code>UPDATE assinantes SET plano = 'Plano Digital VIP' WHERE id = 1</code></td>
                    <td>Atualizar dados de um assinante já existente</td>
                </tr>
                <tr>
                    <td><strong>D</strong>elete (<code>DELETE</code>)</td>
                    <td><code>DELETE FROM assinantes WHERE id = 1</code></td>
                    <td>Excluir um assinante específico pelo ID</td>
                </tr>
            </table>
        </div>

        <!-- TÓPICO 4 -->
        <h3>Tópico 4: Sessões (<code>$_SESSION</code>), Proteção e Logout</h3>
        <div class="card-revisao">
            <pre><code>&lt;?php
// 1. Em restrito.php (Proteção de Página contra acesso direto pela URL):
session_start(); // SEMPRE o 1º comando do arquivo!
if (!isset($_SESSION['assinante_id'])) {
    header("Location: login.html"); // Expulsa visitante não logado
    exit;
}

// 2. Em sair.php (Logout seguro):
session_start();
session_unset();   // Limpa variáveis da sessão
session_destroy(); // Destrói a sessão no servidor
header("Location: login.html");
exit;
?&gt;</code></pre>
        </div>
    </div>

</body>
</html>
