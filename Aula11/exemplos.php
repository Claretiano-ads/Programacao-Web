<?php
/* ==========================================================================
   AULA 11 - EXEMPLOS DE CÓDIGO PARA DEMONSTRAÇÃO DO PROFESSOR EM SALA
   Abra este arquivo no VS Code e no navegador para explicar os 3 tópicos
   teóricos (substr, strtolower, INSERT INTO e mysqli_num_rows) antes do Lab 08!
   ========================================================================== */

// --------------------------------------------------------------------------
// EXEMPLO 1: Manipulação de Strings com substr() e strtolower()
// --------------------------------------------------------------------------
$nomeExemplo  = "Maria Silva";
$emailExemplo = "MARIA@email.com";

// substr($texto, inicio, quantidade): pega 3 letras a partir da posição 0 (primeira letra)
$parteNome  = substr($nomeExemplo, 0, 3);   // Resultado: "Mar"
$parteEmail = substr($emailExemplo, 0, 3);  // Resultado: "MAR"

// Juntando as partes + "26" e convertendo tudo para minúsculo com strtolower()
$senhaBruta  = $parteNome . $parteEmail . "26"; // "MarMAR26"
$senhaGerada = strtolower($senhaBruta);         // "marmar26"

// --------------------------------------------------------------------------
// EXEMPLO 2: Como o PHP monta a string SQL do INSERT INTO
// --------------------------------------------------------------------------
$planoExemplo = "Revista Anual";
$dataHoje     = date("Y-m-d"); // Formato exigido pelo tipo DATE do MySQL (AAAA-MM-DD)

$sqlDemonstracao = "INSERT INTO assinantes (nome, email, senha, plano, data_cadastro) VALUES ('$nomeExemplo', '$emailExemplo', '$senhaGerada', '$planoExemplo', '$dataHoje')";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 11 - Exemplos Teóricos do Professor (INSERT + Senhas)</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>

    <div id="conteudo">
        <div class="barra-servidor">
            <span><strong>Demonstração Teórica - Aula 11</strong></span>
            <a href="cadastro.html">Ir para o Laboratório 08 (cadastro.html) &rarr;</a>
        </div>

        <h2>Exemplos Práticos em Código (Para Mostrar em Aula)</h2>
        <p class="subtitulo">
            Demonstração ao vivo das funções de texto (<code>substr</code> e <code>strtolower</code>),
            da instrução SQL <code>INSERT INTO</code> e da verificação com <code>mysqli_num_rows()</code>.
        </p>

        <!-- BLOCO 1: substr() e strtolower() -->
        <h3>1. Geração Automática de Senha (<code>substr</code> + <code>strtolower</code>)</h3>
        <div class="exemplo-box">
            <p><strong>Nome de entrada:</strong> <code>"<?php echo $nomeExemplo; ?>"</code> &rarr; <code>substr($nome, 0, 3)</code> extrai: <strong><code>"<?php echo $parteNome; ?>"</code></strong></p>
            <p><strong>E-mail de entrada:</strong> <code>"<?php echo $emailExemplo; ?>"</code> &rarr; <code>substr($email, 0, 3)</code> extrai: <strong><code>"<?php echo $parteEmail; ?>"</code></strong></p>
            <p><strong>Concatenado sem tratamento:</strong> <code>"<?php echo $senhaBruta; ?>"</code></p>
            <p><strong>Resultado final com <code>strtolower()</code>:</strong> <span class="senha-destaque"><?php echo $senhaGerada; ?></span></p>
        </div>

        <!-- BLOCO 2: A Instrução SQL INSERT INTO -->
        <h3>2. A Instrução SQL <code>INSERT INTO</code> Montada pelo PHP</h3>
        <div class="exemplo-box">
            <p>Veja como o PHP substitui as variáveis dentro das aspas simples antes de enviar para o <code>mysqli_query()</code>:</p>
            <p><code><?php echo $sqlDemonstracao; ?></code></p>
        </div>

        <!-- BLOCO 3: Verificação da Tabela e Contagem com mysqli_num_rows -->
        <h3>3. Diagnóstico da Tabela <code>assinantes</code> (<code>mysqli_num_rows</code>)</h3>
        <div class="exemplo-box">
            <?php
            mysqli_report(MYSQLI_REPORT_OFF);
            $conTeste = @mysqli_connect("localhost", "root", "root", "editora_brasil");

            if (!$conTeste) {
                echo "<p style='color: #d9534f;'><strong>⚠️ Banco 'editora_brasil' não encontrado:</strong> Abra o phpMyAdmin (Porta 8080) e execute o arquivo <code>Aula11/banco.sql</code>.</p>";
            } else {
                // Verifica se a coluna 'senha' já foi adicionada com o ALTER TABLE do Passo 1
                $resColuna = mysqli_query($conTeste, "SHOW COLUMNS FROM assinantes LIKE 'senha'");
                if ($resColuna && mysqli_num_rows($resColuna) > 0) {
                    $resTotal = mysqli_query($conTeste, "SELECT id FROM assinantes");
                    $totalAssinantes = mysqli_num_rows($resTotal);
                    echo "<p style='color: #2b542c;'><strong>✅ Coluna <code>senha</code> encontrada na tabela <code>assinantes</code>!</strong></p>";
                    echo "<p>Total de assinantes gravados no momento (via <code>mysqli_num_rows</code>): <strong>" . $totalAssinantes . " registro(s)</strong>.</p>";
                } else {
                    echo "<p style='color: #d9534f;'><strong>⚠️ Falta executar o Passo 1 no phpMyAdmin:</strong> A tabela <code>assinantes</code> ainda não possui a coluna <code>senha</code>.<br>";
                    echo "Rode no SQL: <code>ALTER TABLE assinantes ADD senha VARCHAR(20) NOT NULL AFTER email;</code></p>";
                }
                mysqli_close($conTeste);
            }
            ?>
        </div>

        <a href="cadastro.html" class="botao">Ir para o Formulário do Laboratório 08 &rarr;</a>
    </div>

</body>
</html>
