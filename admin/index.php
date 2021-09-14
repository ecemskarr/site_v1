<?php 

 ob_start();
 session_start();


// eğer giriş yapılmamış ise logine yönlendir

    header("location:Login/login.php");


// eğer giriş yapılmış ise dashboard sayfasına yönlendir
if(isset($_POST[kullanicikaydet]))
{
    echo "doğru yer";
}

?>