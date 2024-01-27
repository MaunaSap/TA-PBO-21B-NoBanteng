<?php 
include 'head.php';

if(isset($_POST['simpanktp'])){
  $id_pendaftar = $_SESSION['id'];

  $nama   = $_FILES['ktp']['name'];
  $size   = $_FILES['ktp']['size'];
  $error  = $_FILES['ktp']['error'];
  $asal   = $_FILES['ktp']['tmp_name'];
  
  $lokasi_foto = "img/dokumen/ktp/" . $nama;
  $format = pathinfo($nama, PATHINFO_EXTENSION);

  if($error === 0){

    if ($size > 9000){ 
    
      if($format === "jpg" || $format === "png" || $format === "JPG" || $format === "PNG" ){
            
        move_uploaded_file($asal, "img/dokumen/ktp/".$nama);

        if(simpanktp($id_pendaftar, $lokasi_foto)){
          echo "<script>window.location.href='dokumen.php'</script>";
        } else {
          echo mysqli_error($konek);
        } 
    
      } else {
        echo "Maaf, format filenya harus jpg/png.";
      }
    
    } else {
      echo "File terlalu besar.";
    }
  } else {
    echo "Ada kesalahan saat upload.";
  }
}
?>
