
<?php require '../../connection.php'; ?>
<?php 
if(isset($_POST["kullanicikaydet"]))
{
   $username= htmlspecialchars($_POST["username"]);
   $mail=htmlspecialchars($_POST["mail"]);
   $password=$_POST["password"];


   if(strlen($password)>=6)
{
// Başlangıç
$mail=$_POST['mail'];
$kullanicisor=DB::getRow("select * from users where mail='$mail' ");

    
    $kullanici_password=md5($password);

   

    $kullanicikaydet=DB::prepare("INSERT INTO users SET
        username=:username,
        mail=:mail,
        password=:password
       
        ");
   $kullanicikaydet->execute([
        'username' => $username,
        'mail' => $mail,
        'password' => $password
       
    ]);

    if ($kullanicikaydet) {


        header("Location: login.php");




    } else {


        header("Location: kayit.php");
    }






// Bitiş
   }
   else{
       echo "Şifre 6 karakterden fazla olmalı";
   }
   
}

?>