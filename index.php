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
        $errors[] = 'Harap isi semua field';
    } else {
        // Proses pendaftaran jika semua field terisi
        if ($email === $konfirmemail) {
            // Validasi format email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "<script>alert('Format email tidak valid')</script>";
                $errors[] = 'Format email tidak valid';
            } else {
                // Validasi nomor telepon
                if (!ctype_digit($nohp)) {
                    echo "<script>alert('No Handphone hanya boleh berisi angka')</script>";
                    $errors[] = 'No Handphone hanya boleh berisi angka';
                } else {
                    // Proses pendaftaran
                    if (daftarformulir($nama, $tempat, $date, $jns_kel, $agama, $nohp, $alamat, $provinsi, $no_jaket, $email, $date)) {
                        echo "<script>alert('Pendaftaran Berhasil, Silahkan Login')</script>";
                    } else {
                        echo "<script>alert('Pendaftaran Gagal')</script>";
                        $errors[] = 'Pendaftaran Gagal';
                    }
                }
            }
        } else {
            echo "<script>alert('Email konfirmasi tidak sama, silahkan ulangi kembali')</script>";
            $errors[] = 'Email konfirmasi tidak sama, silahkan ulangi kembali';
        }
    }
}

?>
<!-- Penanganan error -->
<?php if (!empty($errors)) : ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($errors as $error) : ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<!-- Formulir pendaftaran -->
<div class="container-fluid top">
    <!-- Sisipkan formulir di sini -->
</div>

<?php include 'foot.php'; ?>
<style>
    .block-web.primary-box {
        background: #4eb2d8;
        padding: 6px;
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
                    <h3><center>FORMULIR PENDAFTARAN SISWA</center></h3>
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
            <hr style="border:1px solid black">
            <form action="" method="post">

                <div class="form-group">
                    <label for="exampleInputEmail1">NAMA LENGKAP</label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Tempat Lahir</label>
                    <input type="text" name="tempat" class="form-control" placeholder="Tempat Lahir" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal Lahir</label>
                    <input type="date" name="date" class="form-control" placeholder="Tanggal Lahir" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Jenis Kelamin</label>
                    <label class="radio-inline">
              <input type="radio" name="jns_kel" value="laki-laki"><span class="custom-radio"></span> Laki-laki  
          </label>
                    <label class="radio-inline">
              <input type="radio" name="jns_kel" value="perempuan"><span class="custom-radio"></span> Perempuan  
          </label>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Agama</label>
                    <select name="agama" class="form-control" required>
            <option value="0"> -- Pilih Agama -- </option>
            <option value="islam">Islam</option>
            <option value="kristen">Kristen</option>
            <option value="katholik">Katholik</option>
            <option value="hindu">Hindu</option>
            <option value="budha">Budha</option>
            <option value="konghucu">Konghucu</option>
          </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">No Handphone</label>
                    <input type="number" name="nohp" class="form-control" placeholder="No Handphone" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Alamat</label>
                    <textarea name="alamat" cols="50" rows="3" name="alamat" class="form-control" placeholder="Isikan dengan Alamat Rumah" required></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Propinsi</label>
                    <select name="provinsi" class="form-control" required>
              <option value=""> -- Pilih Propinsi -- </option>
              <option value="jakarata">D.K.I. Jakarta</option>
              <option value="jawabarat">Jawa Barat</option>
              <option value="jawatengah">Jawa Tengah</option>
              <option value="yogyakarta">D.I. Yogyakarta</option>
              <option value="jawatimur">Jawa Timur</option>
              <option value="aceh">Aceh</option>
              <option value="sumaterautara">Sumatera Utara</option>
              <option value="sumaterabarat">Sumatera Barat</option>
              <option value="riau">Riau</option>
              <option value="jambi">Jambi</option>
              <option value="sumateraselatan">Sumatera Selatan</option>
              <option value="lampung">Lampung</option>
              <option value="kalimantanbarat">Kalimantan Barat</option>
              <option value="kalimantantengah">Kalimantan Tengah</option>
              <option value="kalimantanselatan">Kalimantan Selatan</option>
              <option value="kalimantantimur">Kalimantan Timur</option>
              <option value="sulawesiutara">Sulawesi Utara</option>
              <option value="sulawesitengah">Sulawesi Tengah</option>
              <option value="sulawesiselatan">Sulawesi Selatan</option>
              <option value="sulawesitenggara">Sulawesi Tenggara</option>
              <option value="maluku">Maluku</option>
              <option value="bali">Bali</option>
              <option value="nusatenggarabarat">Nusa Tenggara Barat</option>
              <option value="nusatenggaratimur">Nusa Tenggara Timur</option>
              <option value="papua">Papua</option>
              <option value="bengkulu">Bengkulu</option>
              <option value="malukuutara">Maluku Utara</option>
              <option value="banten">Banten</option>
              <option value="bangkabelitung">Bangka Belitung</option>
              <option value="gorontalo">Gorontalo</option>
              <option value="kepulauanriau">Kepulauan Riau</option>
              <option value="papuabarat">Papua Barat</option>
              <option value="sulawesibarat">Sulawesi Barat</option>
            </select>
                </div>

            <div class="form-group">
                    <label for="exampleInputEmail1">Ukuran Jaket</label>
            <select name="no_jaket" class="form-control" required>
                  <option value="0"> -- Pilih Ukuran Jaket -- </option>
                  <option value="s">S</option>
                  <option value="m">M</option>
                  <option value="l">L</option>
                  <option value="xl">XL</option>
                  <option value="xxl">XXL</option>
                  <option value="xxxl">XXXL</option>
            </select>
            </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">EMAIL</label>
                    <input type="email" name="email" class="form-control" placeholder="email" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">KONFIRMASI EMAIL</label>
                    <input type="email" name="konfirmemail" class="form-control" placeholder="konfirmasi email" required>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" href="#" class="btn btn-block btn-primary btn-lg" value="Daftar">
                </div>
            </form>
          </div>
>>>>>>> baf162c8b8b9c09b8d2170fa3202637cd34853e1
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