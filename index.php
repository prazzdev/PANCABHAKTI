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
          <li><a href="tambah.php" style="border-radius: 4px;">Tambah Data</a></li>
        </ul>
      </nav>
      <h2>
        <?php echo $cp->query('SELECT * FROM siswa')->num_rows; ?>
        Data Siswa Panca Bhakti Rakit
      </h2>
      <table border="1" bgcolor="grey">
        <tr>
          <td align="center" width="25px" style="color: white;">ID</td>
          <td align="center" width="180px" style="color: white;">NAMA</td>
          <td align="center" style="color: white;">KELAS</td>
          <td align="center" style="color: white;">JURUSAN</td>
          <td align="center" style="color: white;">MOTIVASI</td>
          <td align="center" style="color: white;">TINDAKAN</td>
        </tr>
        <tr>
          <?php
            $q = $cp->query('SELECT * FROM siswa ORDER BY `id` DESC');
            if($q->num_rows > 0) {
              $i = 1;
              while($data = $q->fetch_assoc()) {
                ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['kelas']; ?></td>
                    <td><?php echo $data['jurusan']; ?></td>
                    <td><?php echo $data['motivasi']; ?></td>
                    <td>
                      <center>
                        [<a href="lihat.php?id=<?php echo $data['id']; ?>">Lihat</a>] -
                        [<a href="hapus.php?id=<?php echo $data['id']; ?>">Hapus</a>] -
                        [<a href="edit.php?id=<?php echo $data['id']; ?>">Ubah</a>]
                      </center>
                    </td>
                  </tr>
                <?php
                $data++;
                $i++;
              }
            } else {
              ?>
                <tr>
                  <td colspan="6" align="center">Tidak ditemukan data apapun di sini.</td>
                </tr>
              <?php
            }
          ?>
        </tr>
      </table>
      <div id="footer">
        &copy; <?php echo date('Y'); ?> SMK Panca Bhakti Rakit
      </div>
    </div>
  </body>
</html>