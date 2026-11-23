<?php
/* ==========================================================================
   Aula 12 - Cadastro de Assinantes (Integrado com o Login e Relatório do Lab 09)
   ========================================================================== */
require_once "conexao.php";

$nome  = $_POST['nome_assinante'] ?? '';
$email = $_POST['email_assinante'] ?? '';
$plano = $_POST['plano_escolhido'] ?? '';
$dataCadastro = date("Y-m-d");

if (empty($nome) || empty($email) || empty($plano)) {
    echo "<h3 style='color: red; font-family: Arial;'>Erro: Preencha todos os campos obrigatórios!</h3>";
    echo "<a href='cadastro.html' style='font-family: Arial;'>Voltar ao formulário</a>";
    exit;
}

$parteNome   = substr($nome, 0, 3);
$parteEmail  = substr($email, 0, 3);
$senhaGerada = strtolower($parteNome . $parteEmail . "26");

$sqlVerifica = "SELECT id FROM assinantes WHERE email = '$email'";
$resultadoVerifica = mysqli_query($conexao, $sqlVerifica);

if (mysqli_num_rows($resultadoVerifica) > 0) {
    echo "<h3 style='color: orange; font-family: Arial;'>Atenção: Este e-mail já possui assinatura cadastrada!</h3>";
    echo "<p style='font-family: Arial;'><a href='login.html'>Ir para a Tela de Login</a> | <a href='cadastro.html'>Tentar outro e-mail</a></p>";
} else {
    $sqlInsert = "INSERT INTO assinantes (nome, email, senha, plano, data_cadastro) 
                  VALUES ('$nome', '$email', '$senhaGerada', '$plano', '$dataCadastro')";

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
                <p>
                    <a href="login.html"><strong>&rarr; Acessar Área Restrita (Fazer Login agora)</strong></a> |
                    <a href="listar_assinantes.php">Ver Lista de Assinantes</a>
                </p>
            </div>
        </body>
        </html>
        <?php
    } else {
        echo "<h3 style='color: red; font-family: Arial;'>Erro ao gravar no banco de dados: " . mysqli_error($conexao) . "</h3>";
    }
}

mysqli_close($conexao);
?>
