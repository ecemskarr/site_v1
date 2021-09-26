
<?php include 'include/header.php';
require 'class.upload.php';
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
$ayar = DB::getRow("SELECT * FROM ayarlar WHERE id=1");

?>
    <!-- Main content -->
    <section class="content">
        <div class="col-md-12">
            <div class="row">
             <div class="box">
<div class="box-header">Site Ayarları</div>
<div class="box-body">
<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
    <label > Başlık</label>
    <input name="baslik" class="form-control"  value="<?= $ayar->site_baslik?>">
</div>
<div class="form-group">
    <label > Resim</label>
    <input type="file" name="resim" >
</div>
<div class="form-group">
<button type="submit" class="btn btn-primary">Güncelle</button>
</div>
</form>
</div>
             </div>
            </div>
        </div>

    </section>
    <script type="text/javascript" src="../js/sweetalert2.all.min.js"></script>
<?php 
if($_POST){

    $id=$_SESSION['id'];
    $permissions=DB::get("select * from user_permissions where userId=$id and permissionId=5 ");
    $deger=count($permissions);
    if($deger>=1){
        $image=new upload($_FILES['resim']);
        if($image->uploaded){
        $image->image_resize = true;
        $image->image_ratio_crop = true;
        $image->image_x = 200;
        $image->image_y = 50;
        $image->Process('galeri/');
        if($image->processed){
          $image_name=$image->file_dst_name;
            $guncelle= DB::prepare("UPDATE ayarlar SET site_baslik=:baslik, site_logo=:resim WHERE id=:id");
         $guncelle->execute([
             "baslik" => $_POST["baslik"],
             "resim" =>  $image_name,
             "id" => 1
         ]);
         if($guncelle){
            echo "<script>
            Swal.fire({
         
                icon: 'success',
                title: 'Güncelleme işlemi başarılı',
                showConfirmButton: false,
                timer: 1500
              })
            </script>";
     
         }
         else{
             echo "Bir hata oluştu";
         }
        
        }
    }

    
      else{
        $guncelle= DB::prepare("UPDATE ayarlar SET site_baslik=:baslik WHERE id=:id");
        $guncelle->execute([
            "baslik" => $_POST["baslik"],
            "id" => 1
        ]);
        if($guncelle){
            echo "Güncelleme işlemi başarılı";
    
        }
        else{
            echo "Bir hata oluştu";
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




    <!-- /.content -->
<?php include 'include/footer.php'; ?>
