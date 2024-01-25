<?php 
include 'head.php';

if(isset($_POST['bayar'])){
  $id = $_SESSION['id'];
  $nama_pendaftar = $_SESSION['nama'];
  $namabank = $_POST['namabank'];

  $nama   = $_FILES['gambar']['name'];
  $size   = $_FILES['gambar']['size'];
  $error  = $_FILES['gambar']['error'];
  $asal   = $_FILES['gambar']['tmp_name'];

  $lokasi = "img/bukti_transfer/" . $nama;
  $format = pathinfo($nama, PATHINFO_EXTENSION);

  if($error === 0){
    if($size > 9000){
      if(in_array($format, ['jpg', 'png', 'JPG', 'PNG'])){
        move_uploaded_file($asal, "img/bukti_transfer/".$nama);

        if(simpantransaksi($id, $nama_pendaftar, $namabank, $lokasi)){
          echo "<script>window.location.href='user.php'</script>";
        } else {
          echo "Error: Unable to save transaction data.";
        }
      } else {
        echo "Maaf format filenya harus jpg/png ";
      }
    } else {
      echo "File terlalu besar";
    }
  } else {
    echo "Ada kesalahan saat upload";
  }
}
?>
