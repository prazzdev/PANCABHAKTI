<?php
require_once 'connect.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Sistem Informasi Siswa - SMK Panca Bhakti Rakit</title>
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
      <h2>Tambah Data Siswa Panca Bhakti Rakit</h2>
      <?php
        if(isset($_POST['submit'])) {
          $nama = strip_tags($_POST['nama']);
          $kelas = strip_tags($_POST['kelas']);
          $jurusan = strip_tags($_POST['jurusan']);
          $motivasi = strip_tags($_POST['motivasi']);

          $pesan = [];

          if(empty($nama) && empty($kelas) && empty($jurusan) && empty($motivasi)) {
            $pesan[] = '<div class="error">Oops! Silahkan isi semua formulir di bawah.</div>';
          } elseif($cp->query("SELECT * FROM siswa WHERE nama = '".$nama."'")->num_rows > 1) {
            $pesan[] = '<div class="error">Oops! '.$nama.' telah terdaftar.</div>';
          } else {
            if($cp->query("INSERT INTO siswa (`nama`, `jurusan`, `kelas`, `motivasi`) VALUES('".$nama."', '".$jurusan."', '".$kelas."', '".$motivasi."')")) {
              $pesan[] = '<div class="error">Data berhasil disimpan di server. Silahkan klik <a href="/" title="Silahkan klik di sini untuk melihat perubahan">di sini</a> untuk melihat perubahan.</div>';
            }
          }

          foreach($pesan as $error) {
            echo !empty($error) ? $error : '';
          }
        }
      ?>
      <form id="form_siswa" method="POST">
        <fieldset>
          <legend>Tambah Data Siswa Baru</legend>
          <p>
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" value="" placeholder="Nama siswa"> <span id="txtNama"></span>
          </p>
          <p>
            <label for="kelas">Kelas:</label>
            <input type="text" name="kelas" id="kelas" value="" placeholder="Kelas siswa"> <span id="txtKelas"></span>
          </p>
          <p>
            <label for="jurusan">Jurusan:</label>
            <input type="text" name="jurusan" id="jurusan" value="" placeholder="Jurusan siswa"> <span id="txtJurusan"></span>
          </p>
          <p>
            <label for="motivasi">Motivasi:</label>
            <input style="height: 35px;" type="text" name="motivasi" id="motivasi" value="" placeholder="Motivasi siswa"> <span id="txtMotivasi"></span>
          </p>
        </fieldset>
        <br>
        <p>
          <input type="submit" name="submit" value="Tambah Data">
        </p>
      </form>
      <div id="footer">
        &copy; <?php echo date('Y'); ?> SMK Panca Bhakti Rakit
      </div>
    </div>
    <script>
      var nama = document.getElementById('nama');
      nama.addEventListener('keydown', function() {
        if(nama.value.length >= 30) {
          var txtNama = document.getElementById('txtNama');
          txtNama.innerHTML = '<font color="red">Oops! Max. 30 Karakter.</font>';
        }
      });
      var kelas = document.getElementById('kelas');
      kelas.addEventListener('keydown', function() {
        if(kelas.value.length >= 3) {
          var txtKelas = document.getElementById('txtKelas');
          txtKelas.innerHTML = '<font color="red">Oops! Max. 3 Karakter romawi.</font>';
        }
      });
      var jurusan = document.getElementById('jurusan');
      jurusan.addEventListener('keydown', function() {
        if(jurusan.value.length >= 30) {
          var txtJurusan = document.getElementById('txtJurusan');
          txtJurusan.innerHTML = '<font color="red">Oops! Max. 30 Karakter.</font>';
        }
      });
      var motivasi = document.getElementById('motivasi');
      motivasi.addEventListener('keydown', function() {
        if(motivasi.value.length >= 150) {
          var txtMotivasi = document.getElementById('txtMotivasi');
          txtMotivasi.innerHTML = '<font color="red">Oops! Max. 150 Karakter.</font>';
        }
      });
    </script>
  </body>
</html>