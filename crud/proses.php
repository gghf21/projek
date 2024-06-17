<?php

    include "koneksi.php";

// mengambil data inputan dari form
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];
    $jkl = $_POST['jkl'];

    $proses = mysqli_query($koneksi,"INSERT INTO mahasiswa (npm, nama_mahasiswa, prodi, jkl) VALUES ('$npm','$nama', '$prodi', '$jkl')") or die (mysqli_error($koneksi));

    if($proses){
        echo "<script>
                alert('Data Berhasil Disimpan')
                window.location.href='index.php';
            </script>";
    }else{
        echo "<script>
                alert('Data Gagal Disimpan')
                window.location.href='index.php';
            </script>";
    }


?>