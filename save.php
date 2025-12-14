<?php

// proses upload file surat
$namaFile = null;
if (isset($_FILES['file_surat']) && $_FILES['file_surat']['error'] == 0) {
    $namaFile = time() . "_" . basename($_FILES['file_surat']['name']);
    $target = "uploads/" . $namaFile;
    if (!is_dir("uploads")) {
        mkdir("uploads", 0777, true);
    }
    move_uploaded_file($_FILES['file_surat']['tmp_name'], $target);
}
 require 'db.php';
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) { echo json_encode(['ok'=>false,'error'=>'unauthorized']); exit; }

$id = $_POST['id'] ?? null;
$title = trim($_POST['title'] ?? 'Untitled');
$content = $_POST['content'] ?? '';

try {
  if ($id){
    $stmt = $pdo->prepare('UPDATE letters SET title=?, content=? WHERE id=? AND user_id=?');
    $stmt->execute([$title, $content, $id, $_SESSION['user_id']]);
    echo json_encode(['ok'=>true, 'id'=>$id]);
  } else {
    $stmt = $pdo->prepare('INSERT INTO letters (user_id, title, content) VALUES (?,?,?)');
    $stmt->execute([$_SESSION['user_id'], $title, $content]);
    echo json_encode(['ok'=>true, 'id'=>$pdo->lastInsertId()]);
  }
} catch (Exception $e){
  echo json_encode(['ok'=>false, 'error'=>$e->getMessage()]);
}
