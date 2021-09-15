
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
$refId = $_GET["id"];
$calismaDetay = DB::getRow("SELECT * FROM haber WHERE id='$refId'");


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

    <label > Haber Başlık</label>
    <textarea name="baslik" class="form-control" placeholder="Kategori ID Giriniz"><?=$calismaDetay->baslik?></textarea>
</div>
<div class="form-group">
    <label >Haber İçerik</label>
    <textarea name="aciklama" class="form-control" placeholder="Referans Adı Giriniz"><?=$calismaDetay->aciklama?></textarea>
</div>

<div class="form-group">
<button type="submit" class="btn btn-primary">Güncelle</button>
</div>
</form>
<img src="assets/upload/<?= $calismaDetay->resim ?>" alt="" height="100" width="100">
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
    $ekle=DB::prepare("UPDATE haber SET 
                     resim=:resim,
                     baslik=:baslik,
                     aciklama=:aciklama
                    WHERE id=:id
                   
                    ");
$ekle->execute([
    "resim"  => $resimAdi,
    "baslik" => $_POST["baslik"],
    "aciklama" =>$_POST["aciklama"],
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
    
    $ekle=DB::prepare("UPDATE haber SET 
                     
                     
                     baslik=:baslik,
                     aciklama=:aciklama
                    WHERE id=:id
                    ");
$ekle->execute([
   
    
    "baslik" => $_POST["baslik"],
    "aciklama" =>$_POST["aciklama"],
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
