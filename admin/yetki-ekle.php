<?php include 'include/header.php';


$id=$_SESSION['id'];
$yetki = DB::get("SELECT * FROM users WHERE id='$id' and is_admin='admin'");
if(count($yetki)==0)
{
 
    header("location:anasayfa.php");
    exit;
}


?>
<section class="content">
        <div class="col-md-12">
            <div class="row">
             <div class="box">
<div class="box-header">Yetki Ayarları</div>
<div class="box-body">
<form action="" method="post" >


<div class="form-group">
    <label >Yetki Adı</label>
    <textarea name="title" class="form-control" placeholder="Yetki Adı Giriniz"></textarea>
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

    $ekle=DB::prepare("INSERT INTO permissions SET 
                    
                     
                     title=:title
                   
                    ");
$ekle->execute([
    
  
    "title" => $_POST["title"]
   
 
]);
if($ekle){
    echo "Ekleme işlemi başarılı";
    header("location:yetkiler.php");
}
else{
    echo "Bir hata oluştu";
}



}
?>




    <?php include 'include/footer.php'; ?>