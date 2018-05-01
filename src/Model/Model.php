<?php
class Model
{
    protected function dbConnect()
    {
        // $db = new PDO('mysql:host=db736387871.db.1and1.com;dbname=db736387871;charset=utf8', 'dbo736387871', 'Bucarest1622',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $db = new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $db;
    }
}

