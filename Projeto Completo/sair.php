<?php
/* ==========================================================================
   Projeto Completo - Requisito 5 de Homologação: Logout Seguro (sair.php)
   Limpa variáveis de sessão e destrói a sessão no servidor com session_destroy()
   ========================================================================== */

session_start();

// Limpa todas as variáveis de sessão e destrói a sessão no servidor
session_unset();
session_destroy();

// Redireciona de volta para a tela de login
header("Location: login.html");
exit;
?>
