
<?php include 'include/header.php';
$userId = $_SESSION["userId"]; 
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
    <html>
        <body>
            <style>
                    .center
{
   position: absolute;

   right: 0px;

   

   
}
            </style>
        </body>
    </html>

    <!-- Main content -->
    
    <section class="content">
        <div class="col-md-12">
            <div class="row">
             <div class="box">
<div class="box-header">Referanslar
    <?php $yetki = DB::get("SELECT * FROM user_permissions WHERE userId='$userId' and permissionId = 1 ");
if(count ($yetki)>0){
?>
<button type="submit" class="btn btn-primary center" onclick="window.location.href='referansKategori-ekle.php';"> Yeni Kayıt Ekle</button>
<?php } ?>
</div>
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
                  <?php
         
         $yetki = DB::get("SELECT * FROM user_permissions WHERE userId='$userId' and permissionId = 2 ");
        
         if(count ($yetki)>0){

              ?>
                   <a href="?sil=<?=$row->id?>"><i class="fa fa-trash text-danger"></i></a>
                   <?php
                        } 
                   
                        ?>
                   
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
{  $yetki = DB::get("SELECT * FROM user_permissions WHERE userId='$userId' and permissionId = 2 ");
    if(count($yetki)!=0){
    $sil=DB::prepare("DELETE  FROM kategoriler WHERE id=:silinecekid");
    $sil->execute(["silinecekid"=> $_GET["sil"]]);
    if($sil)
    {
        echo "silme işlemi başarılı";
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
