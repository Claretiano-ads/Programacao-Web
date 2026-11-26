<?php
/* ==========================================================================
   Projeto Completo - Requisito 3 de Homologação (processa_cadastro.php)
   Gera senha com substr()/strtolower(), bloqueia duplicidade e salva com INSERT INTO
   ========================================================================== */

require_once "conexao.php";

$nome  = trim($_POST['nome_assinante'] ?? '');
$email = trim($_POST['email_assinante'] ?? '');
$plano = trim($_POST['plano_escolhido'] ?? '');
$dataCadastro = date("Y-m-d");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processamento de Assinatura - Editora Br@sil</title>
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

        <?php
        // 1. Validação de campos vazios no servidor com empty()
        if (empty($nome) || empty($email) || empty($plano)) {
            echo "<div class='caixa-erro'>";
            echo "<h3>Erro: Preencha todos os campos obrigatórios!</h3>";
            echo "<p><a href='cadastro.html' class='botao'>&larr; Voltar ao formulário</a></p>";
            echo "</div>";
        } else {
            // 2. Geração automática de senha (3 primeiras letras do nome + 3 do e-mail + "26")
            $parteNome   = substr($nome, 0, 3);
            $parteEmail  = substr($email, 0, 3);
            $senhaGerada = strtolower($parteNome . $parteEmail . "26");

            // 3. Verificação de duplicidade de e-mail com SELECT + mysqli_num_rows
            $sqlVerifica = "SELECT id FROM assinantes WHERE email = '$email'";
            $resultadoVerifica = mysqli_query($conexao, $sqlVerifica);

            if (mysqli_num_rows($resultadoVerifica) > 0) {
                echo "<div class='caixa-alerta'>";
                echo "<h3>Atenção: Este e-mail já possui assinatura cadastrada!</h3>";
                echo "<p>Utilize outro endereço de e-mail ou acesse diretamente sua conta.</p>";
                echo "<p><a href='cadastro.html' class='botao'>Tentar com outro e-mail</a> <a href='login.html' class='botao botao-restrito' style='margin-left:8px;'>Ir para o Login</a></p>";
                echo "</div>";
            } else {
                // 4. Persistência no banco de dados com INSERT INTO
                $sqlInsert = "INSERT INTO assinantes (nome, email, senha, plano, data_cadastro) 
                              VALUES ('$nome', '$email', '$senhaGerada', '$plano', '$dataCadastro')";

                if (mysqli_query($conexao, $sqlInsert)) {
                    ?>
                    <div class="caixa-comprovante">
                        <h2>Assinatura Concluída com Sucesso!</h2>
                        <p>Bem-vindo(a) à <strong>Editora Br@sil</strong>, <?php echo htmlspecialchars($nome); ?>!</p>
                        <hr>
                        <p><strong>Plano Adquirido:</strong> <?php echo htmlspecialchars($plano); ?></p>
                        <p><strong>Seu Login de Acesso:</strong> <?php echo htmlspecialchars($email); ?></p>
                        <p><strong>Sua Senha Gerada:</strong> <span class="senha-destaque"><?php echo htmlspecialchars($senhaGerada); ?></span></p>
                        <p><strong>Data de Registro:</strong> <?php echo date("d/m/Y", strtotime($dataCadastro)); ?></p>
                        <hr>
                        <p style="font-size: 13px; color: #555;">Guarde sua senha para acessar o Espaço Restrito aos Assinantes.</p>
                        <p>
                            <a href="login.html" class="botao botao-restrito">Acessar Área Restrita (Login) &rarr;</a>
                            <a href="listar_assinantes.php" class="botao" style="margin-left: 8px;">Ver Lista de Assinantes</a>
                        </p>
                    </div>
                    <?php
                } else {
                    echo "<div class='caixa-erro'>";
                    echo "<h3>Erro ao gravar no banco de dados: " . mysqli_error($conexao) . "</h3>";
                    echo "</div>";
                }
            }
        }
        mysqli_close($conexao);
        ?>
    </div>

</body>
</html>
