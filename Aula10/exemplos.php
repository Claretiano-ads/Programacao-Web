<?php
/* ==========================================================================
   AULA 10 - EXEMPLOS DE CÓDIGO PARA DEMONSTRAÇÃO DO PROFESSOR EM SALA
   Abra este arquivo no VS Code e no navegador para explicar os 3 tópicos
   antes de iniciar o Laboratório 07!
   ========================================================================== */

// --------------------------------------------------------------------------
// EXEMPLO 1: Estrutura de Decisão (if, elseif, else) e Operadores (>, ==, &&)
// --------------------------------------------------------------------------
$planoEscolhido = "Plano Digital VIP";
$idadeAssinante = 20;

// Definindo o valor e benefício de acordo com o plano usando if / elseif / else
if ($planoEscolhido == "Revista Semestral") {
    $valorMensalidade = "R$ 59,90";
    $brinde = "Marcador de página exclusivo";
} elseif ($planoEscolhido == "Revista Anual") {
    $valorMensalidade = "R$ 99,90";
    $brinde = "Ecobag da Editora Br@sil";
} else {
    $valorMensalidade = "R$ 120,00";
    $brinde = "Acesso ilimitado ao acervo + Ecobag";
}

// Operador Lógico E (&&) e Relacional (>=)
if ($idadeAssinante >= 18 && $planoEscolhido == "Plano Digital VIP") {
    $statusAprovacao = "Aprovado imediatamente (Maior de idade + Plano VIP)";
} else {
    $statusAprovacao = "Aprovação padrão";
}

// --------------------------------------------------------------------------
// EXEMPLO 2: A Função empty() e Consistência de Dados
// --------------------------------------------------------------------------
$campoVazio      = "";
$campoPreenchido = "Carlos Eduardo";

// Testando empty() em uma variável vazia
if (empty($campoVazio)) {
    $resultadoTesteVazio = "VERDADEIRO (empty detectou que o campo está em branco!)";
} else {
    $resultadoTesteVazio = "FALSO (o campo possui conteúdo)";
}

// Testando empty() em uma variável preenchida
if (empty($campoPreenchido)) {
    $resultadoTestePreenchido = "VERDADEIRO (campo vazio)";
} else {
    $resultadoTestePreenchido = "FALSO (empty confirmou que '$campoPreenchido' foi preenchido!)";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 10 - Exemplos Teóricos do Professor (PHP + MySQL)</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>

    <div id="conteudo">
        <div class="barra-servidor">
            <span><strong>Demonstração Teórica - Aula 10</strong></span>
            <a href="cadastro.html">Ir para o Laboratório 07 (cadastro.html) &rarr;</a>
        </div>

        <h2>Exemplos Práticos em Código (Para Mostrar em Aula)</h2>
        <p class="subtitulo">
            Estes exemplos demonstram os comandos <code>if / elseif / else</code>, a função
            <code>empty()</code> e o teste de conexão com o banco <code>editora_brasil</code>.
        </p>

        <!-- BLOCO 1: if / elseif / else -->
        <h3>1. Decisão no Servidor (<code>if</code>, <code>elseif</code>, <code>else</code> e <code>&&</code>)</h3>
        <div class="exemplo-box">
            <p><strong>Plano testado na variável:</strong> <code><?php echo $planoEscolhido; ?></code></p>
            <p><strong>Valor definido pelo <code>if/else</code>:</strong> <?php echo $valorMensalidade; ?></p>
            <p><strong>Brinde liberado:</strong> <?php echo $brinde; ?></p>
            <p><strong>Teste com <code>&&</code> (Idade >= 18 E Plano VIP):</strong> <?php echo $statusAprovacao; ?></p>
        </div>

        <!-- BLOCO 2: Função empty() -->
        <h3>2. Função <code>empty()</code> (Impedindo Campos em Branco)</h3>
        <div class="exemplo-box">
            <p><strong>Quando <code>$campoVazio = "";</code> &rarr; <code>empty($campoVazio)</code> retorna:</strong><br>
               <span style="color: #d9534f; font-weight: bold;"><?php echo $resultadoTesteVazio; ?></span>
            </p>
            <hr>
            <p><strong>Quando <code>$campoPreenchido = "Carlos Eduardo";</code> &rarr; <code>empty($campoPreenchido)</code> retorna:</strong><br>
               <span style="color: #2b542c; font-weight: bold;"><?php echo $resultadoTestePreenchido; ?></span>
            </p>
        </div>

        <!-- BLOCO 3: Teste ao vivo do mysqli_connect -->
        <h3>3. Teste de Conexão <code>mysqli_connect()</code></h3>
        <div class="exemplo-box">
            <?php
            // Tentativa didática de conexão sem derrubar a página de exemplos caso o banco ainda não tenha sido criado no Passo 2
            mysqli_report(MYSQLI_REPORT_OFF);
            $testeConexao = @mysqli_connect("localhost", "root", "root", "editora_brasil");

            if (!$testeConexao) {
                echo "<p style='color: #d9534f;'><strong>⚠️ Banco 'editora_brasil' ainda não encontrado:</strong> " . mysqli_connect_error() . "</p>";
                echo "<p><small>Abra o <strong>phpMyAdmin (Porta 8080)</strong> e siga o <strong>Passo 2</strong> do Laboratório 07 para criar o banco <code>editora_brasil</code>!</small></p>";
            } else {
                echo "<p style='color: #2b542c;'><strong>✅ Sucesso!</strong> O PHP conectou ao banco <code>editora_brasil</code> via <code>mysqli_connect()</code>!</p>";
            }
            ?>
        </div>

        <a href="cadastro.html" class="botao">Ir para o Formulário do Laboratório 07 &rarr;</a>
    </div>

</body>
</html>
