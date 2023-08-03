<?php
    require 'koneksi.php';

    if(isset($_POST['aksi'])){
        if($_POST['aksi'] == "add"){

            $nama_santri = $_POST['nama_santri'];
            $tahun_mondok = $_POST['tahun_mondok'];
            $asrama = $_POST['asrama'];
            $alamat = $_POST['alamat'];
            $foto = $_FILES['foto']['name'];
            $jenis_kelamin = $_POST['jkel'];

            $dir = "img/";
            $tmpFile = $_FILES['foto']['tmp_name'];

            move_uploaded_file($tmpFile, $dir.$foto);

            //die();

            $query = "INSERT INTO tb_santri VALUES(null, '$nama_santri', '$tahun_mondok', '$asrama', '$alamat', '$foto', '$jenis_kelamin')";
            $sql = mysqli_query($conn, $query);

            if($sql){
                header("location: index.php");
                //echo "data berhasil ditambahkan <a href='index.php'>[Home]</a>";
            } else {
                echo $query;
            }

            //echo $nama_santri."|".$tahun_mondok."|".$asrama."|".$alamat."|".$foto."|".$jenis_kelamin;

            //echo "<br>tambah data <a href='index.php'>[Home]</a>";
        } else if($_POST['aksi'] == 'edit'){
            //echo "edit data <a href='index.php'>[Home]</a>";
            //var_dump($_POST);
            $id_santri = $_POST['id_santri'];
            $nama_santri = $_POST['nama_santri'];
            $tahun_mondok = $_POST['tahun_mondok'];
            $asrama = $_POST['asrama'];
            $alamat = $_POST['alamat'];
            $jenis_kelamin = $_POST['jkel'];

            $queryshow = "SELECT * FROM tb_santri WHERE id_santri = '$id_santri';";
            $sqlshow = mysqli_query($conn, $queryshow);
            $result = mysqli_fetch_assoc($sqlshow);

            if($_FILES['foto']['name'] == ""){
                $foto = $result['foto'];
            } else { 
                $foto = $_FILES['foto']['name'];
                unlink("img/" .$result['foto']);
                move_uploaded_file($_FILES['foto']['tmp_name'], 'img/'.$_FILES['foto']['name']);
            }

            $query = "UPDATE tb_santri SET nama_santri='$nama_santri', tahun_mondok='$tahun_mondok', asrama='$asrama', alamat='$alamat', foto='$foto', jenis_kelamin='$jenis_kelamin' WHERE id_santri='$id_santri';";
            $sql = mysqli_query($conn, $query);
            header("location: index.php");

        }
    }

        if(isset($_GET['hapus'])){
            $id_santri = $_GET['hapus'];

            $queryshow = "SELECT * FROM tb_santri WHERE id_santri = '$id_santri';";
            $sqlshow = mysqli_query($conn, $queryshow);
            $result = mysqli_fetch_assoc($sqlshow);

            var_dump($result);

            unlink("img/" .$result['foto']);

            $query = "DELETE FROM tb_santri WHERE id_santri = '$id_santri';";
            $sql = mysqli_query($conn, $query);

            if($sql){
                header("location: index.php");
                //echo "data berhasil ditambahkan <a href='index.php'>[Home]</a>";
            } else {
                echo $query;
            }
            
            //echo "hapus data <a href='index.php'>[Home]</a>";
    }
?>