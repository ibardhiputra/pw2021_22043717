<?php
// koneksi ke database dan pilih databasenya.
$conn = mysqli_connect('localhost', 'root', '', 'pw_22043717');

// query isi tabel mahasiswa dalam database pw_22043717
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");
// var_dump($result);

// ubah data ke dlam array
// $row = mysqli_fetch_row($result); //array numerik
// $row = mysqli_fetch_assoc($result); //array asosiative. yg kita gunakan.
// var_dump($row);

$rows = [];
//simpan datanya dari database ke dalam variabel array $rows 
while ($row = mysqli_fetch_assoc($result)) {
  $rows[] = $row;
}
// var_dump($rows);

// tampung ke variabel mahasiswa
$mahasiswa = $rows;


?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Mahasiswa</title>
</head>

<body>
  <h3>Daftar Mahasiswa</h3>

  <table border="1" cellpadding="10" cellspacing="0">
    <tr>
      <th>#</th>
      <th>Gambar</th>
      <th>NRP</th>
      <th>Nama</th>
      <th>Email</th>
      <th>Jurusan</th>
      <th>Aksi</th>
    </tr>

    <!-- menampilkan data mahasiswa dari databse dengan perulangan -->
    <?php $i = 1;
    foreach ($mahasiswa as $m) :  ?>

      <tr>
        <td><?= $i++; ?></td>
        <td><img src="img/<?= $m['gambar']; ?>" width="60"></td>
        <td><?= $m['nrp']; ?></td>
        <td><?= $m['nama']; ?></td>
        <td><?= $m['email']; ?></td>
        <td><?= $m['jurusan']; ?></td>
        <td>
          <a href="">Ubah</a> | <a href="">Hapus</a>
        </td>
      </tr>
    <?php endforeach; ?>

  </table>

</body>

</html>