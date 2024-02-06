<?php 

require 'Conn.php';

class Corretor
{
    private int $id;
    private string $nome;
    private string $cpf;
    private string $creci;
    private $connect;

    public function __construct(string $nome, string $cpf, string $creci) {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->creci = $creci;
    }

    public function getId(): int {
        return $this->id;
    }

    public function insert() {
        $conn = new Conn();
        $this->connect = $conn->connection();

        $query_insert_corretor = "INSERT INTO corretores (nome, cpf, creci) VALUES (:nome, :cpf, :creci)";
        $corretor = $this->connect->prepare($query_insert_corretor);
        $corretor->bindParam(':nome', $this->nome);
        $corretor->bindParam(':cpf', $this->cpf);
        $corretor->bindParam(':creci', $this->creci);

        return $corretor->execute();
    }

    public function read() {
        $conn = new Conn();
        $this->connect = $conn->connection();

        $query_read_corretores = "SELECT id, nome, cpf, creci FROM corretores ORDER BY id DESC LIMIT 10";
        $list_corretores = $this->connect->prepare($query_read_corretores);
        $list_corretores->execute();

        return $list_corretores->fetchAll();

    }

    public function update(int $id, string $nome, string $cpf, string $creci) {
        $conn = new Conn();
        $this->connect = $conn->connection();

        $query_update_corretor = "UPDATE corretores SET nome = :nome, cpf = :cpf, creci = :creci WHERE id = :id";
        $corretor = $this->connect->prepare($query_update_corretor);
        $corretor->bindParam(':id', $id);
        $corretor->bindParam(':nome', $nome);
        $corretor->bindParam(':cpf', $cpf);
        $corretor->bindParam(':creci', $creci);

        return $corretor->execute();
    }

    public function delete(int $id) :bool{
        $conn = new Conn();
        $this->connect = $conn->connection();

        $query_delete_corretor = "DELETE FROM corretores WHERE id = :id";
        $corretor = $this->connect->prepare($query_delete_corretor);
        $corretor->bindParam(':id', $id);

        return $corretor->execute();
    }

    public function checkExistence(string $cpf, string $creci) :bool{
        $conn = new Conn();
        $this->connect = $conn->connection();
    
        $query_check_existence = "SELECT COUNT(*) FROM corretores WHERE cpf = :cpf OR creci = :creci";
        $corretor = $this->connect->prepare($query_check_existence);
        $corretor->bindParam(':cpf', $cpf);
        $corretor->bindParam(':creci', $creci);
        $corretor->execute();
    
        $count = $corretor->fetchColumn();

        return $count > 0;
    }
    
}