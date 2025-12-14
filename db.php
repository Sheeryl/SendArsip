<?php
// Database connection + session
if (session_status() === PHP_SESSION_NONE) { session_start(); }

$DB_HOST = getenv('DB_HOST') ?: 'localhost';
$DB_NAME = getenv('DB_NAME') ?: 'sendsurat';
$DB_USER = getenv('DB_USER') ?: 'root';
$DB_PASS = getenv('DB_PASS') ?: '';

try {
  $pdo = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8mb4", $DB_USER, $DB_PASS, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
  ]);
} catch (Exception $e) {
  die('DB error: ' . $e->getMessage());
}

// super-simple auth bootstrap: auto login demo user if not set (for local preview)
if (!isset($_SESSION['user_id'])) {
  $stmt = $pdo->prepare('SELECT id FROM users WHERE username=? LIMIT 1');
  $stmt->execute(['demo']);
  $demo = $stmt->fetch();
  if ($demo) { $_SESSION['user_id'] = $demo['id']; }
}
?>
