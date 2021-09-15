
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

   
    <section class="content">
        <div class="col-md-12">
            <div class="row">
             <div class="box">
<div class="box-header">Referanslar

<button type="submit" class="btn btn-primary center" onclick="window.location.href='referans-ekle.php';"> Yeni Kayıt Ekle</button>
</div>
<div class="box-body">
<table class="table table-sprited">
    <thead>
        <th>Referans ID</th>
        <th>Kategori ID</th>
        <th>Referans Adı</th>
        <th>İşlem</th>
    </thead>
    <tbody>
       <?php 
       
       $calismalarim = DB::get("select * from referans");
       foreach($calismalarim as $row)
       {
           ?>
           <tr>
               <td><?=$row->referans_id?></td>
               <td><?=$row->kategori_id?></td>
               <td><?=$row->referansAd?></td>
               <td>
                  <a href="referans-guncelle.php?referans_id=<?=$row->referans_id?>"><i class="fa fa-edit text-primary"></i></a>
                   <a href="?sil=<?=$row->referans_id?>"><i class="fa fa-trash text-danger"></i></a>
                  
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
    $sil=DB::prepare("DELETE  FROM referans WHERE referans_id=:silinecekid");
    $sil->execute(["silinecekid"=> $_GET["sil"]]);
    if($sil)
    {
        echo "silme işlemi başarılı";
    }
}







?>



    <!-- /.content -->
<?php include 'include/footer.php'; ?>
