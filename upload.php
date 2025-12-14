<?php require 'db.php';
if (!isset($_SESSION['user_id'])) { header('Location: index.php'); exit; }

if (!isset($_FILES['letter_file']) || $_FILES['letter_file']['error'] !== UPLOAD_ERR_OK) {
  die('Tidak ada file yang dipilih atau terjadi kesalahan upload.');
}

$allowed = ['pdf','doc','docx','txt'];
$ext = strtolower(pathinfo($_FILES['letter_file']['name'], PATHINFO_EXTENSION));
if (!in_array($ext, $allowed)) {
  die('Format file tidak didukung.');
}

$uploadDir = __DIR__ . '/uploads';
if (!is_dir($uploadDir)) {
  mkdir($uploadDir, 0777, true);
}

$base = bin2hex(random_bytes(8)) . '.' . $ext;
$target = __DIR__ . '/uploads/' . $base;

if (!move_uploaded_file($_FILES['letter_file']['tmp_name'], $target)) {
  die('Gagal menyimpan file.');
}

$stmt = $pdo->prepare('INSERT INTO letters (user_id, title, file_path) VALUES (?,?,?)');
$title = pathinfo($_FILES['letter_file']['name'], PATHINFO_FILENAME);
$stmt->execute([$_SESSION['user_id'], $title, 'uploads/'.$base]);

header('Location: index.php');
