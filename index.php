<?php
require 'koneksi.php';

$query = "SELECT * FROM tb_santri;";
$sql = mysqli_query($conn, $query);
$no = 0;
?>

<!DOCTYPE html>
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
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">P2S3</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </nav>
  <h1 class="mt-4">
    <center>Data Santri</center>
  </h1>
  <div class="container">
    <a href="kelola.php" type="button" class="btn btn-primary mb-4">
      <i class="fa fa-plus"></i>
      Tambah Data
    </a>
    <table class="table align-middle table-bordered table-hover">
      <thead>
        <tr>
          <th scope="col">
            <center>No</center>
          </th>
          <th scope="col">Nama Santri</th>
          <th scope="col">Tahun mondok</th>
          <th scope="col">Asrama</th>
          <th scope="col">Alamat</th>
          <th scope="col">Foto</th>
          <th scope="col">Jenis Kelamin</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($result = mysqli_fetch_assoc($sql)) {
        ?>
          <tr>
            <td>
              <center>
                <?php echo ++$no; ?>.
              </center>
            </td>
            <td><?php echo $result['nama_santri']; ?></td>
            <td><?php echo $result['tahun_mondok']; ?></td>
            <td><?php echo $result['asrama']; ?></td>
            <td><?php echo $result['alamat']; ?></td>
            <td>
              <img src="img/<?php echo $result['foto']; ?>" style="width: 100px;">
            </td>
            <td><?php echo $result['jenis_kelamin']; ?></td>
            <td>
              <a href="kelola.php?ubah=<?php echo $result['id_santri']; ?>" type="button" class="btn btn-success btn-sm">
                <i class="fa fa-pencil"></i>
                Ubah
              </a>
              <a href="proses.php?hapus=<?php echo $result['id_santri']; ?>" type="button" class="btn btn-danger btn-sm " onclick="return confirm('Apakah anda ingin menghapus data???')">
                <i class="fa fa-trash"></i>
                Hapus
              </a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>