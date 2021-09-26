
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
.RbtnMargin { margin-left: 5px; }
            </style>
        </body>
    </html>

   
    <section class="content">
        <div class="col-md-12">
            <div class="row">
             <div class="box">
<div class="box-header">Referanslar
<?php 
   
$yetki = DB::get("SELECT * FROM user_permissions WHERE userId='$userId' and permissionId = 1 ");
if(count ($yetki)>0){
?>
<button type="submit" class="btn btn-primary pull-right RbtnMargin" onclick="window.location.href='referans-ekle.php';"> Yeni Kayıt Ekle</button>
<?php } ?>
<?php
$id=$_SESSION['id'];
$yetki = DB::get("SELECT * FROM users WHERE id='$id' and is_admin='admin'");
if(count($yetki)>0) { ?>
<button type="submit" class="btn btn-warning pull-right" onclick="window.location.href='referansonay.php';"> Onay Bekleyenler</button> 
<?php } ?>
</div>
<div class="box-body">
<table class="table table-sprited">
    <thead>
        <th>Referans ID</th>
        <th>Kategori ID</th>
        <th>Referans Adı</th>
        <th>Resim </th>
        <th>İşlem</th>
    </thead>
    <tbody>
       <?php 
       
       $calismalarim = DB::get("select * from referans where durum=1");
       foreach($calismalarim as $row)
       {
           ?>
           <tr>
               <td><?=$row->referans_id?></td>
               <td><?=$row->kategori_id?></td>
               <td><?=$row->referansAd?></td>
               <td><img src="referanslar/<?= $row->resim ?>" width=100>></td>
               <td>
                  <a href="referans-guncelle.php?referans_id=<?=$row->referans_id?>"><i class="fa fa-edit text-primary"></i></a>
                  <?php
         
         $yetki = DB::get("SELECT * FROM user_permissions WHERE userId='$userId' and permissionId = 2 ");
        
         if(count ($yetki)>0){

              ?>
                   <a href="?sil=<?=$row->referans_id?>"onclick="return confirm('Silmek istediğinize emin misiniz?');"><i class="fa fa-trash text-danger"></i></a>
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
  {
   
   $yetki = DB::get("SELECT * FROM user_permissions WHERE userId='$userId' and permissionId = 2 ");
   if(count($yetki)!=0){ 

    $sil=DB::prepare("DELETE  FROM referans WHERE referans_id=:silinecekid");
    $sil->execute(["silinecekid"=> $_GET["sil"]]);
    if($sil)
    {
        echo "silme işlemi başarılı";
        echo "<script>";
        echo "window.location.href='haber.php';";
        echo "</script>";
        
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
