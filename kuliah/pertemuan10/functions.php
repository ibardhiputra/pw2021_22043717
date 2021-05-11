<?php

function koneksi()
{
  return mysqli_connect('localhost', 'root', '', 'pw_22043717');
}

function query($query)
{
  $conn = koneksi();
  $result = mysqli_query($conn, $query);

  // jika hasil querynya 1 data saja
  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function tambah($data)
{
  // var_dump($data);

  $conn = koneksi();

  $nama = htmlspecialchars($data['nama']);
  $nrp = htmlspecialchars($data['nrp']);
  $email = htmlspecialchars($data['email']);
  $jurusan = htmlspecialchars($data['jurusan']);
  $gambar = htmlspecialchars($data['gambar']);

  $query = "INSERT INTO mahasiswa
            VALUES
            (null,'$nama','$nrp','$email','$jurusan','$gambar')
            ";

  // mengeksekusi query ke database  
  mysqli_query($conn, $query);

  //jika ada eror tampilkan erornya
  echo mysqli_error($conn);

  //mengembalikan nilai untuk mengecek data berhasil ditambah
  return mysqli_affected_rows($conn);
}
