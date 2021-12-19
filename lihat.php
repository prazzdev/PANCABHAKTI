<?php
require_once 'connect.php';
if(isset($_GET['id']) && !empty($_GET['id'])) {
  $id = intval($_GET['id']);
  $q  = $cp->query('SELECT * FROM siswa WHERE id = '.$id.'');
  if($q->num_rows > 0) {
    $data = $cp->query('SELECT * FROM siswa WHERE id = '.$id.'')->fetch_assoc();
  } else {
    header('location: /');
  }
} else {
  header('location: /');
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Profil Siswa <?php echo $data['nama']; ?> - SMK Panca Bhakti Rakit</title>
    <link href="style.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <div id="header">
        <h1 id="logo">Sistem Informasi <span>Sekolah</span></h1>
        <p id="tanggal"><?php echo date("l, d F Y"); ?></p>
      </div>
      <hr>
      <nav>
        <ul>
          <li><a href="/" style="border-radius: 4px;">Beranda</a></li>
        </ul>
      </nav>
      <h2>Profil Siswa <?php echo $data['nama']; ?> Panca Bhakti Rakit</h2>
      <form id="form_siswa" onsubmit="return false;">
        <fieldset>
          <legend>Profil <?php echo $data['nama']; ?></legend>
          <p>
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" value="<?php echo $data['nama']; ?>" placeholder="Nama siswa" disabled> <span id="txtNama"></span>
          </p>
          <p>
            <label for="kelas">Kelas:</label>
            <input type="text" name="kelas" id="kelas" value="<?php echo $data['kelas']; ?>" placeholder="Kelas siswa" disabled> <span id="txtKelas"></span>
          </p>
          <p>
            <label for="jurusan">Jurusan:</label>
            <input type="text" name="jurusan" id="jurusan" value="<?php echo $data['jurusan']; ?>" placeholder="Jurusan siswa" disabled> <span id="txtJurusan"></span>
          </p>
          <p>
            <label for="motivasi">Motivasi:</label>
            <input style="height: 35px;" type="text" name="motivasi" id="motivasi" value="<?php echo $data['motivasi']; ?>" placeholder="Motivasi siswa" disabled> <span id="txtMotivasi"></span>
          </p>
        </fieldset>
      </form>
      <div id="footer">
        &copy; <?php echo date('Y'); ?> SMK Panca Bhakti Rakit
      </div>
    </div>
  </body>
</html>