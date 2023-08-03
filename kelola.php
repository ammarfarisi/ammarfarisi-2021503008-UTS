<!DOCTYPE html>

<?php
require 'koneksi.php';

$nama_santri = '';
$tahun_mondok = '';
$asrama = '';
$alamat = '';
$jenis_kelamin = '';

if (isset($_GET['ubah'])) {
    $id_santri = $_GET['ubah'];

    $query = "SELECT * FROM tb_santri WHERE id_santri = '$id_santri';";
    $sql = mysqli_query($conn, $query);

    $result = mysqli_fetch_assoc($sql);

    $nama_santri = $result['nama_santri'];
    $tahun_mondok = $result['tahun_mondok'];
    $asrama = $result['asrama'];
    $alamat = $result['alamat'];
    $jenis_kelamin = $result['jenis_kelamin'];

    //var_dump($result);
    //die();
}
?>

<html>

<head>
    <meta charset="UTF-8">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <title>Pesantren</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">SANTRI</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <div class="container">
        <form method="POST" action="proses.php" enctype="multipart/form-data">
            <input type="hidden" value="<?php echo $id_santri; ?>" name="id_santri">
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama Santri</label>
                <div class="col-sm-10">
                    <input required type="text" name="nama_santri" class="form-control" id="nama" placeholder="Masukkan Nama" value="<?php echo $nama_santri; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tahun_mondok" class="col-sm-2 col-form-label">Tahun Mondok</label>
                <div class="col-sm-10">
                    <input required type="text" name="tahun_mondok" class="form-control" id="tahun_mondok" placeholder="Tahun Mondok" value="<?php echo $tahun_mondok; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="asrama" class="col-sm-2 col-form-label">Asrama</label>
                <div class="col-sm-10">
                    <input required type="text" name="asrama" class="form-control" id="asrama" placeholder="Asrama" value="<?php echo $asrama; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <textarea required name="alamat" class="form-control" id="alamat" rows="3"><?php echo $alamat; ?></textarea>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                <div class="col-sm-10">
                    <input <?php if (isset($_GET['ubah'])) {
                                echo "required";
                            } ?>required class="form-control" type="file" name="foto" id="foto" accept="image/">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jkel" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <select required id="jkel" name="jkel" class="form-select">
                        <option <?php if ($jenis_kelamin == 'laki-laki') {
                                    echo "selected";
                                } ?> value="laki-laki">Laki-Laki</option>
                        <option <?php if ($jenis_kelamin == 'perempuan') {
                                    echo "selected";
                                } ?> value="perempuan">Perempuan</option>
                    </select>
                </div>
            </div>

            <div class="mb-3 row mt-5">
                <div class="col">
                    <?php
                    if (isset($_GET['ubah'])) {
                    ?>
                        <button type="submit" name="aksi" value="edit" class="btn btn-primary">
                            <i class="fa fa-floppy-o"></i>
                            Simpan Perubahan
                        </button>
                    <?php
                    } else {
                    ?>
                        <button type="submit" name="aksi" value="add" class="btn btn-primary">
                            <i class="fa fa-floppy-o"></i>
                            Tambahkan
                        </button>
                    <?php
                    }
                    ?>
                    <a href="index.php" type="button" class="btn btn-danger">
                        <i class="fa fa-reply"></i>
                        Batal
                    </a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>