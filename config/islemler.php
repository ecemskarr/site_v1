<?php

class islemler
{
    public $base;

    function __construct() {
        $this->base = "http://" . $_SERVER['SERVER_NAME'] . substr($_SERVER['SCRIPT_NAME'], 0, strrpos($_SERVER['SCRIPT_NAME'], "/") + 1);
    }

    function p($par, $st = false) 
    {
        if ($st) 
        {
            return htmlspecialchars(addslashes(trim($_POST[$par])));
        } else 
        {
            return addslashes(trim($_POST[$par]));
        }
    }
    function g($par) 
    {
        return strip_tags(trim(addslashes($_GET[$par])));
    }

    function strto($to, $str) 
    {
        if ($to == 'lower') 
        {
            return mb_strtolower(str_replace(array('I', 'Ğ', 'Ü', 'Ş', 'İ', 'Ö', 'Ç'), array('ı', 'ğ', 'ü', 'ş', 'i', 'ö', 'ç'), $str), 'utf-8');
        } 
        elseif ($to == 'upper') 
        {
            return mb_strtoupper(str_replace(array('ı', 'ğ', 'ü', 'ş', 'i', 'ö', 'ç'), array('I', 'Ğ', 'Ü', 'Ş', 'İ', 'Ö', 'Ç'), $str), 'utf-8');
        } 
        else 
        {
            trigger_error('Lütfen geçerli bir strto() parametresi giriniz.', E_USER_ERROR);
        }
    }

    function kisalt($kelim, $str = 10) 
    {
        $kelime = strip_tags($kelim);
        if (strlen($kelime) > $str) 
        {
            if (function_exists("mb_substr"))
                $kelime = mb_substr($kelime, 0, $str, "UTF-8");
            else
                $kelime = substr($kelime, 0, $str);
        }
        return $kelime . "...";
    }

    function temizle($data) 
    {
        $datam = mysql_real_escape_string($data);
        return $datam;
    }
/*     function CokluFoto(&$file_post) 
    {
        $file_ary = array();
        $file_count = count($file_post['name']);
        $file_keys = array_keys($file_post);
        for ($i = 0; $i < $file_count; $i++) {
            foreach ($file_keys as $key) {
                $file_ary[$i][$key] = $file_post[$key][$i];
            }
        }

        return $file_ary;
    } */
    function ayar($deger) {
        $sor = DB::getRow("SELECT * FROM ayarlar WHERE id='1'");
        $yaz = $deger;
        return $sor->$yaz;
    }

    function dosya($field, $path, $allowedExts = array('doc', 'pdf', 'png', 'jpg', 'jpeg', 'DOC', 'PDF', 'PNG', 'JPG', 'JPEG'), $replace = array('/[^a-z0-9.]/i', '-')) {
        if (in_array(end(explode(".", strtolower($field['name']))), $allowedExts)) {
            $file = explode('.', strtolower(preg_replace($replace[0], $replace[1], $field['name'])));
            $ext = '.' . array_pop($file);
            $name = implode('.', $file);
            $saveName = substr($name, 0, 100) . $ext;
    
            if (move_uploaded_file($field['tmp_name'], $path . $saveName)) {
                return $saveName;
            }
        }
        return false;
    }
    
    
    function lang($deger) {
        $sor = DB::getRow("SELECT * FROM dil WHERE id='$deger'");
        $m_dil = "baslik" . dil;
        return $sor->$m_dil;
    }
    
    function sayfa($deger, $id) {
        $sor = DB::getRow("SELECT * FROM sayfa WHERE id='$id'");
        if ($deger == "baslik") {
            $m_dil = "baslik" . dil;
        } elseif ($deger == "icerik") {
            $m_dil = "icerik" . dil;
        } elseif ($deger == "seo") {
            $m_dil = "seo";
        }
        return $sor->$m_dil;
    }
    
    function SayfaResim($id) {
        $sor = DB::getRow("SELECT * FROM sayfa_foto WHERE sayfaid='$id'");
    
        return $sor->fotograf;
    }
    
    function ilet($deger) {
        $sor = DB::getRow("SELECT * FROM iletisim WHERE id='1'");
        $yaz = $deger;
        return $sor->$yaz;
    }


    
function zaman($zaman, $kactane = 2) {
    $array = array(
        array("String" => "yıl", "t" => 29030400),
        array("String" => "ay", "t" => 2419200),
        array("String" => "hafta", "t" => 604800),
        array("String" => "gün", "t" => 86400),
        array("String" => "saat", "t" => 3600),
        array("String" => "dakika", "t" => 60),
        array("String" => "saniye", "t" => 1));
    $kactane = $kactane > count($array) ? count($array) : (($kactane <= 0) ? 1 : $kactane);
    $kalan = 0;
    $fark = time() - $zaman;

    $text = array();
    for ($i = 0; count($text) < $kactane; $i++) {
        $t = $array[$i]["t"];
        $String = $array[$i]["String"];
        $kac = ($fark < $t) ? 0 : intval($fark / $t);

        $fark = $fark % $t;

        if ($kac >= 1)
            $text[] = count($text) == 0 ? $kac . " $String" : ", " . $kac . " $String";

        if ($i >= count($array) - 1)
            break;
    }
    ob_start();
    foreach ($text as $t) {
        echo $t;
    }
    $return = ob_get_contents();
    ob_end_clean();
    return $return;
}

function s($s) {
    $tr = array('ş', 'Ş', 'ı', 'İ', 'ğ', 'Ğ', 'ü', 'Ü', 'ö', 'Ö', 'Ç', 'ç');
    $eng = array('s', 'S', 'i', 'I', 'g', 'G', 'u', 'U', 'o', 'O', 'C', 'c');
    $s = str_replace($tr, $eng, $s);
    //$s = @eregi_replace('[^0-9A-Za-z.-.]', "-", $s);
    for ($i = 0; $i <= 5; $i++) 
    {
        $s = str_replace("--", "-", $s);
    }
    return strtolower($s);
}

function getClientIP() {
    if (isset($_SERVER)) {
        if (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
            return $_SERVER["HTTP_X_FORWARDED_FOR"];

        if (isset($_SERVER["HTTP_CLIENT_IP"]))
            return $_SERVER["HTTP_CLIENT_IP"];

        return $_SERVER["REMOTE_ADDR"];
    }

    if (getenv('HTTP_X_FORWARDED_FOR'))
        return getenv('HTTP_X_FORWARDED_FOR');

    if (getenv('HTTP_CLIENT_IP'))
        return getenv('HTTP_CLIENT_IP');

    return getenv('REMOTE_ADDR');
}


// Encrypt Function
function Kodla($encrypt, $mc_key) {

    return md5($encrypt);
}

function CokluFoto(&$file_post) {

    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i = 0; $i < $file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_ary;
}

}

