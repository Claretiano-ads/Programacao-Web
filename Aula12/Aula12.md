# 📅 AULA 12 (23/11) — Tema Central:
## UNIDADE 6 – RECUPERAÇÃO DE DADOS (`SELECT`), VARIÁVEIS DE SESSÃO E ÁREA RESTRITA DO ASSINANTE

* **Duração:** 3h30m – 4h00m (Teoria Direta + Prática em Laboratório)
* **Projeto Fio Condutor:** Sistema de Vendas de Assinaturas da **EDITORA BR@SIL**

---

## 1. Conteúdo Teórico Estruturado (Textos para Slides)

### Tópico 1: Recuperação de Dados do MySQL (`SELECT` e Laços de Repetição)

* **Subtópico: Consultando Registros Gravados.**
  * **Texto para Slide:** Para buscar informações salvas no banco de dados MySQL, utilizamos a instrução SQL `SELECT colunas FROM tabela`. Podemos filtrar resultados específicos com a cláusula `WHERE` (ex: conferir login e senha) ou organizar a exibição utilizando `ORDER BY`.
* **Subtópico: Percorrendo Resultados com `while` e `mysqli_fetch_assoc`.**
  * **Texto para Slide:** Quando uma consulta retorna várias linhas (como a lista de todos os assinantes), o PHP utiliza a função `mysqli_fetch_assoc($resultado)` dentro de um laço `while`. A cada volta do laço, uma linha do banco é lida e transformada em um array associativo (ex: `$linha['nome']`), permitindo desenhar tabelas HTML dinâmicas.

### Tópico 2: Variáveis de Sessão e Controle de Acesso (`$_SESSION`)

* **Subtópico: O Problema do Protocolo HTTP (Sem Estado).**
  * **Texto para Slide:** O protocolo HTTP não guarda memória entre uma página e outra. Para que o site saiba que o assinante já fez login e continue autenticado enquanto navega pelo sistema da Editora Br@sil, o PHP utiliza **Variáveis de Sessão** armazenadas no servidor.
* **Subtópico: Ciclo de Vida de uma Sessão em PHP.**
  * **Texto para Slide:**
    * **Iniciar (`session_start();`):** Deve ser sempre a primeira instrução antes de qualquer saída HTML nas páginas que usam sessão.
    * **Gravar / Ler (`$_SESSION['chave']`):** Array superglobal que guarda os dados do usuário logado (ex: `$_SESSION['assinante_nome'] = $assinante['nome'];`).
    * **Destruir (`session_destroy();`):** Encerra a sessão no servidor quando o usuário clica em "Sair" (Logout).

### Tópico 3: Redirecionamento de Páginas (`header`)

* **Subtópico: Navegação Controlada pelo Servidor.**
  * **Texto para Slide:** A função `header("Location: pagina.php");` instrui o navegador a redirecionar o usuário automaticamente para outra URL. Ela é fundamental tanto após um login bem-sucedido (levando ao painel restrito) quanto para expulsar visitantes não autenticados que tentem acessar páginas protegidas diretamente pela URL.

---

## 2. Prática em Laboratório (Mão na Massa Passo a Passo)

### 💻 LABORATÓRIO 09: LISTAGEM DINÂMICA, LOGIN E ÁREA RESTRITA

**Objetivo:** Construir a listagem de assinantes cadastrados no banco com `SELECT`, implementar a tela de login autenticando e-mail e a senha gerada na aula anterior, e proteger o **Espaço Restrito aos Assinantes** utilizando `session_start()`, `$_SESSION` e `session_destroy()`.

* **PASSO 1:** Criar a Listagem de Assinantes (`listar_assinantes.php`)
* **PASSO 2:** Criar o Formulário de Login (`login.html`)
* **PASSO 3:** Autenticar e Criar a Sessão (`autenticar.php`)
* **PASSO 4:** Criar a Página Protegida (`restrito.php`) e o Logout (`sair.php`)
* **PASSO 5:** Testar o Fluxo Completo de Autenticação (Teste de Bloqueio, Login e Logout)
