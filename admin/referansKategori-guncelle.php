
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

    $id=$_SESSION['id'];
    $permissions=DB::get("select * from user_permissions where userId=$id and permissionId=5 ");
    $deger=count($permissions);
    if($deger>=1){ 
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
