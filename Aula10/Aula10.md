# 📅 AULA 10 (09/11) — Tema Central:
## UNIDADE 5 & 6 – ESTRUTURAS DE CONTROLE EM PHP E INTRODUÇÃO AO BANCO DE DADOS MYSQL

* **Duração:** 3h30m – 4h00m (Teoria Direta + Prática em Laboratório)
* **Projeto Fio Condutor:** Sistema de Vendas de Assinaturas da **EDITORA BR@SIL**

---

## 1. Conteúdo Teórico Estruturado (Textos para Slides)

### Tópico 1: Estruturas de Decisão no Servidor (`if`, `else if`, `else`)

* **Subtópico: Tomada de decisão em PHP.**
  * **Texto para Slide:** Assim como na linguagem C ou JavaScript, o PHP utiliza operadores lógicos e relacionais (`==`, `!=`, `>`, `<`, `&&`, `||`) para controlar o fluxo da aplicação. No ambiente do servidor, o comando `if` valida se o usuário preencheu campos obrigatórios ou selecionou opções válidas antes de avançar para a gravação no banco de dados.
* **Subtópico: A função `empty()` e consistência de dados.**
  * **Texto para Slide:** Para testar se uma variável recebida via `$_POST` está vazia ou sem valor preenchido, empregamos estruturas como `if (empty($nome))` ou comparações diretas `$nome == ""`. Isso impede que registros vazios contaminem a base de dados da Editora.

### Tópico 2: Fundamentos de Banco de Dados Relacional e MySQL

* **Subtópico: O que é o SGBD MySQL?**
  * **Texto para Slide:** O MySQL é um Sistema de Gerenciamento de Banco de Dados (SGBD) relacional. Ele organiza os dados em tabelas compostas por linhas (registros) e colunas (campos tipados). A comunicação entre o PHP e o MySQL é o núcleo do desenvolvimento de sites dinâmicos.
* **Subtópico: Chave Primária e Tipos de Dados.**
  * **Texto para Slide:**
    * `INT AUTO_INCREMENT PRIMARY KEY`: Identificador numérico exclusivo gerado automaticamente pelo banco para cada assinante.
    * `VARCHAR(tamanho)`: Campo de texto de tamanho variável (usado para nomes, e-mails e senhas).
    * `DATE`: Tipo de dado específico para armazenar datas no padrão do banco (`AAAA-MM-DD`).

### Tópico 3: Conexão do PHP com o MySQL via `mysqli`

* **Subtópico: Estabelecendo a comunicação.**
  * **Texto para Slide:** Para abrir comunicação com o banco MySQL, o PHP utiliza a função `mysqli_connect()` com quatro parâmetros essenciais:
    1. **Servidor:** `"localhost"`
    2. **Usuário:** `"root"`
    3. **Senha:** `"root"` no GitHub Codespaces *(ou `""` vazia por padrão no XAMPP local)*
    4. **Banco de Dados:** `"editora_brasil"`
* **Subtópico: Tratamento de Falhas.**
  * **Texto para Slide:** Se o serviço MySQL estiver desligado ou as credenciais forem digitadas incorretamente, a função `mysqli_connect_error()` identifica a falha e o comando `die()` interrompe o script com uma mensagem clara de erro.

---

## 2. Prática em Laboratório (Mão na Massa Passo a Passo)

### 💻 LABORATÓRIO 07: DECISÕES EM PHP E CONEXÃO COM O MYSQL

**Objetivo:** Criar a base de dados e a tabela de assinantes no **phpMyAdmin**, aplicar validação condicional com `if/else` no processamento do formulário e construir o módulo reutilizável de conexão `conexao.php`.

#### PASSO 1: Iniciar os Serviços e Acessar o phpMyAdmin
* **No GitHub Codespaces:** Vá até a aba **PORTS** do VS Code, localize a **Porta `8080` (`phpMyAdmin`)** e clique no ícone do Globo (**Open in Browser**). Faça login com Usuário `root` e Senha `root`.
* **No XAMPP Local:** Abra o XAMPP Control Panel, inicie **Apache** e **MySQL** (ambos verdes) e acesse `http://localhost/phpmyadmin`.

#### PASSO 2: Criar o Banco e a Tabela da Editora
1. No menu lateral esquerdo do phpMyAdmin, clique em **Novo (New)**.
2. No campo **Nome da base de dados**, digite: `editora_brasil` e clique em **Criar**.
3. Clique na aba superior **SQL**, cole o script abaixo e clique em **Executar (Go)**:

```sql
CREATE TABLE assinantes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    plano VARCHAR(50) NOT NULL,
    data_cadastro DATE NOT NULL
);
```

4. Verifique se a tabela `assinantes` apareceu listada abaixo do banco `editora_brasil`.

#### PASSO 3: Criar o Script de Conexão (`conexao.php`)
Isolamos as configurações do banco em um único arquivo para reaproveitá-lo em todas as páginas do sistema:

```php
<?php
// Parâmetros de acesso ao SGBD MySQL
$servidor = "localhost";
$usuario  = "root";
$senha    = "root"; // No GitHub Codespaces usamos "root" (no XAMPP local seria "")
$banco    = "editora_brasil";

// 1. Criando o link de conexão
$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

// 2. Verificando se houve erro na tentativa de conexão
if (!$conexao) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

// Configuração opcional para garantir acentuação correta
mysqli_set_charset($conexao, "utf8");
?>
```

#### PASSO 4: Atualizar o Formulário (`cadastro.html`)
Adicionamos o campo de e-mail ao formulário para deixá-lo compatível com a estrutura da tabela `assinantes`.

#### PASSO 5: Aplicar Validações com `if/else` (`processa_cadastro.php`)
Incluímos o `conexao.php` com `require_once` e validamos se algum campo ficou em branco usando `if (empty($nome) || empty($email) || empty($plano))`.

#### PASSO 6: Testar e Validar os Cenários
* **Teste 1 (Validação de Erro):** Deixe o campo de nome vazio e clique em `"Avançar para Assinatura"`. Deve exibir a mensagem vermelha de erro.
* **Teste 2 (Validação de Sucesso):** Preencha nome, e-mail e selecione um plano. Deve exibir a tela verde de confirmação com o status da conexão ativa com o banco `editora_brasil`.
