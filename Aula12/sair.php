<?php
/* ==========================================================================
   Aula 12 - PASSO 4 do Laboratório 09: Encerramento de Sessão (sair.php)
   ========================================================================== */
session_start();

// Limpa todas as variáveis de sessão e destrói a sessão no servidor
session_unset();
session_destroy();

// Redireciona de volta para a tela de login
header("Location: login.html");
exit;
?>
