<?php 

//PDO

$host = "localhost";
$user = "root";
$passwdd = "";
$dbname = "brendon";
$port = 3306;

try{

   $conection = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $passwdd);
    //echo "Successful connection";
} catch(PDOException $err){
    echo "Error : failed to connect to the database, please try again" 
    .$err -> getMessage();
}