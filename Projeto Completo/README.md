# 🏆 Projeto Completo — Sistema de Vendas de Assinaturas da EDITORA BR@SIL

Este diretório contém a implementação completa e homologada do **Projeto Integrador** da disciplina de **Introdução à Programação Web**, atendendo a todos os **5 Requisitos do Checklist de Homologação Final em Bancada (Aula 13)**.

---

## ✅ Checklist dos 5 Requisitos Integrados

| # | Requisito de Homologação | Arquivos Responsáveis |Implementação Técnica |
| :---: | :--- | :--- | :--- |
| **1** | **Interface e Estrutura** | [`index.html`](index.html), [`cadastro.html`](cadastro.html), [`login.html`](login.html), [`estilo.css`](estilo.css) | Páginas HTML5 estilizadas com menu unificado e formulários configurados com `method="POST"` e atributos `name`. |
| **2** | **Conexão Ativa** | [`conexao.php`](conexao.php), [`banco.sql`](banco.sql) | Conexão via `mysqli_connect()` com o banco `editora_brasil`, tratamento com `die(mysqli_connect_error())` e charset `utf8`. |
| **3** | **Gravação e Senha Automática** | [`processa_cadastro.php`](processa_cadastro.php) | Validação `empty()`, senha gerada com `substr()` e `strtolower()`, bloqueio de duplicidade (`SELECT` + `mysqli_num_rows()`) e gravação com `INSERT INTO`. |
| **4** | **Listagem Dinâmica** | [`listar_assinantes.php`](listar_assinantes.php) | Consulta `SELECT ... ORDER BY nome ASC` renderizada dinamicamente em tabela HTML com laço `while ($linha = mysqli_fetch_assoc($resultado))`. |
| **5** | **Autenticação e Sessão** | [`autenticar.php`](autenticar.php), [`restrito.php`](restrito.php), [`sair.php`](sair.php) | Gerenciamento de sessão com `session_start()`, armazenamento em `$_SESSION`, proteção contra acesso direto via `if (!isset($_SESSION['assinante_id']))` + `header("Location: login.html")` e logout com `session_unset()` + `session_destroy()`. |

---

## 🚀 Como Executar e Homologar no GitHub Codespaces

1. No terminal do VS Code no GitHub Codespaces, inicie o servidor apontando para a pasta `"Projeto Completo"`:
   ```bash
   php -S 0.0.0.0:8000 -t "Projeto Completo"
   ```
2. Abra a **Porta `8000`** no navegador.
3. Acesse **`/homologacao.php`** ([`homologacao.php`](homologacao.php)) para visualizar o **Painel Automático de Homologação em Bancada** validando os 5 requisitos em tempo real!
