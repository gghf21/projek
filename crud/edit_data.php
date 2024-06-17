<?php
    include "koneksi.php";

    if (isset($_GET['npm'])) {
        $npm = $_GET['npm'];
        $apakah_proses = isset($_GET['proses']) ? $_GET['proses'] : 0;

        // Mengambil data mahasiswa berdasarkan npm
        $proses_ambil = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE npm = '".$npm."'") or die(mysqli_error($koneksi));

        // Mengecek apakah sedang dalam proses update data
        if($apakah_proses == 1){
            if (isset($_POST['nama']) && isset($_POST['prodi'])  && isset($_POST['jkl'])) {
                $nm_mhs = $_POST['nama'];
                $prodi_mhs = $_POST['prodi'];
                $jkl = $_POST['jkl'];

                // Update data mahasiswa
                $proses_update_data = mysqli_query($koneksi, "UPDATE mahasiswa SET nama_mahasiswa = '$nm_mhs', prodi = '$prodi_mhs', jkl = '$jkl' WHERE npm = '".$npm."'") or die(mysqli_error($koneksi));

                if($proses_update_data) {
                    echo "
                    <script>
                        alert('Data Berhasil Diupdate');
                        window.location.href='index.php';
                    </script>";
                } else {
                    echo "
                    <script>
                        alert('Data Gagal Diupdate');
                        window.location.href='index.php';
                    </script>";
                }
            } else {
                echo "
                <script>
                    alert('Nama atau Prodi tidak ditemukan di form');
                    window.location.href='index.php';
                </script>";
            }
        }
    }
?>
