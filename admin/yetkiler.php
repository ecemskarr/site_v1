
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
<div class="box-header">Yetkiler
<button type="submit" class="btn btn-primary center" onclick="window.location.href='yetki-ekle.php';"> Yeni Kayıt Ekle</button>
</div>
<div class="box-body">
<table class="table table-sprited">
    <thead>
        <th>ID</th>
        <th>Title</th>
        <th>İşlem</th>
    </thead>
    <tbody>
       <?php 
       
       $yetki=DB::get("SELECT * FROM permissions ");
       foreach($yetki as $row)
       {
           ?>
           <tr>
               <td><?=$row->id?></td>
               <td><?=$row->title?></td>
               <td>
                  <a href="yetki-guncelle.php?id=<?=$row->id?>"><i class="fa fa-edit text-primary"></i></a>
                   <a href="?sil=<?=$row->id?>"><i class="fa fa-trash text-danger" onclick="return confirm('Silmek istediğinize emin misiniz?');"></i></a>
                  
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
    $sil=DB::prepare("DELETE  FROM permissions WHERE id=:silinecekid");
    $sil->execute(["silinecekid"=> $_GET["sil"]]);
    if($sil)
    {
        echo "silme işlemi başarılı";
        header("location:yetkiler.php");
    }
}






?>



    <!-- /.content -->
<?php include 'include/footer.php'; ?>
