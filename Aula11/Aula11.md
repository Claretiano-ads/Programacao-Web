# 📅 AULA 11 (16/11) — Tema Central:
## UNIDADE 6 – PERSISTÊNCIA DE DADOS NO MYSQL (`INSERT`) E GERAÇÃO AUTOMÁTICA DE SENHAS EM PHP

* **Duração:** 3h30m – 4h00m (Teoria Direta + Prática em Laboratório)
* **Projeto Fio Condutor:** Sistema de Vendas de Assinaturas da **EDITORA BR@SIL**

---

## 1. Conteúdo Teórico Estruturado (Textos para Slides)

### Tópico 1: Manipulação de Strings e Geração Automática de Senha

* **Subtópico: Funções Nativas de Texto (`substr` e `strtolower`).**
  * **Texto para Slide:** O PHP possui funções nativas prontas para tratar e gerar credenciais dinamicamente a partir dos dados informados pelo assinante. A função `substr($texto, inicio, quantidade)` extrai um pedaço de uma string, enquanto `strtolower($texto)` converte todas as letras para minúsculas, padronizando senhas geradas pelo sistema.
* **Subtópico: Regra de Negócio da Editora Br@sil.**
  * **Texto para Slide:** Ao efetuar a assinatura pela primeira vez, o sistema gera automaticamente uma senha inicial combinando trechos do nome e do e-mail do cliente, exibindo essa credencial na tela de confirmação para que o assinante possa acessar sua área restrita posteriormente.

### Tópico 2: Inserindo Dados nas Tabelas via PHP (`INSERT INTO`)

* **Subtópico: A Instrução SQL `INSERT`.**
  * **Texto para Slide:** Para gravar permanentemente um novo registro no banco de dados MySQL, utilizamos o comando SQL `INSERT INTO nome_tabela (coluna1, coluna2) VALUES ('valor1', 'valor2')`. Valores de texto e data devem ficar sempre entre aspas simples dentro da instrução SQL.
* **Subtópico: Executando a Query no PHP (`mysqli_query`).**
  * **Texto para Slide:** A função `mysqli_query($conexao, $sql)` envia o comando SQL para o servidor MySQL executar. Ela retorna `true` se o registro foi gravado com sucesso ou `false` caso ocorra algum erro de sintaxe ou conexão.

### Tópico 3: Verificação de Duplicidade e Feedback Visual

* **Subtópico: Evitando Cadastros Repetidos (`SELECT` + `mysqli_num_rows`).**
  * **Texto para Slide:** Antes de inserir um novo assinante, executamos uma consulta prévia (`SELECT id FROM assinantes WHERE email = '$email'`) e checamos com `mysqli_num_rows($resultado)` quantas linhas retornaram. Se o resultado for `0`, o e-mail ainda não existe e o cadastro pode prosseguir.
* **Subtópico: Melhorando a Saída para o Usuário.**
  * **Texto para Slide:** Após a gravação bem-sucedida, o PHP alterna entre blocos de código e marcação HTML para apresentar um comprovante organizado contendo os dados da compra, o login e a senha gerada.

---

## 2. Prática em Laboratório (Mão na Massa Passo a Passo)

### 💻 LABORATÓRIO 08: SALVANDO ASSINATURAS NO BANCO MYSQL

**Objetivo:** Atualizar a tabela `assinantes` no **phpMyAdmin** para comportar a senha gerada, implementar a geração automática de senha em PHP com `substr()` e `strtolower()` e gravar os dados do formulário no banco de dados usando `INSERT INTO`.

#### PASSO 1: Adicionar a Coluna `senha` na Tabela do MySQL
1. Abra o **phpMyAdmin** (Porta `8080` no GitHub Codespaces com usuário `root` e senha `root`, ou `http://localhost/phpmyadmin` no XAMPP).
2. Clique no banco **`editora_brasil`**, vá na aba **SQL**, cole o comando abaixo e clique em **Executar**:

```sql
ALTER TABLE assinantes ADD senha VARCHAR(20) NOT NULL AFTER email;
```

3. Clique na tabela `assinantes` para confirmar que os campos agora são: `id`, `nome`, `email`, `senha`, `plano` e `data_cadastro`.

#### PASSO 2: Implementar a Gravação e Geração de Senha (`processa_cadastro.php`)
Evoluímos o arquivo `processa_cadastro.php` para verificar se o e-mail já existe, gerar a senha automática e executar o `INSERT INTO`.

#### PASSO 3: Testar a Persistência Real ("A Prova dos Nove")
1. Preencha o formulário com seus dados reais (ex: `Maria Silva`, `maria@email.com`, `Revista Anual`) e clique em **Avançar para Assinatura**.
2. **Verifique na Tela:** Apareceu a caixa com o comprovante e a senha gerada em minúsculo (ex: `marmar26`)?
3. **Verifique no Banco de Dados (phpMyAdmin):** Volte na aba do phpMyAdmin, clique na tabela `assinantes` e clique em **Visualizar (Browse)** para ver o registro gravado com `id = 1`.
4. **Teste de Duplicidade:** Volte no formulário e tente cadastrar o mesmo e-mail novamente. O sistema deve bloquear e exibir o aviso laranja de e-mail já cadastrado!
