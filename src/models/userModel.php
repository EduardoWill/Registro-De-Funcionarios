<?php
require_once __DIR__ . '/../config/database.php';

class Funcionario {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->conectar();
    }

    public function listar() {
        $sql = "SELECT * FROM funcionarios";
        $stmt = $this->conn->query($sql);
        if ($stmt === false) {
            return [];
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function criar($nome, $cargo, $email, $re) {
        $sql = "INSERT INTO funcionarios (re, nome, cargo, email )
                VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([ $re , $nome, $cargo, $email]);
    }

    public function excluir($id) {
        $sql = "DELETE FROM funcionarios WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }
}
