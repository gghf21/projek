<?php

    include "koneksi.php";

    $npm = $_GET['npm'];

    $proses = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE npm = $npm") or die (mysqli_error($koneksi));

    if($proses){
        echo "<script>
                alert('Data Berhasil Dihapus')
                window.location.href='index.php';
            </script>";
    }else{
        echo "<script>
                alert('Data Gagal Dihapus')
                window.location.href='index.php';
            </script>";
    }
?>