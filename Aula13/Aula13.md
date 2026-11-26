# 📅 AULA 13 (30/11) – FECHAMENTO DO SEMESTRE
## Tema Central: REVISÃO INTENSIVA DE PHP & MYSQL (PREPARAÇÃO PARA A PROVA BIMESTRAL) E HOMOLOGAÇÃO DO PROJETO

* **Duração:** 3h30m – 4h00m (Revisão Conceitual + Simulado Dissertativo + Validação em Bancada)
* **Projeto Fio Condutor:** Sistema de Vendas de Assinaturas da **EDITORA BR@SIL (Ciclo Completo)**

---

## 1. Guia Rápido de Revisão para Slides (Foco na Prova Bimestral de PHP)

Este resumo condensa os pontos-chave das **Unidades 5 e 6** que fundamentam a avaliação bimestral (07 a 10/12):

### Tópico 1: Arquitetura Server-side e Sintaxe PHP
* **Execução no Servidor:** O PHP (*Hypertext Preprocessor*) é interpretado pelo servidor web (Apache no XAMPP ou servidor do Container no GitHub Codespaces), nunca diretamente pelo navegador do cliente. Por isso, os arquivos `.php` exigem execução via `http://localhost/...` (ou Porta `8000` no Codespaces).
* **Regras Básicas de Código:**
  * Delimitadores obrigatórios: `<?php ... ?>`.
  * Variáveis iniciam sempre com cifrão (`$nome`, `$plano`), sem necessidade de declarar tipo previamente.
  * Instruções terminam com ponto e vírgula (`;`) e o operador de concatenação de textos é o ponto (`.`).
  * Saída de dados na tela: comando `echo`.

### Tópico 2: Comunicação com Formulários (`$_POST` vs. `$_GET`)
* **Superglobal `$_POST`:** Captura dados enviados pelo corpo da requisição HTTP (definido por `method="POST"` na tag `<form>`). É o método indicado para cadastros e senhas, pois não expõe os valores na barra de endereços (URL).
* **Superglobal `$_GET`:** Captura parâmetros passados diretamente pela URL (ex: `login.php?login=usuario@email.com`).
* **Validação no Servidor:** Uso de estruturas condicionais (`if`, `elseif`, `else`) e funções como `empty()` antes de qualquer operação no banco de dados.

### Tópico 3: Integração PHP + MySQL (CRUD Essencial)
* **Passos de Conexão (`mysqli`):**
  * Conectar e selecionar a base: `$conexao = mysqli_connect("localhost", "root", "root", "editora_brasil");` *(senha `""` vazia no XAMPP local)*.
  * Executar comandos SQL: `mysqli_query($conexao, $sql);`.
* **Principais Comandos SQL no PHP:**
  * `INSERT INTO tabela (colunas) VALUES ('valores')`: Grava novos registros no banco.
  * `SELECT colunas FROM tabela WHERE condicao ORDER BY coluna`: Recupera registros para listagem ou verificação de login.
  * `UPDATE tabela SET coluna = 'novo_valor' WHERE id = X`: Altera dados previamente gravados.
  * `DELETE FROM tabela WHERE id = X`: Exclui registros específicos.

### Tópico 4: Gerenciamento de Sessões e Controle de Acesso
* **Por que usar Sessões?** O protocolo HTTP não mantém estado entre páginas; as variáveis de sessão armazenam a identificação do assinante no servidor durante toda a navegação.
* **Comandos Fundamentais de Sessão:**
  * `session_start();`: Inicia ou retoma a sessão ativa (deve ser o primeiro comando do arquivo PHP).
  * `$_SESSION['chave'] = $valor;`: Armazena dados do usuário autenticado.
  * `session_destroy();`: Encerra e destrói a sessão no servidor (Logout).
  * `header("Location: pagina.php");`: Redireciona o usuário automaticamente para outra página.

---

## 2. Bateria de Treino para a Prova Bimestral (8 Questões Dissertativas + Gabarito)

Aplique esta lista na primeira metade da aula para preparar a turma para o formato da avaliação bimestral:

### Questão 1 (Processamento Server-side)
**Pergunta:** Explique por que um arquivo com extensão `.php` não exibe o resultado esperado quando aberto diretamente com dois cliques no explorador de arquivos do sistema operacional, exigindo um servidor como o Apache (XAMPP) ou container do Codespaces.
* **Gabarito Esperado:** Diferente do HTML, CSS e JavaScript (que são interpretados pelo navegador no lado do cliente), o PHP é uma linguagem *server-side*. Ele precisa de um interpretador no servidor web (Apache/PHP Server) para processar o código lógico, consultar o banco de dados e gerar como resposta um documento HTML puro para o navegador exibir.

### Questão 2 (Recebimento de Dados de Formulários)
**Pergunta:** No desenvolvimento de sistemas web com PHP, qual é a finalidade da variável superglobal `$_POST`? Explique como ela se relaciona com os atributos `method` e `name` de um formulário HTML.
* **Gabarito Esperado:** A superglobal `$_POST` é um array associativo usado pelo PHP para recuperar os dados enviados por um formulário configurado com `method="POST"`. Cada chave acessada dentro de `$_POST['chave']` deve corresponder exatamente ao valor definido no atributo `name` do campo `<input>` ou `<select>` do formulário HTML.

