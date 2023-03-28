<?php
error_reporting(E_ALL);
include_once 'koneksi.php';
if (isset($_POST['submit']))
{
$nama = $_POST['nama'];
$kategori = $_POST['kategori'];
$harga_jual = $_POST['harga_jual'];
$harga_beli = $_POST['harga_beli'];
$stok = $_POST['stok'];
$file_gambar = $_FILES['file_gambar'];
$gambar = null;
if ($file_gambar['error'] == 0)
{
$filename = str_replace(' ', '_',$file_gambar['name']);
$destination = dirname(__FILE__) .'/gambar/' . $filename;
if(move_uploaded_file($file_gambar['tmp_name'], $destination))
{
$gambar = 'gambar/' . $filename;;
}
}
$sql = 'INSERT INTO data_barang (nama, kategori,harga_jual, harga_beli,
stok, gambar) ';
$sql .= "VALUE ('{$nama}', '{$kategori}','{$harga_jual}',
'{$harga_beli}', '{$stok}', '{$gambar}')";
$result = mysqli_query($conn, $sql);
header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link href="style.css" rel="stylesheet" type="text/css" />
    <title>Tambah Barang</title>
  </head>
  <body>
    <div class="container">
      <h1>Tambah Barang</h1>
      <div class="main">
        <form method="POST" action="ubah.php" enctype="multipart/form-data">
  <div class="form-group">
    <label for="nama">Nama Barang:</label>
    <input type="text" name="nama" id="nama" required>
  </div>

  <div class="form-group">
    <label for="kategori">Kategori:</label>
    <select name="kategori" id="kategori" required>
      <option value="">Pilih Kategori</option>
      <option value="Makanan">Makanan</option>
      <option value="Minuman">Minuman</option>
      <option value="Pakaian">Pakaian</option>
      <option value="Elektronik">Elektronik</option>
    </select>
  </div>

  <div class="form-group">
    <label for="harga_jual">Harga Jual:</label>
    <input type="number" name="harga_jual" id="harga_jual" required>
  </div>

  <div class="form-group">
    <label for="harga_beli">Harga Beli:</label>
    <input type="number" name="harga_beli" id="harga_beli" required>
  </div>

  <div class="form-group">
    <label for="stok">Stok:</label>
    <input type="number" name="stok" id="stok" required>
  </div>

  <div class="form-group">
    <label for="file">Upload Gambar:</label>
    <input type="file" name="file" id="file" accept="image/*" required>
  </div>

  <button type="submit">Submit</button>
</form>

      </div>
    </div>
  </body>
</html>
