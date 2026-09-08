<?php

class Auth
{
    public function __construct()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    public function isLoggedIn(): bool
    {
        return isset($_SESSION['id']);
    }

    public function getId(): ?int
    {
        return isset($_SESSION['id']) ? (int) $_SESSION['id'] : null;
    }

    public function logout(): void
    {
        $_SESSION = [];
        if (ini_get('session.use_cookies')) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
        }
        session_destroy();
    }

    public function getAllUser(PDO $pdo): array
    {
        return $pdo->query('SELECT id, username FROM admin')->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createUser(PDO $pdo, string $user, string $password): bool
    {
        $user = trim($user);
        if ($user === '' || strlen($user) > 50 || strlen($password) < 8 || strlen($password) > 72) {
            return false;
        }

        $query = $pdo->prepare('SELECT id FROM admin WHERE username = :user');
        $query->execute(['user' => $user]);
        if ($query->fetch()) {
            return false;
        }

        $query = $pdo->prepare('INSERT INTO admin (username, password) VALUES (:user, :password)');
        try {
            return $query->execute([
                'user' => $user,
                'password' => password_hash($password, PASSWORD_DEFAULT),
            ]);
        } catch (PDOException $e) {
            if (($e->errorInfo[1] ?? null) === 1062) {
                return false;
            }
            throw $e;
        }
    }

    public function login(PDO $pdo, string $user, string $password): bool
    {
        if (trim($user) === '' || $password === '' || strlen($password) > 72) {
            return false;
        }

        $query = $pdo->prepare('SELECT id, password FROM admin WHERE username = :user');
        $query->execute(['user' => trim($user)]);
        $account = $query->fetch(PDO::FETCH_ASSOC);
        if (!$account || !password_verify($password, $account['password'])) {
            return false;
        }

        session_regenerate_id(true);
        $_SESSION['id'] = (int) $account['id'];
        return true;
    }
}
