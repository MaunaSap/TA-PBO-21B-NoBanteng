<?php 
include 'head.php';

if(isset($_POST['simpanakte'])){
  $id_pendaftar = $_SESSION['id'];

  $nama   = $_FILES['akte']['name'];
  $size   = $_FILES['akte']['size'];
  $error  = $_FILES['akte']['error'];
  $asal   = $_FILES['akte']['tmp_name'];

  $lokasi_foto = "img/dokumen/akte/" . $nama;
  $format = pathinfo($nama, PATHINFO_EXTENSION);

  if($error === 0){
    if($size > 9000){
      if(in_array($format, ['jpg', 'png', 'JPG', 'PNG'])){
        move_uploaded_file($asal, "img/dokumen/akte/".$nama);

        if(simpanakte($id_pendaftar, $lokasi_foto)){
          echo "<script>window.location.href='dokumen.php'</script>";
        } else {
          echo "Error: Unable to save data.";
        }
      } else {
        echo "Maaf format filenya harus jpg/png ";
      }
    } else {
      echo "file terlalu besar";
    }
  } else {
    echo "Ada kesalahan saat upload";
  }
}
?>
