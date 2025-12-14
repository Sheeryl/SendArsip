<?php require 'db.php';
if (!isset($_SESSION['user_id'])) { header('Location: index.php'); exit; }
$err=''; $ok='';

if ($_SERVER['REQUEST_METHOD']==='POST'){
  $name = trim($_POST['name'] ?? '');
  $email = trim($_POST['email'] ?? '');
  if ($name && $email){
    $stmt = $pdo->prepare('UPDATE users SET name=?, email=? WHERE id=?');
    $stmt->execute([$name,$email,$_SESSION['user_id']]);
    $ok='Profil diperbarui.';
  } else { $err='Nama dan email wajib diisi.'; }
}

$stmt = $pdo->prepare('SELECT * FROM users WHERE id=?');
$stmt->execute([$_SESSION['user_id']]);
$u = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="id">
<head><meta charset="utf-8"><title>Edit Profil</title><link rel="stylesheet" href="style.css"></head>
<body>
  <div style="max-width:560px;margin:120px auto;background:#fff;border:1px solid #eee;border-radius:16px;padding:20px;box-shadow:var(--shadow)">
    <h2>Edit Profil</h2>
    <?php if($err): ?><div style="color:#b00"><?php echo $err; ?></div><?php endif; ?>
    <?php if($ok): ?><div style="color:#070"><?php echo $ok; ?></div><?php endif; ?>
    <form method="post">
      <label>Nama<br><input name="name" value="<?php echo htmlspecialchars($u['name']); ?>" class="title-input" style="max-width:100%"></label>
      <label>Email<br><input name="email" value="<?php echo htmlspecialchars($u['email']); ?>" class="title-input" style="max-width:100%"></label>
      <a href="profile.php" button class="btn unduh" type="submit">Simpan</button>
      <a class="btn hapus" href="profile.php">Batal</a>
    </form>
  </div>
</body>
</html>
