<?php
class Database {
    private $host = '127.0.0.1';
    private $db   = 'database_name';
    private $user = 'db_user';
    private $pass = 'db_pass';
    private $charset = 'utf8mb4';

    public function conectar() {
        $dsn = "mysql:host={$this->host};dbname={$this->db};charset={$this->charset}";
        try {
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            return new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            error_log('Database connection error: ' . $e->getMessage());
            return false;
        }
    }
}
