
<?php include 'include/header.php';

$id=$_SESSION['id'];

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
    $Id = $_GET["id"];
$calismaDetay=DB::getRow("SELECT * FROM users WHERE id=$Id");



}
if($_POST){
    $yetki = DB::get("SELECT * FROM users WHERE id='$id' and is_admin='admin'");
    if(count ($yetki)>0){
$password=$_POST["password"];
$kullanici_password=md5($password);

$update=DB::prepare("UPDATE users SET                  
password=:password
WHERE id=:id

");
$update->execute([

"password" => $kullanici_password ? $kullanici_password : $calismaDetay->password,
"id"=>$Id


]);
if($update){
echo "Güncelleme işlemi başarılı";
sleep(2);
header("location:kullanici.php");
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
   

    <!-- Main content -->
    <section class="content">
        <div class="col-md-12">
            <div class="row">
             <div class="box">
<div class="box-header">Şifre Ayarları</div>
<div class="box-body">
<form action="" method="post">
<div class="form-group">
    <label >Yeni Şifre</label>
    <textarea name="password" class="form-control" placeholder="Yeni Şifrenizi Giriniz"></textarea>
</div>

<div class="form-group">
<button type="submit" class="btn btn-primary">Güncelle</button>
</div>
</form>

</div>
             </div>
            </div>
        </div>

    












    <!-- /.content -->
<?php include 'include/footer.php'; ?>
