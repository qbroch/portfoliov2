<?php

require_once __DIR__ . '/../vendor/autoload.php';

class Database
{
    private PDO $pdo;

    public function __construct()
    {
        Dotenv\Dotenv::createImmutable(dirname(__DIR__))->load();
        $host = $_ENV['DB_HOST'];
        $name = $_ENV['DB_NAME'];
        $this->pdo = new PDO(
            "mysql:host=$host;dbname=$name;charset=utf8mb4",
            $_ENV['DB_USER'],
            $_ENV['DB_PASSWORD'],
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
             PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
             PDO::ATTR_EMULATE_PREPARES => false]
        );
    }

    public function getConnection(): PDO
    {
        return $this->pdo;
    }
}
