## CRUD FUTEBOL

## ARQUIVOS

- `banco.sql`: script SQL para criar banco de dados e tabela(s).
- `db.php`: arquivo para configurar e conectar ao banco de dados.
- `create.php`: insere novos registros.
- `read.php`: exibe registros existentes.
- `update.php`: atualiza registros.
- `delete.php`: exclui registros.

## Como Executar no XAMPP

1. *Baixar e instalar o XAMPP*
   - Se ainda não o tem, baixe e instale normalmente.
2. *Ativar Apache e MySQL*
   - Abra o painel do XAMPP e inicie o **Apache** e **MySQL**.
3. *Copiar os arquivos para a pasta do servidor*
   - Copie o conteúdo deste repositório para `C:\xampp\htdocs\crud-futebol`
  
## Rodando o programa

1. Com o repositório clonado no VScode, é só mudar as credências da página db.php para suas configurações do XAMPP
2. Abrir o painel do XAMPP e clicar em admin ao lado do MySQL (Colocando no navegador localhost:[Sua porta]/phpmyadmin/)
3. Copiar o banco de dados do arquivo banco.sql e criar ele no phpmyadmin na aba SQL
4. Após cria-lo, abrir no navegador o seu servidor (localhost:[Sua porta]/[Sua pasta criada dentro do htdocs]/)
5. Selecionar o arquivo read ou create e começar a usar o programa
