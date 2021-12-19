<?php
require_once 'connect.php';
if(isset($_GET['id']) && !empty($_GET['id'])) {
  $id = intval($_GET['id']);
  $q  = $cp->query('SELECT * FROM siswa WHERE id = '.$id.'');
  if($q->num_rows > 0) {
    if($cp->query('DELETE FROM siswa WHERE id = '.$id.'')) {
      header('location: /');
    }
  } else {
    header('location: /');
  }
} else {
  header('location: /');
}
?>