<?php
if (!isset($_GET['file'])) die('File tidak ditemukan.');
$file = basename($_GET['file']);
$path = __DIR__ . '/uploads/' . $file;
if (!file_exists($path)) die('File tidak ditemukan.');

header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . $file . '"');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($path));
readfile($path);
exit;
?>