### Questão 3 (Conexão com Banco de Dados MySQL)
**Pergunta:** Descreva as etapas necessárias para que um script PHP estabeleça comunicação com um banco de dados MySQL e execute uma instrução SQL, citando as funções utilizadas e os quatro parâmetros exigidos na conexão.
* **Gabarito Esperado:** Primeiro estabelece-se a conexão através de `mysqli_connect($servidor, $usuario, $senha, $banco)`, informando o endereço do servidor (`localhost`), o usuário (`root`), a senha e o nome da base de dados (`editora_brasil`). Em seguida, utiliza-se a função `mysqli_query($conexao, $sql)` para enviar e executar a instrução SQL desejada no SGBD.

### Questão 4 (Geração Automática de Senhas em PHP)
**Pergunta:** Com base nas práticas desenvolvidas no sistema da Editora Br@sil, explique como é possível gerar uma senha automática inicial a partir dos dados pessoais informados pelo usuário no cadastro, citando pelo menos duas funções nativas de manipulação de strings do PHP.
* **Gabarito Esperado:** O sistema captura os dados do formulário (como nome e e-mail) e utiliza funções nativas como `substr()` para extrair partes específicas dessas strings e `strtolower()` para converter os caracteres para minúsculo, concatenando-os (com o operador `.`) a números ou caracteres fixos antes de gravar no banco de dados.

### Questão 5 (Persistência e Consulta SQL)
**Pergunta:** Escreva a sintaxe padrão das instruções SQL `INSERT` e `SELECT` utilizadas dentro de scripts PHP e explique a diferença de finalidade entre elas no fluxo de cadastro e login de assinantes.
* **Gabarito Esperado:** O comando `INSERT INTO tabela (colunas) VALUES ('valores')` tem a finalidade de gravar novos registros no banco de dados (usado no cadastro de assinantes). Já o comando `SELECT colunas FROM tabela WHERE condicao` serve para consultar e recuperar registros já armazenados (usado para listar clientes ou validar e-mail e senha no login).

### Questão 6 (Variáveis de Sessão — Conceito e Início)
**Pergunta:** O que são variáveis de sessão em PHP e por que elas são indispensáveis em áreas restritas de sites? Qual comando deve ser obrigatoriamente chamado antes de manipular qualquer variável de sessão?
* **Gabarito Esperado:** Variáveis de sessão (`$_SESSION`) são mecanismos que armazenam informações do usuário no servidor para manter o estado de autenticação entre diferentes páginas durante a navegação (suprindo o fato de o HTTP não guardar estado). Para iniciá-las ou recuperá-las, é obrigatório chamar a função `session_start()` no início do script PHP.

### Questão 7 (Proteção de Páginas e Redirecionamento)
**Pergunta:** Explique como funciona o mecanismo de segurança que impede que um usuário não autenticado acesse uma página restrita (como `restrito.php`) digitando o endereço diretamente no navegador. Cite os comandos PHP envolvidos.
* **Gabarito Esperado:** No topo da página restrita, inicia-se a sessão com `session_start()` e utiliza-se uma estrutura condicional `if (!isset($_SESSION['assinante_id']))` para verificar se a variável de sessão do login existe. Caso não exista, o servidor executa `header("Location: login.html");` seguido de `exit;`, redirecionando o visitante imediatamente para a tela de login.

### Questão 8 (Encerramento de Sessão / Logout)
**Pergunta:** Descreva o passo a passo lógico que deve ser implementado em um arquivo de logout (como `sair.php`) para desconectar com segurança um assinante do sistema.
* **Gabarito Esperado:** O arquivo deve iniciar a sessão atual com `session_start()`, limpar os dados da sessão com `session_unset()`, destruir a sessão armazenada no servidor utilizando `session_destroy()` e, por fim, redirecionar o usuário para a tela de login ou página inicial com `header("Location: login.html");`.

---

## 3. Checklist de Homologação Final em Bancada (Projeto Integrador)

Na segunda metade da aula, avalie o funcionamento prático da pasta do projeto ([`Projeto Completo/`](../Projeto%20Completo/)) verificando os **5 requisitos integrados**:

- [ ] **1. Interface e Estrutura:** Formulário `cadastro.html` e tela `login.html` estruturados e navegáveis.
- [ ] **2. Conexão Ativa:** Arquivo `conexao.php` conectando sem erros ao banco `editora_brasil` no MySQL.
- [ ] **3. Gravação e Senha Automática:** `processa_cadastro.php` gerando senha com `substr()`/`strtolower()`, bloqueando e-mail duplicado e salvando via `INSERT INTO`.
- [ ] **4. Listagem Dinâmica:** `listar_assinantes.php` recuperando os registros com `SELECT` e exibindo em tabela HTML com laço `while`.
- [ ] **5. Autenticação e Sessão:** `autenticar.php`, `restrito.php` e `sair.php` validando login, mantendo `$_SESSION`, bloqueando acesso direto via `header()` e encerrando com `session_destroy()`.
