# Projeto CRUD Simples em PHP usando PDO

## Criar e Executar o Banco de Dados

1. Crie o banco de dados `imobiliaria` com o conjunto de caracteres `utf8mb4` e a colação `utf8mb4_unicode_ci`.
   ```sql
   CREATE DATABASE imobiliaria CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   USE imobiliaria;

2. Crie a tabela `corretores`
```sql
CREATE TABLE corretores (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome VARCHAR(32) NOT NULL,
    cpf VARCHAR(11) NOT NULL UNIQUE,
    creci VARCHAR(4) NOT NULL UNIQUE
);


