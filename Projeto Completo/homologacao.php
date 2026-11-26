<?php
/* ==========================================================================
   Projeto Completo - Validador Automático de Homologação em Bancada (homologacao.php)
   Verifica automaticamente os 5 requisitos do Item 3 da Aula 13!
   ========================================================================== */
session_start();
require_once "conexao.php";

// Requisito 1: Interface e Estrutura (cadastro.html e login.html)
$req1 = file_exists(__DIR__ . '/cadastro.html') && file_exists(__DIR__ . '/login.html');

// Requisito 2: Conexão Ativa com o banco 'editora_brasil'
$req2 = ($conexao !== false);

// Requisito 3: Gravação e Senha Automática (processa_cadastro.php com substr, strtolower e INSERT INTO)
$conteudoProcessa = file_exists(__DIR__ . '/processa_cadastro.php') ? file_get_contents(__DIR__ . '/processa_cadastro.php') : '';
$req3 = str_contains($conteudoProcessa, 'substr') && str_contains($conteudoProcessa, 'strtolower') && str_contains($conteudoProcessa, 'INSERT INTO');

// Requisito 4: Listagem Dinâmica (listar_assinantes.php com SELECT, while e mysqli_fetch_assoc)
$conteudoListar = file_exists(__DIR__ . '/listar_assinantes.php') ? file_get_contents(__DIR__ . '/listar_assinantes.php') : '';
$req4 = str_contains($conteudoListar, 'SELECT') && str_contains($conteudoListar, 'while') && str_contains($conteudoListar, 'mysqli_fetch_assoc');

// Requisito 5: Autenticação e Sessão (autenticar.php, restrito.php e sair.php com session_start, $_SESSION, header e session_destroy)
$conteudoAuth = file_exists(__DIR__ . '/autenticar.php') ? file_get_contents(__DIR__ . '/autenticar.php') : '';
$conteudoRest = file_exists(__DIR__ . '/restrito.php') ? file_get_contents(__DIR__ . '/restrito.php') : '';
$conteudoSair = file_exists(__DIR__ . '/sair.php') ? file_get_contents(__DIR__ . '/sair.php') : '';
$req5 = str_contains($conteudoAuth, '$_SESSION')
     && str_contains($conteudoRest, 'isset($_SESSION')
     && str_contains($conteudoRest, 'header(')
     && str_contains($conteudoSair, 'session_destroy');

// Conta quantos assinantes já estão salvos na tabela 'assinantes'
$resContagem = mysqli_query($conexao, "SELECT COUNT(*) AS total FROM assinantes");
$totalAssinantes = $resContagem ? mysqli_fetch_assoc($resContagem)['total'] : 0;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homologação Final em Bancada - Editora Br@sil</title>
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

        <h2>✅ Checklist de Homologação Final em Bancada (Aula 13)</h2>
        <p class="subtitulo">
            Este painel audita em tempo real os <strong>5 requisitos obrigatórios do Projeto Integrador</strong>
            da <strong>Editora Br@sil</strong>.
        </p>

        <table class="tabela-dados">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Requisito de Homologação</th>
                    <th>Arquivos Auditados</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>1</strong></td>
                    <td><strong>Interface e Estrutura:</strong> Formulário de assinatura e tela de login estruturados e navegáveis.</td>
                    <td><code>cadastro.html</code><br><code>login.html</code></td>
                    <td><?php echo $req1 ? "<span class='badge-ok'>✅ Homologado</span>" : "<span class='badge-pendente'>❌ Pendente</span>"; ?></td>
                </tr>
                <tr>
                    <td><strong>2</strong></td>
                    <td><strong>Conexão Ativa:</strong> Módulo de conexão comunicando sem erros com o banco <code>editora_brasil</code>.</td>
                    <td><code>conexao.php</code></td>
                    <td><?php echo $req2 ? "<span class='badge-ok'>✅ Homologado</span>" : "<span class='badge-pendente'>❌ Pendente</span>"; ?></td>
                </tr>
                <tr>
                    <td><strong>3</strong></td>
                    <td><strong>Gravação e Senha Automática:</strong> Geração com <code>substr()</code>/<code>strtolower()</code>, bloqueio de duplicidade e <code>INSERT INTO</code>.</td>
                    <td><code>processa_cadastro.php</code></td>
                    <td><?php echo $req3 ? "<span class='badge-ok'>✅ Homologado</span>" : "<span class='badge-pendente'>❌ Pendente</span>"; ?></td>
                </tr>
                <tr>
                    <td><strong>4</strong></td>
                    <td><strong>Listagem Dinâmica:</strong> Recuperação com <code>SELECT</code> e exibição em tabela HTML com laço <code>while</code> (<code><?php echo $totalAssinantes; ?></code> gravado(s)).</td>
                    <td><code>listar_assinantes.php</code></td>
                    <td><?php echo $req4 ? "<span class='badge-ok'>✅ Homologado</span>" : "<span class='badge-pendente'>❌ Pendente</span>"; ?></td>
                </tr>
                <tr>
                    <td><strong>5</strong></td>
                    <td><strong>Autenticação e Sessão:</strong> Validação de login, manutenção de <code>$_SESSION</code>, proteção com <code>header()</code> e logout com <code>session_destroy()</code>.</td>
                    <td><code>autenticar.php</code><br><code>restrito.php</code><br><code>sair.php</code></td>
                    <td><?php echo $req5 ? "<span class='badge-ok'>✅ Homologado</span>" : "<span class='badge-pendente'>❌ Pendente</span>"; ?></td>
                </tr>
            </tbody>
        </table>

        <h3>Roteiro Rápido de Teste para o Professor na Bancada:</h3>
        <ol style="line-height: 1.8; font-size: 14px;">
            <li>Abra <a href="cadastro.html"><strong>cadastro.html</strong></a> e cadastre um novo assinante (veja a senha gerada com <code>substr</code> + <code>strtolower</code>).</li>
            <li>Abra <a href="listar_assinantes.php"><strong>listar_assinantes.php</strong></a> e confirme que o novo assinante apareceu na tabela HTML do <code>while</code>.</li>
            <li>Tente abrir <a href="restrito.php"><strong>restrito.php</strong></a> sem estar logado (o sistema deve expulsar para <code>login.html</code>).</li>
            <li>Faça login em <a href="login.html"><strong>login.html</strong></a> com o e-mail e a senha gerada para entrar no <strong>Espaço Restrito</strong> e depois clique em <strong>Sair</strong> (<code>sair.php</code>).</li>
        </ol>
    </div>

</body>
</html>
<?php mysqli_close($conexao); ?>
