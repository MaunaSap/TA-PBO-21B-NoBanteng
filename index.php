<?php

include 'head.php';

// ... (Sintaksis yang sudah ada)

// Validasi tambahan sebelum memproses pendaftaran
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $tempat = $_POST['tempat'];
    $date = $_POST['date'];
    $jns_kel = $_POST['jns_kel'];
    $agama = $_POST['agama'];
    $nohp = $_POST['nohp'];
    $alamat = $_POST['alamat'];
    $provinsi = $_POST['provinsi'];
    $no_jaket = $_POST['no_jaket'];
    $email = $_POST['email'];
    $konfirmemail = $_POST['konfirmemail'];

    // Validasi apakah semua field terisi sebelum memproses pendaftaran
    if (empty($nama) || empty($tempat) || empty($date) || empty($jns_kel) || empty($agama) || empty($nohp) || empty($alamat) || empty($provinsi) || empty($no_jaket) || empty($email) || empty($konfirmemail)) {
        echo "<script>alert('Harap isi semua field')</script>";
    } else {
        // Proses pendaftaran jika semua field terisi
        if ($email === $konfirmemail) {
            // Validasi format email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "<script>alert('Format email tidak valid')</script>";
            } else {
                // Validasi nomor telepon
                if (!ctype_digit($nohp)) {
                    echo "<script>alert('No Handphone hanya boleh berisi angka')</script>";
                } else {
                    // Proses pendaftaran
                    if (daftarformulir($nama, $tempat, $date, $jns_kel, $agama, $nohp, $alamat, $provinsi, $no_jaket, $email, $date)) {
                        echo "<script>alert('Pendaftaran Berhasil, Silahkan Login')</script>";
                    } else {
                        echo "<script>alert('Pendaftaran Gagal')</script>";
                    }
                }
            }
        } else {
            echo "<script>alert('Email konfirmasi tidak sama, silahkan ulangi kembali')</script>";
        }
    }
}

?>

<style>
    .block-web.primary-box {
        background: #4eb2d8;
        padding: 5px;
        color: white;
    }

    .jumbotron {
        background-color: springgreen;
    }

    .navbar-default {
        margin-bottom: 0;
    }

    .navbar {
        margin-bottom: 0;
    }

    .login {
        background: lightcoral;
    }

    .daftar {
        background-color: #1484e6;
    }

    .petunjuk {
        border-radius: 0px;
    }

    .top {
        padding-top: 20px;
    }
</style>

<div class="container-fluid top">
    <div class="row" style="margin-left:0;margin-right:0;">
        <div class="col-md-8">
            <div class="jumbotron">
                <div class="header">
                    <h3><center>Formulir Pendaftaran</center></h3>
                </div>
                <hr style="border:1px solid black">
                <form action="" method="post">
                    <!-- Formulir pendaftaran (tidak berubah) -->

                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>
                    </div>

                    <!-- (Isi formulir lainnya) -->

                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-block btn-primary btn-lg" value="Daftar">
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-4">
            <div class="jumbotron login">
                <div class="header">
                    <h3><center>SILAHKAN MASUK</center></h3>
                </div>
                <hr style="border:1px solid black">
                <form action="ceklogin.php" method="post">
                    <!-- Formulir masuk (tidak berubah) -->
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'foot.php'; ?>