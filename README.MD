# Projeto CRUD Simples em PHP usando PDO

## Criar e Executar o Banco de Dados
   ```sql
   CREATE DATABASE imobiliaria CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   USE imobiliaria;

Criar a tabela `corretores`
```sql
CREATE TABLE corretores (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome VARCHAR(32) NOT NULL,
    cpf VARCHAR(11) NOT NULL UNIQUE,
    creci VARCHAR(4) NOT NULL UNIQUE
);


