
<?php include 'include/header.php';
ob_start();
require 'class.upload.php';
$id=$_SESSION['id'];
$permissions=DB::get("select * from user_permissions where userId=$id and permissionId=5 ");
$deger=count($permissions);
if($deger<=0){

    echo "<script>
    Swal.fire({
       
        icon: 'error',
        title: 'Yetkisiz işlem',
        showConfirmButton: false
      
      })
    </script>";
}
?>
<section class="content-header">
        <h1>
        Admin Paneli
           
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Anasayfa</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
    <?php 

if($_GET["id"]){
$id=$_GET["id"];
$calismaDetay=DB::getRow("SELECT * FROM galeri WHERE id=$id");


}





    ?>

    <!-- Main content -->
    <section class="content">
        <div class="col-md-12">
            <div class="row">
             <div class="box">
<div class="box-header">Galeri Ayarları</div>
<div class="box-body">
<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
    <label > Resim</label>
    <input type="file" name="resim" >
</div>
<div class="form-group">
    <label > Açıklama</label>
    <textarea name="aciklama" class="form-control"><?=$calismaDetay->aciklama?></textarea>
</div>
<div class="form-group">
<button type="submit" class="btn btn-primary">Güncelle</button>
</div>
</form>
<img src="galeri/<?= $calismaDetay->resim ?>" alt="" height="200">
</div>
             </div>
            </div>
        </div>

        <script type="text/javascript" src="../js/sweetalert2.all.min.js"></script>


    <?php 




if($_POST)
{
    $id=$_SESSION['id'];
    $permissions=DB::get("select * from user_permissions where userId=$id and permissionId=5 ");
    $deger=count($permissions);
    if($deger>=1){
    
  $image=new upload($_FILES['resim']);
  if($image->uploaded){
      $image->image_resize = true;
      $image->image_ratio_crop = true;
      $image->image_x = 260;
      $image->image_y = 260;
      $image->Process('galeri/');
      if($image->processed){
        $image_name=$image->file_dst_name;
        $ekle=DB::prepare("UPDATE galeri SET 
        resim=:resim,
       aciklama=:aciklama WHERE id=:id
      
       ");
      
$ekle->execute([
"resim"  => $image_name,
"aciklama" => $_POST["aciklama"] ? $_POST["aciklama"] : $calismaDetay->aciklama,
"id" => $_GET["id"]


]);


if($ekle){
    echo "<script>
    Swal.fire({
        icon: 'success',
        title: 'Güncelleme işlemi yapıldı',
       
      })
    </script>";
    header("location:galeri.php");
   
    
}
else{
    echo "Bir hata oluştu";
}

       }
     

    }
    else {
        $ekle=DB::prepare("UPDATE galeri SET 
                     
        aciklama=:aciklama, durum=:durum WHERE id=:id
       
        ");
$ekle->execute([

"aciklama" => $_POST["aciklama"],
"durum"=> 0,
"id" => $_GET["id"]



]);
if($ekle){
echo "<script>
Swal.fire({

icon: 'success',
title: 'Güncelleme işlemi onaya gönderildi',
showConfirmButton: false,
timer: 1500
})
</script>";
header("location:galeri.php");
}
else{
echo "Bir hata oluştu";
}
    }
}

else{
    echo "<script>
    Swal.fire({
       
        icon: 'error',
        title: 'Yetkisiz işlem',
        showConfirmButton: false
      
      })
    </script>";
    header("location:galeri.php");
}
}
?>



    <!-- /.content -->
<?php include 'include/footer.php'; ?>
