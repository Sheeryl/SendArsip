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
  <!-- SIDEBAR -->
  <aside>
    <div class="brand">
      <div class="logo">📡</div>
      <div><strong>SendSurat</strong></div>
    </div>

    <div class="sidebar-group">
      <div class="item" onclick="toggleMenu('menu-dashboard')">Dashboard</div>

      <div class="item" onclick="toggleMenu('menu-pelayanan')">
        Layanan <span>+</span>
      </div>
      <div id="menu-pelayanan" class="submenu">
        <a href="#">Hunian</a>
        <a href="#">Gedung</a>
      </div>

      <div class="item" onclick="toggleMenu('menu-info')">
        Info <span>+</span>
      </div>
      <div id="menu-info" class="submenu">
        <a href="#">Tentang</a>
        <a href="#">Bantuan</a>
      </div>
    </div>
  </aside>

  <!-- MAIN -->
  <main>
    <!-- TOPBAR -->
    <div class="topbar">
      <div class="clock" id="clock">--:--</div>
      <div class="profile">
        <div class="avatar" onclick="toggleProfile()">👤</div>
        <div class="dropdown" id="profileDropdown">
          <a href="#">Profil</a>
          <a href="#">Edit Profil</a>
          <a href="#">Keluar</a>
        </div>
      </div>
    </div>

    <!-- HERO -->
    <section class="hero">
      <h2>Selamat Datang di SendSurat</h2>
      <p>Atur surat Anda dengan mudah. Bisa buat, unggah, dan simpan di sini.</p>
      <button class="cta">Mulai Sekarang</button>
    </section>

    <!-- TOOLBAR -->
    <div class="toolbar">
      <div class="search">
        <span>🔎</span>
        <input type="text" id="searchInput"
               placeholder="Cari surat..."
               onkeyup="filterTable(this.value)"
               style="width:250px;padding:6px;">
      </div>

      <input type="file" id="fileInput" style="display:none">
      <button class="btn tambah"
              onclick="document.getElementById('fileInput').click()">
        + Upload Surat
      </button>
    </div>

    <!-- TABLE -->
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
          <tr>
            <td><a href="#" target="_blank">Surat Undangan Rapat</a></td>
            <td>Admin</td>
            <td>10-12-2025 09:30</td>
            <td>
              <a href="#" class="btn unduh">Unduh</a>
              <a href="#" class="btn hapus" onclick="return confirm('Hapus file ini?')">
                Hapus
              </a>
            </td>
          </tr>

          <tr>
            <td><a href="#" target="_blank">Surat Pengumuman</a></td>
            <td>Staff</td>
            <td>09-12-2025 14:00</td>
            <td>
              <a href="#" class="btn unduh">Unduh</a>
              <a href="#" class="btn hapus" onclick="return confirm('Hapus file ini?')">
                Hapus
              </a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </main>
</div>

<!-- JAVASCRIPT -->
<script>
function toggleMenu(id){
  const el = document.getElementById(id);
  if(!el) return;
  el.style.display = el.style.display === 'block' ? 'none' : 'block';
}

function toggleProfile(){
  const dd = document.getElementById('profileDropdown');
  dd.style.display = dd.style.display === 'block' ? 'none' : 'block';
}

document.addEventListener('click', (e)=>{
  const dd = document.getElementById('profileDropdown');
  if(!e.target.closest('.profile')) dd.style.display = 'none';
});

function updateClock(){
  const now = new Date();
  const d = now.toLocaleDateString('id-ID', {
    year:'numeric', month:'short', day:'numeric'
  });
  const t = now.toLocaleTimeString('id-ID', {
    hour:'2-digit', minute:'2-digit', second:'2-digit'
  });
  document.getElementById('clock').textContent = d + ' • ' + t;
}
setInterval(updateClock, 1000);
updateClock();

function filterTable(q){
  q = q.toLowerCase();
  document.querySelectorAll('#tbody tr').forEach(tr=>{
    tr.style.display = tr.textContent.toLowerCase().includes(q)
      ? '' : 'none';
  });
}
</script>

</body>
</html>
