<?php include 'include/header.php'; 
require 'class.upload.php';
ob_start();
$userId = $_SESSION["userId"];

?>
    <html>
        <body>
            <style>
                    .center
{
   position: absolute;

   right: 0px;

   

   
}
            </style>
        </body>
    </html>


<section class="content">
        <div class="col-md-12">
            <div class="row">
             <div class="box">
<div class="box-header">Galeri Ayarları
<button type="submit" class="btn btn-primary center" onclick="window.location.href='galeriupload.php';"> Birden Fazla Resim Ekle</button>
</div>
<div class="box-body">
<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
    <label > Resim</label>
    <input type="file" name="resim"  >
</div>
<div class="form-group">
    <label > Açıklama</label>
    <textarea name="aciklama" class="form-control" placeholder="Açıklama Giriniz"></textarea>
</div>
<div class="form-group">
<button type="submit" class="btn btn-primary">Ekle</button>
</div>
</form>
</div>
             </div>
            </div>
        </div>
        
        <!-- /page content -->
    </section>


    <script type="text/javascript" src="../js/sweetalert2.all.min.js"></script>

    

<?php 

if($_POST)
{
    $yetki = DB::get("SELECT * FROM user_permissions WHERE userId='$userId' and permissionId = 1 ");
if(count($yetki)!=0){
    $image=new upload($_FILES['resim']);
    if($image->uploaded){
        $image->image_resize = true;
        $image->image_ratio_crop = true;
        $image->image_x = 260;
        $image->image_y = 260;
        $image->Process('galeri/');
        if($image->processed){
          $image_name=$image->file_dst_name;


    $ekle=DB::prepare("INSERT INTO galeri SET 
    resim=:resim,
   aciklama=:aciklama
  
   ");
$ekle->execute([
"resim"  => $image_name,
"aciklama" => $_POST["aciklama"]


]);
       
if($ekle){
    echo "<script>
    Swal.fire({
 
        icon: 'success',
        title: 'Ekleme işlemi başarılı',
        showConfirmButton: false,
       
      })
    </script>";

   
   header("location:galeri.php");
   
}
else{
    echo "Bir hata oluştu";
}
} 
}

}else{
    echo "<script>
    Swal.fire({
       
        icon: 'error',
        title: 'Yetkisiz işlem',
        showConfirmButton: false
      
      })
    </script>";
}
}
?>
   <!-- jQuery -->
 
    
    <?php include 'include/footer.php'; ?>