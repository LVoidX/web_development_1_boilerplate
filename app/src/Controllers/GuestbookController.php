<?php

namespace App\Controllers;

class GuestbookController
{
    public function getAll($vars = [])
    {
        $host = getenv('DB_HOST');
        $dbname = getenv('DB_NAME');
        $user = getenv('DB_USER');
        $password = getenv('DB_PASSWORD');

        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

        // \PDO: we are inside namespace App\Controllers, so plain "PDO" would mean App\Controllers\PDO.
        $connection = new \PDO($dsn, $user, $password);

        $result = $connection->query("SELECT name, message, posted_at FROM posts ORDER BY posted_at DESC");
        $posts = $result->fetchAll(\PDO::FETCH_ASSOC);

        require __DIR__ . '/../Views/guestbook.php';
    }

    public function addPost($vars = [])
    {
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $message = trim($_POST['message']);

        $host = getenv('DB_HOST');
        $dbname = getenv('DB_NAME');
        $user = getenv('DB_USER');
        $password = getenv('DB_PASSWORD');

        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

        // make sure name and message aren't empty
        if (empty($name) || empty($message)) {
            http_response_code(400);
            echo 'Name and message are required';
            exit;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            http_response_code(400);
            echo 'Invalid email address';
            exit;
        }

        $connection = new \PDO($dsn, $user, $password);

        $stmt = $connection->prepare("INSERT INTO posts (name, email, message, posted_at) VALUES (?, ?, ?, NOW())");
        $stmt->execute([$name, $email, $message]);

        header('Location: /guestbook');
        exit;
    }
}
