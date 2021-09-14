<!doctype html>
<html>
    <head>
        <title>Kullanıcı Kayıt Formu</title>
        <meta charset="utf-8" />
        <style type="text/css">
            body{
                background:#76b852;
                font-size:10px;
                font-family:Trebuchet MS;
            }
            #kayitFormu{
                
                border-radius:10px;
                background:#ffffff;
                width:360px;
                margin:auto;
                margin-top:20px;
                padding:15px;
                text-align:center;
            }
            input, button
            {
                border-radius:5px;
                border:none;
                width:300px;
                height:50px;
                margin:20px 0px 20px 0px;
                background:rgba(240,240,240,.5);
                padding-left:15px;
                font-style:italic;
                
            }
            
            .btn{
                background:#76b852;
                color:white;
            }
            h3{
                color:#333;
                text-transform:uppercase;
                font-size:20px;
            }
            
        </style>
    </head>
    <body>

        <div id="kayitFormu">
            <form action="islem.php" method="post">
                <h3>KULLANICI Kayıt Formu</h3>
                <input type="text" name="username" placeholder="kullanıcı adı"   /> 
                
                <input type="email" name="mail" placeholder="eposta giriniz" required />
                
                <input type="password" name="password" placeholder="şifrenizi giriniz" />
                
                <input class="btn" type="submit" name="kullanicikaydet" value="KAYIT OL" />
            </form>
            
        </div>
    
    
    </body>
</html>