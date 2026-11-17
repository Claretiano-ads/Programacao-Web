<?php
/* ==========================================================================
   Aula 11 - PASSO 2 do Laboratório 08 (processa_cadastro.php)
   Verifica duplicidade de e-mail, gera senha com substr/strtolower e grava com INSERT INTO
   ========================================================================== */

// 1. Reutiliza o arquivo de conexão com o banco 'editora_brasil'
require_once "conexao.php";

// 2. Recebe os dados enviados pelo formulário cadastro.html via POST
$nome  = $_POST['nome_assinante'] ?? '';
$email = $_POST['email_assinante'] ?? '';
$plano = $_POST['plano_escolhido'] ?? '';
$dataCadastro = date("Y-m-d"); // Formato padrão de data do MySQL (AAAA-MM-DD)

// 3. Validação básica de campos vazios
if (empty($nome) || empty($email) || empty($plano)) {
    echo "<h3 style='color: red; font-family: Arial;'>Erro: Preencha todos os campos obrigatórios!</h3>";
    echo "<a href='cadastro.html' style='font-family: Arial;'>Voltar ao formulário</a>";
    exit; // Interrompe a execução do script
}

// 4. Geração automática de senha (3 primeiras letras do nome + 3 do e-mail + "26")
$parteNome   = substr($nome, 0, 3);
$parteEmail  = substr($email, 0, 3);
$senhaGerada = strtolower($parteNome . $parteEmail . "26"); // Converte tudo para minúsculo

// 5. Verifica se o e-mail já está cadastrado no banco
$sqlVerifica = "SELECT id FROM assinantes WHERE email = '$email'";
$resultadoVerifica = mysqli_query($conexao, $sqlVerifica);

if (mysqli_num_rows($resultadoVerifica) > 0) {
    echo "<h3 style='color: orange; font-family: Arial;'>Atenção: Este e-mail já possui assinatura cadastrada!</h3>";
    echo "<a href='cadastro.html' style='font-family: Arial;'>Tentar com outro e-mail</a>";
} else {
    // 6. Comando SQL para inserir os dados na tabela 'assinantes'
    $sqlInsert = "INSERT INTO assinantes (nome, email, senha, plano, data_cadastro) 
                  VALUES ('$nome', '$email', '$senhaGerada', '$plano', '$dataCadastro')";

    // Executa o INSERT e verifica se funcionou
    if (mysqli_query($conexao, $sqlInsert)) {
        ?>
        <!DOCTYPE html>
        <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <title>Comprovante de Assinatura</title>
        </head>
        <body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">
            <div style="background-color: #fff; border: 2px solid #000080; padding: 20px; max-width: 520px; margin: 0 auto;">
                <h2 style="color: #000080; margin-top: 0;">Assinatura Concluída com Sucesso!</h2>
                <p>Bem-vindo(a) à <strong>Editora Br@sil</strong>, <?php echo $nome; ?>!</p>
                <hr>
                <p><strong>Plano Adquirido:</strong> <?php echo $plano; ?></p>
                <p><strong>Seu Login de Acesso:</strong> <?php echo $email; ?></p>
                <p><strong>Sua Senha Gerada:</strong> <span style="background: #ffffcc; padding: 3px 8px; font-weight: bold;"><?php echo $senhaGerada; ?></span></p>
                <hr>
                <p style="font-size: 13px; color: #555;">Guarde sua senha para acessar a área restrita do assinante na próxima aula.</p>
                <a href="cadastro.html">Realizar novo cadastro</a>
            </div>
        </body>
        </html>
        <?php
    } else {
        echo "<h3 style='color: red; font-family: Arial;'>Erro ao gravar no banco de dados: " . mysqli_error($conexao) . "</h3>";
    }
}

// Fecha a conexão com o MySQL
mysqli_close($conexao);
?>
