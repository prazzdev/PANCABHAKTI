<?php
ini_set('display_erros', 0);
$page = isset($_GET['act']) ? trim($_GET['act']) : '';
switch($page) {
  case 'finish':
    require_once 'connect.php';
    $sql = 'pancabhakti.sql';
    if(is_file($sql)) {
      $templine = '';
      $lines = file($sql);
      foreach($lines as $line) {
        if(substr($line, 0, 2) == '--' || $line == '') continue;
        $templine .= $line;
        if(substr(trim($line), -1, 1) == ';') {
          $do = $cp->query($templine);    
          $templine = '';
        }
      }
      if($do) {
        echo '<p>
          <b>Berhasil!</b>
          <br/>
          Selamat proses instalasi selesai. Silahkan Anda <a href="/CRUD/">klik di sini</a> untuk memulai.
        </p>';
        unlink('installer.php');
        unlink('pancabhakti.sql');
      } else {
        echo '<b>Oops!</b> instalasi gagal. Silahkan <a href="/installer.php">ulangi kembali</a>.';
      }
    }
  break;
  default:
    $MySQL_Host = 'localhost';
    $MySQL_User = 'root';
    $MySQL_Pass = 'm0r9AFtx';

    $cp = new mysqli($MySQL_Host, $MySQL_User, $MySQL_Pass);
    if($cp->connect_errno) {
      die('<b>Error:</b> Connection to database is failed!');
    }

    $create_db = $cp->query("CREATE DATABASE IF NOT EXISTS panca_bhakti");
    if($create_db) {
      echo '<script>window.location = "/CRUD/installer.php?act=finish";</script>';
    } else {
      echo '<b>Oops!</p> Database <b>`panca_bhakti`</b> gagal dibuat.';
    }
  break;
}
?>