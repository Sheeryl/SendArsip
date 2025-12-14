<?php require 'db.php';
if (!isset($_SESSION['user_id'])) { header('Location: index.php'); exit; }
$stmt = $pdo->prepare('SELECT * FROM users WHERE id=?');
$stmt->execute([$_SESSION['user_id']]);
$u = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="id">
<head><meta charset="utf-8"><title>Profil</title><link rel="stylesheet" href="style.css"></head>
<body>
  <div style="max-width:560px;margin:190px auto;background:#fff;border:2px solid #eee;border-radius:36px;padding:40px;box-shadow:var(--shadow)">
    <h2>Profil</h2>
    <p><strong>Nama:</strong> <?php echo htmlspecialchars($u['name']); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($u['email']); ?></p>
    <p><strong>Username:</strong> <?php echo htmlspecialchars($u['username']); ?></p>
    <a class="btn unduh" href="edit_profile.php">Edit Profil</a>
    <a class="btn hapus" href="index.php">Kembali</a>
  </div>
</body>
</html>
