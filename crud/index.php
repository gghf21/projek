<?php
include "koneksi.php";
include "tampilkan_data.php";

$data_edit = null;
if (isset($_GET['npm']) && is_numeric($_GET['npm'])) {
    include "edit_data.php";
    $data_edit = mysqli_fetch_assoc($proses_ambil);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>

    <link href="liblary/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="liblary/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="liblary/assets/styles.css" rel="stylesheet" media="screen">

    <script src="liblary/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>

<body>

    <div class="span9" id="content">
        <div class="row-fluid">
            <div class="block">
                <div class="navbar navbar-inner block-header">
                    <div class="muted pull-left">Form Mahasiswa</div>
                </div>
                <div class="block-content collapse in">
                    <div class="span12">

                        <?php if (isset($data_edit) && $data_edit != null): ?>
                            <!-- Form untuk proses edit -->
                            <form class="form-horizontal" action="edit_data.php?npm=<?php echo $data_edit['npm'] ?>&proses=1" method="POST">
                        <?php else: ?>
                            <!-- Form untuk proses tambah -->
                            <form class="form-horizontal" action="./proses.php" method="POST">
                        <?php endif; ?>
                        
                            <fieldset>
                                <legend>Data Mahasiswa</legend>

                                <div class="control-group">
                                    <label class="control-label" for="NAMA">Nama Mahasiswa</label>
                                    
                                    <div class="controls">
                                        <input type="text" name="nama" class="input-xlarge focused" id="NAMA" value="<?php if (isset($data_edit['nama_mahasiswa'])) echo $data_edit['nama_mahasiswa']; ?>">
                                    </div>

                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="PRODI">Prodi Mahasiswa</label>
                                    <div class="controls">
                                        <input type="text" name="prodi" class="input-xlarge focused" id="PRODI" value="<?php if (isset($data_edit['prodi'])) echo $data_edit['prodi']; ?>">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="NPM">NPM</label>
                                    <div class="controls">
                                        <input type="text" name="npm" class="input-xlarge focused" id="npm" value="<?php if (isset($data_edit['npm'])) echo $data_edit['npm']; ?>">
                                    </div>
                                </div>
                                <div class="control-group">
                                <input type="radio" name="jkl"  value="Laki-laki"> Laki-laki
                                <input type="radio" name="jkl" value="Perempuan"> Perempuan
                                <input type="radio" name="jkl"value="Tidak ingin diketahui"> Tidak ingin diketahui<br>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn">Cancel</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row-fluid">
            <div class="block">
                <div class="navbar navbar-inner block-header">
                    <div class="muted pull-left">Data Mahasiswa</div>
                </div>
                <div class="block-content collapse in">
                    <div class="span12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>NPM Mahasiswa</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>Prodi Mahasiswa</th>
                                    <th>Jenis kelamin</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($data = mysqli_fetch_assoc($proses)) { ?>
                                    <tr>
                                        <td><?php echo $data['npm']; ?></td>
                                        <td><?php echo $data['nama_mahasiswa']; ?></td>
                                        <td><?php echo $data['prodi']; ?></td>
                                        <td><?php echo $data['jkl']; ?></td>
                                        <td><a href="index.php?npm=<?php echo $data['npm']; ?>">Edit</a> | <a href="hapus_data.php?npm=<?php echo $data['npm']; ?>">Hapus</a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
