
<?php include 'include/header.php'; ?>
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
<img src="assets/upload/<?= $row->resim ?>" alt="" height="200">
</div>
             </div>
            </div>
        </div>

    


    <?php 





if($_POST)
{
if($_FILES["resim"]["name"]){
    $resimAdi=$_FILES["resim"]["name"];
$resimYolu="assets/upload/".$resimAdi;
if(move_uploaded_file($_FILES["resim"]["tmp_name"],$resimYolu))
{
    $ekle=DB::prepare("UPDATE galeri SET 
                     resim=:resim,
                    aciklama=:aciklama WHERE id=:id
                   
                    ");
$ekle->execute([
    "resim"  => $resimAdi,
    "aciklama" => $_POST["aciklama"],
    "id" => $_GET["id"]
   
 
]);
if($ekle){
    echo "Güncelleme işlemi başarılı";
}
else{
    echo "Bir hata oluştu";
}
}
}else{
    
    $ekle=DB::prepare("UPDATE galeri SET 
                     
                    aciklama=:aciklama WHERE id=:id
                   
                    ");
$ekle->execute([
   
    "aciklama" => $_POST["aciklama"],
    "id" => $_GET["id"]
   
 
]);
if($ekle){
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
