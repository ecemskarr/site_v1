
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

    <!-- Main content -->
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
    <section class="content">
        <div class="col-md-12">
            <div class="row">
             <div class="box">
<div class="box-header">Referanslar</div>
<div class="box-body">
<table class="table table-sprited">
    <thead>
        <th>Kategori ID</th>
        <th>Kategori Adı</th>
        <th>İşlem</th>
    </thead>
    <tbody>
       <?php 
       
       $calismalarim=DB::get("SELECT * FROM kategoriler ");
       foreach($calismalarim as $row)
       {
           ?>
           <tr>
               <td><?=$row->id?></td>
               <td><?=$row->kategoriAd?></td>
               <td>
                  <a href="referansKategori-guncelle.php?id=<?=$row->id?>"><i class="fa fa-edit text-primary"></i></a>
                   <a href="?sil=<?=$row->id?>"><i class="fa fa-trash text-danger"></i></a>
                  
               </td>
           </tr>
           <?php
       }
       
       ?>
    </tbody>
</table>
</div>
             </div>
            </div>
        </div>

    </section>


    <?php 

if(@$_GET["sil"])
{
    $sil=DB::prepare("DELETE  FROM kategoriler WHERE id=:silinecekid");
    $sil->execute(["silinecekid"=> $_GET["sil"]]);
    if($sil)
    {
        echo "silme işlemi başarılı";
    }
}



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
}
else{
    echo "Bir hata oluştu";
}



}



?>



    <!-- /.content -->
<?php include 'include/footer.php'; ?>
