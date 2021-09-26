<?php include 'include/header.php'; 
$id=$_SESSION['id'];


if($_POST)
 {$yetki = DB::get("SELECT * FROM users WHERE id='$id' and is_admin='admin'");
    if(count ($yetki)>0){
    $username       =  $_POST["username"];
    $password       =  md5($_POST["password"]);
    $is_admin       =  $_POST["is_admin"];
    $full_name      =  $_POST["full_name"];
    $mail           =  $_POST["mail"];
    $phone          =  $_POST["phone"];
    
    // Kullanıcı ekleme
    $userId = DB::prepare("INSERT INTO users SET 
        username='$username',
        password='$password',
        is_admin=' $is_admin',
        full_name='$full_name',
        mail='$mail',
        phone='$phone'
    ")->execute();
$lastId = DB::lastInsertId();
if(isset($_POST['yetkiler']) && $_POST['yetkiler']) {
    foreach($_POST['yetkiler'] as $elem) {
        DB::insert("INSERT INTO user_permissions SET 
        userId='$lastId' ,
        permissionId='$elem'
    ");        
    }
}


 if($userId){
     echo "Ekleme işlemi başarılı";
     header("location:adminkullanici.php");
 }
 else{
     echo "Bir hata oluştu";
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
    <input type="text" name="password" class="form-control" placeholder="Şifre Adı Giriniz"></input>
</div>



<h4> Yetkileri </h4>
<?php 
								$yetki = DB::get("SELECT * FROM permissions"); 
								for($i = 0; $i < count($yetki); $i++){
                                    ?>
                                    <input type="checkbox" value="<?php echo $yetki[$i]->id; ?>" name="yetkiler[]" /><?php echo $yetki[$i]->title; ?>
                                    <?php  
                                }
                        ?>
<div class="form-group">
</div>
<br> <br>
<div class="form-group">
    <label> Admin-Kullanıcı</label>
    <input type="text" name="is_admin" class="form-control" placeholder="Admin-Kullanıcı"></input>
</div>

<div class="form-group">
    <label> Adı Soyadı</label>
    <input type="text" name="full_name" class="form-control" placeholder="Ad Soyad Giriniz"></input>
</div>
<div class="form-group">
    <label > Mail</label>
    <input type="text" name="mail" class="form-control" placeholder="Mail  Giriniz"></input>
</div>
<div class="form-group">
    <label > Telefon </label>
    <input type="text" name="phone" class="form-control" placeholder="Telefon Numarası Giriniz"></input>
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