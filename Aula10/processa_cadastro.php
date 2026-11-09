<?php
/* ==========================================================================
   Aula 10 - PASSO 5 do Laboratório 07: Validações com if/else (processa_cadastro.php)
   Inclui conexao.php e valida no servidor se algum campo ficou vazio com empty()
   ========================================================================== */

// Inclui o arquivo de conexão criado no Passo 3
require_once "conexao.php";

// Captura dos dados enviados via POST
$nome  = $_POST['nome_assinante'] ?? '';
$email = $_POST['email_assinante'] ?? '';
$plano = $_POST['plano_escolhido'] ?? '';

// Estrutura Condicional: Validando se algum campo ficou em branco no servidor
if (empty($nome) || empty($email) || empty($plano)) {
    echo "<h3 style='color: red; font-family: Arial;'>Erro: Todos os campos devem ser preenchidos obrigatoriamente!</h3>";
    echo "<p style='font-family: Arial;'><a href='cadastro.html'>Voltar e preencher novamente</a></p>";
} else {
    // Caso todos os dados estejam corretos:
    echo "<div style='font-family: Arial; border: 1px solid green; padding: 15px; width: 450px; background-color: #f9fff9;'>";
    echo "<h2 style='color: green; margin-top: 0;'>Dados Validados com Sucesso!</h2>";
    echo "<p><strong>Assinante:</strong> " . $nome . "</p>";
    echo "<p><strong>E-mail:</strong> " . $email . "</p>";
    echo "<p><strong>Plano:</strong> " . $plano . "</p>";
    echo "<hr>";
    echo "<p style='color: blue;'>Status: Conexão com o banco 'editora_brasil' estabelecida e pronta para o comando INSERT na próxima aula!</p>";
    echo "<p><a href='cadastro.html'>&larr; Voltar ao formulário</a></p>";
    echo "</div>";
}
?>
