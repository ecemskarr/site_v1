
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
<div class="box-header">Hizmetlerimiz
<?php $yetki = DB::get("SELECT * FROM user_permissions WHERE userId='$userId' and permissionId = 1 ");
if(count ($yetki)>0){
?>
<button type="submit" class="btn btn-primary center" onclick="window.location.href='hizmet-ekle.php';"> Yeni Kayıt Ekle</button>
<?php } ?>
</div>
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
                  <?php
         
         $yetki = DB::get("SELECT * FROM user_permissions WHERE userId='$userId' and permissionId = 2 ");
        
         if(count ($yetki)>0){

              ?>
                   <a href="?sil=<?=$row->hizmetID?>"><i class="fa fa-trash text-danger"></i></a>
                   <?php } ?>
                  
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
{$yetki = DB::get("SELECT * FROM user_permissions WHERE userId='$userId' and permissionId = 2 ");
    if(count($yetki)!=0){
    $sil=DB::prepare("DELETE  FROM hizmetlerimiz WHERE hizmetID=:silinecekid");
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
