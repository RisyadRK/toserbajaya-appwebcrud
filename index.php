<?php
require 'Transaksi.php';
// Inisiasi Class
$app = new App();
$product = new Product();
$transaksi = new Transaksi();
// utk logout
if (isset($_GET['keluar'])) :
  $app->log_out();
endif;
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title><?php echo $app->get_app('company_name'); ?></title>
  <link rel="stylesheet" href="style.css" media="screen" charset="utf-8">
  <link href="assets/jquery-ui.css" rel="stylesheet">
  <link href="assets/select2.min.css" rel="stylesheet">
</head>

<body background="uwaw.jpg" style="background-size: cover; background-position: center;">
  <div id="kontainer">
    <div id="headernya"></div>
    <div class="clear"></div>
    <hr>
    <nav id="menu-atas" style="text-align:center;">
      <ul id="nav-atas">
        <li><a href="index.php?p=laman_utama">Beranda</a></li>
        <li><a href="?p=laman_transaksi">Transaksi</a></li>
        <li><a href="?p=data_produk">Data Produk</a></li>
        <li><a href="?p=setting">Pengaturan</a></li>
        <li><a href="?keluar=true">Log Out</a></li>
      </ul>
    </nav>
    <div class="clear"></div>
    <hr>
    <section class="konten">
      <?php
      if (!empty($_GET['p'])) :
        $file = scandir('views');
        unset($file[0], $file[1]);
        if (in_array($_GET['p'] . '.php', $file)) :
          require_once('views/' . $_GET['p'] . '.php');
        else :
          echo "<h1>Halaman Tidak Ditemukan!!!</h1>";
        endif;
      else :
        require_once('views/laman_utama.php');
      endif;
      ?>
    </section>
    <hr>
    <footer class="footer">

    </footer>
    <div class="clear"></div>
    <center>
      <strong class="text-center">&copy; Copyright <?php echo date('Y') ?></strong><br>
      <small class="text-center">Muh Nur Risyad RRHK | </small>
      <small class="text-center">UAS Pemrogaman WEB</small>
    </center>
  </div>

</body>
<script src="assets/external/jquery/jquery.js"></script>
<script src="assets/jquery-ui.js"></script>
<script src="assets/select2.min.js"></script>
<script>
  $("#datepicker").datepicker({
    inline: false,
    dateFormat: 'yy-mm-dd'
  });

  function delete_barang(ID) {
    var r = confirm("Hapus Data Ini?");
    if (r == true) {
      window.location = "?p=data_produk&delete=" + ID;
    } else {
      console.log("Batal menghapus");
    }
  }

  function delete_transaksi(ID) {
    var r = confirm("Hapus Produk ini dari Transaksi?");
    if (r == true) {
      window.location = "?p=laman_transaksi&delete=" + ID;
    } else {
      console.log("Batal menghapus");
    }
  }

  function ubah_transaksi(ID, qty) {
    var data = prompt("Ubah Quantity Produk ini :", qty);
    if (data != null) {
      window.location = "?id=" + ID + "&p=laman_transaksi&update=true&qty=" + data;
    }
    return false;
  }
  $(document).ready(function() {
    $("#produk").select2();
  });
</script>

</html>