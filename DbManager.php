<?php

$host = 'localhost';
$dbname = 'memo';
$dbuser = 'webapl';
$dbpassword = 'pass1234';

try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8","$dbuser","$dbpassword");
    $records = $pdo->query('SELECT * FROM memo');
}catch(PDOException $e){
   var_dump($e -> getMessage());
    die();
}

?>
