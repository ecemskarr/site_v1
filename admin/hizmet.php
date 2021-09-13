
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
<div class="box-header">Hizmetlerimiz Ayarları</div>
<div class="box-body">
<form action="" method="post" enctype="multipart/form-data">







<div class="form-group">
    <label >Hizmet Adı</label>
    <textarea name="hizmetAdi" class="form-control" placeholder="Hizmet Adı Giriniz"></textarea>
</div>
<div class="form-group">
    <label >Hizmet Açıklama</label>
    <textarea name="hizmetAciklama" class="form-control" placeholder="Hizmet Açıklama Giriniz"></textarea>
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
<div class="box-header">Hizmetlerimiz</div>
<div class="box-body">
<table class="table table-sprited">
    <thead>
        <th>Hizmet ID</th>
        <th>Hizmet Adı</th>
        <th>Hizmet Açıklama</th>
        <th>İşlem</th>
    </thead>
    <tbody>
       <?php 
       
       $calismalarim = DB::get("select * from hizmetlerimiz");
       foreach($calismalarim as $row)
       {
           ?>
           <tr>
               <td><?=$row->hizmetID?></td>
               <td><?=$row->hizmetAdi?></td>
               <td><?=$row->hizmetAciklama?></td>
               <td>
                  <a href="hizmet-guncelle.php?hizmetID=<?=$row->hizmetID?>"><i class="fa fa-edit text-primary"></i></a>
                   <a href="?sil=<?=$row->hizmetID?>"><i class="fa fa-trash text-danger"></i></a>
                  
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
    $sil=DB::prepare("DELETE  FROM hizmetlerimiz WHERE hizmetID=:silinecekid");
    $sil->execute(["silinecekid"=> $_GET["sil"]]);
    if($sil)
    {
        echo "silme işlemi başarılı";
    }
}



if($_POST)
{


    $ekle=DB::prepare("INSERT INTO hizmetlerimiz SET 
                    
                    hizmetAdi=:hizmetAdi,
                    hizmetAciklama=:hizmetAciklama
                   
                    ");
$ekle->execute([
    
    "hizmetAdi" => $_POST["hizmetAdi"],
    "hizmetAciklama" => $_POST["hizmetAciklama"]
   
 
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
