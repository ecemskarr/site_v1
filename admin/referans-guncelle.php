
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

if($_GET["referans_id"]){
$refId = $_GET["referans_id"];
$calismaDetay = DB::getRow("SELECT * FROM referans WHERE referans_id='$refId'");


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

    <label > Kategori ID</label>
    <textarea name="kategori_id" class="form-control" placeholder="Kategori ID Giriniz"><?=$calismaDetay->kategori_id?></textarea>
</div>
<div class="form-group">
    <label >Referans Adı</label>
    <textarea name="referansAd" class="form-control" placeholder="Referans Adı Giriniz"><?=$calismaDetay->referansAd?></textarea>
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
    
    $id=$_SESSION['id'];
    $permissions=DB::get("select * from user_permissions where userId=$id and permissionId=5 ");
    $deger=count($permissions);
    if($deger>=1){
if($_FILES["resim"]["name"]){
    $resimAdi=$_FILES["resim"]["name"];
$resimYolu="assets/upload/".$resimAdi;
if(move_uploaded_file($_FILES["resim"]["tmp_name"],$resimYolu))
{
    $ekle=DB::prepare("UPDATE referans SET 
                     resim=:resim,
                     kategori_id=:kategori_id,
                     referansAd=:referansAd,
                     durum=:durum
                    WHERE referans_id=:referans_id
                   
                    ");
$ekle->execute([
    "resim"  => $resimAdi,
    "kategori_id" => $_POST["kategori_id"],
    "referansAd" =>$_POST["referansAd"],
    "durum"=> 0,
    "referans_id" => $_GET["referans_id"]
   
 
]);
if($ekle){
    echo "Güncelleme işlemi başarılı";
}
else{
    echo "Bir hata oluştu";
}
}
}else{
    
    $ekle=DB::prepare("UPDATE referans SET 
                     
                     kategori_id=:kategori_id,
                     referansAd=:referansAd,
                     durum=:durum
                    WHERE referans_id=:referans_id
                   
                    ");
$ekle->execute([
   
    "kategori_id" => $_POST["kategori_id"],
    "referansAd" =>$_POST["referansAd"],
    "durum"=> 0,
    "referans_id" => $_GET["referans_id"]
   
 
]);
if($ekle){
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
