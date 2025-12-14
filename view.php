<?php
if (!isset($_GET['file'])) die('File tidak ditemukan.');
$file = basename($_GET['file']);
$ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
$path = __DIR__ . '/uploads/' . $file;
if (!file_exists($path)) die('File tidak ditemukan.');

if ($ext === 'pdf') {
    echo '<iframe src="uploads/' . htmlspecialchars($file) . '" width="100%" height="600"></iframe>';
} elseif ($ext === 'txt') {
    echo '<pre style="background:#f4f4f4;padding:1em;">' . htmlspecialchars(file_get_contents($path)) . '</pre>';
} elseif ($ext === 'doc' || $ext === 'docx') {
    // URL publik ke file
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
    $url = $protocol . "://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/uploads/" . rawurlencode($file);
    echo '<iframe src="https://docs.google.com/gview?url=' . $url . '&embedded=true" style="width:100%; height:600px;" frameborder="0"></iframe>';
} else {
    echo 'Format file tidak didukung untuk preview.';
}
?>