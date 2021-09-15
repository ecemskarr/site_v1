
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

if($_GET["hizmetID"]){
    $Id = $_GET["hizmetID"];
$calismaDetay=DB::getRow("SELECT * FROM hizmetlerimiz WHERE hizmetID=$Id");



}





    ?>

    <!-- Main content -->
    <section class="content">
        <div class="col-md-12">
            <div class="row">
             <div class="box">
<div class="box-header">Referans Kategori Ayarları</div>
<div class="box-body">
<form action="" method="post" enctype="multipart/form-data">


   
    <label >Hizmet Adı</label>
    <textarea name="hizmetAdi" class="form-control" ><?=$calismaDetay->hizmetAdi?></textarea>
</div>
<label >Hizmet Açıklama</label>
    <textarea name="hizmetAciklama" class="form-control" ><?=$calismaDetay->hizmetAciklama?></textarea>
</div>


<div class="form-group">
<button type="submit" class="btn btn-primary">Güncelle</button>
</div>
</form>

</div>
             </div>
            </div>
        </div>

    


    <?php 





if($_POST)
{

    
$ekle=DB::prepare("UPDATE hizmetlerimiz SET 
                     
                  
                     hizmetAdi=:hizmetAdi,
                     hizmetAciklama=:hizmetAciklama
                    WHERE hizmetID=:hizmetID
                   
                    ");
$ekle->execute([
   
   
    "hizmetAdi" =>$_POST["hizmetAdi"],
    "hizmetAciklama" =>$_POST["hizmetAciklama"],
    "hizmetID" => $_GET["hizmetID"]
    
   
 
]);
if($ekle){
    echo "Güncelleme işlemi başarılı";
}
else{
    echo "Bir hata oluştu";
}



}



?>



    <!-- /.content -->
<?php include 'include/footer.php'; ?>
