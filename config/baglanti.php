<?php
//global $db;
try 
{
    $GLOBALS = new PDO("mysql:host=localhost;dbname=site;charset=utf8", "root", "");
    //$GLOBALS = new PDO("mysql:host=localhost;dbname=maxibio;charset=utf8", "root", "");
    $GLOBALS->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch ( PDOException $e )
{
    print $e->getMessage();
}