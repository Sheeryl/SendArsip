<?php require 'db.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SendSurat - Dashboard</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <aside>
    <div class="brand">
      <div class="logo">📡</div>
      <div><strong>SendSurat</strong></div>
    </div>
    <div class="sidebar-group">
      <div class="item" onclick="toggleMenu('menu-dashboard')">Dashboard</div>
      <div class="item" onclick="toggleMenu('menu-pelayanan')">Layanan <span>+</span></div>
      <div id="menu-pelayanan" class="submenu">
        <a href="#">Hunian</a>
        <a href="#">Gedung</a>
      </div>
      <div class="item" onclick="toggleMenu('menu-info')">Info <span>+</span></div>
      <div id="menu-info" class="submenu">
        <a href="#">Tentang</a>
        <a href="#">Bantuan</a>
      </div>
    </div>
  </aside>

  <main>
    <div class="topbar">
      <div class="clock" id="clock">--:--</div>
      <div class="profile">
        <div class="avatar" onclick="toggleProfile()">👤</div>
        <div class="dropdown" id="profileDropdown">
          <a href="profile.php">Profil</a>
          <a href="edit_profile.php">Edit Profil</a>
          <a href="logout.php">Keluar</a>
        </div>
      </div>
    </div>

    <section class="hero">
      <h2>Selamat Datang di SendSurat</h2>
      <p>Atur surat Anda dengan mudah. Bisa buat, unggah, dan simpan di sini.</p>
      <button class="cta" onclick="location.href='compose.php'">Mulai Sekarang</button>
    </section>

    <div class="toolbar">
      <div class="search">
        <span>🔎</span>
        <input type="text" id="searchInput" placeholder="Cari surat..." 
               onkeyup="filterTable(this.value)" 
               style="margin-bottom:10px;width:250px;padding:6px;">
      </div>
      <form id="uploadForm" action="upload.php" method="post" enctype="multipart/form-data" style="display:none">
        <input type="file" name="letter_file" id="fileInput" accept=".pdf,.doc,.docx,.txt">
      </form>
      <button class="btn tambah" onclick="document.getElementById('fileInput').click()"> + Upload Surat</button>
    </div>

    <div class="table">
      <table width="100%">
        <thead>
          <tr>
            <th>Judul</th>
            <th>Pengirim</th>
            <th>Tanggal</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody id="tbody">
<?php
$stmt = $pdo->query('
  SELECT l.id, l.title, l.file_path, u.username, l.created_at
  FROM letters l
  JOIN users u ON l.user_id = u.id
  ORDER BY l.created_at DESC
');

while ($row = $stmt->fetch()) {
    echo '<tr>';
    echo '<td><a href="view.php?file=' . urlencode(basename($row['file_path'])) . '" target="_blank">' . htmlspecialchars($row['title']) . '</a></td>';
    echo '<td>' . htmlspecialchars($row['username']) . '</td>';
    echo '<td>' . date('d-m-Y H:i', strtotime($row['created_at'])) . '</td>';
    echo '<td>
      <a href="download.php?file=' . urlencode($row['file_path']) . '" class="btn unduh" target="_blank">Unduh</a>
      <a href="delete.php?id=' . $row['id'] . '" class="btn hapus" onclick="return confirm(\'Hapus File ini?\')">Hapus</a>
    </td>';
    echo '</tr>';
}
?>
        </tbody>
      </table>
    </div>
  </main>
</div>

<script>
function toggleMenu(id){
  const el = document.getElementById(id);
  if(!el) return;
  el.style.display = (el.style.display === 'block') ? 'none' : 'block';
}
function toggleProfile(){
  const dd = document.getElementById('profileDropdown');
  dd.style.display = dd.style.display === 'block' ? 'none' : 'block';
} 
document.addEventListener('click', (e)=>{
  const dd = document.getElementById('profileDropdown');
  if(!e.target.closest('.profile')) dd.style.display='none';
});

function updateClock(){
  const now = new Date();
  const d = now.toLocaleDateString('id-ID', { year:'numeric', month:'short', day:'numeric'});
  const t = now.toLocaleTimeString('id-ID', {hour:'2-digit', minute:'2-digit', second:'2-digit'});
  document.getElementById('clock').textContent = d + ' • ' + t;
}
setInterval(updateClock, 1000);
updateClock();

document.getElementById('fileInput').addEventListener('change', ()=>{
  document.getElementById('uploadForm').submit();
});

function filterTable(q){
  q = (q||'').toLowerCase();
  document.querySelectorAll('#tbody tr').forEach(tr=>{
    tr.style.display = tr.textContent.toLowerCase().includes(q) ? '' : 'none';
  });
}
</script>
</body>
</html>
