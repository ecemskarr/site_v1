<?php include 'include/header.php'; 


if($_POST)
 {
 
    $yetki1         =  isset($_POST["yetki_1"]);
    $yetki2         =  isset($_POST["yetki_2"]);
    $username       =  $_POST["username"];
    $password       =  md5($_POST["password"]);
    $permissions    =  1;
    $is_admin       =  $_POST["is_admin"];
    $full_name      =  $_POST["full_name"];
    $mail           =  $_POST["mail"];
    $phone          =  $_POST["phone"];
    
    // Kullanıcı ekleme
    $userId = DB::insert("INSERT INTO users SET 
        username='$username',
        password='$password',
        permissions='$permissions',
        is_admin=' $is_admin',
        full_name='$full_name',
        mail='$mail',
        phone='$phone'
    ");

 // Kullanıcı ekleme yetkisi
    if( isset($yetki1) )
    {
        $yetki1 = DB::insert("INSERT INTO user_permissions SET                 
        userId ='$userId',
        permissionId =1
    ");
    }

     // Kullanıcı silme yetkisi
     if( isset($yetki2) )
     {
         $yetki2 = DB::insert("INSERT INTO user_permissions SET                 
         userId ='$userId',
         permissionId =2
     ");
     }


 if($userId){
     echo "Ekleme işlemi başarılı";
     header("location:kullanici.php");
 }
 else{
     echo "Bir hata oluştu";
 }
 
 
 }

?>
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
<div class="box-header">Kullanıcı Ekle</div>
<div class="box-body">
<form action="" method="post">
<div class="form-group">
    <label > Kullanıcı Adı</label>
    <input type="text" name="username" class="form-control" placeholder="Kullanıcı Adı Giriniz"></input>
</div>
<div class="form-group">
    <label >Şifre</label>
    <input type="text" name="password" class="form-control" placeholder="Kullanıcı Adı Giriniz"></input>
</div>

<?php

$categories = DB::get("select * from permissions"); 

?>

<h4> Yetkileri </h4>

<input type="checkbox" name="yetki_1" checked> Ekleme <br>
<input type="checkbox" name="yetki_2"> Silme  <br>
<div class="form-group">
</div>
<br> <br>
<div class="form-group">
    <label> Admin-Kullanıcı</label>
    <input type="text" name="is_admin" class="form-control" placeholder="Kullanıcı Adı Giriniz"></input>
</div>

<div class="form-group">
    <label> Adı Soyadı</label>
    <input type="text" name="full_name" class="form-control" placeholder="Kullanıcı Adı Giriniz"></input>
</div>
<div class="form-group">
    <label > Mail</label>
    <input type="text" name="mail" class="form-control" placeholder="Kullanıcı Adı Giriniz"></input>
</div>
<div class="form-group">
    <label > Telefon </label>
    <input type="text" name="phone" class="form-control" placeholder="Kullanıcı Adı Giriniz"></input>
</div>
<div class="form-group">
<button type="submit" class="btn btn-primary">Kaydet</button>
</div>
</form>
</div>
             </div>
            </div>
        </div>
        
        <!-- /page content -->
    </section>
  

<?php include 'include/footer.php'; ?>