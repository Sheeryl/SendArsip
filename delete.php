<?php
require 'db.php';
$id = intval($_GET['id']);

// Ambil file_path dari surat
$stmt = $pdo->prepare("SELECT file_path FROM letters WHERE id=?");
$stmt->execute([$id]);
$row = $stmt->fetch();
if ($row && $row['file_path'] && file_exists($row['file_path'])) {
    unlink($row['file_path']);
}

// Hapus data surat
$stmt = $pdo->prepare("DELETE FROM letters WHERE id=?");
$stmt->execute([$id]);

header("Location: index.php");
exit;
?>