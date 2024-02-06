<?php
class Conn
{
    public $host = 'localhost';
    public $port = '3306';
    public $dbName = 'imobiliaria';
    public $user = 'root';
    public $password = '';
    public $connect = null;

    public function connection()
    {
        try {
            $this->connect = new PDO("mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->dbName . ";user=" . $this->user . ";password=" . $this->password);
            //echo 'Conexão com o banco de dados realizada com sucesso!';
            return $this->connect;
        } catch (PDOException $e) {
            echo ' conexão falhou e retorno a seguinte mensagem de erro: ' . $e->getMessage();
            return false;
        }
    }
}
