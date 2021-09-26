
<?php include 'include/header.php';


$id=$_SESSION['id'];
$yetki = DB::get("SELECT * FROM users WHERE id='$id' and is_admin='admin'");
if(count($yetki)==0)
{
 
    header("location:anasayfa.php");
    exit;
}

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
$yetki=DB::getRow("SELECT * FROM permissions WHERE id=$Id");



}





    ?>

    <!-- Main content -->
    <section class="content">
        <div class="col-md-12">
            <div class="row">
             <div class="box">
<div class="box-header">Yetki Ayarları</div>
<div class="box-body">
<form action="" method="post">


<div class="form-group">
    <label >Yetki Adı</label>
    <textarea name="title" class="form-control" placeholder="Kategori Adı Giriniz"><?=$yetki->title?></textarea>
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

    
$ekle=DB::prepare("UPDATE permissions SET 
                     
                  
                     title=:title
                    WHERE id=:id
                   
                    ");
$ekle->execute([
   
   
    "title" =>$_POST["title"] ? $_POST["title"] : $yetki->title,
    "id" => $_GET["id"]
    
   
 
]);
if($ekle){
    echo "Güncelleme işlemi başarılı";
    header("location:yetkiler.php");
}
else{
    echo "Bir hata oluştu";
}



}



?>



    <!-- /.content -->
<?php include 'include/footer.php'; ?>
