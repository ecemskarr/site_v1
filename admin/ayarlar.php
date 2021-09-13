
<?php include 'include/header.php'; ?>
    <section class="content-header">
        <h1>
            Dashboard
            <small>Version 2.0</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
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
<?php 
if($_POST){
 
    if($_FILES["resim"]["name"]){
    
        $resimAdi=$_FILES["resim"]["name"];
        $resimYolu="assets/upload/".$resimAdi;
        if(move_uploaded_file($_FILES["resim"]["tmp_name"],$resimYolu)){
            $guncelle= DB::prepare("UPDATE ayarlar SET site_baslik=:baslik, site_logo=:resim WHERE id=:id");
         $guncelle->execute([
             "baslik" => $_POST["baslik"],
             "resim" => $resimAdi,
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

}


?>




    <!-- /.content -->
<?php include 'include/footer.php'; ?>
