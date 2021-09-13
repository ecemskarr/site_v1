
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

if($_GET["id"]){
    $Id = $_GET["id"];
$calismaDetay=DB::getRow("SELECT * FROM kategoriler WHERE id=$Id");



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


   
    <label >Kategori Adı</label>
    <textarea name="kategoriAd" class="form-control" placeholder="Kategori Adı Giriniz"><?=$calismaDetay->kategoriAd?></textarea>
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

    
$ekle=DB::prepare("UPDATE kategoriler SET 
                     
                  
                     kategoriAd=:kategoriAd
                    WHERE id=:id
                   
                    ");
$ekle->execute([
   
   
    "kategoriAd" =>$_POST["kategoriAd"],
    "id" => $_GET["id"]
    
   
 
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
