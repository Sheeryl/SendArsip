<?php require 'db.php';
if (!isset($_SESSION['user_id'])) { header('Location: index.php'); exit; }

$letterId = $_GET['id'] ?? null;
$title = 'Untitled';
$content = '';

if ($letterId) {
  $stmt = $pdo->prepare('SELECT * FROM letters WHERE id=? AND user_id=?');
  $stmt->execute([$letterId, $_SESSION['user_id']]);
  $row = $stmt->fetch();
  if ($row) { $title = $row['title']; $content = $row['content']; }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editor Surat</title>
  <link rel="stylesheet" href="style.css">
</head>
<body class="editor-wrap">
  <div class="topbar">
    <div class="clock" id="clock">--:--</div>
    <div class="profile">
      <div class="avatar" onclick="toggleProfile()">👤</div>
      <div class="dropdown" id="profileDropdown">
        <a href="profile.php">Profil</a>
        <a href="edit_profile.php">Edit Profil</a>
        <a href="logout.php">Logout</a>
      </div>
    </div>
  </div>
  <input type="text" id="title" class="title-input" value="<?php echo htmlspecialchars($title); ?>" placeholder="Judul dokumen">
  <div class="editor-toolbar">
    <button onclick="exec('bold')"><b>B</b></button>
    <button onclick="exec('italic')"><i>I</i></button>
    <button onclick="exec('underline')"><u>U</u></button>
    <button onclick="exec('insertUnorderedList')">• List</button>
    <button onclick="exec('formatBlock','H1')">H1</button>
    <button onclick="exec('formatBlock','H2')">H2</button>
    <a class="btn unduh" button onclick="saveDoc()">Simpan</button>
    <a class="btn hapus" href="index.php">Kembali</a>
  </div>
  <div id="editor" class="editor" contenteditable="true" spellcheck="true"><?php echo $content ?: '<p><br></p>'; ?></div>
  <div class="save-notice" id="notice"></div>

<script>
function toggleProfile(){
  const dd = document.getElementById('profileDropdown');
  dd.style.display = dd.style.display === 'block' ? 'none' : 'block';
}
document.addEventListener('click', (e)=>{
  const dd = document.getElementById('profileDropdown');
  if(!e.target.closest('.profile')) dd.style.display='none';
});

function exec(cmd, val=null){ document.execCommand(cmd, false, val); }

function updateClock(){
  const now = new Date();
  const d = now.toLocaleDateString('id-ID', {year:'numeric', month:'short', day:'numeric'});
  const t = now.toLocaleTimeString('id-ID', {hour:'2-digit', minute:'2-digit'});
  document.getElementById('clock').textContent = d + ' • ' + t;
}
setInterval(updateClock, 1000); updateClock();

async function saveDoc(){
  const title = document.getElementById('title').value || 'Untitled';
  const content = document.getElementById('editor').innerHTML;
  const form = new FormData();
  form.append('title', title);
  form.append('content', content);
  <?php if ($letterId): ?>
    form.append('id', '<?php echo (int)$letterId; ?>');
  <?php endif; ?>
  const res = await fetch('save.php', {method:'POST', body:form});
  const j = await res.json();
  const n = document.getElementById('notice');
  n.textContent = j.ok ? 'Tersimpan ✅' : ('Gagal: ' + j.error);
  if (j.id){ history.replaceState({}, '', 'compose.php?id='+j.id); }
  setTimeout(()=> n.textContent='', 2500);
}
</script>
</body>
</html>
