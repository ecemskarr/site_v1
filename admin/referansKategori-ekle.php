<?php include 'include/header.php';  ?>
<section class="content">
        <div class="col-md-12">
            <div class="row">
             <div class="box">
<div class="box-header">Referans Ayarları</div>
<div class="box-body">
<form action="" method="post" enctype="multipart/form-data">


<div class="form-group">
    <label >Kategori Adı</label>
    <textarea name="kategoriAd" class="form-control" placeholder="Kategori Adı Giriniz"></textarea>
</div>


<div class="form-group">
<button type="submit" class="btn btn-primary">Ekle</button>
</div>
</form>
</div>
             </div>
            </div>
        </div>

    </section>
<?php
    if($_POST)
{

    $ekle=DB::prepare("INSERT INTO kategoriler SET 
                    
                     
                     kategoriAd=:kategoriAd
                   
                    ");
$ekle->execute([
    
  
    "kategoriAd" => $_POST["kategoriAd"]
   
 
]);
if($ekle){
    echo "Ekleme işlemi başarılı";
    header("location:referansKategori.php");
}
else{
    echo "Bir hata oluştu";
}



}
?>




    <?php include 'include/footer.php'; ?>